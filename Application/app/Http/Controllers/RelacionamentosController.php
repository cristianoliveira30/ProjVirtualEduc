<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RelacionamentosRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RelacionamentosController extends Controller
{
    private $relacionamentos;
    private $usuarios;
    private $user;

    /**
     * Construtor para injeção de dependência.
     */
    public function __construct(RelacionamentosRepository $relacionamentos)
    {
        $this->relacionamentos = $relacionamentos;
        $this->usuarios = new UserRepository();
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    /**
     * Verifica se o usuário já segue a pessoa antes de começar a seguir
     * 
     * @param int|string id da pessoa
     * @return array 
     */
    public function comecarSeguir(int $userId)
    {
        $jaSegue = $this->relacionamentos->jaSegue($userId);
        $retornoRela = $this->relacionamentos->comecarSeguir($userId);
        $retornoUser = $this->usuarios->comecarSeguir($userId);

        if ($jaSegue == true) {
            return ['response' => false, 'message' => 'Você já segue essa pessoa'];
        }

        return
            $retornoRela['response'] == true &&
            $retornoUser['response'] == true ?
            ['response' => true, 'message' => 'comecou a seguir'] :
            [
                'response' => false,
                'message' => [
                    'user' => $retornoUser['message'],
                    'relacionamento' => $retornoRela['message']
                ]
            ];
    }

    /**
     * 
     */
    public function deixarSeguir($userId)
    {
        $retornoRela = $this->relacionamentos->deixarSeguir($userId);
        $retornoUser = $this->usuarios->deixarSeguir($userId);

        return $retornoRela && $retornoUser;
    }

    /**
     * Retorna a quantidade de seguidores, seguidos ou ambos.
     *
     * @param string $escolha ('seguidores', 'seguindo', 'ambos')
     * @param int|string $id deve ser auth, se for buscar outro user informe o id
     * @return array ['resultado']
     */
    public function getQtdSeg(string $escolha, string|int $idSeguido)
    {
        // Valida o parâmetro $escolha
        if (!in_array($escolha, ['seguidores', 'seguindo', 'ambos'])) {
            return response()->json(['error' => 'Parâmetro inválido'], 400);
        }
    
        $id = ($idSeguido === 'auth') ? Auth::id() : (int) $idSeguido;
    
        if (!$id) {
            return response()->json(['error' => 'Usuário não autenticado.'], 401);
        }
    
        return response()->json($this->usuarios->getQtdSeg($escolha, $id));
    }
    


    /**
     * retorna se o usuário segue ou não o outro
     * 
     * @param int $userId = id do usuário que está sendo verificado
     * @return bool
     */
    public function taSeguindo(int $userId)
    {
        return $this->relacionamentos->taSeguindo($userId);
    }

    public function eSeguido(int $userId)
    {
        return $this->relacionamentos->eSeguido($userId);
    }

    public function getSugestaoSeguir(int $var)
    {
        $user = Auth::id();
        return $this->usuarios->getSugestaoSeguir($var, $user);
    }
}
