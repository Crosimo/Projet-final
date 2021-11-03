<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
   
    public function index()
    {
        $event = Event::all();
        return view('backoffice.event.indexEvent', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backoffice.event.createEvent');
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
            "titre" => ["required"],
            "description" => ["required"],
            "heure" => ["required"],
            
        ]);

        $event = new Event();
        $event->titre=$request->titre;
        $event->description=$request->description;
        $event->data=$request->data;
        $event->heure=$request->heure;
        
        $event->save();
        return redirect()->route('event.index')->with("message", "Nouvelle instance crée avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Event $Event)
    {
       
        // return view('backoffice.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
       
        return view('backoffice.event.editEvent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        

        $request->validate([
            "image" => ["required"],
            "titre" => ["required"],
            "description" => ["required"],
            "heure" => ["required"],
            
        ]);

        $event->titre=$request->titre;
        $event->description=$request->description;
        $event->data=$request->data;
        $event->heure=$request->heure;
        $event->save();
        return redirect('/')->with("message", "modification réalisée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index');
    }
}
