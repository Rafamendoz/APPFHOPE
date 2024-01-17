<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Log;

use App\Mail\PersonalMail;
use App\Mail\PersonaSuccessEmail;

use Illuminate\Support\Facades\Mail;
use App\Events\SendEmailPostClosure;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClosureFinished
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendEmailPostClosure $event): void
    {
        $dato = $event->dato;
        Log::info("EVENTO DISPARADO ".$dato);
        $correo="";
        if($dato == "FAILED"){
            $correo = new PersonalMail($dato);
 
        }else{
            Log::info("EVENTO SEND CORRECT ".$dato);

            $correo = new PersonaSuccessEmail($dato);
        }
        Mail::to('eespino.mendoza@gmail.com')->send($correo);
        log:info("------------------ CLOUSURE ".$dato. " ------------------------------");
    }
}
