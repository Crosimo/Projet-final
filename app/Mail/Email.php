<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    public $contenuEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contenuEmail)
    {
        $this->contenuEmail = $contenuEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
       $contenu = $this->contenuEmail;
        if(count($this->contenuEmail) == 3){
           
            return $this->view('nouvelleClasse', compact('contenu'));
        }elseif((count($this->contenuEmail)) == 4){
            return $this->view('nouvelEvent', compact('contenu'));
        } 
         else{
            return $this->view('email', compact('contenu'));
        }
       
    }
}
