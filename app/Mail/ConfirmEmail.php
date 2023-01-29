<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Confirmación Participante AVANCEYA';
    public $datosE;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        
        $this->datosE = $datos;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emailconfir',compact('$datosE'));
    }
}
