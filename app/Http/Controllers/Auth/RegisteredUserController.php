<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Routing\Route as RoutingRoute;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $pricing = Pricing::find($id);
       
        return view('auth.register', compact('pricing'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    //    dd($request->file('image'));
        $user = User::create([
            'name' => $request->name,
            
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image'=>$request->file('image')->hashName(),
            'role_id'=>4,
            // 'pricing_id'=>3,
        ]);
        $user->pricing_id = 1;
        $user->save();
        event(new Registered($user));
        Auth::login($user);
        $request->file("image")->storePublicly("img/profile", "public");
        $value = URL::previous();
        $id = ($value[(strlen($value))-1]);
        $pricing = Pricing::find(intval($id));
        $date = Carbon::now();
        return view('pages/paiement/paiement', compact('pricing', 'date'));
    }
}
