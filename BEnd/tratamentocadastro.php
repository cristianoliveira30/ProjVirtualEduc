<?php
include './classes/usuarios.php';

$json = file_get_contents('php://input');

$insert = new inserirUsuario();
$resposta = $insert->inserirUsuario($json);

echo json_encode(JSON_PRETTY_PRINT, $resposta);