<?php
use Usuario as GlobalUsuario;

class colecaousuarios
{

	protected $colecaototal;
	protected $colecaousuario;
	protected $deucerto;

	#region GET'S
	public function getDeucerto()
	{
		return $this->deucerto;
	}
	public function getColecaoTotal()
	{
		return $this->colecaototal;
	}
	public function getcolecaousuario()
	{
		return $this->colecaousuario;
	}
	#endregion

	public function getdepartamentos()
	{
		$sqlComand = new MyPostSql();

		$sql = "SELECT * FROM tbdepartamento";

		$randomico = gerarNumeroUnico();
		$sqlComand->executarSELECTSimplesObjeto($sql, $randomico);
		$result = $sqlComand->getResultado();
		if($result > 0)
		{
			$return = $sqlComand->getArrayResultado();
			return json_encode($return);
		}
		else
		{
			return false;
		}
	}
}

class Usuario
{

	#region propriedades/colunas DB
	protected $idusuario; //0 (integer serial)
	protected $nome; //1 (character varying)
	protected $cpf; //2 (character varying)
	protected $rg; //3 (character varying)
	protected $pis; //4 (numeric)
	protected $email; //5 (character varying)
	protected $celular; //6 (character varying)
	protected $logradouro; //7 (character varying)
	protected $bairro; //8 (character varying)
	protected $municipio; //9 (character varying)
	protected $uf; //10 (character varying)
	protected $admissao; //11 (date)
	protected $salario; //12 (numeric)
	protected $iddepartamento; //13 (integer)
	protected $idfuncao; //14 (integer)
	protected $login; //15 (character varying)
	protected $senha; //16 (character varying)
	protected $lastlogin; //17 (timestamp without time zone)
	protected $dataregistro; //18 (date)
	protected $fotoprofile; //19 (character varying)
	protected $status; //20 (character varying)
	protected $idloja; //21 (integer)
	protected $demissao; //22 (date)
	protected $matricula; //23 (numeric)
	protected $datanascimento; //24 (date)
	protected $iniciojornada; //25 (time without time zone)
	protected $fimjornada; //26
	protected $intrajornada; //27
	protected $pontoeletronico; //28
	protected $iniciosextodia; //29
	protected $fimsextodia; //30
	protected $ultrapassadia; //31
	protected $ctps; //32
	protected $cep; //33
	protected $estadocivil; //34
	protected $mae; //35
	protected $profissao; //36
	protected $naturalidade; //37
	protected $nacionalidade; //38
	protected $complemento; //39
	protected $nomelogradouro; //40
	protected $pai; //41
	protected $numendereco; //42
	protected $rgemissor; //43
	protected $rguf; //44
	protected $titulo; //45
	protected $periodoexperiencia; //46
	protected $idregimecontrato; //47
	protected $pcd; //48
	protected $jornada; //49

	//variáveis do código (não existem no banco.)
	protected $permissoes; //50
	protected $mercadologico; //51
	protected $arraypermissoes; //52
	protected $returnfoto; //53
	#endregion

	#region Funções GET

	// Método "get" para $IDUsuario
    public function getIDUsuario()
    {
        return $this->idusuario;
    }

    // Método "get" para $Nome
    public function getNome()
    {
        return $this->nome;
    }

    // Método "get" para $Cpf
    public function getCpf()
    {
        return $this->cpf;
    }

    // Método "get" para $Rg
    public function getRg()
    {
        return $this->rg;
    }

    // Método "get" para $Pis
    public function getPis()
    {
        return $this->pis;
    }

    // Método "get" para $Email
    public function getEmail()
    {
        return $this->email;
    }

    // Método "get" para $Celular
    public function getCelular()
    {
        return $this->celular;
    }

    // Método "get" para $Logradouro
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    // Método "get" para $Bairro
    public function getBairro()
    {
        return $this->bairro;
    }

    // Método "get" para $Municipio
    public function getMunicipio()
    {
        return $this->municipio;
    }

    // Método "get" para $Uf
    public function getUf()
    {
        return $this->uf;
    }

    // Método "get" para $Admissao
    public function getAdmissao()
    {
        return $this->admissao;
    }

    // Método "get" para $Salario
    public function getSalario()
    {
        return $this->salario;
    }

    // Método "get" para $IDDepartamento
    public function getIDDepartamento()
    {
        return $this->iddepartamento;
    }

    // Método "get" para $IDFuncao
    public function getIDFuncao()
    {
        return $this->idfuncao;
    }

    // Método "get" para $Login
    public function getLogin()
    {
        return $this->login;
    }

    // Método "get" para $Senha
    public function getSenha()
    {
        return $this->senha;
    }

    // Método "get" para $LastLogin
    public function getLastLogin()
    {
        return $this->lastlogin;
    }

    // Método "get" para $DataRegistro
    public function getDataRegistro()
    {
        return $this->dataregistro;
    }

    // Método "get" para $FotoProfile
    public function getFoto()
    {
        return $this->fotoprofile;
    }

    // Método "get" para $Status
    public function getStatus()
    {
        return $this->status;
    }

    // Método "get" para $IDLoja
    public function getIDLoja()
    {
        return $this->idloja;
    }

    // Método "get" para $Demissao
    public function getDemissao()
    {
        return $this->demissao;
    }

    // Método "get" para $Matricula
    public function getMatricula()
    {
        return $this->matricula;
    }

    // Método "get" para $DataNascimento
    public function getDataNascimento()
    {
        return $this->datanascimento;
    }

    // Método "get" para $InicioJornada
    public function getInicioJornada()
    {
        return $this->iniciojornada;
    }

	// Método "get" para $FimJornada
    public function getFimJornada()
    {
        return $this->fimjornada;
    }

    // Método "get" para $IntraJornada
    public function getIntraJornada()
    {
        return $this->intrajornada;
    }

    // Método "get" para $PontoEletronico
    public function getPontoEletronico()
    {
        return $this->pontoeletronico;
    }

    // Método "get" para $InicioSextoDia
    public function getInicioSextoDia()
    {
        return $this->iniciosextodia;
    }

    // Método "get" para $FimSextoDia
    public function getFimSextoDia()
    {
        return $this->fimsextodia;
    }

    // Método "get" para $UltrapassaDia
    public function getUltrapassaDia()
    {
        return $this->ultrapassadia;
    }

    // Método "get" para $Ctps
    public function getCtps()
    {
        return $this->ctps;
    }

    // Método "get" para $Cep
    public function getCep()
    {
        return $this->cep;
    }

    // Método "get" para $EstadoCivil
    public function getEstadoCivil()
    {
        return $this->estadocivil;
    }

    // Método "get" para $Mae
    public function getMae()
    {
        return $this->mae;
    }

    // Método "get" para $Profissao
    public function getProfissao()
    {
        return $this->profissao;
    }

    // Método "get" para $Naturalidade
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    // Método "get" para $Nacionalidade
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    // Método "get" para $Complemento
    public function getComplemento()
    {
        return $this->complemento;
    }

    // Método "get" para $NomeLogradouro
    public function getNomeLogradouro()
    {
        return $this->nomelogradouro;
    }

	// Método "get" para $Pai
    public function getPai()
    {
        return $this->pai;
    }

    // Método "get" para $NumEndereco
    public function getNumEndereco()
    {
        return $this->numendereco;
    }

    // Método "get" para $RgEmissor
    public function getRgEmissor()
    {
        return $this->rgemissor;
    }

    // Método "get" para $RgUf
    public function getRgUf()
    {
        return $this->rguf;
    }

    // Método "get" para $Titulo
    public function getTitulo()
    {
        return $this->titulo;
    }

    // Método "get" para $PeriodoExperiencia
    public function getPeriodoExperiencia()
    {
        return $this->periodoexperiencia;
    }

    // Método "get" para $IdRegimeContrato
    public function getIdRegimeContrato()
    {
        return $this->idregimecontrato;
    }

    // Método "get" para $Pcd
    public function getPcd()
    {
        return $this->pcd;
    }

    // Método "get" para $Jornada
    public function getJornada()
    {
        return $this->jornada;
    }

    // Método "get" para $permissoes
    public function getPermissoes()
    {
        return $this->permissoes;
    }

	public function getMercadologico()
	{
		return $this->mercadologico;
	}


	#endregion

