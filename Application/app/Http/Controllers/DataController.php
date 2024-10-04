<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log as Log;

use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function getListaDisciplinas() {

        $columns = Schema::getColumnListing('disciplinas');
        $disciplinasNoId = array_diff($columns, ['user_id', 'id']);
        return response()->json(['disciplinas' => $disciplinasNoId]);

    }
    public function addDisciplinas(Request $request) {
        // Decodificando o conteúdo JSON recebido
        Log::info('Método da requisição: ' . $request->method());

        $data = json_decode($request->getContent(), true);
        $disciplinas = $data['disciplinas'];
        $user = Auth::user();
    
        try {
            if (isset($disciplinas)) {
                // Inicializa um array para as disciplinas a serem inseridas
                $disciplinasAtualizadas = [];
    
                foreach ($disciplinas as $key => $disciplina) {
                    // Adiciona a disciplina ao array com valor booleano true
                    $disciplinasAtualizadas[$disciplina] = true; 
                }
    
                // Inserindo ou atualizando as disciplinas no banco de dados
                DB::table('disciplinas')->updateOrInsert(
                    ['user_id' => $user->id], // Condição para verificar se o registro já existe
                    $disciplinasAtualizadas // Dados a serem inseridos/atualizados
                );    
            } else {
                return response()->json(['success' => false, 'message' => 'Disciplinas não fornecidas.'], 400);
            }
        } catch (\Exception $e) { // Captura de exceções genéricas
            Log::error('Erro ao adicionar disciplinas: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erro ao processar a solicitação.', 'error' => $e], 500);
        }
    
        return response()->json(['success' => true, 'message' => 'Amém', 'redirect' => route('home')]);
    }
    public function addInfoAdicionais(Request $request) {
        $data = json_decode($request->getContent(), true);
        $user = Auth::user();
        $infoAdicionaisAtualizadas = [];
    }
}
