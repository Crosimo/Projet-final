<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Newsletter;
use App\Models\Pricing;
use App\Models\Tag;
use App\Models\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ClasseController extends Controller
{
    public function index()
    {
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
        // $this->authorize("create", Testimonial::class);
        
        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],
            "categorie_id" => ["required"],
            "lestags" => ["required"],
            "places" => ["required"],
            "trainer_id" => ["required"],
            "heureDébut" => ["required"],
            "heureFin" => ["required"],
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
        $classe->image = $request->file("image")->hashName();
        $classe->nom = $request->nom;
        $classe->places = $request->places;
        $classe->trainer_id = $request->trainer_id;
        $classe->categorie_id = $request->categorie_id;
        $classe->pricing_id = $request->pricing_id;
        $classe->lestags = implode(',',$request->lestags);
        $classe->heureDébut = $request->heureDébut;
        $classe->heureFin = $request->heureFin;
        $request->file("image")->storePubliclyAs("img/class",  $x.".jpg", "public",);
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
        
        return redirect()->route('classe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
       
        return view('backoffice.classe.showClass', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
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
        
        
        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],
            "categorie_id" => ["required"],
            "lestags" => ["required"],
            "trainer_id" => ["required"],
            "heureDébut" => ["required"], 
            "heureFin" => ["required"], 
        ]);

        Storage::disk("public")->delete("img/classe/" .$classe->image);
        $x = $request->id;
        $classe->image= $x.".jpg";
        $classe->nom = $request->nom;
        $classe->trainer_id = $request->trainer_id;
        $classe->categorie_id = $request->categorie_id;
        $classe->pricing_id = $request->pricing_id;
        $classe->lestags = implode(',',$request->lestags);
        $classe->heureDébut = $request->heureDébut;
        $classe->heureFin = $request->heureFin;
        $request->file("image")->storePubliclyAs("img/class", $x.".jpg", "public");
        $classe->save();
        $classe->tags()->sync($request->lestags);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
       
        Storage::disk("public")->delete("img/class/" .$classe->image);
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
