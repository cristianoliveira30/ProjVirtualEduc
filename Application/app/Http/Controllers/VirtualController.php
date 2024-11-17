<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

class VirtualController extends Controller
{
    private $user;

    public function __construct() {
        $this->user = Auth::user();
    }
    public function index(){
        if (Auth::check()) {
            return view('home', ['authUser' => $this->user]);
        }
        else {
            return view('index');
        }
    }
    public function cadastro(){
        if (Auth::check()) {
            return view('home', ['authUser' => $this->user]);
        }
        else {
            return view('auth.cadastro');
        }
    }
    public function login(){
        if (Auth::check()) {
            return view('home', ['authUser' => $this->user]);
        }
        return view('auth.login');
    }
    public function home(){
        if (Auth::check()) {
            return view('home', ['authUser' => $this->user]);
        }
        else {
            return redirect(route('login'));
        }
    }
    public function profile() {
        return Auth::user() ?
        view('profile', ['authUser' => $this->user, 'dados' => route('getQtdSeguidores')]) :
        redirect(route('login'));
    }

    // controllers em teste
    public function testeblades(){
        if (Auth::check()) {
            return view('./auth/testeblades', ['authUser' => $this->user]);
        }
        else {
            return redirect(route('login'));
        }
    }
    public function testevue() {
        return Inertia::render('testevue');
    }
    public function testegeral() {
        if (Auth::check()) {
            return view('testegeral', ['authUser' => $this->user]);
        }
        else {
            return redirect(route('home'));
        }
    }
}
