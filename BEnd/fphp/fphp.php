<?php

/**
 * Removes HTML tags e converte caracteres especiais pra entidades HTML em uma string html,
 * Ou seja, se mandarem um script malicioso , ele será convertido para string.
 * Obs: O exemplo dessa função só pode ser visto no fphp por conta de conter tags html.
 *
 *   Ex: "<script>alert('Hello');</script>" esta função irá converter os caracteres "<" e ">" 
 *   em suas entidades HTML correspondentes, resultando em "<script>alert('Hello');</script>"
 * @param string $input A string q pode conter ou n tags html.
 * @param string $encoding O conjunto de caracters usados na conversão (desabilita: UTF-8).
 * @return string Retorna o elemento de entrada sem suas caracteristicas de html.
 */
function noHTML($input, $encoding = 'UTF-8')
{
    return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);
}

/**
 * Verifica se o diretório existe e se for verdadeiro ele apaga tudo o que estiver
 * @param string $dir caminho do diretório. Ex: '../fotos/2024'
 * @return void Apaga todos os arquivos do diretório
 */
function apagarTudo ($dir)
{
    if (is_dir($dir))
    {
        $iterator = new \FilesystemIterator($dir);

        if ($iterator->valid())
        {
            $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
            $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

            foreach ( $ri as $file )
            {
                $file->isDir() ?  rmdir($file) : unlink($file);
            }
        }
    }
}

/**
 * Retorna a string codificado com os caracteres da base64.
 * @param mixed $str String a ser codificada
 * @return mixed Retorna a string codificada
 */
function codificar($str)
{
    $prfx = array('AFVxaIF', 'Vzc2ddS', 'ZEca3d1', 'aOdhlVq', 'QhdFmVJ', 'VTUaU5U',
                  'QRVMuiZ', 'lRZnhnU', 'Hi10dX1', 'GbT9nUV', 'TPnZGZz', 'ZGiZnZG',
                  'dodHJe5', 'dGcl0NT', 'Y0NeTZy', 'dGhnlNj', 'azc5lOD', 'BqbWedo',
                  'bFmR0Mz', 'Q1MFjNy', 'ZmFMkdm', 'dkaDIF1', 'hrMaTk3', 'aGVFsbG');
    for($i=0; $i<3; $i++)
    {
      $str = $prfx[array_rand($prfx)].strrev(base64_encode($str));
    }
    $str = strtr($str,
                 "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
                 "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2");
    return $str;
}

/**
 * Retorna a string decodificada da funcao codificar nativa do fphp com os caracteres da base64.
 * @param mixed $str String a ser decodificada
 * @return mixed Retorna a string decodificada
 */
