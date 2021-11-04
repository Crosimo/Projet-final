<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $this->authorize('adminManager');
        $trainer = Trainer::all();
        return view('backoffice.trainer.indexTrainer', compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('adminManager');
        return view('backoffice.trainer.createTrainer');
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
        $this->authorize('create', Trainer::class);
        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],
            "facebookLien"=> ["required"],
            "twitterLien"=> ["required"],
            "instagramLien"=> ["required"],
            "pinterestLien"=> ["required"],
            "role_id"   => ["required"],
            
        ]);
        $trainer = new Trainer();
        $trainer->image = $request->image;
        $trainer->nom = $request->nom;
        $trainer->facebook = "fa fa-facebook";
        $trainer->facebookLien = $request->facebookLien;
        $trainer->instagram = "fa fa-instagram";
        $trainer->instagramLien = $request->instagramLien;
        $trainer->twitter = "fa fa-twitter";
        $trainer->twitterLien = $request->twitterLien;
        $trainer->pinterest = "fa fa-pinterest";
        $trainer->pinterestLien = $request->pinterestLien;
        $trainer->role_id = $request->role_id;
        $trainer->save();
        return redirect()->route('trainer.index')->with("message", "Nouvelle instance crée avec succès");
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        $this->authorize('adminManager');
        return view('backoffice.trainer.showTrainer', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        $this->authorize('adminManager');
        return view('backoffice.trainer.editTrainer', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $this->authorize('update', $trainer);
        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],
            "facebookLien"=> ["required"],
            "twitterLien"=> ["required"],
            "instagramLien"=> ["required"],
            "pinterestLien"=> ["required"],
            "role_id"   => ["required"], 
        ]);
       
        $trainer->image = $request->image;
        $trainer->nom = $request->nom;
        $trainer->facebook = "fa fa-facebook";
        $trainer->facebookLien = $request->facebookLien;
        $trainer->instagram = "fa fa-instagram";
        $trainer->instagramLien = $request->instagramLien;
        $trainer->twitter = "fa fa-twitter";
        $trainer->twitterLien = $request->twitterLien;
        $trainer->pinterest = "fa fa-pinterest";
        $trainer->pinterestLien = $request->pinterestLien;
        $trainer->role_id = $request->role_id;
        $trainer->save();
        return redirect('/')->with("message", "Modifications réalisées avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('trainer.index');
    }
}
