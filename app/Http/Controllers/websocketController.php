<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\testWebsocket;
use App\Events\PrivateWebSocket;
class websocketController extends Controller
{
    public function test(){
        event(new testWebsocket);
    }
    public function private(){
        event(new PrivateWebSocket);
    }
}