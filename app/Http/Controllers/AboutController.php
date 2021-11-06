<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        $about = About::all();
        return view('backoffice.about.indexAbout', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('backoffice.about.createAbout');
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
            "content" => ["required"],
            "image" => ["required"],
            "vidéo" => ["required"],
            "logo" => ["required"]
        ]);

        // $testimonial = new About();
        // $testimonial->description = $request->description;
        // $testimonial->photo = $request->file("photo")->hashName();
        // $testimonial->nom = $request->nom;
        // $testimonial->statut = $request->statut;
        // $request->file("photo")->storePublicly("img", "public");
        // $testimonial->save();
        // return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
       $this->authorize('admin');
        return view('backoffice.about.showAbout', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $this->authorize('admin');
        return view('backoffice.about.editAbout', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        
        $this->authorize('update', $about);

        $request->validate([
            
            "content" => ["required"],
            "vidéo" => ["required"],
            "logo" => ["required"]
        ]);
        if ($request->file('image') !== null) {
        Storage::disk("public")->delete("img/about/" .$about->image);
        $about->image= $request->file("image")->hashName();
        $request->file("image")->storePublicly("img/about", "public");
        }
        $about->content = $request->content;
        
        $about->vidéo = $request->vidéo;
        $about->logo = $request->logo;
        
        
        $about->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
       

        Storage::disk("public")->delete("img/about/" .$about->image);
        $about->delete();
        return redirect()->route('about.index');
    }
}
