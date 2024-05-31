<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VirtualController extends Controller
{
    public function index(){
        return view('index');
    }
    public function cadastro(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('home', ['authUser' => $authUser]);
        }
        else {
            return view('cadastro');
        }
    }
    public function login(){
        // dd(Auth::user());
        return view('login');
    }
    public function home(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('home', ['authUser' => $authUser]);
        }
        else {
            return view('login');
        }
    }
}
