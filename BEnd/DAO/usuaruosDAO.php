<?php
require_once './BEnd/usuarios.php';

class UsuarioDAOMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $drive)
    {
        $this->pdo = $driver;
    }


    //metodos abstratos da interface DAO
    public static function inserirUsuario(Usuario $string);

    //procurar
    public static function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM myclientesativos");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['Id']);
                $u->setNomeComp($item['Nome Completo']);
                $u->setnomeUsu($item['Nome Usuário']);
                $u->setEmail($item['Email']);
                $u->setCpf($item['Cpf']);

                $array[] = $u;
            }
        }

        return $array;
    };
    public static function findById($id){
        
    };
    public static function findByNomeUsu($nomeUsu){
        
    };
    public static function findByNomeComp($nomeComp){
        
    };
    public static function findByEmail($email){
        
    };
    public static function findByCpf($cpf){
        
    };

    //metodos de upar e deletar
    public static function update(Usuario $string);
    public static function delete($id);
};