function decodificar($str)
{
    $str = strtr($str,
               "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2",
               "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
    for($i=0; $i<3; $i++)
    {
      $str = base64_decode(strrev(substr($str,7)));
    }
    return $str;
}

/**
 * Faz a mesma coisa do decodificar mas verifica se tá vazia
 * @param string $str String a ser decodificada
 * @return string|false Se estiver vazia retorna false, senão retorna a string
 */
function decodificar2($str)
{
    $str = strtr($str,
               "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2",
               "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
    for($i=0; $i<3; $i++)
    {
      $str = base64_decode(strrev(substr($str,7)));
    }
    if(!empty($str))
    {
        return $str;
    }
    else
    {
        return false;
    }
}

/**
 * Verifica se o id codificado e o id não codificado são os mesmos sem precisar decodificar o parametro inteiro
 * @param string $IdCodificado id que está codificado
 * @param string $IdNCodificado id que está não codificado
 * @return true|false Retorna true se forem iguais e false se não forem
 */
function VerificarIdCodificado($IdCodificado, $IdNCodificado)
{
  $retorno = decodificar($IdCodificado);
  if($IdNCodificado == $retorno)
  {
    return true;
  }
  else
  {
    return false;
  }
}

/**
 * Transforma um número para número monetário br com duas casas decimais
 * @param string $str pode vim como string
 * @param bool $str pode vim como booleano
 * @return string retorna string numérica
 */
function NumeroMoeda($str)
{
    return number_format($str, 2, ',', '.');
}

/**
 * Transforma para número monetário brasileiro com a opção de escolher as casas decimais
 * @param mixed $numero Número que será transformado 
 * @param int $casasdecimais Número de casas decimais
 * @return string Retorna uma string numérica
 */
function NumeroBR($numero, $casasdecimais)
{
    $numero = number_format($numero, $casasdecimais, ',', '.');
    return $numero;
}

/**
 * Pega a variavel e retorna o número monetário brasileiro com duas casas decimais concatenado com 'R$' (quase a msm coisa do NumeroMoeda '-' )
 * Ex : Recebe '126566' e retorna 'R$ 1.265,66'
 * @param mixed $str recebe o valor
 * @return string Retorna o valor em formato de string numérica
 */
function NumeroMoedaReal($str)
{
    return 'R$ '. number_format($str, 2, ',', '.');
}

/**
 * Formata a data e hora do estilo estadunidense pro brasileiro(belenense)
 * @param string $str Recebe a data neste formato '2024-01-31 15:30:00'
 * @return string Retorna a data no formato '31/01/2024 15:30:00'
 */
function TransformaDataHoraBR($str)
{
    date_default_timezone_set('America/Belem');
    return date('d/m/Y H:i:s', strtotime($str));
}

/**
 * Transforma apenas a data do estilo estadunidense para o brasileiro(belenense)
 * @param string $str Recebe a data neste formato 'yyyy-mm-dd'
 * @return string Retorna a data no formato 'dd/mm/yyyy'
 */
function TransformaData($str)
{
    date_default_timezone_set('America/Belem');
    return date('d/m/Y', strtotime($str));
}

/**
 * Transforma a data do Brasil (Belenense) para o formato americano
 * @param string $str Data no formado 'dd/mm/yyyy'
 * @return string Retorna a data no formato 'yyyy-mm-dd'
 */
function TransformaDataAmericana($str)
{
    date_default_timezone_set('America/Belem');
    $date = date('Y-m-d', strtotime($str));
    return $date;
}

/**
 * Separa as datas por -
 * @param string $separador Componente que vai divir as datas
 * @param string $str Recebe a data em string
 * @return string|false  Retorna as datas 'yyyy-mm-dd' ou false
 */
function TransformaDataSeparador($separador, $str)
{
    date_default_timezone_set('America/Belem');

    $arrayData = explode($separador, $str);
    if(count($arrayData) == 3)
    {
        $dia = (int)$arrayData[0];
        $mes = (int)$arrayData[1];
        $ano = (int)$arrayData[2];

        //testa se a data é válida
        if(!checkdate($mes, $dia, $ano))
        {
            return false;
        }
        else
        {
            return "$ano-$mes-$dia";
        }
    }

}

/**
 * Retorna a Data separada em um array
 * @param string $separador Componente que vai divir as datas
 * @param string $str Recebe a data em string
 * @return array|false Retorna em um array com os 3 valores ou false
 */
function TransformaDataSeparadorArray($separador, $str)
{
    date_default_timezone_set('America/Belem');

    $arrayData = explode($separador, $str);
    if(count($arrayData) == 3)
    {
        $dia = (int)$arrayData[0];
        $mes = (int)$arrayData[1];
        $ano = (int)$arrayData[2];

        //testa se a data é válida
        if(!checkdate($mes, $dia, $ano))
        {
            return false;
        }
        else
        {
            return [$ano,$mes,$dia];
        }
    }

}

/**
 * Recebe uma consulta e retorna em array
 * @param mixed $Statement Recebe a consulta
 * @return array Retorna o resultado da consulta em linhas
 */
function get_result( $Statement )
{
    $Statement->execute();
    $RESULT = array();
    $Statement->store_result();
    for ( $i = 0; $i < $Statement->num_rows; $i++ )
    {
        $Metadata = $Statement->result_metadata();
        $PARAMS = array();
        while ( $Field = $Metadata->fetch_field() )
        {
            $PARAMS[] = &$RESULT[ $i ][ $Field->name ];
        }
        call_user_func_array( array( $Statement, 'bind_result' ), $PARAMS );
        $Statement->fetch();
    }
    return $RESULT;
}

// FUNCAO LEGADO
// function transformKeys($data)
// {
//     if(!is_null($data) && (is_array($data) || is_object($data)))
//     {
//         $values = array_values($data);
//         $array = [];
//         for ($i=0; $i < count($values) ; $i++)
//         {
//             $array[] = $values[$i];
//         }
//         return $array;
//     }
//     else
//     {
//         return null;
//     }

// }

/**
 * Verifica se encontra a segunda variavel no inicio da primeira
 * @param string $haystack String inteiro onde vai ser procurado 
 * @param string $needle String que sera procurada
 * @return true|false  Retorna true se tiver no inicio e false se nao
 */
function startsWith($haystack, $needle)
{
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

// FUNCAO LEGADO
// function preg_match_startswith($haystack, $needle)
// {
//     return preg_match('~' . preg_quote($needle, '~') . '~A', $haystack) > 0;
// }

// FUNCAO LEGADO
// function substr_compare_startswith($haystack, $needle)
// {
//     return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
// }

// FUNCAO LEGADO
// function strpos_startswith($haystack, $needle)
// {
//     return strpos($haystack, $needle) === 0;
// }

// FUNCAO LEGADO
// function strncmp_startswith($haystack, $needle)
// {
//     return strncmp($haystack, $needle, strlen($needle)) === 0;
// }

// FUNCAO LEGADO
// function strncmp_startswith2($haystack, $needle)
// {
//     return $haystack[0] === $needle[0]
//         ? strncmp($haystack, $needle, strlen($needle)) === 0
//         : false;
// }

///FUNCOES DE VALIDACAO POST GET
function validarPOSTGETECHO($Parametro, $msgErro)
{
    if (array_key_exists($Parametro, $_POST))
    {
        $Parametro = $_POST[$Parametro];
        if(isset($Parametro) && !empty($Parametro))
        {
            return true;
        }
        else
        {
            echo $msgErro;
            exit;
        }
    }
    elseif (array_key_exists($Parametro, $_GET))
    {
        $Parametro = $_GET[$Parametro];
        if(isset($Parametro) && !empty($Parametro))
        {
            return true;
        }
        else
        {
            echo $msgErro;
            exit;
        }
    }
    else
    {
        echo $msgErro;
        exit;
    }
}

/**
 * Valida o parametro OPCIONAl e retorna string ou false
 * @param string  $Parametro Nome do Parametro a ser verificado.
 * @return string|false Retorna o valor do parametro ou false
 */
function validarPOSTGETECHOBool($Parametro)
{
    if (array_key_exists($Parametro, $_POST))
    {
        $Parametro = $_POST[$Parametro];
        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        else
        {
            return false;
        }
    }
    elseif (array_key_exists($Parametro, $_GET))
    {
        $Parametro = $_GET[$Parametro];
        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
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

/**
 * Valida o parametro OBRIGATÓRIO e retorna a string ou uma mensagem de erro
 * @param string $Parametro Nome do parametro a ser verificado
 * @param string $msgErro Mensagem de erro caso de errado
 * @return string Retorna ou o valor do parametro ou a msg de erro
 */
function validarPOSTGETECHOCallBack($Parametro, $msgErro)
{
    if (array_key_exists($Parametro, $_POST))
    {
        $Parametro = $_POST[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        elseif($Parametro == 0)
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        elseif($Parametro == "")
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }

        else
        {
            echo $msgErro;
            exit;
        }
    }
    elseif (array_key_exists($Parametro, $_GET))
    {
        $Parametro = $_GET[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        elseif($Parametro == 0)
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        elseif($Parametro == "")
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        else
        {
            echo $msgErro;
            exit;
        }
    }
    else
    {
        echo $msgErro;
        exit;
    }
}

function validarPOSTGETECHOCallBackMSlink($Parametro)
{
    if (array_key_exists($Parametro, $_POST))
    {
        $Parametro = $_POST[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        elseif($Parametro == 0)
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        else
        {
            header("location: https://www.mslink.me");
            exit;
        }
    }
    elseif (array_key_exists($Parametro, $_GET))
    {
        $Parametro = $_GET[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            if(is_array($Parametro))
            {
                return $Parametro;
            }
            else
            {
                return strip_tags($Parametro);
            }
        }
        else
        {
            echo "no";
            exit;
        }
    }
    else
    {
        echo "no";
        exit;
    }
}

/**
 * Valida e decodifica o parametro OBRIGATÓRIO e retorna a string ou uma mensagem de erro
 * @param string $Parametro Nome do parametro a ser verificado
 * @param string $msgErro Mensagem de erro caso de errado
 * @return string Retorna ou o valor do parametro ou a msg de erro
 */
function validarDecodificarPOSTGETECHOCallBack($Parametro, $msgErro)
{
    if (array_key_exists($Parametro, $_POST))
    {
        $Parametro = $_POST[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            $Parametro = decodificar($Parametro);
            if((!empty($Parametro)  || $Parametro === "0"))
            {
                if(is_array($Parametro))
                {
                    return $Parametro;
                }
                else
                {
                    return strip_tags($Parametro);
                }
            }
            else
            {
                echo $msgErro;
                exit;
            }
        }
        else
        {
            echo $msgErro;
            exit;
        }
    }
    elseif (array_key_exists($Parametro, $_GET))
    {
        $Parametro = $_GET[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            $Parametro = decodificar($Parametro);
            if((!empty($Parametro)  || $Parametro === "0"))
            {
                if(is_array($Parametro))
                {
                    return $Parametro;
                }
                else
                {
                    return strip_tags($Parametro);
                }
            }
            elseif($Parametro == 0)
            {
                if(is_array($Parametro))
                {
                    return $Parametro;
                }
                else
                {
                    return strip_tags($Parametro);
                }
            }
            else
            {
                echo $msgErro;
                exit;
            }
        }
        else
        {
            echo $msgErro;
            exit;
        }
    }
    else
    {
        echo $msgErro;
        exit;
    }
}

/**
 * Valida e decodifica o parametro OPCIONAl e retorna string ou false
 * @param string  $Parametro Nome do Parametro a ser verificado.
 * @return string|false Retorna o valor do parametro ou false
 */
function validarDecodificaPOSTGETECHOBool($Parametro)
{
    if (array_key_exists($Parametro, $_POST))
    {
        $Parametro = $_POST[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            $Parametro = decodificar($Parametro);
            if((!empty($Parametro)  || $Parametro === "0"))
            {
                if(is_array($Parametro))
                {
                    return $Parametro;
                }
                else
                {
                    return strip_tags($Parametro);
                }
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
    elseif (array_key_exists($Parametro, $_GET))
    {
        $Parametro = $_GET[$Parametro];

        if(isset($Parametro) && (!empty($Parametro)  || $Parametro === "0"))
        {
            $Parametro = decodificar($Parametro);
            if((!empty($Parametro)  || $Parametro === "0"))
            {
                if(is_array($Parametro))
                {
                    return $Parametro;
                }
                else
                {
                    return strip_tags($Parametro);
                }
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
    else
    {
        return false;
    }
}

// FUNCAO LEGADO
// function fixOrientation($filename, $orientacao) {

//     $image = imagecreatefromjpeg($filename);
//     $exif = exif_read_data($filename,  null, true, false);
//     if (!empty($exif['Orientation']))
//     {
//         switch ($exif['Orientation'])
//         {
//             case 3:
//                 $image = imagerotate($image, 180, 0);
//                 break;
//             case 6:
//                 $image = imagerotate($image, -90, 0);
//                 break;
//             case 8:
//                 $image = imagerotate($image, 90, 0);
//                 break;
//         }
//     }
//     else
//     {
//         switch ($orientacao)
//         {
//             case 3:
//                 $image = imagerotate($image, 180, 0);
//                 break;
//             case 6:
//                 $image = imagerotate($image, -90, 0);
//                 break;
//             case 8:
//                 $image = imagerotate($image, 90, 0);
//                 break;
//         }
//     }

//     imagejpeg($image, $filename);

// }

///função para salvar direito a moeda no banco

// FUNCAO NATIVA
// function Salario($Salario) {
//     $verificaPonto = ".";
//     if(strpos("[".$Salario."]", "$verificaPonto")):
//         $Salario = str_replace('.','', $Salario);
//         $Salario = str_replace(',','.', $Salario);
//         else:
//           $Salario = str_replace(',','.', $Salario);
//     endif;

//     return $Salario;
// }

//Encurtamento de Link por bit

// FUNCAO LEGADO
// function gerarShort($link)
// {
//    /* include ('bitly.php');
//     //Rotina de Encurtamento
//     $code ='f5123f2463c6aa7a77be6edb4709e132c3ff5f65';
//     $clienteID ='f70c2562e928dfecd6733f71403839365a90007b';
//     $clienteSecret ='01ea9626939f74b2c3631c75c0ea43b516ac3ef2';
//     $token = '2cebe4aa24f2684b2302c0728014681da019d887';
//     $bitly = new Bitly($clienteID, $clienteSecret, $token);
//     $urlShort = $bitly->shorten($link, null);
//     $shortlink = $urlShort['url'];
//     return $shortlink;
//     */
// }


// function bindDinamically($params)
// {
//     // This will loop through params, and generate types. e.g. 'ss'
//     $types = '';
//     foreach($params as $param)
//     {
//         if(is_int($param))
//         {
//             $types .= 'i';//integer
//         }
//         elseif (is_float($param))
//         {
//             $types .= 'd';//double
//         }
//         elseif (is_string($param))
//         {
//             $types .= 's';              //string
//         }
//         else
//         {
//             $types .= 'b';              //blob and unknown
//         }
//     }
//     array_unshift($params, $types);
//     return $params;
// }

function contaParametros($query)
{
    $totalParam = substr_count( $query , "?");
    return $totalParam;
}

function refValues($arr)
{
    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    return $arr;
}

function sendEmail($destino, $body, $titulo){
    //chamando a classe para enviar o email
        require_once '../mail/class.phpmailer.php';
        require_once '../mail/class.smtp.php';

        $mail = new PHPMailer ();
        $mail -> From = "contato@msmercado.com";
        $mail -> FromName = "MSmercado";
        $mail -> AddAddress ($destino);
        $mail -> Subject = $titulo;
        $mail -> Body = $body;


        $mail -> IsHTML (true);
        $mail -> IsSMTP();
        $mail -> Host = 'mail.msmercado.com';
        $mail -> Port = 587;
        $mail -> SMTPAuth = true;
        $mail -> Username = 'contato@msmercado.com';
        $mail -> Password = 'mss171014';
        $mail -> CharSet = 'UTF-8';

        if(!$mail->Send())
        {
			return true;
		}
        else
        {
			return false;
        }

}

//Exclusivo do Tudo Inteligencia

function pegaCurva($idproduto, $CurvaA, $CurvaB, $CurvaC)
{
    $curva = "SG";

    if(in_array($idproduto, $CurvaA))
    {
        $curva = "A";

    }

    if(in_array($idproduto, $CurvaB))
    {
        $curva = "B";
    }

    if(in_array($idproduto, $CurvaC))
    {
        $curva = "C";

    }

    return $curva;

}

function linear_regression($x, $y)
{
    // calculate number points
    $n = count($x);

    // ensure both arrays of points are the same size
    if ($n != count($y)) {

      trigger_error("linear_regression(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);

    }

    if($n <= 1)
    {
        echo 'VAZIO';
        exit;
    }

    // calculate sums
    $x_sum = array_sum($x);
    $y_sum = array_sum($y);

    $xx_sum = 0;
    $xy_sum = 0;

    for($i = 0; $i < $n; $i++) {

      $xy_sum+=($x[$i]*$y[$i]);
      $xx_sum+=($x[$i]*$x[$i]);

    }
      // calculate slope
    $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));

    // calculate intercept
    $b = ($y_sum - ($m * $x_sum)) / $n;

    // return result
    return array("m"=>$m, "b"=>$b);
}


function mediamovel ($x, $periodo)
{
    //cria o array de retorno
    $arraymedias = [];

    //cria o array da janela
    $arrayjanela = [];

    //faz o laço da função para o cálculo
    foreach ($x as $key => $value)
    {
        //a média móvel será de um determinado periodo.
        //assim uma vez que o período é atingido, a janela de cálculo deve mudar

        if( count($arrayjanela) >= $periodo)
        {
            //retira o primeiro elemento do array
            array_shift($arrayjanela);
        }

        $arrayjanela[] = (float) $value;

        $soma = array_sum($arrayjanela);
        $mediamovel = $soma / count($arrayjanela);

        $arraymedias[] = round($mediamovel,2);

    }
    return $arraymedias;
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
// Exemplo de uso
$numeroUnico = gerarNumeroUnico();

function formatarCNPJ($cnpj)
{
    $formattedCnpj = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12);
    return $formattedCnpj; // Saída: 12.345.678/9012-34
}

function formatarCEP($numero) {
    $formatado = substr($numero, 0, 5) . '-' . substr($numero, 5, 3);

    return $formatado;
}


  Class QueryTipoTempo
  {
      protected $dia;
      protected $diaMysql;
      protected $semana;
      protected $semanaMysql;
      protected $mes;
      protected $mesespecifico;
      protected $mesMysql;
      protected $ano;
      protected $anoMysql;
      protected $dow;
      protected $diadeterminado;



      public function atribuirDia($query)
      {
          $this->dia = $query;
      }

      public function atribuirDiaDeterminado($query)
      {
          $this->diadeterminado = $query;
      }

      public function atribuirDOW($query)
      {
          $this->dow = $query;
      }

      public function atribuirDiaMysql($query)
      {
          $this->diaMysql = $query;
      }

      public function atribuirSemana($query)
      {
          $this->semana = $query;
      }

      public function atribuirSemanaMysql($query)
      {
          $this->semanaMysql = $query;
      }

      public function atribuirMes($query)
      {
          $this->mes = $query;
      }

      public function atribuirMesMysql($query)
      {
          $this->mesMysql = $query;
      }

      public function atribuirMesEspecifico($query)
      {
          $this->mesespecifico = $query;
      }

      public function atribuirAno($query)
      {
          $this->ano = $query;
      }

      public function atribuirAnoMysql($query)
      {
          $this->anoMysql = $query;
      }


      public function getDia()
      {
          return $this->dia;
      }

      public function getDiaDeterminado()
      {
          return $this->diadeterminado;
      }

      public function getDiaMysql()
      {
          return $this->diaMysql;
      }

      public function getSemana()
      {
          return $this->semana;
      }

      public function getSemanaMysql()
      {
          return $this->semanaMysql;
      }

      public function getMes()
      {
          return $this->mes;
      }

      public function getMesEspecifico()
      {
          return $this->mesespecifico;
      }

      public function getMesMysql()
      {
          return $this->mesMysql;
      }

      public function getAno()
      {
          return $this->ano;
      }

      public function getAnoMysql()
      {
          return $this->anoMysql;
      }

      public function getDOW()
      {
          return $this->dow;
      }

  }

//Funcao para voltar o trecho da Query tipo tempo utilizada nos dashboards e relatorios
function TipoTempo($tipotempo, $periodo, $numeromes = null)
{
    
    $query = new QueryTipoTempo();


    $mesAtual = (int) date('m');
    $anoAtual = (int) date('y');

    $hoje = date('y-m-d');

    switch ($periodo)
    {
        case 'dia':

            switch ($tipotempo)
            {
                case 'atual':
                    $query->atribuirDia("Current_Date "); //hoje
                    $query->atribuirDiaMysql("CURRENT_DATE "); //hoje
                    $query->atribuirMes("extract('month' from Current_Date) "); //mes atual
                    $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                    $query->atribuirDOW("extract('dow' from Current_Date) "); //ano atual

                    break;

                case 'passada':

                    $query->atribuirDia("Current_Date - interval '1 day'"); //ontem
                    $query->atribuirDiaMysql("CURRENT_DATE  - INTERVAL 1 DAY"); //ontem
                    $query->atribuirMes("extract('month' from Current_Date - interval '1 month') "); //mes passado
                    $query->atribuirDOW("extract('dow' from Current_Date - '1 day'::interval) "); //ano atual
                    if($mesAtual == 1)
                    {
                        $query->atribuirAno("extract('year' from Current_Date) - 1 "); //ano passado
                    }
                    else
                    {
                        $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                    }
                    break;
            }

            break;

        case 'diadeterminado':

            $query->atribuirDia("'$tipotempo'"); //aqui passa o parâmetro todo da data. Ex:(2023-01-01)
            $dow = date('w', strtotime($tipotempo));
            $query->atribuirDOW("$dow");

            break;

        case 'semana':

            switch ($tipotempo)
            {
                case 'atual':
                    $query->atribuirSemana("extract('week' from Current_Date) "); //semana atual
                    $query->atribuirSemanaMysql("WEEK(CURRENT_DATE)"); //semana atual
                    $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                    $query->atribuirAnoMysql("YEAR(CURRENT_DATE)"); //ano atual
                    break;

                case 'passada':

                    $primeirodiadoano = new DateTime($anoAtual.'-01-01');
                    $hoje = new DateTime($hoje);
                    $diffData = $primeirodiadoano->diff($hoje);

                    $query->atribuirSemana("extract('week' from Current_Date) - 1"); //semana passada
                    $query->atribuirSemanaMysql("WEEK(CURRENT_DATE) -1 "); //semana atual
                    if($mesAtual == 1 && $diffData->d <= 7)
                    {
                        $query->atribuirAno("extract('year' from Current_Date) - 1 "); //ano passado
                        $query->atribuirAnoMysql("YEAR(CURRENT_DATE) - 1"); //ano atual
                    }
                    else
                    {
                        $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                        $query->atribuirAnoMysql("YEAR(CURRENT_DATE)"); //ano atual
                    }

                    break;
            }

            break;

        case 'mes':
            //refatorar esse período do mês, para reconhecer qualquer mês que o usuário escolher.
            switch ($tipotempo)
            {
                case 'atual':
                    $query->atribuirMes("extract('month' from Current_Date) "); //mes atual
                    $query->atribuirMesMysql("MONTH(CURRENT_DATE)"); //semana atual

                    $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                    $query->atribuirAnoMysql("YEAR(CURRENT_DATE)"); //ano atual
                    break;

                case 'passada':
                    $query->atribuirMes("extract('month' from Current_Date - interval '1 month') "); //mes passado
                    $query->atribuirMesMysql("MONTH(CURRENT_DATE - INTERVAL 1 MONTH)"); //semana atual
                    if($mesAtual == 1)
                    {
                        $query->atribuirAno("extract('year' from Current_Date) - 1 "); //ano passado
                        $query->atribuirAnoMysql("YEAR(CURRENT_DATE) - 1"); //ano atual
                    }
                    else
                    {
                        $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                        $query->atribuirAnoMysql("YEAR(CURRENT_DATE)"); //ano atual
                    }

                    break;

                case 'retrasado':
                    $query->atribuirMes("extract('month' from Current_Date - interval '2 month') "); //mes retrasado
                    $query->atribuirMesMysql("MONTH(CURRENT_DATE - INTERVAL 2 MONTH)"); //semana atual
                    if($mesAtual == 1 || $mesAtual == 2)
                    {
                        $query->atribuirAno("extract('year' from Current_Date) - 1 "); //ano passado
                        $query->atribuirAnoMysql("YEAR(CURRENT_DATE) - 1"); //ano atual
                    }
                    else
                    {
                        $query->atribuirAno("extract('year' from Current_Date) "); //ano atual  
                        $query->atribuirAnoMysql("YEAR(CURRENT_DATE)"); //ano atual
                    }

                    break;
            }
            break;

        case 'mesdeterminado':

            if(!is_array($tipotempo))
            {
                $tipotempo = (array) json_decode($tipotempo);
            }
            
            $query->atribuirMes($tipotempo['mes']);
            $query->atribuirAno($tipotempo['ano']);

            break;


        case 'ano':

            switch ($tipotempo)
            {
                case 'atual':
                    $query->atribuirAno("extract('year' from Current_Date) "); //ano atual
                    break;

                case 'passada':
                    $query->atribuirAno("extract('year' from Current_Date) -1 "); //ano passado
                    break;
            }

            break;

        default:
            # code...
            break;
    }

    return $query;

}

function pegaMesAbreviado($data)
{
    $mes = date('m', strtotime($data));
    
    switch ($mes)
    {
        case '01': return 'Jan';
        case '02': return 'Fev';
        case '03': return 'Mar';
        case '04': return 'Abr';
        case '05': return 'Mai';
        case '06': return 'Jun';
        case '07': return 'Jul';
        case '08': return 'Ago';
        case '09': return 'Set';
        case '10': return 'Out';
        case '11': return 'Nov';
        case '12': return 'Dez';
        default: return false;
    }
}

function pegaMesCompleto($data)
{
    $mes = date('m', strtotime($data));
    
    switch ($mes)
    {
        case '01': return 'Janeiro';
        case '02': return 'Fevereiro';
        case '03': return 'Março';
        case '04': return 'Abril';
        case '05': return 'Maio';
        case '06': return 'Junho';
        case '07': return 'Julho';
        case '08': return 'Agosto';
        case '09': return 'Setembro';
        case '10': return 'Outubro';
        case '11': return 'Novembro';
        case '12': return 'Dezembro';
        default: return false;
    }

}

function verificarSQLINJECTION($texto)
{
    $palavras_chave = array('SELECT', 'DROP', 'TRUNCATE', 'UPDATE', 'DELETE', 'FROM', 'WHERE', 'UNION');

    $padrao = '/\b(' . implode('|', $palavras_chave) . ')\b/i';

    return preg_match($padrao, $texto) === 1;
}


// function pegavalorpordata($data, array $arraybuscado)
// {
//     $data = date('Y-n-j', strtotime($data));
//     $venda = 0;
//     $mediamovel = 0;

//     foreach($arraybuscado as $key => $value)
//     {
//         $databuscada = date('Y-n-j', strtotime($value[0]));
//         if($data == $databuscada)
//         {
//             $venda = $value[1];
//             if(isset($value[2]))
//             {
//                 $mediamovel = $value[2];
//             }
//             break;
//         }
//     }

//     $retorno = [$venda, $mediamovel];
//     return $retorno;
// }

function pegavalorpordata($data, array $arraybuscado)
{
    $data = date('Y-n-j', strtotime($data));

    $retorno = array_fill(0, 10, 0);

    foreach($arraybuscado as $key => $value)
    {
        $databuscada = date('Y-n-j', strtotime($value[0]));
        if($data == $databuscada)
        {
            for($i = 0; $i < count($value) - 1; $i++)
            {
                $retorno[$i] = $value[$i+1];
            }
            break;
        }
    }

    return $retorno;
}

//jsonstring = o json recebido
//$class o nome, em string, da classe
function decodeJsonToClass($jsonstring, $class)
{
    $json = json_decode($jsonstring, true);
    $reflection = new ReflectionClass($class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $keys = array_keys($json);

    foreach ($keys as $property)
    {
        $propertyObj = $reflection->getProperty($property);
        $propertyObj->setAccessible(true);
        $propertyObj->setValue($instance, $json[$property]);
        $propertyObj->setAccessible(false);
    }

    return $instance;
}

//stdClassObj = o json recebido decodado que foi transformado em objeto
//$class o nome, em string, da classe
function transformarParaClasse($stdClassObj, $classeNome)
{
    $reflectionClass = new ReflectionClass($classeNome);
    $classeObj = $reflectionClass->newInstanceWithoutConstructor();

    $reflectionProperties = $reflectionClass->getProperties();

    foreach ($reflectionProperties as $property)
    {
        $propertyName = $property->getName();
        if (property_exists($stdClassObj, $propertyName))
        {
            $property->setAccessible(true);
            $property->setValue($classeObj, $stdClassObj->$propertyName);
            $property->setAccessible(false);
        }
    }
    return $classeObj;
}

function getvalorpropriedade($object, $propriedade)
{
    $valor = false;

    $reflectionClass = new ReflectionClass(get_class($object));

    foreach ($reflectionClass->getProperties() as $property)
    {
        if($property->getName() == $propriedade)
        {
            $property->setAccessible(true);
            $valor =  $property->getValue($object);
            $property->setAccessible(false);
            break;
        }
    }

    return $valor;
}

/**
 * Retonado quantos de um determinado dia da semana há em um certo periodo
 * @param string $tipotempo Mesmo tipo tempo passado para query temporal
 * @param int dowDoDia dow do dia (0 - 6) sendo 0 para domingo e 6 para sabado
 */
function contardias($tipotempo, $dowDoDia)
{
    switch($tipotempo)
    {
        case 'atual':
            $pd = date('Y-m-d', strtotime('first day of this month'));
            $ud = date('Y-m-d');
            break;
        case 'passada':
            $pd = date('Y-m-d', strtotime('first day of this month -1 month'));
            $ud = date('Y-m-d', strtotime('last day of this month -1 month'));
            break;
        case 'retrasado':
            $pd = date('Y-m-d', strtotime('first day of this month -2 month'));
            $ud = date('Y-m-d', strtotime('last day of this month -2 month'));
            break;
        default:
            $json = json_decode($tipotempo);
            $pd = TransformaDataSeparador('/', $json[0]);
            $ud = TransformaDataSeparador('/', $json[1]);
            break;
    }

    $primeiradata = new DateTime($pd);
    $ultimadata = new DateTime($ud);
    $intervalo = new DateInterval('P1D');
    $periodo = new DatePeriod($primeiradata, $intervalo, $ultimadata);

    $dias = 0;
    foreach($periodo as $data)
    {
        if($data->format('w') == $dowDoDia)
        {
            $dias++;
        }
    }
    return $dias;
}

/**
 * Remove MetaDados de fotos.
 * @param string $foto é a foto que será recebido para tratar, e remover metadados da imagem.
 */
function RemoverMetadadoImagem($foto)
{
    $imageStream = imagecreatefromstring($foto);
    $largurafoto = imagesx($imageStream);
    $alturafoto = imagesy($imageStream);

    $novafoto = imagecreatetruecolor($largurafoto, $alturafoto);

    imagecopyresampled($novafoto, $imageStream, 0, 0, 0, 0, $largurafoto, $alturafoto, $largurafoto, $alturafoto);

    ob_start();
    imagejpeg($novafoto, null, 100);
    $novafotodata = ob_get_clean();
    imagedestroy($imageStream);
    imagedestroy($novafoto);

    return $novafotodata;
}

/**
 * Redimensiona a foto em um padrão de altura, e largura, para diminuir o tamanho do arquivo (foto)
 * @param string $foto é a foto em que será redimensionado.
 */
function RedimensionareComprimirFoto($foto)
{
    $imageStream = imagecreatefromstring($foto);

    $novotamanhofoto = imagecreatetruecolor(800, 600);

    imagecopyresampled($novotamanhofoto, $imageStream, 0, 0, 0, 0, 800, 600, imagesx($imageStream), imagesy($imageStream));

    ob_start();
    imagejpeg($novotamanhofoto, $_FILES['file']['tmp_name'], 75);
    //$fotoredimensionada = ob_get_clean();
    imagedestroy($imageStream);
    imagedestroy($novotamanhofoto);


}

function isJSON($json)
{
    try
    {
        $var = json_decode($json);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    catch(Exception $erro)
    {
        return false;
    }
}

function MontarGraficoBarraComTabela($labels, $axis, $axismp, $arraydados)
{
    #Em desenvolvimento.


    for ($i=0; $i < count($arraydados) ; $i++) 
    {
        $html = ''; //responsável por fazer a tabela do gráfico

        //Para a tabela
        $data = $labels[$i];
        $dado = NumeroBR($axis[$i],0);
        $axismptable = NumeroBR(round((float) $axismp[$i], 2),2);

        $html = $html." <tr>
                        <td scope='row'>$data</td>
                        <td>$dado</td>
                        <td>$axismptable</td>
                    </tr> ";
    }
}

function MontarGraficoBarraSemTabela($labels, $axis, $axismp)
{
    
}
// /**
//  * Checa se o arquivo passado é realmente uma imagem.
//  * @param string $filepath é o caminho do arquivo a ser verificado
//  * @param string $error é o a mensagem de retorno a ser entregue caso algum erro de validação ocorra.
//  */
// function ChecaArquivoImagem($filepath, &$error)
// {
//     $error = null;

//     try
//     {
//         $buffer = file_get_contents($filepath, false, null, 0, 10);

//         $contentTypes = ["image/jpeg", "image/png", "image/gif", "image/bmp"];

//         foreach ($contentTypes as $type)
//         {
//             if (strpos($buffer, $type) !== false)
//             {
//                 return true;
//             }
//         }
//     }
//     catch (Exception $ex)
//     {
//         $error = $ex->getMessage();
//     }

//     return false;
// }
?>
