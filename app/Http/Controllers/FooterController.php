<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $footer = Footer::all();
        return view('backoffice.footer.indexFooter', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('backoffice.footer.createFooter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Footer::class);
        // $this->authorize("create", Testimonial::class);

        $request->validate([
            "image" => ["required"],
            "description" => ["required"],
            "email" => ["required"],
            "tel" => ["required"],
            "adresse" => ["required"],
            "tweets" => ["required"],
            "tweetcontenu1" => ["required"],
            "tweetcontenu2" => ["required"],
            "getintouch" => ["required"],
            "formElem1" => ["required"],
            "formElem2" => ["required"],
            "formElem3" => ["required"],
            
        ]);

        $footer = new Footer();
        $x = count(Footer::all());
        $footer->image = $request->file("image")->hashName();
        $footer->description = $request->description;
        $footer->email = $request->email;
        $footer->tel = $request->tel;
        $footer->tweets = $request->tweets;
        $footer->tweetcontenu1 = $request->tweetcontenu1;
        $footer->tweetcontenu2 = $request->tweetcontenu2;
        $footer->getintouch = $request->getintouch;
        $footer->formElem1 = $request->formElem1;
        $footer->formElem2 = $request->formElem2;
        $footer->formElem3 = $request->formElem3;
        $request->file("image")->storePublicly("img/logo",  "public",);
        $footer->save();
        return redirect()->route('footer.index')->with("message", "création de nouvelle instance réussie");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
       
        // return view('backoffice.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        $this->authorize('admin');
       $footer = Footer::first();
        return view('backoffice.footer.editFooter', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        
        $this->authorize('update', $footer);
        $request->validate([
            "image" => ["required"],
            "description" => ["required"],
            "email" => ["required"],
            "tel" => ["required"],
            "adresse" => ["required"],
            "tweets" => ["required"],
            "tweetcontenu1" => ["required"],
            "tweetcontenu2" => ["required"],
            "getintouch" => ["required"],
            "formElem1" => ["required"],
            "formElem2" => ["required"],
            "formElem3" => ["required"],
            
        ]);

        Storage::disk("public")->delete("img/footer/" .$footer->image);
        $footer->image= $request->file("image")->hashName();
        $footer->description = $request->description;
        $footer->email = $request->email;
        $footer->tel = $request->tel;
        $footer->tweets = $request->tweets;
        $footer->tweetcontenu1 = $request->tweetcontenu1;
        $footer->tweetcontenu2 = $request->tweetcontenu2;
        $footer->getintouch = $request->getintouch;
        $footer->formElem1 = $request->formElem1;
        $footer->formElem2 = $request->formElem2;
        $footer->formElem3 = $request->formElem3;
        $request->file("image")->storePubliclyAs("img/logo", "public");
        $footer->save();
        return redirect('/')->with("message", "modification éffectuée avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
       
        $this->authorize('admin', $footer);
        Storage::disk("public")->delete("img/logo/" .$footer->image);
        $footer->delete();
        return redirect()->route('footer.index');
    }
}
