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

    /**
     * Construtor para injeção de dependência.
     */
    public function __construct(RelacionamentosRepository $relacionamentos)
    {
        $this->relacionamentos = $relacionamentos;
        $this->usuarios = new UserRepository();
        $this->middleware('auth');
    }

    /**
     * Verifica se o usuário já segue a pessoa antes de começar a seguir
     * 
     * @param int id da pessoa
     * @return array 
     */
    public function comecarSeguir(int $idSeguido)
    {
        $userId = Auth::id();
        $jaSegue = $this->relacionamentos->jaSegue($idSeguido, $userId);
        
        if (!$jaSegue) {
            return ['response' => false, 'message' => 'ja segue', 'data' => $jaSegue];
        }
        
        $retornoRela = $this->relacionamentos->comecarSeguir($idSeguido, $userId);
        $retornoUser = $this->usuarios->comecarSeguir($idSeguido, $userId);

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
     * Verifica se o usuário segue a pessoa antes de parar de seguir
     * 
     * @param int id da pessoa
     * @return array
     */
    public function deixarSeguir(int $idSeguido)
    {
        $userId = Auth::id();
        $jaSegue = $this->relacionamentos->jaSegue($idSeguido, $userId);

        if (!$jaSegue) {
            return ['response' => false, 'message' => 'usuário não segue essa pessoa', 'data' => $jaSegue];
        }

        $retornoRela = $this->relacionamentos->deixarSeguir($idSeguido, $userId);
        $retornoUser = $this->usuarios->deixarSeguir($idSeguido, $userId);

        return 
        $retornoRela['response'] == true &&
        $retornoUser['response'] == true ?
        ['response' => true, 'message' => 'deixou de seguir'] :
        [
            'response' => false,
            'message' => [
                'user' => $retornoUser['message'],
                'relacionamento' => $retornoRela['message']
            ]
        ];
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

    public function getListaSeguindo() {
        $userId = Auth::id();

        $retorno = $this->relacionamentos->getListaSeguindo($userId);

        return
        $retorno['response'] == true ?
        ['response' => true, 'message' => $retorno['message']] :
        ['response' => false, 'message' => $retorno['message']];
    }

    /**
     * @param int $var é o quantidade de sugestões que será retornado
     * @return array retornará um array com 0[[key]->nomeusu]
     */
    public function getSugestaoSeguir(int $var)
    {
        $user = Auth::id();
        return $this->usuarios->getSugestaoSeguir($var, $user);
    }
}
