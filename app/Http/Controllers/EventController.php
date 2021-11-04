<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Event;
use App\Models\Newsletter;
use App\Models\Titre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $allNews = Newsletter::all();
        
          
        foreach($allNews as $news){
            $contenuEmail = [
                "email"=>$news->email,
                "titre"=>$request->titre,
                "description"=>$request->description,
                "date"=>$request->data,
                ];
            Mail::to("$news->email")->send(new Email($contenuEmail));
        }
        return redirect()->route('event.index')->with("message", "Nouvelle instance crée avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $titres = Titre::all();
        return view('backoffice.event.showEvent', compact('event', 'titres'));
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
