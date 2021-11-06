<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Classe_user;
use App\Models\Footer;
use App\Models\Header;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $this->authorize('admin');
       
        $users = User::all();
        return view('backoffice/user/indexUser', compact('users'));

    }
    public function destroy(User $id){
        $this->authorize('delete', [$id]);
        Storage::disk("public")->delete("img/profile/" .$id->image);
        $id->delete();
        return redirect()->back()->with('message', 'élément supprimé');

    }
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
        $request->file("image")->storePublicly("img/profile","public");
        $user->save();
        return redirect()->back();
    }

}
