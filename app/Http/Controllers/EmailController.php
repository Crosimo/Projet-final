<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email=Email::all();
        $email=Email::all()->toArray();
        $email=array_reverse($email);
        
        return view('backoffice.email.boitemail',compact('email'));
    }

    public function indexLu()
    {
       
        $email=Email::all()->where('lu',1);
        return view('backoffice.email.boitemail',compact('email'));
    }

    public function indexNonLu()
    {
        $email=Email::all()->where('lu',0);;
        return view('backoffice.email.boitemail',compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "message" => "required",
            "email" => "required",
            
            
            
        ]);
       

        $email=new Email();
        $email->name = $request->name;
        $email->email = $request->email;
        $email->message = $request->message;
        $email->lu = 0;
       /*  $email=[
            "name"=>$request->name,
            "email"=>$request->email,
            "message"=>$request->message,
            "lu" => 0,
            
        ]; */
        
        $email->save();
        
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        $email->lu=1;
        $email->save();
        $email = Email::all();
        return view('backoffice.email.boitemail',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete();
        
        return redirect('/backoffice/email');
    }
}
