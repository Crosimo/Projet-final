<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $users = User::orderBy('name', 'ASC')->get();
        
        return view('backoffice.trainer.createTrainer', compact('users'));
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
        $trainer->image = $request->file("image")->hashName();
        $request->file("image")->storePublicly("img/trainer", "public");
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
        $trainer->users()->sync($request->user);
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
           
            "nom" => ["required"],
            "facebookLien"=> ["required"],
            "twitterLien"=> ["required"],
            "instagramLien"=> ["required"],
            "pinterestLien"=> ["required"],
            "role_id"   => ["required"], 
        ]);
        if ($request->file('image') !== null){
            Storage::disk("public")->delete("img/slider/" .$trainer->image);
            $trainer->image = $request->file("image")->hashName();
            $request->file("image")->storePublicly("img/trainer", "public");
        }
      
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
        Storage::disk("public")->delete("img/trainer/" .$trainer->image);
        $trainer->delete();
        return redirect()->route('trainer.index');
    }
}
