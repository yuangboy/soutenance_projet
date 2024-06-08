<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class NotifiableUser
{
    use Notifiable;

    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
}