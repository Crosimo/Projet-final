<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
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

        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],   
            
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
        return redirect()->route('trainer.index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
       
        // return view('backoffice.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
       
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
        $request->validate([
            "image" => ["required"],
            "nom" => ["required"],  
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
        return redirect('/');
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
