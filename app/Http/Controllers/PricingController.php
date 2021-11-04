<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Titre;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $pricing = Pricing::all();
        return view('backoffice.pricing.indexPricing', compact('pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('backoffice.pricing.createPricing');
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
        $this->authorize('create', Pricing::class);
        $request->validate([
            "packageTitle" => ["required"],
            "packagePrice" => ["required"],
            "packageLink1" => ["required"],
            "packageLink2" => ["required"],
            "packageLink3" => ["required"],
            "packageLink4" => ["required"],
            "button" => ["required"],    
        ]);

        $pricing = new Pricing();
        $pricing->packageTitle = $request->packageTitle;
        $pricing->packagePrice = $request->packagePrice;
        $pricing->packageLink1 = $request->packageLink1;
        $pricing->packageLink2 = $request->packageLink2;
        $pricing->packageLink3 = $request->packageLink3;
        $pricing->packageLink4= $request->packageLink4;
        $pricing->save();
        return redirect()->route('pricing.index')->with("message", "Nouvelle instance crée avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {
        $this->authorize('admin');
        return view('backoffice.pricing.showPricing', compact('pricing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing)
    {
        $this->authorize('admin');
        return view('backoffice.pricing.editPricing', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricing $pricing)
    {
        $this->authorize('update', $pricing);

        $request->validate([
            "packageTitle" => ["required"],
            "packagePrice" => ["required"],
            "packageLink1" => ["required"],
            "packageLink2" => ["required"],
            "packageLink3" => ["required"],
            "packageLink4" => ["required"],
            "button" => ["required"],  
        ]);

       $pricing->packageTitle = $request->packageTitle;
        $pricing->packagePrice = $request->packagePrice;
        $pricing->packageLink1 = $request->packageLink1;
        $pricing->packageLink2 = $request->packageLink2;
        $pricing->packageLink3 = $request->packageLink3;
        $pricing->packageLink4= $request->packageLink4;
        $pricing->save();
        return redirect('/')->with("message", "modifications réalisées avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing)
    {
        $this->authorize('delete', $pricing);
        $pricing->delete();
        return redirect()->route('pricing.index');
    }
}
