<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\User;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginAction(Request $request)
    {
        // Obtém o conteúdo JSON da solicitação
        $jsonData = $request->getContent();
        $data = json_decode($jsonData, true);

        // Validação dos dados
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Se a validação falhar, retorna os erros
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Tentativa de autenticação
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Autenticação bem-sucedida
            return response()->json(['success' => true, 'redirect' => route('home')]);
        } else {
            // Falha na autenticação
            return response()->json(['success' => false, 'message' => 'Senha ou Email incorretos']);
        }
    }

    public function cadastroAction(Request $request)
    {
        $jsonData = $request->getContent();
        $data = json_decode($jsonData, true);

        $emailExiste = User::where('email', $data['email'])->exists();

        if ($emailExiste != true) {
            return response()->json(['success' => false, 'message' => 'Email já cadastrado']);
        }

        $validator = Validator::make($data, [
            'nomeusu' => 'required|string',
            'nomecomp' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'telefone' => 'required|min:10',
            'escolaridade' => 'required|alpha',
            'cpf' => 'required|string',
            'nascimento' => 'required|date',
            'rg' => 'required|min:6',
            'cep' => 'required|min:6',
            'estado' => 'required|alpha',
            'endereco' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data['password'] = Hash::make($data['password']);

            $userCreated = User::create($data);

            return response()->json([
                'success' => true, 
                'redirect' => route('login'), 
                'message' => $userCreated
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function confInfo(Request $request)
    {
        $jsonData = $request->getContent();
        $data = json_decode($jsonData, true);

        $validator = Validator::make($data, [
            'segemail' => 'segemail',
            'fotodocumento' => 'fotodocumento',
            'fotorosto' => 'fotorosto',
            'interesses' => 'ineresses'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            return response()->json(['success' => true, 'redirect' => route('home'), 'message' => $data]);
        }
    }
}
