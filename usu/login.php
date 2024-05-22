<?php
include ('../../fphp/fphp.php');
include ('../../fphp/PassHash.php');
include ('../../classe/usuario.php');
include ('../../classe/postudo.php');
include ('../../classe/jwtoken.php');
//include ('../../classe/mycrud.php');
#region
include ('../../vendor/autoload.php');
use Firebase\JWT\JWT;


if (!isset($_SESSION))
{
    session_start();
}

/*ERROR MENSAGE OLD

NO = ERRO DE CONEXAO;
1 - Erro de Conexão
2 - Usuario não cadastrado
3 - Senha incorreta
4 - usuario bloqueado
5 - usuario não autorizado
6 - usuario de férias
7 - usuario de Licença
8 - usuario desligado
OK = OK_home.php
*/

/*STATUS FUNCIONÁRIO
AB - ATIVO BLOQUEADO
AE - ATIVO ESPECIAL
AF - ATIVO DE FÉRIAS
AL - ATIVO DE LICENÇA
AP - ATIVO COM ACESSO AO APP
AS - ATIVO COM ACESSO AO SITE
ASP - ATIVO COM ACESSO SITE E APP
D - DEMITIDO

*/

if (isset($_GET['accesscheck']))
{
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

$loginUsername = validarPOSTGETECHOCallBack('Login', "2");
$password = validarPOSTGETECHOCallBack('Senha', "3");
$bearertoken = validarPOSTGETECHOBool('bearertoken');

#region verificação de sqlinjection nas 2 primeiras informações de todo o site antes do login.
if(verificarSQLINJECTION($loginUsername) == true)
{
    exit("NO");
}

if(verificarSQLINJECTION($password) == true)
{
    exit("NO");
}
#endregion

$loginUsername = trim($loginUsername);
$lembrar = validarPOSTGETECHOBool('lembrar');

if($bearertoken != 'null') //se o usuário já tiver uma bearertoken, vamos verificar se ainda é válida.
{
	//o bearertoken não tá atualizando o novo, investigar.
	$jwtoken = new jwtoken();
	$returntoken = $jwtoken->validaUsuarioToken($bearertoken); //verificando se a bearertoken ainda é válida com as chaves ativas.
	if($returntoken != false) // se tiver tudo válido, atribuir as variáveis algumas informações para saber onde pertence o usuário. (dashboard)
	{
		$Usuario = transformarParaClasse($returntoken, 'Usuario');

		//aqui vou verificar se o token é da mesma pessoa que tá logando.
		$Usuario = $Usuario->checarTokenUsuario($loginUsername);
		if($Usuario)
		{
			// esses serão os parâmetros setados no cookie
			$idusuario = $Usuario->getIDUsuario();
			$funcao = $Usuario->getIDFuncao(); //pegando a função
			$loja = $Usuario->getIDLoja(); //pegando a loja
			$departamento = $Usuario->getIDDepartamento(); //pegando a função
			$status = $Usuario->getStatus();

			#buscando apenas as chaves válidas para encodar as informações com nossas secret's keys válidas.
			$sqlcommand = new MyPostSql();
			$sql = "SELECT jwt.bearertoken FROM tbchavejwt jwt
			WHERE jwt.status = 'true'";
			$sqlrand = gerarNumeroUnico();
			$sqlcommand->executarSELECTSimplesArrayNumericoRep($sql, 'selectjwtkey'.$sqlrand);

			if($sqlcommand->getResultado() > 0)
			{
				//aqui irei estar sorteando uma das chaves ativas aleatóriamente. para encodar o JWT.
				$result = $sqlcommand->getArrayResultado();
				$randomarray = array_rand($result);
				$secretKeyJwt = $result[$randomarray][0];
			}
			else //só ira cair nessa excessão, caso não haja NENHUMA secret key ativa no banco.
			{
				echo '9';
				return;
			}

			#region aqui, irei montar o payload, com as informações, e a função para encodar.
			$payload = [
				'idusuario'=>"$idusuario"
			];

			$encodejwt = JWT::encode($payload, $secretKeyJwt, 'HS256');
			#endregion
		}
		else
		{
			$Usuario->getByIdToken();

			$status = $Usuario->getStatus();
			$funcao = $Usuario->getIDFuncao(); //pegando a função
			$departamento = $Usuario->getIDDepartamento(); //pegando o departamento
			$loja = $Usuario->getIDLoja(); //pegando a loja

		}

	}
	else
	{
		echo '10';
		return;
	}
}
else // se ele não tiver uma bearertoken, vamos fazer uma pra ele, primeiramente verificando se ele existe no banco.
{
	// verifica se existe nome de usuario
	if($Usuario = Usuario::getByLoginPostudo($loginUsername))
	{
		// esses serão os parâmetros setados no cookie
		$idusuario = $Usuario->getIDUsuario();

		#buscando apenas as chaves válidas para encodar as informações com nossas secret's keys válidas.
		$sqlcommand = new MyPostSql();
		$sql = "SELECT jwt.bearertoken FROM tbchavejwt jwt
		WHERE jwt.status = 'true'";
		$sqlcommand->executarSELECTSimplesArrayNumerico($sql, 'selectjwtkey');
		if($sqlcommand->getResultado() > 0)
		{
			//aqui irei estar sorteando uma das chaves ativas aleatóriamente. para encodar o JWT.
			$result = $sqlcommand->getArrayResultado();
			$randomarray = array_rand($result);
			$secretKeyJwt = $result[$randomarray][0];
		}
		else //só ira cair nessa excessão, caso não haja NENHUMA secret key ativa no banco.
		{
			echo '9';
			return;
		}

		#region aqui, irei montar o payload, com as informações, e a função para encodar.
		$payload = [
			'idusuario'=>"$idusuario"
		];

		$encodejwt = JWT::encode($payload, $secretKeyJwt, 'HS256');
		#endregion
	}
	else
	{
		echo '2'; // usuario incorreto
		return false;
	}
}

if ($Usuario)
{
  	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}

	//montando um array para mandar encodado pro banco afins de criação de log.
	$arraylog = [];
	$arraylog['acao'] = 'Acessou o Site';
	$textolog = json_encode($arraylog);
  	$Usuario->inserirlogusuario($textolog, 1); //idtipolog = 1 (Login)

 	//Vamos fazer a verificação da senha
	switch($Usuario->getStatus())
	{
		case 'AB': // AB - ATIVO BLOQUEADO
			echo "4";
		break;

		case 'AE': // AE - ATIVO ESPECIAL (FORA DA FOLHA)
			echo "5";
		break;

		case 'AF': // AF - ATIVO DE FERIAS
			echo "6";
		break;

		case 'AL': // AL - ATIVO DE LICENÇA
			echo "7";
		break;

		case 'AP': // AL - ATIVO COM ACESSO AO APP
			echo "5";
		break;

		case 'AS': // AS - ATIVO COM ACESSO AO SITE

				//verificação da senha criptografada
				$validar = $Usuario->validar($password);
				if ($validar)
				{
					if($lembrar == 'on')
					{
						//Antes de setar o cookie, irei remover a senha da classe, por ser uma informação sensível.
						$Usuario->unsetSenha();

						//Ajusto a session e os cookies
						$_SESSION['usuario'] = serialize($Usuario);
						$Usuario->setbancolastlogin();
						setcookie('usuario', $_SESSION['usuario'], strtotime( '+5 days' ), '/');

					}
					else
					{
						//Antes de setar o cookie, irei remover a senha da classe, por ser uma informação sensível.
						$Usuario->unsetSenha();

						//Update a data de login
						$_SESSION['usuario'] = serialize($Usuario);
						$Usuario->setbancolastlogin();
					}
				}
				else
				{	//verificação da senha NÃO criptografada
					if($Usuario->checkWithoutHash($password))
					{
						//Crio uma senha hasheada
						$Usuario->setSenhaHash($Usuario->getSenha());

						//Update a data de login e a senha
						$Usuario->setBancoSenhaLastLogin();

						//Antes de setar o cookie, irei remover a senha da classe, por ser uma informação sensível.
						$Usuario->unsetSenha();

						//Ajusto a session e os cookies
						$_SESSION['usuario'] = serialize($Usuario);
						setcookie('usuario', $_SESSION['usuario'], strtotime( '+5 days' ), '/');


						if ($funcao == 14 || $funcao == 20 || $funcao == 5)
						{
							if($departamento == 7)
							{
								if(isset($encodejwt))
								{
									echo "OK&&#dashboardsimplesgerentes.php&&#$encodejwt";
								}
								else
								{
									echo "OK&&#dashboardsimplesgerentes.php";
								}
							}

						}

						if ($departamento != 7)
						{
							if(isset($encodejwt))
							{
								echo "OK&&#dashboardtotalpequena.php&&#$encodejwt";
							}
							else
							{
								echo "OK&&#dashboardtotalpequena.php";
							}
						}

					}
					else
					{
						echo "3"; // senha errada
					}
				}
		break;

		case 'ASP': // ATIVO COM ACESSO SITE E APP

			//ponteiro da validação
			$tudocerto = false;
			//Vamos fazer a verificação da senha criptografada
			$validar = $Usuario->validar($password);
			if ($validar)
			{
				//Antes de setar o cookie, irei remover a senha da classe, por ser uma informação sensível.
				$Usuario->unsetSenha();

				//Ajusto a session e os cookies
				$_SESSION['usuario'] = serialize($Usuario);

				if($lembrar == 'on')
				{
					setcookie('usuario', $_SESSION['usuario'], strtotime( '+5 days' ), '/');
				}


				$Usuario->setBancoLastLogin();
				$tudocerto = true;
			}
			elseif($Usuario->checkWithoutHash($password))
			{	//verificação da senha NÃO criptografada

				//Crio uma senha hasheada
				$Usuario->setSenhaHash($Usuario->getSenha());

				//Update a data de login e a senha
				$Usuario->setbancosenhalastlogin();

				//Antes de setar o cookie, irei remover a senha da classe, por ser uma informação sensível.
				$Usuario->unsetSenha();

				//Ajusto a session e os cookies
				$_SESSION['usuario'] = serialize($Usuario);

				if($lembrar == 'on')
				{
					setcookie('usuario', $_SESSION['usuario'], strtotime( '+5 days' ), '/');
				}


				$tudocerto = true;

			}
			else
			{
				echo "3"; // Senha errada
				$tudocerto = false;
			}

			if($tudocerto)
			{
				if($departamento == 7)
				{
					if ($funcao == 14 || $funcao == 20 || $funcao == 5)
					{
						if(isset($encodejwt))
						{
							echo "OK&&#dashboardsimplesgerentes.php&&#$encodejwt";
						}
						else
						{
							echo "OK&&#dashboardsimplesgerentes.php";
						}
					}
					else
					{
						//aqui não tem necessidade de dar unset na senha, pôs o mesmo já foi feito anteriormente.
						$Usuario->setMercadologico();
						$_SESSION['usuario'] = serialize($Usuario);
						if(isset($encodejwt))
						{
							echo "OK&&#dashboardsimplescolabmeta.php&&#$encodejwt";
						}
						else
						{
							echo "OK&&#dashboardsimplescolabmeta.php";
						}

					}
				}
				elseif ($departamento != 7)
				{
					if(isset($encodejwt))
					{
						echo "OK&&#dashboardtotalpequena.php&&#$encodejwt";
					}
					else
					{
						echo "OK&&#dashboardtotalpequena.php";
					}

				}
			}

		break;

		case 'D': // D - DEMITIDO
			echo "8";
		break;

	}// fim switch
}
else
{
  echo "2"; // login não encontrado
}
?>
