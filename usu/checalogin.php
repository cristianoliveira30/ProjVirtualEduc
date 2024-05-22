<?php
include ('../../classe/usuario.php');
session_start();
include ('../../fphp/fphp.php');
include ('../../usu/php/validacao.php');
include ('../../classe/poscrud.php');
include ('../../classe/fornecedor.php');
include ('../../classe/postudo.php');

$msgErro = "<script> alert('Erro de conexão, tente novamente mais tarde!'); </script>"; 

$login = strtolower(trim(validarPOSTGETECHOCallBack('login', $msgErro)));
$operador =validarPOSTGETECHOCallBack('operador', $msgErro);

		$sqlComand = new PosTudo();
		$query = "SELECT login, idusuario from public.tbusuario where unaccent(login) ilike unaccent('$login')";
        $nomefuncao = md5($login);		
		$sqlComand->executarSELECT2ArrayNumericoNoBind($query, $nomefuncao);
		$result = $sqlComand->getResultado();
		if ($result > 0)
		{
			$nomebanco = strtolower($sqlComand->getArrayResultado()[0][0]);
			if($nomebanco === $login)
			{
				if ($operador === 'update')
				{
					$idfuncionario =validarPOSTGETECHOCallBack('idfuncionario', $msgErro);
					$idfuncionariobanco = $sqlComand->getArrayResultado()[0][1];
					if ($idfuncionario === $idfuncionariobanco)
					{
					   echo 'OK';
					}
					else
					{
						echo 'NO';
					}	
				}
				if ($operador === 'insert')
				{
					echo 'NO';
				}
			}
		     
		}
		else
		{
			echo 'OK';
		}       
		
?>