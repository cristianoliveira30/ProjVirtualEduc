<?php
class MyPostSql 
{
    //Retornos
    private $lastId;
    private $resultado;
    private $arrayResultado;
	private $postgres;
	private $erro;

    //CONSTRUTOR
    public function __construct()
    {
        $this->resultado = -1;
        $this->lastId = -1;
        $this->arrayResultado = [];
		$this->postgres = $this->Conectar();
    }

    public function Conectar()
    {
        $strconect = "host=localhost port=5432 dbname=VirtualTest user=postgres password=Cenoura#8888";

        $postgres = pg_connect($strconect) or
        die ("Não foi possível conectar ao servidor PostGreSQL");

        return $postgres;
    }

    //Funções de retorno
    public function getErro()
    {
        return $this->erro;
    }
    //Funções de retorno
    public function getLastId()
    {
        return $this->lastId;
    }
    public function getResultado()
    {
        return $this->resultado;
    }
    public function getArrayResultado()
    {
        return $this->arrayResultado;
    }

    //FuncoesSet
    public function limpaDados()
    {
        $this->resultado = -1;
        $this->lastId = -1;
        $this->arrayResultado = [];
    }

    //Funcoes internas
    function contaParametros($query)
    {
        $totalParam = substr_count( $query , "$");
        return $totalParam;
    }

    function gerarNumeroUnico()
    {
        $numero = mt_rand(0, 9000); // Gera um número randômico entre 0 e 9000
        $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Letras maiúsculas e minúsculas

        $tamanho = mt_rand(5, 8); // Define um tamanho aleatório para a string de letras

        $randString = '';
        for ($i = 0; $i < $tamanho; $i++) {
            $randString .= $letras[mt_rand(0, strlen($letras) - 1)]; // Concatena uma letra aleatória
        }

        $numeroUnico = $numero . $randString; // Combina o número e a string de letras

        return $numeroUnico;
    }

    /////////FUNÇÕES DO CRUD//////////

