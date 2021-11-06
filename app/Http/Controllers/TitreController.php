<?php

namespace App\Http\Controllers;

use App\Models\Titre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $titre = Titre::all();
        return view('backoffice.titre.indexTitre', compact('titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('backoffice.titre.createTitre');
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
        $this->authorize('create', Titre::class);
        $request->validate([
            "nom" => ["required"],  
        ]);
        $titre = Titre::new();
        $titre->nom = $request->nom;

        return redirect()->route('titre.index')->with("message", "nouvelle instance de client enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Titre $categorie)
    {
        $this->authorize('admin');
        return view('backoffice.categorie.show', compact('titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Titre $titre)
    {
        $this->authorize('admin');
        return view('backoffice.titre.edittitre', compact('titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titre $titre)
    {
        $this->authorize('update', $titre);
        $request->validate([
            "titre" => ["required"], 
            "description"=>["required"] 
        ]);
        $titre->titre = $request->titre;
        $titre->description = $request->description;
        $titre->save();
        return redirect()->route('titre.index')->with("message", "modification réussie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titre $titre)
    {
        $this->authorize('delete', $titre);
        // Storage::disk("public")->delete("img/icon/" .$titre->image);
        $titre->delete();
        return redirect()->route('titre.index');
    }
}
