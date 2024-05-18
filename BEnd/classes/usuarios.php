<?php
require_once 'firewall.php';
require_once 'configBD.php';

class Usuario 
{
    //variaveis
    private $nomeComp;
    private $email;
    private $senha;
    private $tel;
    private $escolaridade;
    private $cpf;

    public function ValidarUsu($json)
    {
        try 
        {
            $arrayretorno = array();
            $firewall = new Firewall();

            // separando informaçõespra tratar
            !empty($json['nomeusu'])      ? $nomeUsu       = $json['nomeusu']      : throw new Exception("Nome de Usuário vazio");
            !empty($json['nomecomp'])     ? $nomeComp      = $json['nomecomp']     : throw new Exception("Nome Completo vazio");
            !empty($json['email'])        ? $email         = $json['email']        : throw new Exception("Email vazio");
            !empty($json['senha'])        ? $senha         = $json['senha']        : throw new Exception("Senha vazia");
            !empty($json['telefone'])     ? $tel           = $json['telefone']     : throw new Exception("Telefone vazio");
            !empty($json['escolaridade']) ? $escolaridade  = $json['escolaridade'] : throw new Exception("Escolaridade vazia");
            !empty($json['cpf'])          ? $cpf           = $json['cpf']          : throw new Exception("CPF vazio");
            !empty($json['nascimento'])   ? $nascimento    = $json['nascimento']   : throw new Exception("Data de nascimento vazia");
            !empty($json['rg'])           ? $rg            = $json['rg']           : throw new Exception("RG vazio");
            !empty($json['cep'])          ? $cep           = $json['cep']          : throw new Exception("CEP vazio");
            !empty($json['estado'])       ? $estado        = $json['estado']       : throw new Exception("Estado vazio");
            !empty($json['endereco'])     ? $endereco      = $json['endereco']     : throw new Exception("Endereço vazio");
            
            $client_ip = $firewall->get_ip();

            // Verificamdo sqlinjection e xss
            strtoupper($firewall->getClean($nomeUsu));
            strtoupper($firewall->getClean($nomeComp));
            $firewall->getClean($email);
            $this->hashSenha(($firewall->getClean(trim($senha))));
            $this->validarTel($firewall->getClean($tel));
            strtoupper($firewall->getClean($escolaridade));
            strtoupper($this->validaCPF($firewall->getClean($cpf)));
            $firewall->getClean($nascimento);
            $firewall->getClean($rg);
            $firewall->getClean($cep);
            strtoupper($firewall->getClean($estado));
            strtoupper($firewall->getClean($endereco));


            // Verifica se as informacoes especificas já existem no banco de dados
            // $temounao01 = $this->findByNomeUsu($nomeUsu);
            // $temounao02 = $this->findByEmail($email);
            // $temounao03 = $this->findByCpf($cpf);

            // is_array($temounao01) ? throw new Exception('Nome de usuario cadastrado já existe') : $temounao01 = false;
            // is_array($temounao02) ? throw new Exception('Email cadastrado já existe')           : $temounao02 = false;
            // is_array($temounao03) ? throw new Exception('Cpf cadastrado já existe')             : $temounao03 = false;

            

            $arrayretorno = [
                'nomeUsu'       => $nomeUsu,
                'nomeComp'      => $nomeComp,
                'email'         => $email,
                'senha'         => $senha,
                'tel'           => $tel,
                'escolaridade'  => $escolaridade,
                'cpf'           => $cpf,
                'nascimento'    => $nascimento,
                'rg'            => $rg,
                'cep'           => $cep,
                'estado'        => $estado,
                'endereco'      => $endereco
            ];
            return $arrayretorno;
        }
        catch (Exception $e)
        {
            return ['error' => $e->getMessage()];
            die;
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
        $sql = "SELECT * WHERE id = $search FROM public.virtualclientes";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }

    public function findByNomeUsu($search) 
    {
        $sql = "SELECT * where nomeusu = $search FROM public.vitualclientes";
        $mypgsql = new MyPostSql();
        $mypgsql->executarSELECTSimplesArrayNumerico($sql);
        $mypgsql->getResultado() > 0 ? $result = $mypgsql->getArrayResultado() : $result = "Erro de query!"; 
        return $result;
    }

    public static function findByNomeComp($search) 
    {
        $sql = "SELECT * WHERE nomecomp = $search FROM public.virtualclientes";

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
        $sql = "SELECT id WHERE nomeusu = $nomeUsu AND email = $email FROM public.virtualbase";
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
        public function inserirUsuario($json)
        {
            try 
            {
                $json = json_decode($json, true);

                if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception ("Erro ao decodificar JSON");
                }

                $usuario = new Usuario();
                $params = $usuario->ValidarUsu($json);

                $nomecoluna = 'nomeusu, nomecomp, email, senha, tel, escolaridade, cpf, nascimento, rg, cep, estado, endereco';
    
                $comandosql = new MyPostSql();
                $comandosql->executarINSERT('public.virtualclientes', $params, 'inserirusu', $nomecoluna);
                $resultadoinsert = $comandosql->getResultado() > 0 ? true : false;
    
                return $resultadoinsert;
            } 
            catch (Exception $e) 
            {
                return ['error' => $e->getMessage()];
                die;
            }
        }

        public function setNomeUsu($nomeUsu, $id) 
        {
            try {
                $mypgsql = new MyPostSql();
                $conexao = $mypgsql->Conectar();

                // Prepare a declaração SQL
                $sql = "UPDATE public.virtualclientes SET nomeUsu = $1 WHERE id = $2";

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
                $sql = "UPDATE public.virtualclientes SET nomeComp = $1 WHERE id = $2";

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
                $sql = "UPDATE public.virtualclientes SET email = $1 WHERE id = $2";

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
                $sql = "UPDATE public.virtualclientes SET senha = $1 WHERE id = $2 or nomeUsu = $2";

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
                $sql = "UPDATE public.virtualclientes SET cpf = $1 WHERE id = $2";

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
                $sql = "UPDATE public.virtualclientes SET tel = $1 WHERE id = $2";

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
                $sql = "UPDATE public.virtualclientes SET escolaridade = $1 WHERE id = $2";

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
