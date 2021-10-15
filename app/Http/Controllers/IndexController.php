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
        $titres = Titre::all();
        $headers = Header::first();
        $categories = Categorie::all();
        $abouts = About::first();
        $classes = Classe::all();
        $clients = Client::all();
        $events = Event::first();
        $gallerys = Gallery::all()->random(6);
        $maps = Map::all();
        $newsletters = Newsletter::all();
        $pricings = Pricing::all();
        $schedules = Schedule::first();
        $sliders = Slider::all();
        $tags = Tag::first();
        $trainers = Trainer::all();
        $footers = Footer::first();
        
        
        for($i = 0; $i <= 8; $i++){
            $data = current(explode('(' , rtrim($titres[$i]->titre, ')')));
            $dateur = explode('(' , rtrim($titres[$i]->titre, ')'),3);
            if(count($dateur)>1){
                $titres[$i]->titre = $dateur;
                if($data =""){
                    $titres[$i]->span = 0;
                }elseif((count($dateur))<3){
                    $titres[$i]->span = 1;
                }else{
                    $titres[$i]->span = 2;
                }
            }
        }
         
        
        // verifier si vide ou pas

        return view('pages.index', compact('titres', 'categories', 'headers',  'abouts', 'classes', 'clients', 'events', 'gallerys', 'maps', 'newsletters', 'pricings', 'schedules', 'sliders', 'tags', 'trainers', 'sliders', 'footers'));
    }
}
