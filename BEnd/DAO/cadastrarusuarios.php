<?php
require_once 'interfaces.php';
class Usuario 
{

    //variaveis
    private $id;
    private $nomeUsu;
    private $nomeComp;
    private $email;
    private $senha;
    private $cpf;
    private $tel;
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
                // foreach ($obj as $key)
                // {
                //     $id             = $key->id;
                //     $nomeUsu        = $key->nomeusuario;
                //     $nomeComp       = $key->nomecompleo;
                //     $email          = $key->email;
                //     $senha          = $key->senha;
                //     $cpf            = $key->cpf;
                //     $tel            = $key->tel;
                //     $escolaridade   = $key->escolaridade;
                // }

                $this->setCpf(isset($obj->cpf));
                $this->setNomeUsu(isset($obj->nomeUsu));
                break;
            
            case is_array($obj):
                // foreach ($obj as $key => $value)
                // {
                //     $id             = $key[0];
                //     $nomeUsu        = $key[1];
                //     $nomeComp       = $key[2];
                //     $email          = $key[3];
                //     $senha          = $key[4];
                //     $cpf            = $key[5];
                //     $tel            = $key[6];
                //     $escolaridade   = $key[7];
                // }

                $this->setId($obj[0]);
                $this->setNomeUsu($obj[1]);
                $this->setNomeComp($obj[2]);
                $this->setEmail($obj[3]);
                $this->setSenha($obj[4]);
                $this->setCpf($obj[5]);
                $this->setTel($obj[6]);
                $this->setEscolaridade($obj[7]);
                
            default:
                $erro =  "Erro! Não é um objeto ou array!";
                break;
        }
    }

    public function InserirEValidarUsu($obj)
    {
        // VARIAVEIS
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        // Seta as informações do usuário
        $this->setInfoUsu($obj);

        // Valida as informacoes
        if ($method === 'post') 
        {
            $nomeUsu        = filter_input(INPUT_POST, 'nomeusu', FILTER_SANITIZE_SPECIAL_CHARS);
            $nomeComp       = filter_input(INPUT_POST, 'nomecomp', FILTER_SANITIZE_SPECIAL_CHARS);
            $email          = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha          = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf            = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_INT);
            $tel            = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
            $escolaridade   = filter_input(INPUT_POST, 'escolaridade', FILTER_SANITIZE_SPECIAL_CHARS);  
            
            // Guardando as informacoes tratadas
            $this->setNomeComp(strtoupper($nomeComp));
            $this->setSenha($senha);
            $this->setCpf($this->validaCPF($cpf));
            $this->setTel($this->validarTel($tel));
            $this->setEscolaridade(($escolaridade));

            // Verifica se as informacoes especificas já existem no banco de dados
            $this->findByNomeUsu($nomeUsu)  === false ?  $this->setNomeUsu($nomeUsu) : $erro = 'Nome de usuario cadastrado já existe';
            $this->findByEmail($email)      === false ?  $this->setEmail($email) : $erro = 'email cadastrado já existe';
            $this->findByCpf($cpf)          === false ?  $this->setCpf($cpf) : $erro = 'Cpf cadastrado já existe';
            trim($this->senha);

            //aqui, depois de você setar as informações do usuario, e validar corretamente para saber se já existe, iremos inserir o usuário no banco.
            //(Opcional) -> Verificar o tipo de dado da propriedade do objeto do usuário, para saber se condiz com o tipo de variável da coluna da tabela.
        }
        else 
        { 
        header('location: ../cadastro.php');
        }

        //Sobe para o banco

    }

    function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }

    function validarTel($phone) {
        $regexTelefone = '/^(\d{4}-\d{4})|(\d{1} \d{4}-\d{4})|(\(?\d{2}\)? \d{4}-\d{4})|(\(?\d{2}\)? \d{1} \d{4}-\d{4})$/';
    
        $isValid = preg_match($regexTelefone, $phone);
    
        if ($isValid) {
            return ['valid' => true, 'message' => ''];
        } else {
            return [
                'valid' => false,
                'message' => 'Número de telefone inválido. Ele deve estar no formato (DDD) XXXX-XXXX',
            ];
        }
    }
    

    //RETORNANDO INFORMACOES
    public function getId() 
    {
        return $this->id;
    }

    public function getNomeUsu() 
    {
        return $this->nomeUsu;
    }

    public function getNomeComp() 
    {
        return $this->nomeComp;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    public function getSenha() 
    {
        return $this->senha;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getEscolaridade() 
    {
        return$this->escolaridade;
    }

    // GUARDANDO INFORMACOES
    public function setId($id) 
    {
        return $this->id;
    }

    public function setNomeUsu($nomeUsu) 
    {
        return $this->nomeUsu;
    }

    public function setNomeComp($nomeComp) 
    {
        return $this->nomeComp;
    }

    public function setEmail($email) 
    {
        return $this->email;
    }

    public function setSenha($senha) 
    {
        return $this->senha;
    }

    public function setCpf($cpf)
    {
        return $this->cpf;
    }

    public function setTel($tel)
    {
        return $this->tel;
    }

    public function setEscolaridade($escolaridade) 
    {
        return$this->escolaridade;
    }


    //metodos abstratos da interface DAO
    //aqui, você não precisa passar a classe, você JÁ está dentro da classe
    public function inserirUsuario() 
    {
        $comandosql = new MyPostSql();
        $sql = sprintf("INSERT INTO usuario (nome_usu, nome_comp, email, senha, cpf, tel, escolaridade) 
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $this->nomeUsu, $this->nomeComp, $this->email, $this->senha, $this->cpf, $this->tel, $this->escolaridade);
        $comandosql->executarSELECTArrayObjeto($sql, 'insercaousuario');
        $resultadoinsert = $comandosql->getResultado() > 0 ? true : false;
        return $resultadoinsert;

        // Execute a query $sql aqui

        //return $sql; // Pode retornar true/false ou alguma outra indicação de sucesso ou falha
    }

    public static function findById($id) 
    {
        $sql = "SELECT * FROM usuario WHERE id = $id";

        // Execute a query $sql aqui

        return $sql; // Pode retornar os resultados da consulta ou null se não encontrar nenhum registro
    }

    public static function findByNomeUsu($nomeUsu) 
    {
        $sql = "SELECT * FROM usuario WHERE nome_usu = '$nomeUsu'";

        // Execute a query $sql aqui

        return $sql; // Pode retornar os resultados da consulta ou null se não encontrar nenhum registro
    }

    public static function findByNomeComp($nomeComp) 
    {
        $sql = "SELECT * FROM usuario WHERE nome_comp = '$nomeComp'";

        // Execute a query $sql aqui

        return $sql; // Pode retornar os resultados da consulta ou null se não encontrar nenhum registro
    }

    public static function findByEmail($email) 
    {
        $sql = "SELECT * FROM usuario WHERE email = '$email'";

        // Execute a query $sql aqui

        return $sql; // Pode retornar os resultados da consulta ou null se não encontrar nenhum registro
    }

    public static function findByCpf($cpf) 
    {
        $sql = "SELECT * FROM usuario WHERE cpf = '$cpf'";

        // Execute a query $sql aqui

        return $sql; // Pode retornar os resultados da consulta ou null se não encontrar nenhum registro
    }

    public static function delete($id) 
    {
        $sql= "DELETE FROM usuario  WHERE id = $id";

        // Execute a query $sql aqui

        return $sql; // Pode retornar true/false ou alguma outra indicação de sucesso ou falha
    }
}



?>