<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
use Illuminate\Support\Facades\DB;
use Stringable;

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
        $gallerys = Gallery::paginate(6);
        $maps = Map::all();
        $newsletters = Newsletter::all();
        $pricings = Pricing::all();
        $schedules = Schedule::paginate(1);
        $sliders = Slider::all();
        $tags = Tag::first();
        $trainers = Trainer::all();
        $footers = Footer::first();
        



        // //Schedule Classes
        $schedules2 = Schedule::all();
        $week1 =  DB::table('classes')->whereDate('date',">=", $schedules2[0]->dateDébut)->whereDate('date', "<=",$schedules2[1]->dateDébut)->orderBy('heureDébut', 'ASC')->orderBy('date', 'ASC')->get();
        $week2 = DB::table('classes')->whereDate('date',">=", $schedules2[1]->dateDébut)->whereDate('date', "<=",$schedules2[2]->dateDébut)->orderBy('heureDébut', 'ASC')->orderBy('date', 'ASC')->get();
        $week3 = DB::table('classes')->whereDate('date',">=", $schedules2[2]->dateDébut)->whereDate('date', "<=",$schedules2[3]->dateDébut)->orderBy('heureDébut', 'ASC')->orderBy('date', 'ASC')->get();
 
    //    dd($week3);




// Titres
        
        for($i = 0; $i <= 8; $i++){


            $titres[$i]->titre = Str::replace('(',  '<span class="span">', $titres[$i]->titre);
            $titres[$i]->titre = Str::replace(')',  '</span>', $titres[$i]->titre);
            
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

        return view('pages.index', compact('titres', 'categories', 'headers',  'abouts', 'classes', 'clients', 'events', 'gallerys', 'maps', 'newsletters', 'pricings', 'schedules', 'sliders', 'tags', 'trainers', 'sliders', 'footers', 'week3'));
    }
}
