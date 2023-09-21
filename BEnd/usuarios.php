<?php
class Usuario {

    //variaveis
    private $id;
    private $nomeUsu;
    private $nomeComp;
    private $email;
    private $senha;
    private $cpf;
    private $escolaridade;

    //pegando e retornando
    public function getId() {
        return $this->id;
    }
    public function setId($ide) {
        $this->id = trim($ide);
    }
    public function getNomeUsu() {
        return $this->nomeUsu;
    }
    public function setnomeUsu($usu) {
        $this->nomeUsu = trim($usu);
    }
    public function getNomeComp() {
        return $this->nomeComp;
    }
    public function setNomeComp($name) {
        $this->nomeComp = mb_strtoupper(trim($name));
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = strtolower(trim($email));
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha() {

    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = is_int($cpf);
    }
    public function getEscolaridade() {

    }
    public function setEscolaridade() {
        
    }
}

interface UsuarioDAO {
    //metodos abstratos da interface DAO
    public static function inserirUsuario(Usuario $string);

    //procurar
    public static function findAll();
    public static function findById($id);
    public static function findByNomeUsu($nomeUsu);
    public static function findByNomeComp($nomeComp);
    public static function findByEmail($email);
    public static function findByCpf($cpf);

    //metodos de upar e deletar
    public static function update(Usuario $string);
    public static function delete($id);
}
?>