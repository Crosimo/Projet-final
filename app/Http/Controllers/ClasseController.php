<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Client;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Newsletter;
use App\Models\Pricing;
use App\Models\Schedule;
use App\Models\Tag;
use App\Models\Titre;
use App\Models\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
class ClasseController extends Controller
{
    public function classePage(Request $request){
    $headers = Header::first();
    $footers = Footer::first();
    $titres =Titre::all();
    $classes = Classe::all();
    $schedules = Schedule::paginate(1);
    $clients = Client::all();
    $ClasseMerge = Classe::all();
    $pricings = Pricing::all();
    for($i = 0; $i <= 8; $i++){

        $titres[$i]->titre = Str::replace('(',  '<span class="span">', $titres[$i]->titre);
        $titres[$i]->titre = Str::replace(')',  '</span>', $titres[$i]->titre);
        
    }
    $ClassePrio = $ClasseMerge->where('prioritaire', 1);
    $ClasseRed= [];
    $ClasseOrange= [];
    $ClasseGrey= [];
    $ClasseRand= [];
    $ClassePassed = [];
    foreach($ClasseMerge as $test){
        if((new Carbon($test->heureDébut))->isPast()){
            array_push($ClassePassed, $test);
        }elseif($test->places-(count($test->users)) == 0){
            array_push($ClasseGrey, $test);
        }
        elseif($test->places -(count($test->users)) <= 3){
            array_push($ClasseRed, $test);
        }elseif( $test->places -(count($test->users)) <=5){
            array_push($ClasseOrange, $test);
        }else{
            array_push($ClasseRand, $test);
        }
       
    }
    
    $allItems = new \Illuminate\Database\Eloquent\Collection; //Create empty collection which we know has the merge() method
    $allItems = $allItems->merge($ClassePrio);
    $allItems = $allItems->merge($ClasseRed);
    $allItems = $allItems->merge($ClasseOrange);
    
    $allItems = $allItems->merge($ClasseRand);
    
    $allItems = $allItems->merge($ClasseGrey);
    
    $allItems = $allItems->merge($ClassePassed);
    $classes = $allItems->all();
    
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
    // Create a new Laravel collection from the array data
    $itemCollection = collect($classes);

    // Define how many items we want to be visible in each page
    $perPage = 9;

    // Slice the collection to get the items to display in current page
    $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

    // Create our paginator and pass it to the view
    $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

    // set url path for generted links
    $paginatedItems->setPath($request->url());
    $classeurs = $paginatedItems;
    return view('pages.class', compact('headers', 'footers', 'titres', 'classes', 'classeurs', 'schedules', 'clients', 'pricings'));
    }
    public function index()
    {
        $this->authorize('adminManagerTrainer');
        $classe = Classe::all();
        return view('backoffice.classe.indexClasse', compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('adminManagerTrainer');
        $tag = Tag::all();
        $categorie = Categorie::all();
        $trainer = Trainer::all();
        $classe = Classe::all();
        $pricing = Pricing::all();
        
        return view('backoffice.classe.createClasse', compact('classe', 'categorie', 'tag', 'trainer', 'pricing'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->authorize('create', Classe::class );
        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],
            "categorie_id" => ["required"],
            "lestags" => ["required"],
            "places" => ["required"],
            "trainer_id" => ["required"],
            "heureDébut" => ["required"],
           
        ]);
        
       
// Checker que ça n'est bloqué par aucunes autres dates 
        $lesclasses =Classe::all();
        foreach($lesclasses as $item){
            
            if($item->heureDébut->format('Y-m-d H') ==  Carbon::createFromFormat('Y-m-d H', $request->heureDébut." ".$request->heureFin)->format('Y-m-d H')){
               
                return redirect()->back()->with('message', 'Il existe déjà une classe à ce moment-là');
            }
        }
        // ->whereDate('heureFin', '>=', $request->heureDébut)
        // ->first();
        
        // $check2 = Classe::select('heureDébut', 'heureFin')
        // ->whereDate('heureDébut', '<=', $request->heureFin)
        // ->whereDate('heureFin', '>=', $request->heureFin)
        // ->first();
        
// // checker pas d'erreurs dans l'organisation date début et fin
//         $start = Carbon::parse($request->heureDébut);
//         $fin = Carbon::parse($request->heureFin);
//         if($check1 !== null || $check2 !== null || $start->greaterThan($fin)){
//             return redirect()->back()->with('message', 'you fucked up');
//         }



        $classe = new Classe();
// Checker si c'ests prioritaire
        if($request->prioritaire == 'on'){
            $classe->prioritaire = true;
        }else{
            $classe->prioriatier = false;
        };
        $x = count(Classe::all());
        $image= $request->file('image');
        $filename  = $image->getClientOriginalName();
        $classe->image = $filename;
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(370,207);
        $image_resize->save(public_path('img/classe/'.$filename));
        $classe->nom = $request->nom;
        $classe->places = $request->places;
        $classe->trainer_id = $request->trainer_id;
        $classe->categorie_id = $request->categorie_id;
        $classe->pricing_id = $request->pricing_id;
        $classe->lestags = implode(',',$request->lestags);
        $classe->heureDébut = Carbon::createFromFormat('Y-m-d H', $request->heureDébut." ".$request->heureFin);
        $classe->heureFin = $request->heureDébut;
       
        $classe->save();
        $classe->tags()->attach($request->lestags);



        //Envoi de Newsletter
        $allNews = Newsletter::all();
        
          
        foreach($allNews as $news){
            
            $contenuEmail = [
                "email"=>$news->email,
                "name"=>$request->nom,
                "pricing"=>$classe->pricing->packageTitle,
                ];
            Mail::to("$news->email")->send(new Email($contenuEmail));
        }
        
        return redirect()->route('classe.index')->with("message", "création réussie");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        $this->authorize('adminManagerTrainer');
        $tag = Tag::all();
        $categorie = Categorie::all();
        $trainer = Trainer::all();
        $pricing = Pricing::all();
        return view('backoffice.classe.showClasse', compact('classe', 'tag', 'categorie', 'trainer', 'pricing'));
    }

