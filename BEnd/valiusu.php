<?php 
// require './BEnd/configBD.php';
// require './BEnd/DAO/usuaruosDAO.php';

// $usuarioDao = new UsuarioDAOMysql($pdo);

$method = strtolower($_SERVER['REQUEST_METHOD']);

//VALIDANDO OS FORMULÁRIOS DO CADASTRO -----------------------------------------------------------
if ($method === 'post') {
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $nomeUsu = filter_input(INPUT_POST, 'nomeusu', FILTER_SANITIZE_SPECIAL_CHARS);
    $nomeComp = filter_input(INPUT_POST, 'nomecomp', FILTER_SANITIZE_SPECIAL_CHARS);
    $escolaridade = filter_input(INPUT_POST, 'escolaridade');
    //OS ABAIXOS N PODEM REPETIR
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    //VERIFICANDO AS INFORMAÇÕES MENOS COMPLEXAS
    if ($email && $senha && $nomeUsu && $escolaridade) {
     if ($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario;
        $novoUsuario->setEmail($email);

        $usuarioDao->inserirUsuario($novoUsuario);
     }  
    }
    else { //CASO O METÓDO N SEJA POST
    header('location: ../cadastro.php');
    }
}

//VALIDANDO FORMULÁRIO DO LOGIN ------------------------------------------------------------------
if ($method === 'post') {
    $UsuLogin = filter_input(INPUT_POST, 'UsuLogin', FILTER_SANITIZE_SPECIAL_CHARS);
    $SenhaLogin = filter_input(INPUT_POST, 'SenhaLogin', FILTER_SANITIZE_SPECIAL_CHARS);

    header('location: ../home.php');
}
else {
    header('location: ../login.php');
}
?>