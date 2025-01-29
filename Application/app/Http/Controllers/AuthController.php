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
    private function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

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

        // Verifica se o cpf é válido
        $cpfValido = $this->validaCPF($data['cpf']);
        if ($cpfValido == false) {
            response()->json(['success' => false, 'message' => 'CPF inválido']);
        }

        // Verifica se algumas informações já existem
        $emailExiste = User::where('email', $data['email'])->exists();
        $cpfExiste = User::where('cpf', $data['cpf'])->exists();
        $nomeusuExiste = User::where('nomeusu', $data['nomeusu'])->exists();


        // Responde se as informações já estiverem em uso
        if ($nomeusuExiste) {
            return response()->json(['success' => false, 'message' => 'Nome de usuário já cadstrado']);
        }
        if ($cpfExiste) {
            return response()->json(['success' => false, 'message' => 'CPF já cadastrado']);
        }
        if ($emailExiste) {
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