	public function atribuir($array)
    {
        $index = 'idusuario';
        if(array_key_exists($index, $array))
        {
            $this->idusuario = $array[$index];
        }

        $index = 'nome';
        if(array_key_exists($index, $array))
        {
            $this->nome = $array[$index];
        }

        $index = 'cpf';
        if(array_key_exists($index, $array))
        {
            $this->cpf = $array[$index];
        }

        $index = 'rg';
        if(array_key_exists($index, $array))
        {
            $this->rg = $array[$index];
        }

        $index = 'pis';
        if(array_key_exists($index, $array))
        {
            $this->pis = $array[$index];
        }

        $index = 'email';
        if(array_key_exists($index, $array))
        {
            $this->email = $array[$index];
        }

        $index = 'celular';
        if(array_key_exists($index, $array))
        {
            $this->celular = $array[$index];
        }

        $index = 'logradouro';
        if(array_key_exists($index, $array))
        {
            $this->logradouro = $array[$index];
        }

        $index = 'bairro';
        if(array_key_exists($index, $array))
        {
            $this->bairro = $array[$index];
        }

        $index = 'municipio';
        if(array_key_exists($index, $array))
        {
            $this->municipio = $array[$index];
        }

        $index = 'uf';
        if(array_key_exists($index, $array))
        {
            $this->uf = $array[$index];
        }

        $index = 'admissao';
        if(array_key_exists($index, $array))
        {
            $this->admissao = $array[$index];
        }

        $index = 'salario';
        if(array_key_exists($index, $array))
        {
            $this->salario = $array[$index];
        }

        $index = 'iddepartamento';
        if(array_key_exists($index, $array))
        {
            $this->iddepartamento = $array[$index];
        }

        $index = 'idfuncao';
        if(array_key_exists($index, $array))
        {
            $this->idfuncao = $array[$index];
        }

		$index = 'login';
        if(array_key_exists($index, $array))
        {
            $this->login = $array[$index];
        }

		$index = 'senha';
        if(array_key_exists($index, $array))
        {
            $this->senha = $array[$index];
        }

		$index = 'lastlogin';
        if(array_key_exists($index, $array))
        {
            $this->lastlogin = $array[$index];
        }

		$index = 'dataregistro';
        if(array_key_exists($index, $array))
        {
            $this->dataregistro = $array[$index];
        }

		$index = 'fotoprofile';
        if(array_key_exists($index, $array))
        {
            $this->fotoprofile = $array[$index];
        }

		$index = 'status';
        if(array_key_exists($index, $array))
        {
            $this->status = $array[$index];
        }

		$index = 'idloja';
        if(array_key_exists($index, $array))
        {
            $this->idloja = $array[$index];
        }

		$index = 'demissao';
        if(array_key_exists($index, $array))
        {
            $this->demissao = $array[$index];
        }

		$index = 'matricula';
        if(array_key_exists($index, $array))
        {
            $this->matricula = $array[$index];
        }

		$index = 'datanascimento';
        if(array_key_exists($index, $array))
        {
            $this->datanascimento = $array[$index];
        }

		$index = 'iniciojornada';
        if(array_key_exists($index, $array))
        {
            $this->iniciojornada = $array[$index];
        }

		$index = 'fimjornada';
        if(array_key_exists($index, $array))
        {
            $this->fimjornada = $array[$index];
        }

		$index = 'intrajornada';
        if(array_key_exists($index, $array))
        {
            $this->intrajornada = $array[$index];
        }

		$index = 'pontoeletronico';
        if(array_key_exists($index, $array))
        {
            $this->pontoeletronico = $array[$index];
        }

		$index = 'iniciosextodia';
        if(array_key_exists($index, $array))
        {
            $this->iniciosextodia = $array[$index];
        }

		$index = 'fimsextodia';
        if(array_key_exists($index, $array))
        {
            $this->fimsextodia = $array[$index];
        }

		$index = 'ultrapassadia';
        if(array_key_exists($index, $array))
        {
            $this->ultrapassadia = $array[$index];
        }

		$index = 'ctps';
        if(array_key_exists($index, $array))
        {
            $this->ctps = $array[$index];
        }

		$index = 'cep';
        if(array_key_exists($index, $array))
        {
            $this->cep = $array[$index];
        }

		$index = 'estadocivil';
        if(array_key_exists($index, $array))
        {
            $this->estadocivil = $array[$index];
        }

		$index = 'mae';
        if(array_key_exists($index, $array))
        {
            $this->mae = $array[$index];
        }

		$index = 'profissao';
        if(array_key_exists($index, $array))
        {
            $this->profissao = $array[$index];
        }

		$index = 'naturalidade';
        if(array_key_exists($index, $array))
        {
            $this->naturalidade = $array[$index];
        }

		$index = 'nacionalidade';
        if(array_key_exists($index, $array))
        {
            $this->nacionalidade = $array[$index];
        }

		$index = 'complemento';
        if(array_key_exists($index, $array))
        {
            $this->complemento = $array[$index];
        }

		$index = 'nomelogradouro';
        if(array_key_exists($index, $array))
        {
            $this->nomelogradouro = $array[$index];
        }

		$index = 'pai';
        if(array_key_exists($index, $array))
        {
            $this->pai = $array[$index];
        }

		$index = 'numendereco';
        if(array_key_exists($index, $array))
        {
            $this->numendereco = $array[$index];
        }

		$index = 'rgemissor';
        if(array_key_exists($index, $array))
        {
            $this->rgemissor = $array[$index];
        }

		$index = 'rguf';
        if(array_key_exists($index, $array))
        {
            $this->rguf = $array[$index];
        }

		$index = 'titulo';
        if(array_key_exists($index, $array))
        {
            $this->titulo = $array[$index];
        }

		$index = 'periodoexperiencia';
        if(array_key_exists($index, $array))
        {
            $this->periodoexperiencia = $array[$index];
        }

		$index = 'idregimecontrato';
        if(array_key_exists($index, $array))
        {
            $this->idregimecontrato = $array[$index];
        }

		$index = 'pcd';
        if(array_key_exists($index, $array))
        {
            $this->pcd = $array[$index];
        }

		$index = 'jornada';
        if(array_key_exists($index, $array))
        {
            $this->jornada = $array[$index];
        }
    }

	public function atribuirparaclasse($array)
	{
		foreach($array as $key => $value)
		{
			if(property_exists($this, $key))
			{
				$this->$key = $value;
			}
		}
	}

	#region Funções SET */

	public function setLastLogin($data)
	{
		return $this->lastlogin = $data;
	}

	public function setSenhaHash($senha)
	{
		$this->senha = PassHash::hash($senha);

	}

	public function setbancosenhalastlogin()
	{
		date_default_timezone_set('America/Belem');
		$this->lastlogin = date ("Y-m-d H:i:s");
		//$sqlComand = new MyCRUD();
		$sqlComand = new MyPostSql();
		$params = array($this->lastlogin, $this->senha, $this->idusuario);
		$colunasValor = 'lastlogin, senha';
		$colunasWhere = 'idusuario';
		$sqlComand->executarUPDATE('public.tbusuario', $colunasValor, $colunasWhere, $params);
	}

	public function unsetSenha()
	{
		$this->senha = null;
	}

	public function setbancolastlogin()
	{
		date_default_timezone_set('America/Belem');
		$this->lastlogin = date ("Y-m-d H:i:s");
		$sqlComand = new MyPostSql();
		$params = array($this->lastlogin, $this->idusuario);
		$colunasValor = 'lastlogin';
		$colunasWhere = 'idusuario';
		$sqlComand->executarUPDATE('public.tbusuario', $colunasValor, $colunasWhere, $params);
	}

	public function setpermissoes()
	{
		$permissoes = new Permissoes();
		$permissoes->setpermissoesid($this->idusuario);
		$this->permissoes = $permissoes->getlistapermissao();
	}

	public static function pegarpermissoes($idusuario)
	{
		$sqlComand = new MyPostSql();

		$sql = "SELECT usupermissao.idpermissao, permissao.descricao, usupermissao.permissao
		FROM tbusuariopermissoes usupermissao
		INNER JOIN tbpermissoes permissao
		ON usupermissao.idpermissao = permissao.id
		WHERE usupermissao.idusuario = $idusuario";
		$sqlComand->executarSELECTSimplesObjeto($sql, 'pegarpermissoes');
		$result = $sqlComand->getResultado();
		if($result > 0)
		{
			$objresult = $sqlComand->getArrayResultado();

			$autorizacaousuario = new Usuario();
			$autorizacaousuario->permissoes = $objresult;
			return $objresult;
		}
		else
		{
			return false;
		}
	}

