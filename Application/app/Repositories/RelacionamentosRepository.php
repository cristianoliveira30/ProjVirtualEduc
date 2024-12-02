<?php

namespace App\Repositories;

use App\Models\Relacionamentos;
use Exception;
use Illuminate\Support\Facades\Auth;

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

    public function jaSegue($idSeguido)
    {
        $resposta = $this->model->where('user_id', $this->user->id)->where('user_choosen', $idSeguido)->select(['seguindo']);

        return $resposta['seguindo'] == true ? true : false;
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
                ->updateOrInsert(
                    ['user_id' => $this->user->id, 'user_choosen' => $idSeguido],
                    ['seguindo' => true]
                );

            $this->model
                ->updateOrInsert(
                    ['user_id' => $idSeguido, 'user_choosen' => $this->user->id],
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
     * @param string $idSeguido | ID do usuario que deixara de ser seguido
     * @return true|false
     */
    public function deixarSeguir($idSeguido)
    {
        return $this->model
            ->where('user_id', $this->user->id)
            ->where('user_choosen', $idSeguido)
            ->update(['seguindo' => false]) > 0;
    }

    public function taSeguindo($idSeguido)
    {
        return $this->model
            ->where('user_id', $this->user->id)
            ->where('user_choosen', $idSeguido)
            ->where('seguindo', true)
            ->exist();
    }

    public function eSeguido($idSeguido)
    {
        return $this->model
            ->where('user_id', $this->user->id)
            ->where('user_choosen', $idSeguido)
            ->where('seguido', true)
            ->exist();
    }
}
