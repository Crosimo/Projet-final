<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\User;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){
    $this->authorize('adminManagerTrainer');
    $users = User::all();
    $classes = Classe::all();
    return view('dashboard', compact('classes', 'users'));
    }
}
