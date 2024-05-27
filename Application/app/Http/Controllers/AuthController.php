<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{
    public function loginAction(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:6'
        ]);
        return true;
    }

    public function cadastroAction(Request $request)
    {
        // Obtém o conteúdo JSON da solicitação
        $jsonData = $request->getContent();
        
        // Decodifica os dados JSON em um array associativo
        $data = json_decode($jsonData, true);
        
        // Validação dos dados
        $validator = FacadesValidator::make($data, 
        [
            'nomeusu' => 'required|string',
            'nomecomp' => 'required|alpha',
            'email' => 'required|email|unique:clientes,email',
            'senha' => 'required|min:6',
            'telefone' => 'required|min:10',
            'escolaridade' => 'required|alpha',
            'cpf' => 'required|string',
            'nascimento' => 'required|date',
            'rg' => 'required|min:6',
            'cep' => 'required:min:6',
            'estado' => 'required|alpha',
            'endereco' => 'required|string'
        ]
        );
        
        if ($validator->fails()) {
            return json_encode($validator->errors(), JSON_PRETTY_PRINT);
        } else {
            return json_encode($data, JSON_PRETTY_PRINT);
        }
        

    //     if ($validator->fails()) {
    //         return dd($validator);
    //     }

        // Se passar na validação, você pode salvar os dados no banco de dados
        // User::create([...]);
    }
}
