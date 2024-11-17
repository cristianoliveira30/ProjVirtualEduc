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
    public function getListaDisciplinas()
    {
        $columns = Schema::getColumnListing('disciplinas');
        $disciplinasNoId = array_diff($columns, ['user_id', 'id']);
        return response()->json(['disciplinas' => $disciplinasNoId]);
    }

    public function addDisciplinas(Request $request)
    {
        $user = Auth::user();
        $disciplinas = json_decode($request->input('disciplinas'), true);
        $disciplinasAtualizadas = [];
        $resposta = '';

        if (isset($disciplinas)) {
            foreach ($disciplinas as $disciplina) {
                $disciplinasAtualizadas[$disciplina] = true;
            }
            // Inserindo ou atualizando as disciplinas no banco de dados
            DB::table('disciplinas')->updateOrInsert(
                ['user_id' => $user->id],
                $disciplinasAtualizadas
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Disciplinas não fornecidas.'], 400);
        }

        // Verifica se os arquivos foram enviados
        try {
            if (
                $request->hasFile('documento') &&
                $request->file('documento')->isValid() &&
                $request->hasFile('foto') &&
                $request->file('foto')->isValid()
            ) {
                // Faz as validações e tenta adicionar ou outros dados ao banco e
                // retorna na variavel o erro ou a mensagem
                $resposta = $this->addInformacoes($request);
            } else {
                $resposta = 'Dados fornecidos, mas sem arquivos válidos!';
            }

            // após todo o processo de add disciplinas se não der erro ele envia a
            // resposta para o front tanto das disciplinas quanto dos dados
            return response()->json(['success' => true, 'disciplinas' => 'subiram, amém', 'dados' => $resposta, 'redirect' => route('home')]);
        } catch (\Exception $e) {
            // Caso de uma falha generica ao adicionar os dados mas de tudo certo
            // ao adicionar disciplinas
            Log::error('Erro ao tentar adicionar dados: ' . $e->getMessage());
            return response()->json([
                'success' => true,
                'message' => 'Interesses atualizados com sucesso, mas houve falha ao adicionar dados',
                'error' => $e
            ], 500);
        }
    }

    public function addInformacoes(Request $request)
    {
        $user = Auth::user();
        $retorno = '';

        // Verificando e salvando o arquivo 'documento'
        if ($request->hasFile('documento')) {
            $documentoFile = $request->file('documento'); // pega o documento
            $sanitizedUserName = preg_replace('/[^A-Za-z0-9\-]/', '_', $user->nomeusu); // limpa o nick do usuario pra n ter traços inválidos
            $documentoName = $sanitizedUserName . '_documento_' . date('Y-m-d') . '.' . $documentoFile->extension(); // monta o nome do arquivo
            $documentoFile->move(public_path('assets/docs/users/'), $documentoName); // move o arquivo 

            $documentoPath = 'assets/docs/users/' . $documentoName; // seta o caminho mais o nome do arquivo pra jogar no banco
        }

        $retorno = 'Documento arquivado sem caminho no banco e foto pendente';

        // Verificando e salvando o arquivo 'foto'
        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $sanitizedUserName = preg_replace('/[^A-Za-z0-9\-]/', '_', $user->nomeusu);
            $fotoName = $sanitizedUserName . '_foto_' . date('Y-m-d') . '.' . $fotoFile->extension();
            $fotoFile->move(public_path('assets/img/users/faces/'), $fotoName);

            $fotoPath = 'assets/img/users/faces/' . $fotoName;
        }

        $retorno = 'Documento e Foto arquivados mas sem caminho no banco';

        try {
            DB::table('informacoes')->updateOrInsert(
                ['user_id' => $user->id],
                [
                    'segemail' => $request->input('segemail'),
                    'documento' => $documentoPath ?? null,
                    'foto' => $fotoPath ?? null,
                ]
            );
            $retorno = 'Informações atualizadas com sucesso';
        } catch (\Throwable $th) {
            throw $th;
            return 'Caiu no catch';
        }
        return $retorno;
    }

    public function setQtdSeguidores($var = '') {}

    public function getQtdSeguidores($var = '')
    {
        $user = Auth::user();
        $qtdSeguidores = DB::table('relacionamentos')
            ->where('seguindo', true)
            ->where(['user_id' => $user->id])
            ->count();

        return $var ?
            $var = $qtdSeguidores :
            $qtdSeguidores;
    }

    public function getQtsSeguindo($var = '')
    {
        $user = Auth::user();
        $qtdSeguindo = DB::table('relacionamentos')
            ->where('seguido', true)
            ->where(['user_id' => $user->id])
            ->count();

        return $var ?
            $var = $qtdSeguindo :
            $qtdSeguindo;
    }

    public function getSugestaoSeguir(int $var)
    {
        $user = Auth::user();
        
        if (!$user) { 
            return [];
        }

        // Consulta os usuários para sugestão
        return DB::table('users')
            ->select('nomeusu')
            ->where('id', '!=', $user->id)
            ->limit($var)
            ->get();
    }
}
