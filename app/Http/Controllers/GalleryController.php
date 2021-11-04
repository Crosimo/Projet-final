<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $gallery = Gallery::all();
        return view('backoffice.gallery.indexGallery', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('backoffice.gallery.createGallery');
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
        $this->authorize('admin', Gallery::class);
        $request->validate([
            "image" => ["required"],
        ]);

        $gallery = new Gallery();
        $x = count(Gallery::all());
        $gallery->image = $request->file("image")->hashName();
        $request->file("image")->storePubliclyAs("img/portfolio",  "gal".$x.".jpg", "public",);
        $gallery->save();
        return redirect()->route('gallery.index')->with("message", "Création de nouvelle instance réussie");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
       
        // return view('backoffice.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $this->authorize('admin');
        return view('backoffice.gallery.editGallery', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->authorize('update', $gallery);

        $request->validate([
            "image" => ["required"],
            
        ]);

        Storage::disk("public")->delete("img/gallery/" .$gallery->image);
        $gallery->image= $request->file("image")->hashName();
        $x = count(Gallery::all());
        $request->file("image")->storePubliclyAs("img/portfolio", "gal".$x.".jpg", "public");
        $gallery->save();
        return redirect('/')->with("modification éffectuée avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $this->authorize('delete', $gallery);

        Storage::disk("public")->delete("img/gallery/" .$gallery->image);
        $gallery->delete();
        return redirect()->route('gallery.index');
    }
}
