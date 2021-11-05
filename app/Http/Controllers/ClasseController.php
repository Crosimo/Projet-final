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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ClasseController extends Controller
{
    public function classePage(){
    $headers = Header::first();
    $footers = Footer::first();
    $titres =Titre::all();
    $classes = Classe::all();
    $schedules = Schedule::paginate(1);
    $clients = Client::all();
    $ClasseMerge = Classe::all();
    
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
    $classes = $allItems;
  
   
    return view('pages.class', compact('headers', 'footers', 'titres', 'classes', 'schedules', 'clients'));
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
        $this->authorize('admin');
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
        $check1 = Classe::select('heureDébut', 'heureFin')
        ->whereDate('heureDébut', '<=', $request->heureDébut)
        ->whereDate('heureFin', '>=', $request->heureDébut)
        ->first();
        
        $check2 = Classe::select('heureDébut', 'heureFin')
        ->whereDate('heureDébut', '<=', $request->heureFin)
        ->whereDate('heureFin', '>=', $request->heureFin)
        ->first();
        
// checker pas d'erreurs dans l'organisation date début et fin
        $start = Carbon::parse($request->heureDébut);
        $fin = Carbon::parse($request->heureFin);
        if($check1 !== null || $check2 !== null || $start->greaterThan($fin)){
            return redirect()->back()->with('message', 'you fucked up');
        }



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
        $classe->heureDébut = $request->heureDébut;
        $classe->heureFin = $request->heureFin;
       
        $classe->save();
        $classe->tags()->attach($request->lestags);



        //Envoi de Newsletter
        $allNews = Newsletter::all();
        
          
        foreach($allNews as $news){
            $contenuEmail = [
                "email"=>$news->email,
                "name"=>$request->nom,
                "pricing"=>$request->pricing->packageTitle,
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
        $this->authorize('pricing', $id );
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
            "image" => ["required"],
            "nom" => ["required"],
            "categorie_id" => ["required"],
            "lestags" => ["required"],
            "trainer_id" => ["required"],
            "heureDébut" => ["required"], 
            
        ]);

        Storage::disk("public")->delete("img/classe/".$classe->image);
        $x = $request->id;
        $image= $request->file('image');
        
        $filename  = $image->getClientOriginalName();
        $classe->image = $filename;
        $classe->nom = $request->nom;
        $classe->trainer_id = $request->trainer_id;
        $classe->categorie_id = $request->categorie_id;
        $classe->pricing_id = $request->pricing_id;
        $classe->lestags = implode(',',$request->lestags);
        $classe->heureDébut = $request->heureDébut;
        $classe->heureFin = $request->heureFin;
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(370,207);
        $image_resize->save(public_path('img/classe/'.$filename));
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
            // if($id->users->find(Auth::user()->id) !== null){
            //     return redirect()->back()->with("message", "La classe est pleine");
            // }else{
                $id->users()->attach([Auth::user()->id]);
                return redirect()->back()->with("message", "vous êtes inscrits");
            // }
            
            
        }else{
            return redirect()->back()->with("message", "La classe est pleine");
        } 
    }


    public function desinscription(Classe $id){
        $id->users()->detach([Auth::user()->id]);
        return redirect('/profil')->with("message", "vous êtes désinscrits");   
    }
}
