<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Class jwtoken
{
    protected $id;
    protected $bearertoken;
    protected $status;

    #region GET'S
    public function getid()
	{
		return $this->id;
	}

    public function getbearertoken()
	{
		return $this->bearertoken;
	}

    public function getstatus()
	{
		return $this->status;
	}
    #endregion


	public function checkjwtoken($token)
	{
		$sqlcommand = new PosTudo();

		$tokenvalido = false;

		$sql = "SELECT * FROM tbchavejwt jwt
		WHERE jwt.status = 'true'";
		$sqlcommand->executarSELECTSimplesObjeto($sql, 'checkjwtoken');
		if($sqlcommand->getResultado() > 0)
		{
			$resulttokens = $sqlcommand->getArrayResultado();
			foreach ($resulttokens as $key)
			{
				if(in_array($token, $key))
				{
					$tokenvalido = true;
				}
			}

			return $tokenvalido;
		}
	}

	public function validaUsuarioToken($bearertoken)
    {
		//indicador caso o decode tenha dado certo/errado.
		$deucerto = false;

		//pegando apenas as secret's keys validas.
		$sqlcommand = new PosTudo();
		$sql = "SELECT jwt.bearertoken FROM tbchavejwt jwt
		WHERE jwt.status = 'true'";
		$sqlcommand->executarSELECTSimplesArrayNumerico($sql, 'selectjwtkey');

		if($sqlcommand->getResultado() > 0)// se teve resultado, é porquê há chaves validas no banco.
		{
			//vamos fazer um foreach para cada uma chave ativa no banco, para verificar qual é a correta para decodificar.
			$JWT = new JWT();
			$arraysecrets = $sqlcommand->getArrayResultado();
			foreach ($arraysecrets as $key)
			{
				//se a chave da vez não descriptografar, irá retornar um stdClass vazio.
				$decodedtoken = $JWT->decode($bearertoken, new Key($key[0], 'HS256'));
				if(count((array) $decodedtoken) > 0) //caso tenha vindo os parâmetros dentro da stdclass, sucesso, e a chave correta!
				{
					$deucerto = true;
					break;
				}
			}

			//caso a descriptografia tenha dado certo, apenas retornar os valores descriptografados.
			if($deucerto == true)
			{
				return $decodedtoken;
			}
			else //se não, vamos verificar..
			{
				return false;
			}

		}
		else //se caiu nessa excessão, é porquê não tem nenhuma chave valida ativa no banco.
		{
			return false;
		}

	}
}
?>
