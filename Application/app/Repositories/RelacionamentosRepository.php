<?php

namespace App\Repositories;

use App\Models\Relacionamentos;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelacionamentosRepository
{
    private $model;
    private $user;

    /**
     * Construtor para injeção de dependência.
     */
    public function __construct(Relacionamentos $model)
    {
        $this->model = $model;
        $this->user = Auth::user();
    }

    public function jaSegue($idSeguido, $userId)
    {
        return $this->model
        ->where('user_id', $userId)
        ->where('user_choosen', $idSeguido)
        ->select(['seguindo']);
    }

    /**
     * Faz as alteracoes para seguir um usuario
     * 
     * @param int $idSeguido | ID do usuario que sera seguido
     * @param int $userId | ID do usuario que vai seguir
     * @return bool
     */
    public function comecarSeguir(int $idSeguido, int $userId)
    {
        try {
            $this->model
                ->updateOrInsert(
                    ['user_id' => $userId, 'user_choosen' => $idSeguido],
                    ['seguindo' => true]
                );

            $this->model
                ->updateOrInsert(
                    ['user_id' => $idSeguido, 'user_choosen' => $userId],
                    ['seguido' => true]
                );
        } catch (Exception $e) {
            return ['response' => false, 'message' => $e->getMessage() . ' ' . $e->getCode()];
        }

        return ['response' => true];
    }

    /**
     * Faz as alteracoes para desfazer o seguimento.
     * 
     * @param int $idSeguido | ID do usuario que deixara de ser seguido
     * @param int $userId | ID do usuario que deixara de seguir
     * @return bool
     */
    public function deixarSeguir(int $idSeguido, int $userId)
    {
        try {
            $this->model
                ->where('user_id', $userId)
                ->where('user_choosen', $idSeguido)
                ->update(['seguindo' => false]) > 0;
        } catch (Exception $e) {
            return ['response' => false, 'message' => $e->getMessage() . ' ' . $e->getCode()];
        }

        return ['response' => true];
    }

    public function getListaSeguindo($id) {
        try {
            // IDs de usuários que o usuário já segue
            $idSeguido = $this->model
                ->where('user_id', $id)
                ->where('seguindo', true)
                ->pluck('user_choosen')
                ->toArray(); // Converte para array
            
            // Se não houver IDs, retorna uma mensagem adequada
            if (empty($idSeguido)) {
                return [
                    'response' => true, 
                    'message' => 'Nenhum seguidor encontrado.'
                ];
            }
    
            // Seleção de usuários já seguidos
            $resposta = DB::table('users')
                ->select('nomeusu', 'id')
                ->whereIn('id', $idSeguido) // Usa whereIn para listas de IDs
                ->where('id', '!=', $id) // Exclui o próprio usuário
                ->get();
    
            // Se a resposta estiver vazia
            if ($resposta->isEmpty()) {
                return [
                    'response' => true,
                    'message' => 'Nenhum seguidor encontrado na tabela de usuários.'
                ];
            }
        } catch (Exception $e) {
            return [
                'response' => false, 
                'message' => $e->getMessage() . ' ' . $e->getCode()
            ];
        }
    
        return [
            'response' => true, 
            'message' => $resposta
        ];
    }

    public function getListaSeguidores($id) {
        try {
            // IDs de usuários que o usuário já segue
            $idSeguido = $this->model
                ->where('user_id', $id)
                ->where('seguindo', true)
                ->pluck('user_choosen')
                ->toArray(); // Converte para array
            
            // Se não houver IDs, retorna uma mensagem adequada
            if (empty($idSeguido)) {
                return [
                    'response' => true, 
                    'message' => 'Nenhum seguidor encontrado.'
                ];
            }
    
            // Seleção de usuários já seguidos
            $resposta = DB::table('users')
                ->select('nomeusu', 'id')
                ->whereIn('id', $idSeguido) // Usa whereIn para listas de IDs
                ->where('id', '!=', $id) // Exclui o próprio usuário
                ->get();
    
            // Se a resposta estiver vazia
            if ($resposta->isEmpty()) {
                return [
                    'response' => true,
                    'message' => 'Nenhum seguidor encontrado na tabela de usuários.'
                ];
            }
        } catch (Exception $e) {
            return [
                'response' => false, 
                'message' => $e->getMessage() . ' ' . $e->getCode()
            ];
        }
    
        return [
            'response' => true, 
            'message' => $resposta
        ];
    }
    
}
