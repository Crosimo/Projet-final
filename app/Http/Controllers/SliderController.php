<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Foreach_;

class SliderController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $slider = Slider::all();
        return view('backoffice.slider.indexSlider', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('backoffice.slider.createSlider');
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
        $this->authorize('create', Slider::class);
        $request->validate([
            "description" => ["required"],
            "image"=>['required'],
            "button" => ["required"],
              
        ]);
        
        if($request->boolean == "on"){
            $sliders = Slider::all();
            foreach($sliders as $esteban){
                $esteban->boolean = false;
                $esteban->save();
            }
        }
        
        $slider = new Slider();
        $slider->description = $request->description;
        $slider->image = $request->file("image")->hashName();
        $request->file("image")->storePublicly("img/slider", "public");
        $slider->button = $request->button;
        $slider->boolean = true;
        $slider->save();
        return redirect()->route('slider.index')->with("message", "Création de nouvelle instance réussie");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        $this->authorize('admin');
        return view('backoffice.slider.showSlider', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $this->authorize('admin');
        return view('backoffice.slider.editSlider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        
        $this->authorize('update', $slider);
        $request->validate([
            "description" => ["required"],
            
            "button" => ["required"],
        ]);
        if($request->boolean == "on"){
            $sliders = Slider::all();
            foreach($sliders as $esteban){
            $esteban->boolean = false;
            $esteban->save();
            }
        }
        if ($request->file('image') !== null){
            Storage::disk("public")->delete("img/slider/" .$slider->image);
            $slider->image = $request->file("image")->hashName();
            $request->file("image")->storePublicly("img/slider", "public");
           
        }
        
        $slider->description = $request->description;
        $slider->button = $request->button;
        $slider->boolean = true;
        $slider->save();
        return redirect('/')->with("message", "Modifications éffectuées avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $this->authorize('delete', $slider);
        Storage::disk("public")->delete("img/slider/" .$slider->image);
        $slider->delete();
        return redirect()->route('slider.index');
    }
}
