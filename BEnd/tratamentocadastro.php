<?php
include './DAO/usuarios.php';
include './configBD.php';

$json = file_get_contents('php://input');

$insert = new inserirUsuario();
$resposta = $insert->inserirUsuario($json);

switch ($resposta) {
    case true:
        'Usuário inserido com sucesso!';
        break;
    
    case false:
        return $callback = 'Erro ao inserir usuário entre em contato com o suporte!';
        break;

    case is_string($resposta):
        return $resposta;
        break;
}

echo json_encode(JSON_PRETTY_PRINT, $resposta);