<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::all();
        return view('backoffice.header.indexHeader', compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backoffice.header.createHeader');
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
            "titre1" => ["required"],
            "titre2" => ["required"],
            "titre3" => ["required"],
            "titre4" => ["required"],
            "titre5" => ["required"]   
        ]);

        $header = new Header();
        $x = count(Header::all());
        $header->image = $request->file("image")->hashName();
        $header->titre1 = $request->titre1;
        $header->titre2 = $request->titre2;
        $header->titre3 = $request->titre3;
        $header->titre4 = $request->titre4;
        $header->titre5 = $request->titre5;
        $request->file("image")->storePubliclyAs("img/logo",  "logo".$x.".jpg", "public",);
        $header->save();
        return redirect()->route('header.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
       
        // return view('backoffice.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
       
        return view('backoffice.header.editHeader', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        

        $request->validate([
            "image" => ["required"],
            "titre1" => ["required"],
            "titre2" => ["required"],
            "titre3" => ["required"],
            "titre4" => ["required"],
            "titre5" => ["required"]  
            
        ]);

        Storage::disk("public")->delete("img/header/" .$header->image);
        $header->image= $request->file("image")->hashName();
        $header->titre1 = $request->titre1;
        $header->titre2 = $request->titre2;
        $header->titre3 = $request->titre3;
        $header->titre4 = $request->titre4;
        $header->titre5 = $request->titre5;
        $request->file("image")->storePubliclyAs("img/logo", "logo".$request->id.".jpg", "public");
        $header->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
       

        Storage::disk("public")->delete("img/logo/" .$header->image);
        $header->delete();
        return redirect()->route('header.index');
    }
}