	public function setfotoprofile($fotoprofile)
	{
		$this->fotoprofile = $fotoprofile;
	}

	public function setProfissao()
	{
		$sqlcomando = new MyPostSql();
		$sql = sprintf("SELECT fun.funcao
		FROM tbfuncao fun
		WHERE fun.idfuncao = %s", $this->idfuncao);
		$sqlcomando->executarSELECTSimplesObjetoRep($sql, gerarNumeroUnico());
		if($sqlcomando->getResultado() > 0)
		{
			$result = $sqlcomando->getArrayResultado();
			$this->profissao = $result[0]['funcao'];
		}
	}

	public function setMercadologico()
	{

		$sqlComand = new MyPostSql();
		$sql = sprintf("SELECT previ.idmercadologico
		FROM public.tbprevisoesmercadologicocolab previ
		WHERE previ.idusuario = %d
		AND previ.idloja = %d
		AND previ.ativo = true", $this->idusuario, $this->idloja);
		$sqlComand->executarSELECTSimplesObjeto($sql, 'setMercadologico');
		$result = $sqlComand->getArrayResultado();
		if(count($result) > 0)
		{
			foreach ($result as $key => $value)
			{
				$this->mercadologico[] = $value['idmercadologico'];
			}
		}
		else
		{
			$this->mercadologico = null;
		}

	}

	#endregion

	public static function getByLoginMyPostSql($login)
	{
		$sqlComand = new MyPostSql();
		$query = "SELECT * FROM public.tbusuario
		where LOWER(login) = LOWER('$login')";
		$sqlComand->executarSELECTSimplesObjeto($query, 'getbylogin');
		$UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			// esses serão os parâmetros setados no cookie
			$UserObject = new Usuario();
			$UserObject->idusuario = $UserResult[0]['idusuario'];
			$UserObject->iddepartamento = $UserResult[0]['iddepartamento'];
			$UserObject->idfuncao = $UserResult[0]['idfuncao'];
			$UserObject->status = $UserResult[0]['status'];
			$UserObject->idloja = $UserResult[0]['idloja'];
			$UserObject->login = $UserResult[0]['login'];
			$UserObject->senha = $UserResult[0]['senha'];
			$UserObject->fotoprofile = $UserResult[0]['fotoprofile'];

			return $UserObject;
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	//função na qual irá funcionar caso o usuário estiver com o token no seu localstorage no navegador.
	public function getByIdToken()
	{
		$sqlComand = new MyPostSql();
		$query = sprintf("SELECT usu.idusuario, usu.iddepartamento, usu.idfuncao, usu.login, usu.senha, usu.fotoprofile,
		usu.status, usu.idloja
		FROM public.tbusuario usu
		where usu.idusuario = %s", $this->idusuario);
		$sqlComand->executarSELECTSimplesObjeto($query, 'getbyidusuario');
		$UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$this->atribuir($UserResult[0]);
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	public static function getByLoginMyPostSqlApp($login)
	{
		$sqlComand = new MyPostSql();

		$query = "SELECT * from public.tbusuario
		where cpf = '$login'";
		$sqlComand->executarSELECTSimplesObjeto($query, 'getByLoginMyPostSqlApp');
		$UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$UserObject = new Usuario();
			$UserObject->idusuario = $UserResult[0]['idusuario'];
			$UserObject->nome = $UserResult[0]['nome'];
			$UserObject->cpf = $UserResult[0]['cpf'];
			$UserObject->rg = $UserResult[0]['rg'];
			$UserObject->pis = $UserResult[0]['pis'];
			$UserObject->email = $UserResult[0]['email'];
			$UserObject->celular = $UserResult[0]['celular'];
			$UserObject->logradouro = $UserResult[0]['logradouro'];
			$UserObject->bairro = $UserResult[0]['bairro'];
			$UserObject->municipio = $UserResult[0]['municipio'];
			$UserObject->uf = $UserResult[0]['uf'];
			$UserObject->admissao = $UserResult[0]['admissao'];
			$UserObject->salario = $UserResult[0]['salario'];
			$UserObject->iddepartamento = $UserResult[0]['iddepartamento'];
			$UserObject->idfuncao = $UserResult[0]['idfuncao'];
			$UserObject->admissao = $UserResult[0]['admissao'];
			$UserObject->login = $UserResult[0]['login'];
			$UserObject->senha = $UserResult[0]['senha'];
			$UserObject->lastlogin = $UserResult[0]['lastlogin'];
			$UserObject->dataregistro = $UserResult[0]['dataregistro'];
			$UserObject->fotoprofile = $UserResult[0]['fotoprofile'];
			$UserObject->status = $UserResult[0]['status'];
			$UserObject->idloja = $UserResult[0]['idloja'];
			$UserObject->demissao = $UserResult[0]['demissao'];
			$UserObject->matricula = $UserResult[0]['matricula'];
			$UserObject->datanascimento = $UserResult[0]['datanascimento'];
			$UserObject->iniciojornada = $UserResult[0]['iniciojornada'];
			$UserObject->fimjornada = $UserResult[0]['fimjornada'];
			$UserObject->intrajornada = $UserResult[0]['intrajornada'];
			$UserObject->pontoeletronico = $UserResult[0]['pontoeletronico'];
			$UserObject->iniciosextodia = $UserResult[0]['iniciosextodia'];
			$UserObject->fimsextodia = $UserResult[0]['fimsextodia'];
			$UserObject->ultrapassadia = $UserResult[0]['ultrapassadia'];
			$UserObject->ctps = $UserResult[0]['ctps'];
			$UserObject->cep = $UserResult[0]['cep'];
			$UserObject->estadocivil = $UserResult[0]['estadocivil'];
			$UserObject->mae = $UserResult[0]['mae'];
			$UserObject->profissao = $UserResult[0]['profissao'];
			$UserObject->naturalidade = $UserResult[0]['naturalidade'];
			$UserObject->nacionalidade = $UserResult[0]['nacionalidade'];
			$UserObject->complemento = $UserResult[0]['complemento'];
			$UserObject->nomelogradouro = $UserResult[0]['nomelogradouro'];
			$UserObject->pai = $UserResult[0]['pai'];
			$UserObject->numendereco = $UserResult[0]['numendereco'];
			$UserObject->rgemissor = $UserResult[0]['rgemissor'];
			$UserObject->rguf = $UserResult[0]['rguf'];
			$UserObject->titulo = $UserResult[0]['titulo'];
			$UserObject->periodoexperiencia = $UserResult[0]['periodoexperiencia'];
			$UserObject->idregimecontrato = $UserResult[0]['idregimecontrato'];
			$UserObject->pcd = $UserResult[0]['pcd'];
			$UserObject->jornada = $UserResult[0]['jornada'];

			return $UserObject;
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	public static function getByIdfuncionario($id)
	{
		$sqlComand = new MyPostSql();
		$query = "SELECT * FROM public.tbusuario
		WHERE idusuario = $id";
		$params = array($id);
		$randomico = gerarNumeroUnico();
		$funcionarios = "funcionarios".$randomico;
		$sqlComand->executarSELECTSimplesObjetoRep($query, $funcionarios);
		$UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$Usuario = new Usuario();
			$Usuario->atribuir($UserResult[0]);
			$Usuario->setpermissoes();
			$Usuario->setProfissao();
			$objetoarray = get_object_vars($Usuario);
			return json_encode($objetoarray);
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	public static function getByIdfuncionarioPedido($id)
	{
		$sqlComand = new MyPostSql();
		$query = "SELECT * from public.tbusuario where idusuario=$id";
		$params = array($id);
		$randomico = gerarNumeroUnico();
		$funcionarios = "funcionarios".$randomico;
		$sqlComand->executarSELECTSimplesObjetoRep($query, $funcionarios);
		$UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			return $UserResult;
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	public static function getHistoricoFuncionario($id)
	{
		$sqlComand = new MyPostSql();
		$sql = sprintf("SELECT hist.idusuhistorico, hist.idfuncionario, hist.idusuario, hist.datahistorico, hist.historico, hist.dataevento,
		hist.idfuncao, hist.iddepartamento, hist.idloja, hist.salario, hist.idevento, hist.datafim, hist.status, hist.dataalteracao,
		usu.idusuario, eve.evento, usu.nome, doc.link, usu.login
		FROM public.tbusuhistorico hist
		INNER JOIN public.tbusuario usu
		ON hist.idusuario = usu.idusuario
		INNER JOIN public.tbevento eve
		ON eve.idevento = hist.idevento
		LEFT JOIN public.tbdocumento doc
		ON hist.iddocumento = doc.iddocumento
		WHERE hist.idfuncionario = '%s'
		AND hist.status = 'A'
		ORDER BY hist.dataevento DESC", $id);
		$sqlComand->executarSELECTSimplesObjeto($sql, 'getHistoricoFuncionario');
		$result = $sqlComand->getArrayResultado();
		if(count($result) > 0)
		{
			return json_encode($result);
		}

	}

	public static function getHistoricoSelect($id)
	{

		$sqlComand = new MyPostSql();
		$query = sprintf("SELECT hist.idusuhistorico, hist.idfuncionario, hist.idusuario, hist.datahistorico, hist.historico,
		hist.dataevento, hist.idfuncao, hist.iddepartamento, hist.idloja, hist.salario, hist.idevento, hist.datafim,
		hist.status, hist.dataalteracao, usu.idusuario, eve.evento, usu.nome, doc.link
		FROM public.tbusuhistorico hist
		INNER JOIN public.tbusuario usu
		ON hist.idusuario = usu.idusuario
		INNER JOIN public.tbevento eve
		ON eve.idevento = hist.idevento
		LEFT JOIN public.tbdocumento doc
		ON hist.iddocumento = doc.iddocumento
		where hist.idusuhistorico = '%s'", $id);

		$sqlComand->executarSELECTSimplesObjeto($query, 'getHistoricoSelect');
		$result = $sqlComand->getArrayResultado();
		if(count($result) > 0)
		{
			return $result;
		}
		else
		{
			return false;
		}

	}

	public static function getDocFuncionario($id)
	{

		$sqlComand = new MyPostSql();
		$query = sprintf("SELECT doc.*, usu.nome
		FROM public.tbdocumento doc
		INNER JOIN public.tbusuario usu
		ON doc.idusuario = usu.idusuario
		WHERE doc.idfuncionario = %s
		ORDER BY doc.data DESC", $id);
		$sqlComand->executarSELECTSimplesObjeto($query, 'getDocFuncionario');
		$result = $sqlComand->getArrayResultado();
		if(count($result) > 0)
		{
			return json_encode($result);
		}
		else
		{
			return false;
		}
	}

	public function getGerenteByIDLoja($idloja)
	{
		$nomeselect = $idloja;

		/*if($idloja === '5')
		{
			$idloja = '4';
			$nomeselect = 'pegagerente';
		}*/

		$sqlComand = new MyPostSql();
		$query = sprintf("SELECT * FROM public.tbusuario usu
        WHERE usu.iddepartamento = 7
        AND usu.idfuncao = 14
		AND usu.status = 'ASP'
        AND usu.idloja = %s", $idloja);


		$sqlComand->executarSELECTSimplesObjeto($query, $nomeselect);
        $UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$this->idusuario = $UserResult[0]['idusuario'];
			$this->nome = $UserResult[0]['nome'];
			$this->cpf = $UserResult[0]['cpf'];
			$this->rg = $UserResult[0]['rg'];
			$this->pis = $UserResult[0]['pis'];
			$this->email = $UserResult[0]['email'];
			$this->celular = $UserResult[0]['celular'];
			$this->logradouro = $UserResult[0]['logradouro'];
			$this->bairro = $UserResult[0]['bairro'];
			$this->municipio = $UserResult[0]['municipio'];
			$this->uf = $UserResult[0]['uf'];
			$this->admissao = $UserResult[0]['admissao'];
			$this->salario = $UserResult[0]['salario'];
			$this->iddepartamento = $UserResult[0]['iddepartamento'];
			$this->idfuncao = $UserResult[0]['idfuncao'];
			$this->login = $UserResult[0]['login'];
			$this->senha = $UserResult[0]['senha'];
			$this->lastlogin = $UserResult[0]['lastlogin'];
			$this->dataregistro = $UserResult[0]['dataregistro'];
			$this->fotoprofile = $UserResult[0]['fotoprofile'];
			$this->status = $UserResult[0]['status'];
			$this->idloja = $UserResult[0]['idloja'];
			$this->demissao = $UserResult[0]['demissao'];
			$this->matricula = $UserResult[0]['matricula'];
			$this->datanascimento = $UserResult[0]['datanascimento'];
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}


	public function getSubgerenteByIDLoja($idloja)
	{
		$nomeselect = $idloja;


		$sqlComand = new MyPostSql();
		$sql = "SELECT * FROM public.tbusuario usu
        WHERE usu.iddepartamento = 7
        AND usu.idfuncao = 20
		AND usu.status = 'ASP'
        AND usu.idloja = $idloja
		LIMIT 1";


		$sqlComand->executarSELECTSimplesObjeto($sql, 'subgerente'.$nomeselect);
        $UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$this->idusuario = $UserResult[0]['idusuario'];
			$this->nome = $UserResult[0]['nome'];
			$this->cpf = $UserResult[0]['cpf'];
			$this->rg = $UserResult[0]['rg'];
			$this->pis = $UserResult[0]['pis'];
			$this->email = $UserResult[0]['email'];
			$this->celular = $UserResult[0]['celular'];
			$this->logradouro = $UserResult[0]['logradouro'];
			$this->bairro = $UserResult[0]['bairro'];
			$this->municipio = $UserResult[0]['municipio'];
			$this->uf = $UserResult[0]['uf'];
			$this->admissao = $UserResult[0]['admissao'];
			$this->salario = $UserResult[0]['salario'];
			$this->iddepartamento = $UserResult[0]['iddepartamento'];
			$this->idfuncao = $UserResult[0]['idfuncao'];
			$this->login = $UserResult[0]['login'];
			$this->senha = $UserResult[0]['senha'];
			$this->lastlogin = $UserResult[0]['lastlogin'];
			$this->dataregistro = $UserResult[0]['dataregistro'];
			$this->fotoprofile = $UserResult[0]['fotoprofile'];
			$this->status = $UserResult[0]['status'];
			$this->idloja = $UserResult[0]['idloja'];
			$this->demissao = $UserResult[0]['demissao'];
			$this->matricula = $UserResult[0]['matricula'];
			$this->datanascimento = $UserResult[0]['datanascimento'];
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}


	public function getTripeByIDLoja($idloja)
	{
		$nomeselect = $idloja;
		$arraytripe = [];

		$sqlComand = new MyPostSql();
		$sql = "SELECT * FROM public.tbusuario usu
        WHERE usu.iddepartamento = 7
        AND usu.idfuncao IN (14, 20, 5)
		AND usu.status = 'ASP'
        AND usu.idloja = $idloja";


		$sqlComand->executarSELECTSimplesObjeto($sql, $nomeselect);
        $UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			foreach ($UserResult as $key => $value)
			{
				$usuario = new Usuario();
				$usuario->idusuario = $value['idusuario'];
				$usuario->nome = $value['nome'];
				$usuario->cpf = $value['cpf'];
				$usuario->rg = $value['rg'];
				$usuario->pis = $value['pis'];
				$usuario->email = $value['email'];
				$usuario->celular = $value['celular'];
				$usuario->logradouro = $value['logradouro'];
				$usuario->bairro = $value['bairro'];
				$usuario->municipio = $value['municipio'];
				$usuario->uf = $value['uf'];
				$usuario->admissao = $value['admissao'];
				$usuario->salario = $value['salario'];
				$usuario->iddepartamento = $value['iddepartamento'];
				$usuario->idfuncao = $value['idfuncao'];
				$usuario->login = $value['login'];
				$usuario->senha = $value['senha'];
				$usuario->lastlogin = $value['lastlogin'];
				$usuario->dataregistro = $value['dataregistro'];
				$usuario->fotoprofile = $value['fotoprofile'];
				$usuario->status = $value['status'];
				$usuario->idloja = $value['idloja'];
				$usuario->demissao = $value['demissao'];
				$usuario->matricula = $value['matricula'];
				$usuario->datanascimento = $value['datanascimento'];

				$arraytripe[] = $usuario;
			}

			return $arraytripe;
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}


	public function getFuncionarioByIDLoja($idloja)
	{
		$nomeselect = $idloja;

		$sqlComand = new MyPostSql();
		$sql = "SELECT * FROM public.tbusuario usu
        WHERE usu.iddepartamento = 7
		AND usu.status = 'ASP'
        AND usu.idloja = $idloja";


		$sqlComand->executarSELECTSimplesObjeto($sql, $nomeselect);
        $UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$this->idusuario = $UserResult[0]['idusuario'];
			$this->nome = $UserResult[0]['nome'];
			$this->cpf = $UserResult[0]['cpf'];
			$this->rg = $UserResult[0]['rg'];
			$this->pis = $UserResult[0]['pis'];
			$this->email = $UserResult[0]['email'];
			$this->celular = $UserResult[0]['celular'];
			$this->logradouro = $UserResult[0]['logradouro'];
			$this->bairro = $UserResult[0]['bairro'];
			$this->municipio = $UserResult[0]['municipio'];
			$this->uf = $UserResult[0]['uf'];
			$this->admissao = $UserResult[0]['admissao'];
			$this->salario = $UserResult[0]['salario'];
			$this->iddepartamento = $UserResult[0]['iddepartamento'];
			$this->idfuncao = $UserResult[0]['idfuncao'];
			$this->login = $UserResult[0]['login'];
			$this->senha = $UserResult[0]['senha'];
			$this->lastlogin = $UserResult[0]['lastlogin'];
			$this->dataregistro = $UserResult[0]['dataregistro'];
			$this->fotoprofile = $UserResult[0]['fotoprofile'];
			$this->status = $UserResult[0]['status'];
			$this->idloja = $UserResult[0]['idloja'];
			$this->demissao = $UserResult[0]['demissao'];
			$this->matricula = $UserResult[0]['matricula'];
			$this->datanascimento = $UserResult[0]['datanascimento'];
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	public function criarusuario($arrayResultado)
    {
        $this->idusuario = $arrayResultado[0];
        $this->nome = $arrayResultado[1];
        $this->cpf = $arrayResultado[2];
        $this->rg = $arrayResultado[3];
        $this->pis = $arrayResultado[4];
        $this->email = $arrayResultado[5];
        $this->celular = $arrayResultado[6];
        $this->logradouro = $arrayResultado[7];
        $this->bairro = $arrayResultado[8];
        $this->municipio = $arrayResultado[9];
		$this->uf = $arrayResultado[10];
		$this->admissao = $arrayResultado[11];
		$this->salario = $arrayResultado[12];
        $this->iddepartamento = $arrayResultado[13];
        $this->idfuncao = $arrayResultado[14];
        $this->login = $arrayResultado[15];
        $this->senha = $arrayResultado[16];
        $this->lastlogin = $arrayResultado[17];
        $this->dataregistro = $arrayResultado[18];
		$this->fotoprofile = $arrayResultado[19];
		$this->status = $arrayResultado[20];
		$this->idloja = $arrayResultado[21];
		$this->demissao = $arrayResultado[22];
		$this->matricula = $arrayResultado[23];
		$this->datanascimento = $arrayResultado[24];
	}

	public function CriarCJ()
	{
		$this->idusuario = 0;
	}

	public function checaUsuarioCpf($cpf)
    {
		$comando = new MyPostSql();

        $sql = "SELECT cpf
		FROM public.tbusuario
		WHERE cpf = '$cpf'";

		$nomefuncao = "checacpf";
        $comando->executarSELECT2ArrayNumericoNoBind($sql, $nomefuncao);
        $result = $comando->getResultado();
        if($result == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function usuarioPXId()
    {
		$comando = new MyPostSql();

        $sql = "SELECT MAX(idusuario) as idusuario
		FROM public.tbusuario";
        $comando->executarSELECTArrayNumericoNoBind($sql);
		$result = $comando->getResultado();
        if($result > 0)
        {
			$pxid = $comando->getArrayResultado($comando);
			$pxid = $pxid[0][0] + 1;
			return $pxid;
        }
        else
        {
            return false;
        }
    }

	#region Funções Checagem da Senha
	public function validar($password)
	{
		if($this->checkPassword($password))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function checkWithoutHash($password)
	{
        return ($this->senha === $password);
	}


	public function checkPassword($password)
	{
        $full_salt = substr($this->senha, 0, 29);
        $new_hash = crypt($password, $full_salt);
        return ($this->senha === $new_hash);
	}

	public function expose()
	{
		return get_object_vars($this);
	}

	public static function getAndValidate($login)
	{
		$Usuario =  Usuario::getByLoginMyPostSql( $login);
		if ($Usuario)
		{
			if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}

			//Vamos fazer a verificação da senha criptografada
			if ($Usuario->validar($Usuario->getSenha()))
			{
				//Ajusto a session e os cookies
				$_SESSION['usuario'] = serialize($Usuario);
				setcookie('usuario', $_SESSION['usuario'], strtotime( '+5 days' ), '/');

				//Update a data de login
				date_default_timezone_set('America/Belem');
				$DataLogin = date ("Y-m-d");
				$sqlComand = new MyPostSql();
				$params = array($DataLogin, $Usuario->getIdUsuario());
				$colunasValor = "LastLogin";
				$colunasWhere = 'IDUsuario';
				$sqlComand->executarUPDATE("TBUsuario ", $colunasValor, $colunasWhere, $params);
				return 1;
			}
			else
			{
				return 3;
			}
		}
		else
		{
			return 2;
		}
	}

	// TROCAR SENHA FUNCIONARIOS
	public function updateUsuario($params)
	{

		if($params)
		{

			$comando = new MyPostSql();
			$params[2] = $this->setSenhaHash($params[2]);
			$params[2] = $this->getSenha();
			$colunasValor = "email, celular, senha";
			$colunasWhere = 'idusuario';
			$comando->executarUPDATE('public.tbusuario', $colunasValor, $colunasWhere, $params);
			$comando = $comando->getResultado();
			if($comando > 0)
			{
				$this->email = $params[0];
				$this->celular = $params[1];
				$this->senha = $params[2];

				$_SESSION['usuario'] = serialize($this);
				setcookie('usuario', $_SESSION['usuario'], strtotime( '+5 days' ), '/');

				return 1;
			}
			elseif($comando == 0)
			{
				return 0;
			}
			else
			{
				return -1;
			}
		}
		else
		{
			return -1;
		}
	}

	public function updateSenha($params)
	{

		if ($params)
		{
			$colunasValor = "senha";
			$colunasWhere = 'idusuario';
			$comando = new MyPostSql();
			$comando->executarUPDATE('public.tbusuario', $colunasValor, $colunasWhere, $params);
			$comando=$comando->getResultado();
			if ($comando > 0)
			{
				return 1;
			}
			elseif($comando == 0)
			{
				return 0;
			}
			else
			{
				return -1;
			}
		}
		else
		{
			return -1;
		}
	}

	public static function getByLoginMyPostSqlApp2($login)
	{
		$sqlComand = new MyPostSql();
		$query = "SELECT * FROM public.tbusuario
		where idusuario = '$login'";
		$sqlComand->executarSELECTSimplesObjeto($query, 'getloginMyPostSqlapp2');
		$UserResult = $sqlComand->getArrayResultado();
		if(count($UserResult) > 0)
		{
			$UserObject = new Usuario();
			$UserObject->idusuario = $UserResult[0]['idusuario'];
			$UserObject->nome = $UserResult[0]['nome'];
			$UserObject->cpf = $UserResult[0]['cpf'];
			$UserObject->rg = $UserResult[0]['rg'];
			$UserObject->pis = $UserResult[0]['pis'];
			$UserObject->email = $UserResult[0]['email'];
			$UserObject->celular = $UserResult[0]['celular'];
			$UserObject->logradouro = $UserResult[0]['logradouro'];
			$UserObject->bairro = $UserResult[0]['bairro'];
			$UserObject->municipio = $UserResult[0]['municipio'];
			$UserObject->uf = $UserResult[0]['uf'];
			$UserObject->admissao = $UserResult[0]['admissao'];
			$UserObject->salario = $UserResult[0]['salario'];
			$UserObject->iddepartamento = $UserResult[0]['iddepartamento'];
			$UserObject->idfuncao = $UserResult[0]['idfuncao'];
			$UserObject->admissao = $UserResult[0]['admissao'];
			$UserObject->login = $UserResult[0]['login'];
			$UserObject->senha = $UserResult[0]['senha'];
			$UserObject->lastlogin = $UserResult[0]['lastlogin'];
			$UserObject->dataregistro = $UserResult[0]['dataregistro'];
			$UserObject->fotoprofile = $UserResult[0]['fotoprofile'];
			$UserObject->status = $UserResult[0]['status'];
			$UserObject->idloja = $UserResult[0]['idloja'];
			$UserObject->demissao = $UserResult[0]['demissao'];
			$UserObject->matricula = $UserResult[0]['matricula'];
			$UserObject->datanascimento = $UserResult[0]['datanascimento'];

			return $UserObject;
		}
		else
		{
			if(count($UserResult) < 0)
			{
				return false;
			}
			else
			{
				return false;
			}
		}
	}

	//essa função vai verificar se o token que chegou do localstorage é do mesmo usuário que está logando.
	public function checarTokenUsuario($login)
	{
		$sqlcomando = new MyPostSql();
		$sql = sprintf("SELECT usu.login
		FROM tbusuario usu
		WHERE usu.idusuario = %s", $this->idusuario);
		$sqlcomando->executarSELECTSimplesObjeto($sql, 'checarTokenUsuario');
		if($sqlcomando->getResultado() > 0)
		{
			$return = $sqlcomando->getArrayResultado();
			if($login != $return[0]['login']) //se o usuário do token for diferente do usuário que está logando, pega as informações do novo usuário.
			{
				// verifica se existe nome de usuario
				if($return2 = $this::getByLoginMyPostSql($login))
				{
					return $return2;
				}
				else
				{
					echo '2'; // usuario incorreto
					return false;
				}
			}
			else
			{
				return false;
			}
		}
	}

	public function setpermissoesusuario()
	{
		$sqlComand = new MyPostSql();
		//Primeiro verifico todos as autorizações do usuário.
		$sql = sprintf("SELECT usupermissao.idpermissao, usupermissao.permissao
		FROM tbusuariopermissoes usupermissao
		WHERE usupermissao.idusuario = %s
		ORDER BY usupermissao.idpermissao ASC", $this->idusuario);
		$sqlComand->executarSELECTSimplesObjeto($sql, 'alterarpermissoes');
		$result = $sqlComand->getArrayResultado();
		if($result > 0)
		{
			$this->arraypermissoes = $result;
		}
		else //se ele não tiver NENHUMA permissão, todas as permissoes serão inseridas para usuário baseado no que foi marcado para ser permitido, ou não.
		{
			$this->arraypermissoes = false;
		}
	}

	// Função responsável pela alteração de informações do usuário.
	public function alterarinformacoesusuario($usuarioalterador,$valoresalterados)
	{
		$this->setpermissoesusuario(); //pegando as permissoes do usuario.
		foreach ($this->permissoes as $key)
		{
			//A lógica vai ser que nem a do pedido, pego um de cada um, e vou verificando se tem autorização, ou não.
			$permissoesclass = transformarParaClasse($key, 'Permissoes');
			$permissoesclass->setidusuario($this->idusuario);
			$return = $permissoesclass->alterarpermissoes($this->arraypermissoes);
		}

		$separando =  strpos($this->nomelogradouro, ' '); //separando o endereço por espaço
		$tipologradouro = substr($this->nomelogradouro, 0, $separando); // pegando o tipo se é rua, psg avenida etc..
		$nomelogradouro = trim(substr($this->nomelogradouro, $separando, strlen($this->nomelogradouro))); // restante do endereço sem o tipo

		#region tratamento da foto
		if(isset($_FILES['file'])) //verifico se veio algo no files, se vier, é porquê é foto nova.
		{
			$foto = $_FILES['file']['name'];

			$extensao = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

			if(is_null($this->nome) || empty($this->nome))
			{
				return false;
			}

			$caminhoPasta = '';
			$pasta = "../imgusu/".$this->idusuario.'/';
			$linkFoto = '';
			$nomest = str_replace(" ", "_", $this->nome);
			$this->returnfoto = false;

			//redimensionando/comprimindo, e retirando os metadados da foto
			$fotodata = file_get_contents($_FILES['file']['tmp_name']);
			$fotosemmetadado = RemoverMetadadoImagem($fotodata);
			//RedimensionareComprimirFoto($fotosemmetadado);
			//file_put_contents($pasta.$nomest.'.'.$extensao, $fotoredimensionada);

			$caminhoPasta = 'http://tudointeligencia.com/usu/imgusu/'.$this->idusuario.'/';
			$linkFoto = 'usu/imgusu/'.$this->idusuario.'/'.$nomest.'.'.$extensao;
			//Faço a associação ao objeto

			if(!empty($caminhoPasta) && !empty($pasta) && !empty($linkFoto))
			{
				//Cria a pasta e manda o arquivo para lá
				if (!file_exists($pasta))
				{	 //se o diretório não existir cria um
					mkdir($pasta, 0755, true);
					$this->returnfoto = move_uploaded_file($_FILES['file']['tmp_name'], $pasta.$nomest.'.'.$extensao);
					//atribuindo o novo link da foto para alterar no banco, e assim exibir a nova foto.
					$this->fotoprofile = $linkFoto;
				}
				else
				{     	//move para o diretório criado
					$this->returnfoto = move_uploaded_file($_FILES['file']['tmp_name'], $pasta.$nomest.'.'.$extensao);
					//atribuindo o novo link da foto para alterar no banco, e assim exibir a nova foto.
					$this->fotoprofile = $linkFoto;
				}
			}

			if(!file_exists($pasta.'/'.$nomest.'.'.$extensao))
			{
				return false;
			}
		}

		#endregion

		$this->celular = str_replace('-', '', $this->celular);
		$this->celular = str_replace('(', '', $this->celular);
		$this->celular = str_replace(')', '', $this->celular);
		$this->celular = str_replace(' ', '', $this->celular);

		if(substr($this->celular, 0, 2 ) != "55")
		{
			$this->celular = '55'.$this->celular;
		}


		//variável temporária apenas para teste
		$sqlComand = new MyPostSql();

		$params = [$this->nome, $this->cpf, $this->rg, $this->pis, $this->email, $this->celular, $tipologradouro, $this->bairro, $this->municipio,
		$this->uf, $this->login, $this->senha, $this->fotoprofile, $this->status, $this->matricula, $this->datanascimento, $this->ctps,
		$this->cep, $this->estadocivil, $this->mae, $this->naturalidade, $this->nacionalidade, $this->complemento, $nomelogradouro,
		$this->pai, $this->numendereco, $this->rgemissor, $this->rguf, $this->titulo, $this->idusuario];

		$colunasValor = "nome,cpf,rg,pis,email,celular,logradouro,bairro,municipio,uf,login,senha,fotoprofile,status,matricula,datanascimento,ctps,cep,estadocivil,mae,naturalidade,nacionalidade,complemento,nomelogradouro,
		pai,numendereco,rgemissor,rguf,titulo";
		$colunasWhere = 'idusuario';
		$sqlComand->executarUPDATE('public.tbusuario', $colunasValor, $colunasWhere, $params);
		$result2 = $sqlComand->getResultado();
		if ($result2 > 0)
		{
			////// incluindo o histórico do cadastro do funcionário
			$descricaoevento = "Alteração das informações do funcionário.";
			$descricao = '<p><b>Alterações realizadas:</b></p>'.$valoresalterados.'<p><b>Descrição: </b></p>'.$descricaoevento;

			$this->dataregistro = date('Y-m-d');
			$dataevento = $this->dataregistro;
			$idevento = 44;
			$datafim = null;
			$dataalteracao = $this->dataregistro;
			$statushistorico = 'A';
			$iddocumento = 0;

			$params2 = [$this->idusuario, $usuarioalterador->getidusuario(), $this->dataregistro, $descricao, $dataevento, $this->idfuncao, $this->iddepartamento,
			$usuarioalterador->getidloja(), $this->salario, $idevento, $datafim, $statushistorico, $dataalteracao, $iddocumento];
			$nomecoluna2 = "idfuncionario, idusuario, datahistorico, historico, dataevento, idfuncao, iddepartamento, idloja, salario, idevento,
			datafim, status, dataalteracao, iddocumento";
			$nomefuncao2 = "insert historico";
			$sqlComand->executarINSERT('public.tbusuhistorico', $params2, $nomefuncao2, $nomecoluna2);
			if($sqlComand->getResultado() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	//Função responsável pela inserção do usuário ao sistema no tudointeligencia/aplicações.
	public function inserirusuario()
	{
		$separando = strpos($this->nomelogradouro, ' '); //separando o endereço por espaço
		$tipologradouro = substr($this->nomelogradouro, 0, $separando); // pegando o tipo se é rua, psg avenida etc..
		$nomelogradouro = trim(substr($this->nomelogradouro, $separando, strlen($this->nomelogradouro))); // restante do endereço sem o tipo

		if($this->periodoexperiencia === ""){$this->periodoexperiencia = null;}


		$pxid = $this->usuarioPXId(); // descubro qual vai ser o ID do novo colaborador

		if ($this->checaUsuarioCpf($this->cpf)) //checa se ja existe o colaborador no banco
		{
			$foto = $_FILES['file']['name']; // preparando para guardar a foto do colaborador
			if ($foto === "")
			{
				return false;
			}

			$extensao = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

			if(is_null($this->nome) || empty($this->nome))
			{
				return false;
			}

			$caminhoPasta = '';
			$pasta = "../imgusu/".$pxid.'/';
			$linkFoto = '';
			$nomest = str_replace(" ", "_", $this->nome);

			$caminhoPasta = 'localhost:8080/repositorios/tudo/tudointeligencia/usu/imgusu/'.$pxid.'/';  //caminho onde vai estar a foto
			$linkFoto = 'usu/imgusu/'.$pxid.'/'.$nomest.'.'.$extensao;

			if(!empty($caminhoPasta) && !empty($pasta) && !empty($linkFoto))
			{
				//Cria a pasta e manda o arquivo para lá
				if (!file_exists($pasta))
				{	 //se o diretório nãp existir cria um
					mkdir($pasta, 0755, true);
					move_uploaded_file($_FILES['file']['tmp_name'], $pasta.'/'.$nomest.'.'.$extensao);
				}
				else
				{     	//move para o diretório criado
					move_uploaded_file($_FILES['file']['tmp_name'], $pasta.'/'.$nomest.'.'.$extensao);
				}
			}
			if (!file_exists($pasta.'/'.$nomest.'.'.$extensao))
			{
				return false;
			}

			$this->dataregistro = date('Y-m-d H:i:s');
			$this->lastlogin = null;
			$this->demissao = null;
			$this->status = 'AB';
			//$this->matricula = 0;
			$comando = new MyPostSql();
			$this->profissao = "Comerciário";

			$params=array($this->nome, $this->cpf, $this->rg, $this->pis, $this->email, $this->celular, $tipologradouro, $this->bairro,
			$this->municipio, $this->uf, $this->admissao, $this->salario, $this->iddepartamento, $this->idfuncao, $this->login, $this->senha,
			$this->lastlogin, $this->dataregistro, $linkFoto, $this->status, $this->idloja, $this->demissao, $this->matricula, $this->datanascimento,
			$this->iniciojornada, $this->fimjornada, $this->intrajornada, $this->pontoeletronico, $this->iniciosextodia, $this->fimsextodia,
			$this->ultrapassadia, $this->ctps, $this->cep, $this->estadocivil, $this->mae, $this->profissao, $this->naturalidade, $this->nacionalidade,
			$this->complemento, $nomelogradouro, $this->pai, $this->numendereco, $this->rgemissor, $this->rguf, $this->titulo, $this->periodoexperiencia,
			$this->idregimecontrato, $this->pcd, $this->jornada);
			$nomecoluna = "nome, cpf, rg, pis, email, celular, logradouro, bairro, municipio, uf, admissao, salario, iddepartamento, idfuncao, login, senha, lastlogin,
						dataregistro, fotoprofile, status, idloja, demissao, matricula, datanascimento, iniciojornada, fimjornada, intrajornada, pontoeletronico,
						iniciosextodia, fimsextodia, ultrapassadia, ctps, cep, estadocivil, mae, profissao, naturalidade, nacionalidade, complemento, nomelogradouro,
						pai, numendereco, rgemissor, rguf, titulo, periodoexperiencia, idregimecontrato, pcd, jornada";
			$nomefuncao = "insert usuario";
			$colunaid = 'idusuario';
			$comando->executarINSERTlastid('public.tbusuario', $params, $nomefuncao, $nomecoluna, $colunaid);
			$result = $comando->getResultado();
			$idfuncionario = $comando->getLastId();
			if($result > 0)
			{
				////// incluindo o histórico do cadastro do funcionário
				$idusuario = preg_split('/["", ;]/', $_SESSION['usuario'])[6];
				$descricaoevento = "Colaborador Cadastrado";
				$dataevento = $this->dataregistro;
				$idevento = 12;
				$datafim = null;
				$dataalteracao = $this->dataregistro;
				$statushistorico = 'A';
				$iddocumento = 0;

				$params2=array($idfuncionario, $idusuario, $this->dataregistro, $descricaoevento, $dataevento, $this->idfuncao, $this->iddepartamento,
				$this->idloja, $this->salario, $idevento, $datafim, $statushistorico, $dataalteracao, $iddocumento);
				$nomecoluna2 = "idfuncionario, idusuario, datahistorico, historico, dataevento, idfuncao, iddepartamento, idloja, salario, idevento,
				datafim, status, dataalteracao, iddocumento";
				$nomefuncao2 = "insert historico";
				$comando->executarINSERT('public.tbusuhistorico', $params2, $nomefuncao2, $nomecoluna2);

				return true;
			}
			else
			{
				return false;
			}

		}
		else
		{

			echo 'NOT';
		}
	}

	public function getloginusuariobyid($idusuario)
	{
		$sqlcomando = new MyPostSql();

		$sql = "SELECT usu.login FROM tbusuario usu
		WHERE usu.idusuario = $idusuario";
		$sqlcomando->executarSELECTSimplesObjeto($sql, gerarNumeroUnico());
		if($sqlcomando->getResultado() > 0)
		{
			$arrayresultado = $sqlcomando->getArrayResultado();

			return $arrayresultado[0]['login'];
		}
	}

	public function inserirlogusuario($textolog, $idtipolog)
	{
		$sqlcomando = new MyPostSql();
		date_default_timezone_set('America/Belem');

		//início do código para fazer o insert do log do usuário..
		$tabela = 'public.tblogusuario';
		$params = ['idtipolog' => $idtipolog, 'idusuario' => $this->idusuario, 'log' => $textolog, 'data' => date('Y-m-d H:i:s')];

		foreach($params as $key => $value)
		{
			if(verificarSQLINJECTION($value))
			{
				echo 'NO_verificarSQLINJECTION_public.tbentrada';
				exit;
			}
		}


		$nomefuncao = 'salvarlogusuario'.gerarNumeroUnico();
		$colunas = array_keys($params);
		$colunas = implode(",", $colunas);

		$sqlcomando->executarINSERT($tabela, $params, $nomefuncao, $colunas);
		if($sqlcomando->getResultado() > 0)
		{
			return 'OK';
		}
		else
		{
			return 'NO';
		}
	}

}

class Permissoes
{
	protected $id;
	protected $idusuario;
	protected $descricao;
	protected $permitido;
	protected $listapermissaousuario;

	public function getlistapermissao()
	{
		return $this->listapermissaousuario;
	}

	public function setidusuario($idusuario)
	{
		$this->idusuario = $idusuario;
	}

	public function setpermissoesid($idusuario)
	{
		if(!is_numeric($idusuario))
		{
			return false;
		}
		$sql = sprintf("SELECT * FROM tbusuariopermissoes
		WHERE idusuario = %s
		AND permissao = true", $idusuario);

		$sqlcommand = new MyPostSql();
		$sqlcommand->executarSELECTSimplesObjetoRep($sql, gerarNumeroUnico());
		$listapermissoes = json_decode($this->listapermissoes());
		if($sqlcommand->getResultado() > 0)
		{
			$permissoes = $sqlcommand->getArrayResultado();
			for($i = 0; $i < count($listapermissoes); $i ++)
			{
				$permissao = false;
				foreach($permissoes as $key)
				{
					if($listapermissoes[$i]->id === $key['idpermissao'])
					{
						$permissao = true;
						break;
					}
				}
				$this->listapermissaousuario[$listapermissoes[$i]->descricao] = $permissao;
			}
		}
		else
		{
			foreach($listapermissoes as $key)
			{
				$this->listapermissaousuario[$key->descricao] = false;
			}
		}

	}

	public function listapermissoes()
	{
		$sqlComand = new MyPostSql();

		$sql = "SELECT * FROM tbpermissoes
		ORDER BY id ASC";
		$sqlComand->executarSELECTSimplesObjetoRep($sql, gerarNumeroUnico());
		$result = $sqlComand->getResultado();
		if($result > 0)
		{
			$return = $sqlComand->getArrayResultado();
			return json_encode($return);
		}
		else
		{
			return false;
		}
	}

	//Essa função vai receber parâmetros via objeto da classe usuario, para a alteração, ou criação de uma permissão.
	public function alterarpermissoes($arraypermissoes)
	{
		$sqlComand = new MyPostSql();

		//Se o usuario não tiver nenhuma permissão gravada no banco, todos irão ser gravados baseado nas escolhas na tela da alteração.
		if(count($arraypermissoes) == 0)
		{
			if($this->permitido == false)
			{
				$this->permitido = 'false';
			}
			$tabela = 'public.tbusuariopermissoes';
			$params = ['idusuario'=>$this->idusuario, 'idpermissao'=>$this->id, 'permissao'=>$this->permitido];

			foreach($params as $key => $value)
			{
				if(verificarSQLINJECTION($value))
				{
					echo 'NO';
					exit;
				}
			}

			//gerar número e letras randomicos para insert's sequenciais.
			$randomicotudo = gerarNumeroUnico();

			$idusuariofuncao = 'salvarnovaautorizacao'.$randomicotudo;
			$colunastudo = array_keys($params);
			$colunastudo = implode(",", $colunastudo);
			$sqlComand->executarINSERT($tabela, $params, $idusuariofuncao, $colunastudo);
			$result2 = $sqlComand->getResultado();
			if($result2 > 0)
			{
				return true;
			}
			else
			{
				echo 'erro ao inserir a permissao.';
				exit;
			}
		}
		else //se tiver alguma autorização, procede normalmente na verificação das autorizações já existentes.
		{
			foreach ($arraypermissoes as $key) //resultado das permissões do usuário..
			{
				if(in_array($this->id, $key)) //primeiro verifica se o idpermissao da vez tá no array de permissões do usuário.
				{
					//se o usuário tiver a permissão, altera...
					if($this->id == $key['idpermissao'])
					{
						//tratamento do false, pois o banco não reconhece o false do php.
						if($this->permitido == false){$this->permitido = 'false';}
						$tabela = 'public.tbusuariopermissoes';
						$params = [$this->permitido, $this->id, $this->idusuario];

						foreach($params as $key => $value)
						{
							if(verificarSQLINJECTION($value))
							{
								echo 'NO';
								exit;
							}
						}

						$colunasWhere = 'idpermissao, idusuario';
						$colunasValor = 'permissao';
						$sqlComand->executarUPDATERep($tabela, $colunasValor, $colunasWhere, $params, 'updatepedidoitem');
						$result2 = $sqlComand->getResultado();
						if($result2 > 0)
						{
							return true;
						}
						else
						{
							echo 'erro ao alterar permissao.';
							exit;
						}
					}
					else
					{
						if($this->permitido == false){$this->permitido = 'false';}
						$tabela = 'public.tbusuariopermissoes';
						$params = ['idusuario'=>$this->idusuario, 'idpermissao'=>$this->id, 'permissao'=>$this->permitido];

						foreach($params as $key => $value)
						{
							if(verificarSQLINJECTION($value))
							{
								echo 'NO';
								exit;
							}
						}

						//gerar número e letras randomicos para insert's sequenciais.
						$randomicotudo = gerarNumeroUnico();

						$idusuariofuncao = 'salvarnovaautorizacao'.$randomicotudo;
						$colunastudo = array_keys($params);
						$colunastudo = implode(",", $colunastudo);
						$sqlComand->executarINSERT($tabela, $params, $idusuariofuncao, $colunastudo);
						$result2 = $sqlComand->getResultado();
						if($result2 > 0)
						{
							return true;
						}
						else
						{
							echo 'erro ao inserir a permissao.';
							return false;
						}
					}

				}

			}
		}
	}
}

class HistoricoUsuario
{
	protected $idusuhistorico; //integer(PK-Serial)
	protected $idfuncionario; //integer
	protected $idusuario; //integer
	protected $datahistorico; //date
	protected $historico; //character varying
	protected $dataevento; //date
	protected $idfuncao; //integer
	protected $iddepartamento; //integer
	protected $idloja; //integer
	protected $salario; //numeric
	protected $idevento; //integer
	protected $datafim; //date
	protected $status; //character varying
	protected $dataalteracao; //date
	protected $iddocumento; //integer

	#region Funções GET

	// Método "get" para $IDUsuario
    public function getidusuhistorico()
    {
        return $this->idusuhistorico;
    }

    public function getidfuncionario()
    {
        return $this->idfuncionario;
    }

	public function getidusuario()
    {
        return $this->idusuario;
    }

	public function getdatahistorico()
    {
        return $this->datahistorico;
    }

	public function gethistorico()
    {
        return $this->historico;
    }

	public function getdataevento()
    {
        return $this->dataevento;
    }

	public function getidfuncao()
    {
        return $this->idfuncao;
    }

	public function getiddepartamento()
    {
        return $this->iddepartamento;
    }

	public function getidloja()
    {
        return $this->idloja;
    }

	public function getsalario()
    {
        return $this->salario;
    }

	public function getidevento()
    {
        return $this->idevento;
    }

	public function getdatafim()
    {
        return $this->datafim;
    }

	public function getstatus()
    {
        return $this->status;
    }

	public function getdataalteracao()
    {
        return $this->dataalteracao;
    }

	public function getiddocumento()
    {
        return $this->iddocumento;
    }
	#endregion

	public function atribuir($array)
    {
        $index = 'idusuhistorico';
        if(array_key_exists($index, $array))
        {
            $this->idusuhistorico = $array[$index];
        }

        $index = 'idfuncionario';
        if(array_key_exists($index, $array))
        {
            $this->idfuncionario = $array[$index];
        }

        $index = 'idusuario';
        if(array_key_exists($index, $array))
        {
            $this->idusuario = $array[$index];
        }

        $index = 'datahistorico';
        if(array_key_exists($index, $array))
        {
            $this->datahistorico = $array[$index];
        }

        $index = 'historico';
        if(array_key_exists($index, $array))
        {
            $this->historico = $array[$index];
        }

        $index = 'dataevento';
        if(array_key_exists($index, $array))
        {
            $this->dataevento = $array[$index];
        }

        $index = 'idfuncao';
        if(array_key_exists($index, $array))
        {
            $this->idfuncao = $array[$index];
        }

        $index = 'iddepartamento';
        if(array_key_exists($index, $array))
        {
            $this->iddepartamento = $array[$index];
        }

        $index = 'idloja';
        if(array_key_exists($index, $array))
        {
            $this->idloja = $array[$index];
        }

        $index = 'salario';
        if(array_key_exists($index, $array))
        {
            $this->salario = $array[$index];
        }

        $index = 'idevento';
        if(array_key_exists($index, $array))
        {
            $this->idevento = $array[$index];
        }

        $index = 'datafim';
        if(array_key_exists($index, $array))
        {
            $this->datafim = $array[$index];
        }

        $index = 'status';
        if(array_key_exists($index, $array))
        {
            $this->status = $array[$index];
        }

        $index = 'dataalteracao';
        if(array_key_exists($index, $array))
        {
            $this->dataalteracao = $array[$index];
        }

        $index = 'iddocumento';
        if(array_key_exists($index, $array))
        {
            $this->iddocumento = $array[$index];
        }

    }

	public function inserirhistorico()
	{

	}

	public function alterarhistorico()
	{

	}
}

?>
