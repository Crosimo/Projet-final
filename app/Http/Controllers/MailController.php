<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendmail(Request $request){

        $contenuEmail = [
        "email"=>$request->email,
        ];
        Mail::to("$request->email")->send(new Email($contenuEmail));
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();
        return redirect()->back();
        }
}
