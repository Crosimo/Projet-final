<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie = Categorie::all();
        return view('backoffice.categorie.indexCategorie', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backoffice.categorie.createCategorie');
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
           
        ]);

        $categorie = Categorie::new();
       
        $categorie->nom = $request->nom;

        return redirect()->route('categorie.index')->with("message", "nouvelle instance de client enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
       
        return view('backoffice.categorie.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $tag)
    {
       
        return view('backoffice.categorie.editCategorie', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        

        $request->validate([
            "nom" => ["required"],
           
        ]);
       
        $categorie->nom = $request->nom;
        
        return redirect('/')->with("message", "modification réussie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
       

        Storage::disk("public")->delete("img/icon/" .$categorie->image);
        $categorie->delete();
        return redirect()->route('categorie.index');
    }
}
