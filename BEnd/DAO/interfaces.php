<?php
interface UsuarioDAO {
    //metodos abstratos da interface DAO
    public static function inserirUsuario(Usuario $usuario);
    public static function findById($id);
    public static function findByNomeUsu($nomeUsu);
    public static function findByNomeComp($nomeComp);
    public static function findByEmail($email);
    public static function findByCpf($cpf);
    public static function delete($id);
}

?>