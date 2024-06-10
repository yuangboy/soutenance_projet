<?php

namespace App\Listeners;

use App\Events\PraticienHoraire;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Mail\Mailer;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Mail\PraticienMail;

class SendPraticienHoraireEmail
{
    /**
     * Create the event listener.
     */

    use InteractsWithQueue;
    protected $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     */
    public function handle(PraticienHoraire $event): void
    {
        $this->mailer->to($event->user->email)->send(new PraticienMail($event->horaire));
        //  Mail::to($event->user->email)->send(new PraticienMail($event->user));
    }
}