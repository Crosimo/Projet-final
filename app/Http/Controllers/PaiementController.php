<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Pricing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index($id){
       $pricing = Pricing::find($id);
       $date = Carbon::now();
       return view('pages/paiement/paiement', compact('pricing', 'date'));
    }
    public function paiementEffectué(Pricing $id){
        $value = Auth::user()->id;
        $user =User::all()->find($value);
        $pricing= $id;
        $user->pricing_id = $pricing->id;
        $user->save();
        return redirect('/')->with('message', 'Paiement effectué');
    }
}
