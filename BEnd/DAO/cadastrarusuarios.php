<?php
class Usuario {

    //variaveis
    private $id;
    private $nomeUsu;
    private $nomeComp;
    private $email;
    private $senha;
    private $cpf;
    private $escolaridade;

    public $erro;

    /**
     * Seta as informacoes do usuario sem lancar por banco
     * @param object|array $obj Recebe objeto ou array
     * @return string Retorna em variaveis
     */
    private function setInfoUsu(object|array $obj)
    {
        switch ($obj) {
            case is_object($obj):
                foreach ($obj as $key => $value)
                {
                    $id             = $key['id'];
                    $nomeUsu        = $key['nomeusuario'];
                    $nomeComp       = $key['nomecompleo'];
                    $email          = $key['email'];
                    $senha          = $key['senha'];
                    $cpf            = $key['cpf'];
                    $escolaridade   = $key['escolaridade'];
                }
                break;
            
            case is_array($obj):
                foreach ($obj as $key => $value)
                {
                    $id             = $key[0];
                    $nomeUsu        = $key[1];
                    $nomeComp       = $key[2];
                    $email          = $key[3];
                    $senha          = $key[4];
                    $cpf            = $key[5];
                    $escolaridade   = $key[6];
                }
            default:
                $erro =  "Erro! Não é um objeto ou array!";
                break;
        }
    }

    public function InserirEValidarUsu($obj)
    {
        //Seta as informações do usuário
        $this->setInfoUsu($obj);

        //Valida as informacoes

        //Sobe para o banco

    }

    //pegando e retornando
    public function getId() {
        return $this->id;
    }

    public function getNomeUsu() {
        return $this->nomeUsu;
    }

    public function getNomeComp() {
        return $this->nomeComp;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = strtolower(trim($email));
    }
    public function getSenha() {
        return $this->senha;
    }

    public function getEscolaridade() {

    }

}

interface UsuarioDAO {
    //metodos abstratos da interface DAO
    public static function inserirUsuario(Usuario $string);

    //procurar
    public static function findAll();
    public static function findById($id);
    public static function findByNomeUsu($nomeUsu);
    public static function findByNomeComp($nomeComp);
    public static function findByEmail($email);
    public static function findByCpf($cpf);

    //metodos de upar e deletar
    public static function update(Usuario $string);
    public static function delete($id);
}
?>