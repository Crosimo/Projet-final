<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Pricing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index($id){
       $pricing = Pricing::find($id);
       $date = Carbon::now();
       return view('pages/paiement/paiement', compact('pricing', 'date'));
    }
}
