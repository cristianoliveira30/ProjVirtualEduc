<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use App\Mail\ReSenderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthMailController extends Controller
{
    //
    public function sendMail() {
        $mail = new ReSenderMail;
        Mail::to('cristian@meudominio')->send($mail);
    }
}
