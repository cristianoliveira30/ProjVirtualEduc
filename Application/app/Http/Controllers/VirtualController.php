<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VirtualController extends Controller
{
    public function index(){
        return view('index');
    }
    public function cadastro(){
        return view('cadastro');
    }
    public function login(){
        return view('login');
    }
    public function home(){
        return view('home');
    }
}
