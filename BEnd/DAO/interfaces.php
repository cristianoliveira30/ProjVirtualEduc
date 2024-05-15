<?php
include('cadastrarusuarios.php');
include('../configBD.php');
// interface UsuarioDAO {
//     //metodos abstratos da interface DAO
//     public static function inserirUsuario();
//     public static function findById($id);
//     public static function findByNomeUsu($nomeUsu);
//     public static function findByNomeComp($nomeComp);
//     public static function findByEmail($email);
//     public static function findByCpf($cpf);
//     public static function delete($id);
// }

$infousuario = json_decode($_POST['usuario']);

$ObjUsuario = new Usuario();
$retornoinsert = $ObjUsuario->InserirEValidarUsu($infousuario);
if($retornoinsert)
{
    echo 'DEU CERTO!!!';
}
else
{
    echo 'ALGO DEU ERRADO NO INSERT';
}


?>