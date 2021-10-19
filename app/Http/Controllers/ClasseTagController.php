<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\classe_tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClasseTagController extends Controller
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
        
        return view('backoffice.classe.createClasse');
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
            "nom" => ["required"],
            "instructeur"=>['required'],
            "heure"=>['required'],
            "image"=>['required'],
            "trainer_id"=>['required'],
            
        ]);

        $classe = new Classe();
        $x = count(Classe::all());
        $classe->image = $request->file("image")->hashName();
        $request->file("image")->storePubliclyAs("img/class",  $x.".jpg", "public");
        $classe->nom=$request->nom;
        $classe->instructeur=$request->instructeur;
        $classe->heure=$request->heure;
        $classe->save();
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
       
        return view('backoffice.classe.editClasse', compact('classe'));
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
            "instructeur"=>['required'],
            "heure"=>['required'],
            "image"=>['required'],
            "trainer_id"=>['required'],
            
        ]);

        Storage::disk("public")->delete("img/class/" .$classe->image);
        $classe->image= $request->file("image")->hashName();
        $request->file("image")->storePubliclyAs("img/class", "classe.jpg", "public");
        $classe->nom=$request->nom;
        $classe->instructeur=$request->instructeur;
        $classe->heure=$request->heure;
        $classe->save();
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
}
