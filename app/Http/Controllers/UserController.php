<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Footer;
use App\Models\Header;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function profil(){
        $classe = Classe::all();
        $headers = Header::first();
        $footers = Footer::first();
        return view('backoffice/profile/indexProfile', compact('classe', 'headers', 'footers'));
    }

    public function updateProfil(Request $request, User $id){
        $user = $id;
        $request->validate([
            "image" => ["required"],
        ]);
        
        Storage::disk("public")->delete("img/profile/" .$user->image);    
        $user->image= $request->file("image")->hashName();
        $request->file("image")->storePubliclyAs("img/profile", $user->image, "public");
        $user->save();
        return redirect('/');
    }





}
