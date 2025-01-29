<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class UserRepository
{
    /**
     * 
     * @var User 
     */
    private $model;
    private $user;

    public function __construct()
    {
        $this->model = new User();
        $this->user = $this->user = Auth::check() ? Auth::user() : null;
    }

    /**
     * Faz as alteracoes para seguir um usuario
     * 
     * @param int $idSeguido | ID do usuario que sera seguido
     * @param int $idSeguidor | ID do usuario que esta seguindo
     * @return bool
     */
    public function comecarSeguir($idSeguido, $userId)
    {
        try {
            $this->model
                ->where('id', $idSeguido)
                ->increment('seguidores_count');

            $this->model
                ->where('id', $userId)
                ->increment('seguindo_count');
        } catch (Exception $e) {
            return ['response' => false, 'message' => $e->getMessage() . $e->getCode()];
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
    public function deixarSeguir($idSeguido, $userId)
    {
        try {
            $this->model
                ->where('id', $idSeguido)
                ->where('seguidores_count', '>', 0)
                ->decrement('seguidores_count');

            $this->model
                ->where('id', $userId)
                ->where('seguindo_count', '>', 0)
                ->decrement('seguindo_count');
        } catch (Exception $e) {
            return ['response' => false, 'message' => $e->getMessage() . $e->getCode()];
        }

        return ['response' => true];
    }

    /**
     * Retorna a quantidade de seguidores, seguidos ou ambos.
     *
     * @param string $escolha ('seguidores', 'seguindo', 'ambos')
     * @param string|int $idSeguido caso não seja o auth, informe o id de outro usuário
     * @return array
     */
    public function getQtdSeg(string $escolha, int $id)
    {
        switch ($escolha) {
            case 'seguidores':
                return $this->model
                    ->select('seguidores_count')
                    ->where('id', $id)
                    ->get();

            case 'seguindo':
                return $this->model
                    ->select('seguindo_count')
                    ->where('id', $id)
                    ->get();

            case 'ambos':
                return $this->model
                    ->select('seguidores_count', 'seguindo_count')
                    ->where('id', $id)
                    ->get()->toArray();

            default:
                // Garantia de segurança, embora o `Controller` já trate isso.
                return
                    [
                        0 => [
                            'seguindo_count' => 'Parâmetro inválido',
                            'seguidores_count' => 'Parâmetro inválido'
                        ]
                    ];
        }
    }

    public function getSugestaoSeguir(int $var, $id)
    {

        // IDs de usuários que o usuário já segue
        $seguidos = DB::table('relacionamentos')
            ->where('user_id', $id)
            ->where('seguindo', true)
            ->pluck('user_choosen');

        // Sugestão de usuários excluindo os já seguidos
        return $this->model
            ->select('nomeusu', 'id')
            ->where('id', '!=', $id) // Exclui o próprio usuário
            ->whereNotIn('id', $seguidos) // Exclui os já seguidos
            ->limit($var)
            ->get();
    }
}
