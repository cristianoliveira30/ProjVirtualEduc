<?php

use App\Http\Controllers\VirtualController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\PasswordUpdateNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// controllers de autenticacao
Route::get('/', [VirtualController::class, 'index'])->name('index');
Route::get('/cadastro', [VirtualController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'cadastroAction'])->name('cadastro.action');
Route::get('/login', [VirtualController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// páginas disponíveis somente com login
Route::get('/home', [VirtualController::class, 'home'])->name('home');
Route::get('/profile', [VirtualController::class, 'profile'])->name('profile');

// métodos do bd
Route::get('/disciplinas', [DataController::class, 'getListaDisciplinas'])->name('getListaDisciplinas');
Route::post('/addDisciplinas', [DataController::class, 'addDisciplinas'])->name('addDisciplinas')->withoutMiddleware('auth');
Route::get('/getQtdSeguidores', [DataController::class, 'getQtdSeguidores'])->name('getQtdSeguidores');

// páginas em testes
Route::get('/testeblades', [VirtualController::class, 'testeblades'])->name('testeblades');
Route::get('/testevue', [VirtualController::class, 'testevue'])->name('testevue');
Route::get('/testegeral', [VirtualController::class, 'testegeral'])->name('testegeral');


// daqui para baixo são as rotas de recuperação de senha
// rota pro blade
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
// verifica o email e envia
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
// manda o token pra resetar a password
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
// por fim atualiza a senha
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->password = Hash::make($password);
            $user->save();
            
            event(new PasswordReset($user));
            
            $user->notify(new PasswordUpdateNotification($user));
        }
    );
    
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');