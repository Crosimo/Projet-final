<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view('backoffice.client.indexClient', compact('classe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backoffice.client.createClient');
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
            "logo" => ["required"],
            "description" => ["required"],
            "titre" => ["required"],
        ]);

        $client = new Client();
        $x = count(Client::all());
        $client->image = $request->file("image")->hashName();
        $client->logo = $request->logo;
        $client->description = $request->description;
        $client->titre = $request->titre;
        $request->file("image")->storePubliclyAs("img/icon", "signature".$x.".jpg", "public",);
        $client->save();
        return redirect()->route('client.index')->with("message", "nouvelle isntance de client enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
       
        return view('backoffice.client.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $classe)
    {
       
        return view('backoffice.client.editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        

        $request->validate([
            "image" => ["required"],
            "logo" => ["required"],
            "description" => ["required"],
            "titre" => ["required"],
        ]);
        $x = count(Client::all());
        Storage::disk("public")->delete("img/icon/" .$client->image);
        $client->image= $request->file("image")->hashName();
        $client->nom = $request->nom;
        $client->instructeur = $request->instructeur;
        $client->heure = $request->heure;
        $request->file("image")->storePubliclyAs("img/icon", "signature".$x.".jpg", "public");
        $client->save();
        return redirect('/')->with("message", "modification réussie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
       

        Storage::disk("public")->delete("img/icon/" .$client->image);
        $client->delete();
        return redirect()->route('client.index');
    }
}
