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
use Carbon\Carbon;
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
            $dataTitre = current(explode('(' , rtrim($titres[$i]->titre, ')')));
            $dateurTitre = explode('(' , rtrim($titres[$i]->titre, ')'),3);
            if(count($dateurTitre)>1){
                if($dataTitre ="" ){
                    $dateurTitre[0] = '<span class="span">'.$dateurTitre[0].'</span>';
                    $value = implode('', $dateurTitre);
                    $titres[$i]->titre =  $dateurTitre;
                    $titres[$i]->titre =  $value;
                }elseif((count($dateurTitre))<3 ){
                    $dateurTitre[1] = '<span class="span">'.$dateurTitre[1].'</span>';
                    $value = implode('', $dateurTitre);
                    $titres[$i]->titre =  $value;
                }else{
                    $dateurTitre[2] = '<span class="span">'.$dateurTitre[2].'</span>';
                    $value = implode('', $dateurTitre);
                    $titres[$i]->titre =  $value;
                }
            }
        }
        

        //slider
        
        function moveElement(&$array, $a, $b) {
            $arr = $array->toArray();
            $out = array_splice($arr, $a, 1);
            array_splice($arr, $b, 0, $out); 
            $array = $arr; 
        }

        for($i = 0; $i < count($sliders); $i++){
            if($sliders[$i]->boolean == "on"){
                moveElement($sliders, $i, 0);
            }
        }
      

        // ------Trainers------
        $leadCoach= Trainer::all()->where('role_id', 2)->take(1)->toArray();
        
        $coach= Trainer::all()->where('role_id', 3)->take(2);
        $coach->splice(1, 0, $leadCoach);
       

        $trainers = $coach;
        

      
        // ------Classes-------
        $ClasseMerge = Classe::all();
        $ClassePrio = $ClasseMerge->where('Prioritaire', true);
        $ClasseRed= [];
        $ClasseOrange= [];
        $ClasseGrey= [];
        $ClasseRand= [];
        foreach($ClasseMerge as $test){
            if($test->places-(count($test->users)) == 0){
                array_push($ClasseGrey, $test);  
            }elseif($test->places -(count($test->users)) <= 3){
                array_push($ClasseRed, $test);
            }elseif( $test->places -(count($test->users)) <=5){
                array_push($ClasseOrange, $test);
            }else{
                array_push($ClasseRand, $test);
            }
        }
        
        $allItems = new \Illuminate\Database\Eloquent\Collection; //Create empty collection which we know has the merge() method
        $allItems = $allItems->merge($ClassePrio);
        $allItems = $allItems->merge($ClasseGrey);
        $allItems = $allItems->merge($ClasseRed);
        $allItems = $allItems->merge($ClasseOrange);
        $allItems = $allItems->merge($ClasseRand);
        $classe = $allItems->take(3);
        // verifier si vide ou pas

        return view('pages.index', compact('titres', 'categories', 'headers',  'abouts', 'classes', 'clients', 'events', 'gallerys', 'maps', 'newsletters', 'pricings', 'schedules', 'sliders', 'tags', 'trainers', 'sliders', 'footers'));
    }
}