    public function executarINSERT($tabela, $params, $nomefuncao, $nomecoluna)
    {
        //vamos verificar se os parametros estão corretos
        if(!is_array($params) ||!is_string($tabela))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //Com o $params, eu consigo saber quantas colunas deve ser inseridas
        $nColunas = count($params);
        //Crio o sql de insert atraves da tabela dada pelo usuario
        $sql = "INSERT INTO $tabela ($nomecoluna) VALUES (";
        $constante = "$";
        $stringParameter = "";
        $ii =0;
        for ($i=0; $i < $nColunas ; $i++)
        {
            $ii = $i +1;
            $stringParameter = $stringParameter.$constante.$ii.",";
        }
        $stringParameter = substr($stringParameter,0,-1);
        $stringParameter .= ")";
        $query = $sql.$stringParameter;
        if(pg_prepare($stm=$this->postgres, $nomefuncao, $query))
        {
            if($result = pg_execute($stm, $nomefuncao, $params))
            { //
				$this->resultado =  pg_affected_rows($result);

				return;
			}
            else
            {
                $resultQuery= 0;
                $lastIdQuery = 0;
                $this->lastId = 0;
                $this->resultado = 0;

            }
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
    }

    public function executarINSERTlastid($tabela, $params, $nomefuncao, $nomecoluna, $colunaid)
    {
        //vamos verificar se os parametros estão corretos
        if(!is_array($params) ||!is_string($tabela))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //Com o $params, eu consigo saber quantas colunas deve ser inseridas
        $nColunas = count($params);
        //Crio o sql de insert atraves da tabela dada pelo usuario
        $sql = "INSERT INTO $tabela ($nomecoluna) VALUES (";
        $constante = "$";
        $stringParameter = "";
        $ii =0;
        for ($i=0; $i < $nColunas ; $i++)
        {
            $ii = $i +1;
            $stringParameter = $stringParameter.$constante.$ii.",";
        }
        $stringParameter = substr($stringParameter,0,-1);
        $stringParameter .= ")";
        $query = $sql.$stringParameter." RETURNING $colunaid";
        if(pg_prepare($stm=$this->postgres, $nomefuncao, $query))
        {
            if($result = pg_execute($stm, $nomefuncao, $params))
            { //
				$this->resultado =  pg_affected_rows($result);
                $this->lastId = pg_fetch_row($result,0)[0];
				return;
			}
            else
            {
                $resultQuery= 0;
                $lastIdQuery = 0;
                $this->lastId = 0;
                $this->resultado = 0;

            }
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
    }

    public function executarSELECTSimplesArrayNumerico($query)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($this->postgres, "SELECT", $query))
        {
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);
            while ($row = pg_fetch_row($result))
            {
                $arrayRetorno[] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    public function executarSELECTSimplesObjeto($query, $funcionarios)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($this->postgres, $funcionarios, $query))
        {
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);
            while ($row = pg_fetch_assoc($result))
            {
                $arrayRetorno[] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    public function executarSELECTSimplesArrayNumericoRep($query, $comandname) // retorna mais de um (loops)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($this->postgres, $comandname, $query))
        {
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);
            while ($row = pg_fetch_row($result))
            {
                $arrayRetorno[] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    public function executarSELECTSimplesObjetoRep($query, $nomequery) // retorna mais de um (loops)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($this->postgres, $nomequery, $query))
        {
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);
            while ($row = pg_fetch_assoc($result))
            {
                $arrayRetorno[] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    public function executarSELECTArrayNumerico($query, $params)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_array($params) ||!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        //Verifica se todos os ? tem seu respectivo elemento em array
        if($this->contaParametros($query) != count($params))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
        if(pg_prepare($this->postgres, "SELECT", $query))
        {
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);
            while ($row = pg_fetch_row($result))
            {
                $arrayRetorno[] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    /////////Função Select com Array Objeto////////////
    public function executarSELECTArrayObjeto($query, $params)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_array($params) ||!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        //Verifica se todos os ? tem seu respectivo elemento em array
        if($this->contaParametros($query) != count($params))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($this->postgres, "SELECT", $query))
        {
            if ($result = pg_query($this -> postgres, $query))
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);
            while ($row = pg_fetch_assoc($result))
            {
                $arrayRetorno[] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    /////////Função de banco
    public function executarUPDATE($tabela, $colunasValor, $colunasWhere, $params)
    {
        //vamos verificar se os tipos de parametros estão corretos
        if(!is_array($params) ||!is_string($tabela) || !is_string($colunasValor) || !is_string($colunasWhere))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //estando corretos, eu limpo os resultados obtidos em outras consultas
        $this->arrayResultado = [];
        //verifico se os valores não estão vazios
        if(empty($colunasValor) || empty($colunasWhere))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //Começamos transformando a string de colunasValor para uma matrix
        if(substr_count( $colunasValor , ",") > 0)//verifica se o usuario usou ','
        {
            $colunasValor = explode(",", $colunasValor);
        }
        else
        {
            $colunasValor = explode(" ", $colunasValor);//se o usuario não usou ',', não tem problema
        }
        //Vamos organizar agora as colunas where
        if(substr_count( $colunasWhere , ",") > 0)//mesma questão da antiga... se tem ou não ','
        {
            $colunasWhere = explode(",", $colunasWhere);
        }
        else
        {
            $colunasWhere = explode(" ", $colunasWhere);
        }
        $inicioSql = "UPDATE $tabela SET ";//inicio do sql
        //preenchimento do primeiro argumento do sql
        $meioSql = "";
        $ultimoI = 0;
        for ($i=0; $i < count($colunasValor) ; $i++)
        {
            $ordemparametro = $i +1;
            $meioSql .= $colunasValor[$i]." = $$ordemparametro,";
            $ultimoI = $i;
        }

        $ultimoI = $ultimoI +2;
        //tiro o ? excessivo
        $meioSql = substr($meioSql,0,-1);
        //preenchimento do segundo arqumento do sql
        $fimSql = " WHERE ";
        if(count($colunasWhere) > 1)
        {
            for ($i=0; $i < count($colunasWhere) ; $i++)
            {
                $fimSql .= $colunasWhere[$i]." = $$ultimoI AND";
                $ultimoI = $ultimoI +1;
            }
            $fimSql = substr($fimSql,0,-3);
        }
        else
        {
            $fimSql .= $colunasWhere[0]." = $$ultimoI ";
        }

        $query = $inicioSql.$meioSql.$fimSql;//resultado da consulta


        //vamos verificar se o numero de variaveis corresponde ao total de ? da frase
        if($this->contaParametros($query) != count($params))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }

       if(pg_prepare($stm = $this->postgres, "UPDATE", $query))
        {
            if($result = pg_execute($stm, "UPDATE", $params))
            { //
				$this->resultado =  pg_affected_rows($result);
				$this->lastId = 0;
				return;
			}
            else
            {
                $resultQuery= 0;
                $lastIdQuery = 0;
                $this->lastId = 0;
                $this->resultado = 0;

            }

        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
    }

    public function executarUPDATERep($tabela, $colunasValor, $colunasWhere, $params, $nomequery)
    {
        //vamos verificar se os tipos de parametros estão corretos
        if(!is_array($params) ||!is_string($tabela) || !is_string($colunasValor) || !is_string($colunasWhere))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //estando corretos, eu limpo os resultados obtidos em outras consultas
        $this->arrayResultado = [];
        //verifico se os valores não estão vazios
        if(empty($colunasValor) || empty($colunasWhere))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //Começamos transformando a string de colunasValor para uma matrix
        if(substr_count( $colunasValor , ",") > 0)//verifica se o usuario usou ','
        {
            $colunasValor = explode(",", $colunasValor);
        }
        else
        {
            $colunasValor = explode(" ", $colunasValor);//se o usuario não usou ',', não tem problema
        }
        //Vamos organizar agora as colunas where
        if(substr_count( $colunasWhere , ",") > 0)//mesma questão da antiga... se tem ou não ','
        {
            $colunasWhere = explode(",", $colunasWhere);
        }
        else
        {
            $colunasWhere = explode(" ", $colunasWhere);
        }
        $inicioSql = "UPDATE $tabela SET ";//inicio do sql
        //preenchimento do primeiro argumento do sql
        $meioSql = "";
        $ultimoI = 0;
        for ($i=0; $i < count($colunasValor) ; $i++)
        {
            $ordemparametro = $i +1;
            $meioSql .= $colunasValor[$i]." = $$ordemparametro,";
            $ultimoI = $i;
        }

        $ultimoI = $ultimoI +2;
        //tiro o ? excessivo
        $meioSql = substr($meioSql,0,-1);
        //preenchimento do segundo arqumento do sql
        $fimSql = " WHERE ";
        if(count($colunasWhere) > 1)
        {
            for ($i=0; $i < count($colunasWhere) ; $i++)
            {
                $fimSql .= $colunasWhere[$i]." = $$ultimoI AND";
                $ultimoI = $ultimoI +1;
            }
            $fimSql = substr($fimSql,0,-3);
        }
        else
        {
            $fimSql .= $colunasWhere[0]." = $$ultimoI ";
        }

        $query = $inicioSql.$meioSql.$fimSql;//resultado da consulta


        //vamos verificar se o numero de variaveis corresponde ao total de ? da frase
        if($this->contaParametros($query) != count($params))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }

        function gerarNumeroUnico() // Reinserindo a funcao para nao dar erro no radomico
        {
            $numero = mt_rand(0, 9000); // Gera um número randômico entre 0 e 9000
            $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Letras maiúsculas e minúsculas

            $tamanho = mt_rand(5, 8); // Define um tamanho aleatório para a string de letras

            $randString = '';
            for ($i = 0; $i < $tamanho; $i++) {
                $randString .= $letras[mt_rand(0, strlen($letras) - 1)]; // Concatena uma letra aleatória
            }

            $numeroUnico = $numero . $randString; // Combina o número e a string de letras

            return $numeroUnico;
        }

       $randomico = gerarNumeroUnico();

       $nomequery = $nomequery.$randomico;

       if(pg_prepare($stm = $this->postgres, $nomequery, $query))
        {
            if($result = pg_execute($stm, $nomequery, $params))
            { //
				$this->resultado =  pg_affected_rows($result);
				$this->lastId = 0;
				return;
			}
            else
            {
                $resultQuery= 0;
                $lastIdQuery = 0;
                $this->lastId = 0;
                $this->resultado = 0;

            }

        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
    }


    public function executarUPDATEmax($tabela, $colunasValor, $colunasWhere, $params, $funcao)
    {
        //vamos verificar se os tipos de parametros estão corretos
        if(!is_array($params) ||!is_string($tabela) || !is_string($colunasValor) || !is_string($colunasWhere))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //estando corretos, eu limpo os resultados obtidos em outras consultas
        $this->arrayResultado = [];
        //verifico se os valores não estão vazios
        if(empty($colunasValor) || empty($colunasWhere))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
        //Começamos transformando a string de colunasValor para uma matrix
        if(substr_count( $colunasValor , ",") > 0)//verifica se o usuario usou ','
        {
            $colunasValor = explode(",", $colunasValor);
        }
        else
        {
            $colunasValor = explode(" ", $colunasValor);//se o usuario não usou ',', não tem problema
        }
        //Vamos organizar agora as colunas where
        if(substr_count( $colunasWhere , ",") > 0)//mesma questão da antiga... se tem ou não ','
        {
            $colunasWhere = explode(",", $colunasWhere);
        }
        else
        {
            $colunasWhere = explode(" ", $colunasWhere);
        }
        $inicioSql = "UPDATE $tabela SET ";//inicio do sql
        //preenchimento do primeiro argumento do sql
        $meioSql = "";
        $ultimoI = 0;
        for ($i=0; $i < count($colunasValor) ; $i++)
        {
            $ordemparametro = $i +1;
            $meioSql .= $colunasValor[$i]." = $$ordemparametro,";
            $ultimoI = $i;
        }

        $ultimoI = $ultimoI +2;
        //tiro o ? excessivo
        $meioSql = substr($meioSql,0,-1);
        //preenchimento do segundo arqumento do sql
        $fimSql = " WHERE ";
        if(count($colunasWhere) > 1)
        {
            for ($i=0; $i < count($colunasWhere) ; $i++)
            {
                $fimSql .= $colunasWhere[$i]." = $$ultimoI AND";
                $ultimoI = $ultimoI +1;
            }
            $fimSql = substr($fimSql,0,-3);
        }
        else
        {
            $fimSql .= $colunasWhere[0]." = $$ultimoI ";
        }

        $query = $inicioSql.$meioSql.$fimSql;//resultado da consulta


        //vamos verificar se o numero de variaveis corresponde ao total de ? da frase
        if($this->contaParametros($query) != count($params))
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }

        $nomefuncao = (string)md5($funcao);

       if(pg_prepare($stm = $this->postgres,  "$nomefuncao", $query))
        {
            if($result = pg_execute($stm,  $nomefuncao, $params))
            { //
				$this->resultado =  pg_affected_rows($result);
				$this->lastId = 0;
				return;
			}
            else
            {
                $resultQuery= 0;
                $lastIdQuery = 0;
                $this->lastId = 0;
                $this->resultado = 0;

            }

        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
        }
    }

    /////////Função Select com Array Numerico////////////
    public function executarSELECTArrayNumericoNoBind($query)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($stm = $this->postgres, "SELECT", $query))
        {
            if ($result = pg_query($stm, "SELECT"))
            $arrayRetorno = [];
            $result = pg_query($stm, $query);
            while($row = pg_fetch_row ($result))
            {
                $arrayRetorno [] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($arrayRetorno);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    /////////Função Select com Array Numerico////////////
    public function executarSELECTArrayNumericoNoBindLupy($query, $key)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
        $namequery = base64_encode($key);

        if(pg_prepare($stm = $this->postgres, "$namequery", $query))
        {
            if ($result = pg_query($stm, "SELECT"))
            $arrayRetorno = [];
            $result = pg_query($stm, $query);
            while($row = pg_fetch_row ($result))
            {
                $arrayRetorno [] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($arrayRetorno);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }

    public function executarSELECT2ArrayNumericoNoBind($query, $nomefuncao)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($stm = $this->postgres, $nomefuncao, $query))
        {
            if ($result = pg_query($stm, $query))
            $arrayRetorno = [];
            $result = pg_query($stm, $query);
            while($row = pg_fetch_row ($result))
            {
                $arrayRetorno [] = $row;
            }
            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($arrayRetorno);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }



    public function executarDelete($query)
    {
        //Checa se os parametros estão com os tipos corretos
        if(!is_string($query))
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }

        if(pg_prepare($this->postgres, "DELETE", $query))
        {
            $arrayRetorno = [];
            $result = pg_query($this->postgres, $query);


                $arrayRetorno[] = 1;

            $this->arrayResultado = $arrayRetorno;
            $this->resultado = count($this->arrayResultado);
            $this->lastId = 0;
        }
        else
        {
            $this->resultado = -1;
            $this->lastId = -1;
            $this->arrayResultado = [];
        }
    }
}