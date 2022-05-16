<?php

namespace App\Http\Controllers\Meeting\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $meetings;

    public function __construct($meetings)
    {
        $this->meetings = $meetings;
    }

    public function build()
    {
        return $this->markdown('email-meeting-created')->subject('Cita creada');
    }
}
