<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
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
     * @param string $idSeguido | ID do usuario que sera seguido
     * @return bool
     */
    public function comecarSeguir($idSeguido)
    {
        try {
            $this->model
                ->where('id', $idSeguido)
                ->increment('seguidores_count');

            $this->model
                ->where('id', $this->user->id)
                ->increment('seguindo_count');
        } catch (Exception $e) {
            return ['response' => false, 'message' => $e->getMessage() . $e->getCode()];
        }

        return ['response' => true];
    }

    /**
     * Faz as alteracoes para desfazer o seguimento.
     * 
     * @param string $idSeguido | ID do usuario que deixara de ser seguido
     * @return bool
     */
    public function deixarSeguir($idSeguido)
    {
        $seguidores = $this->model
            ->where('id', $idSeguido)
            ->where('seguidores_count', '>', 0)
            ->decrement('seguidores_count');

        $seguindo = $this->model
            ->where('id', $this->user->id)
            ->where('seguindo_count', '>', 0)
            ->decrement('seguindo_count');

        return $seguidores && $seguindo;
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

        return $this->model
            ->select('nomeusu')
            ->where('id', '!=', $id)
            ->limit($var)
            ->get();
    }
}
