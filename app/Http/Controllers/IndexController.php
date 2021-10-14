<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Categorie;
use App\Models\Classe;
use App\Models\Client;
use App\Models\Event;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Header;
use App\Models\Map;
use App\Models\Newsletter;
use App\Models\Pricing;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Titre;
use App\Models\Trainer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $titres = Titre::first();
        $headers = Header::first();
        $categories = Categorie::all();
        $abouts = About::first();
        $classes = Classe::all();
        $clients = Client::all();
        $events = Event::first();
        $gallerys = Gallery::all();
        $maps = Map::all();
        $newsletters = Newsletter::all();
        $pricings = Pricing::all();
        $schedules = Schedule::first();
        $sliders = Slider::all();
        $tags = Tag::first();
        $trainers = Trainer::all();
       
        $footers = Footer::first();
        
        return view('pages.index', compact('titres', 'categories', 'headers',  'abouts', 'classes', 'clients', 'events', 'gallerys', 'maps', 'newsletters', 'pricings', 'schedules', 'sliders', 'tags', 'trainers', 'sliders', 'footers'));
    }
}
