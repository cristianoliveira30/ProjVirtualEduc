<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

class VirtualController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('home', ['authUser' => $authUser]);
        }
        else {
            return view('index');
        }
    }
    public function cadastro(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('home', ['authUser' => $authUser]);
        }
        else {
            return view('auth.cadastro');
        }
    }
    public function login(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('home', ['authUser' => $authUser]);
        }
        return view('auth.login');
    }
    public function home(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('home', ['authUser' => $authUser]);
        }
        else {
            return redirect(route('login'));
        }
    }

    // controllers em teste
    public function testeblades(){
        if (Auth::check()) {
            $authUser = Auth::user();
            return view('./auth/testeblades', ['authUser' => $authUser]);
        }
        else {
            return redirect(route('login'));
        }
    }
    public function testevue() {
        return Inertia::render('testevue');
    }
}
