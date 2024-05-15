<?php
require_once '../firewall.php';
require_once '../configBD.php';

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

    /**
     * Seta as informacoes do usuario nas variaveis sem lancar por banco
     * @param object|array $obj Recebe objeto ou array
     * @return string Retorna em variaveis
     */
    private function setInfoUsu(object|array $obj)
    {
        try
        {
            switch (true) {
                case is_object($obj):
                    $id             = $obj->id;
                    $nomeUsu        = $obj->nomeusuario;
                    $nomeComp       = $obj->nomecompleo;
                    $email          = $obj->email;
                    $senha          = $obj->senha;
                    $cpf            = $obj->cpf;
                    $tel            = $obj->tel;
                    $escolaridade   = $obj->escolaridade;
                    break;
                
                case is_array($obj):
                    $id             = $obj[0];
                    $nomeUsu        = $obj[1];
                    $nomeComp       = $obj[2];
                    $email          = $obj[3];
                    $senha          = $obj[4];
                    $cpf            = $obj[5];
                    $tel            = $obj[6];
                    $escolaridade   = $obj[7];
                    break;
                default:
                    throw new Exception("Erro! Não é um objeto ou array!");
                    break;
            }

            // Retornar um array associativo com as informações
            return [
                'id' => $id,
                'nomeUsu' => $nomeUsu,
                'nomeComp' => $nomeComp,
                'email' => $email,
                'senha' => $senha,
                'cpf' => $cpf,
                'tel' => $tel,
                'escolaridade' => $escolaridade
            ];
        }
        catch (Exception $e) 
        {
            echo json_encode(['error' => $e->getMessage()]);
            die();
        }
    }


    public function ValidarUsu($obj)
    {
        try 
        {
            // VARIAVEIS
            $method = strtolower($_SERVER['REQUEST_METHOD']);
            $arrayretorno = array();

            // Seta as informações do usuário
            $this->setInfoUsu($obj);
            $firewall = new Firewall();

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
                $client_ip = $firewall->get_ip();
                // Tratando as informacoes tratadas
                strtoupper($firewall->getClean($nomeUsu));
                strtoupper($firewall->getClean($nomeComp));
                $firewall->getClean($email);
                $this->hashSenha(($firewall->getClean($senha)));
                $this->validaCPF($firewall->getClean($cpf));
                $this->validarTel($firewall->getClean($tel));
                $firewall->getClean($escolaridade);

                // Verifica se as informacoes especificas já existem no banco de dados
                $this->findByNomeUsu($nomeUsu)  === false ?  $nomeUsu : throw new Exception('Nome de usuario cadastrado já existe');
                $this->findByEmail($email)      === false ?  $email : throw new Exception('email cadastrado já existe');
                $this->findByCpf($cpf)          === false ?  $cpf : throw new Exception('Cpf cadastrado já existe');

                $arrayretorno = [
                    'nomeUsu' => $nomeUsu,
                    'nomeComp' => $nomeComp,
                    'email' => $email,
                    'senha' => $senha,
                    'cpf' => $cpf,
                    'tel' => $tel,
                    'escolaridade' => $escolaridade
                ];
            }
            else 
            { 
                throw new Exception("Método não suportado!");
            }
            return $arrayretorno;
        }
        catch (Exception $e)
        {
            echo json_encode(['error' => $e->getMessage()]);
            die();
        }
    }

    private function validaCPF($cpf) {
 
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

    private function validarTel($phone) {
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
    
    private function hashSenha($senha) {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

    //ENCONTRE O USUARIO
    public static function findById($search) 
    {
        $sql = "SELECT * WHERE id = $search FROM public.virtualteste";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }

    public function findByNomeUsu($search) 
    {
        $sql = "SELECT * where cpf = $search FROM public.vitualbase";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }

    public static function findByNomeComp($search) 
    {
        $sql = "SELECT * WHERE nome_comp = '$search' FROM public.virtualteste";

        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }

    public function findByEmail($search) 
    {
        $sql = "SELECT * WHERE email = $search FROM public.vitualbase";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }
    public function findByCpf($search) 
    {
        $sql = "SELECT * WHERE tel = $search FROM public.vitualbase";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }

    //RETORNANDO INFORMACOES
    public function getId($nomeUsu, $email) 
    {
        $sql = "SELECT id WHERE nomeUsu = $nomeUsu AND email = $email FROM public.virtualbase";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query";
        return $result;
    }

    public function getNomeUsu($id) 
    {
        $result = $this->findById($id);
        $nomeUsu = $result[1];
        return $nomeUsu;
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
}

class inserirUsuario
    {
        // GUARDANDO INFORMACOES
        public function Usuario($json)
        {
            try 
            {
                $usuarioAtual = json_decode($json, true);
                $usuario = new Usuario();
                $usuario->ValidarUsu($usuarioAtual);

                $nomeUsu = $usuario['nomeUsu'] ?? '';
                $nomeComp = $usuario['nomeComp'] ?? '';
                $email = $usuario['email'] ?? '';
                $senha = $usuario['senha'] ?? '';
                $cpf = $usuario['cpf'] ?? '';
                $tel = $usuario['tel'] ?? '';
                $escolaridade = $usuario['escolaridade'] ?? '';

                $comandosql = new MyPostSql();
                $sql = sprintf("INSERT INTO usuario (nome_usu, nome_comp, email, senha, cpf, tel, escolaridade) 
                        VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $nomeUsu, $nomeComp, $email, $senha, 
                        $cpf, $tel, $escolaridade);
                $comandosql->executarSELECTArrayObjeto($sql, 'insercaousuario');
                $resultadoinsert = $comandosql->getResultado() > 0 ? true : false;
                return $resultadoinsert;
            } 
            catch (Exception $e) 
            {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setNomeUsu($nomeUsu, $id) 
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET nomeUsu = $1 WHERE id = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($nomeUsu, $id));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setNomeComp($nomeComp, $id) 
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET nomeComp = $1 WHERE id = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($nomeComp, $id));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setEmail($email, $id) 
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET email = $1 WHERE id = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($email, $id));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setSenha($senha, $idOuNomeUsu) 
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET senha = $1 WHERE id = $2 or nomeUsu = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($senha, $idOuNomeUsu));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setCpf($cpf, $id)
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET cpf = $1 WHERE id = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($cpf, $id));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setTel($tel, $id)
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET tel = $1 WHERE id = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($tel, $id));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public function setEscolaridade($escolaridade, $id) 
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualteste SET escolaridade = $1 WHERE id = $2";

                // Execute a declaração SQL
                $result = pg_query_params($conexao, $sql, array($escolaridade, $id));

                $result = true ? $result : throw new Exception("Erro no código do banco");
                return $result !== false;
            } catch (Exception $e) {
                // Se ocorrer uma exceção, capture-a e retorne uma mensagem de erro
                echo json_encode(['error' => $e->getMessage()]);
                return false;
            }
        }

        public static function delete($id) 
        {
            $sql= "DELETE FROM usuario  WHERE id = $id";

            // Execute a query $sql aqui

            return $sql; // Pode retornar true/false ou alguma outra indicação de sucesso ou falha
        }
    }