    public function shower(Classe $id){
        
        $this->authorize('pricing', $id->pricing );
        
        $classe = $id;
        $headers = Header::first();
        $footers = Footer::first();
        return view('pages.showClass', compact('classe', 'headers', 'footers'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        $this->authorize('adminManagerTrainer');
        $tag = Tag::all();
        $categorie = Categorie::all();
        $trainer = Trainer::all();
        $pricing = Pricing::all();
        
        return view('backoffice.classe.editClasse', compact('classe', 'tag', 'categorie', 'trainer', 'pricing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        
        $this->authorize('update', $classe);
        $request->validate([
            
            "nom" => ["required"],
            "categorie_id" => ["required"],
            "lestags" => ["required"],
            "trainer_id" => ["required"],
            "heureDébut" => ["required"], 
            
        ]);
        $lesclasses =Classe::all();
        foreach($lesclasses as $item){
            
            if($item->heureDébut->format('Y-m-d H') ==  Carbon::createFromFormat('Y-m-d H', $request->heureDébut." ".$request->heureFin)->format('Y-m-d H')){
               
                return redirect()->back()->with('message', 'Il existe déjà une classe à ce moment-là');
            }
        }
        if ($request->file('image') !== null){
            Storage::disk("public")->delete("img/classe/".$classe->image);
            $image= $request->file('image');
            $filename  = $image->getClientOriginalName();
            $classe->image = $filename;         
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(370,207);
            $image_resize->save(public_path('img/classe/'.$filename));
        }
       
        $x = $request->id;
        
        
        $classe->nom = $request->nom;
        $classe->trainer_id = $request->trainer_id;
        $classe->categorie_id = $request->categorie_id;
        $classe->pricing_id = $request->pricing_id;
        $classe->lestags = implode(',',$request->lestags);
        $classe->heureDébut = Carbon::createFromFormat('Y-m-d H', $request->heureDébut." ".$request->heureFin);
        $classe->heureFin = $request->heureDébut;
        
        $classe->save();
        $classe->tags()->sync($request->lestags);
        return redirect()->route('classe.index')->with("message", "edit réussie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        $this->authorize('delete', $classe);
        Storage::disk("public")->delete("img/classe/" .$classe->image);
        $classe->delete();
        return redirect()->route('classe.index');
    }


    public function inscription(Classe $id){
        // dd($id->users->find(Auth::user()->id));
        if((count($id->users)) < $id->places  ){
            if($id->users->find(Auth::user()->id) !== null){
                return redirect('/')->with("message", "Vous êtes déjà inscrit");
            }else{
                $id->users()->attach([Auth::user()->id]);
                return redirect('/')->with("message", "vous êtes inscrits");
            }
            
            
        }else{
            return redirect('/')->with("message", "La classe est pleine");
        } 
    }


    public function desinscription(Classe $id){
        $id->users()->detach([Auth::user()->id]);
        return redirect('/profil')->with("message", "vous êtes désinscrits");   
    }
}
