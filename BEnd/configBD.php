<?php
class MyCRUD
{
    //variavéis
    private $entrando;
    private $pdo;
    private $avisos = [];
    //contrutor
    public function __construct()
    {
        $this->entrando = $this->Conectar();
    }

    //conect bd
    private function Conectar()
    {
        global $avisos;

        $host = "localhost";
        $usernome = "postgres";
        $usersenha = "config@virtual636";
        $database = "postgres";
        try {
            $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$database", $usernome, $usersenha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            echo "conectado ao banco de dados";
        }
        catch (PDOException $e) {
            echo "não conectado";
            die ($e ->getMessage());
        }

        header("AcessControl-Allow-Origin: *");
        header("Acess-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTION");
        header("ContentType: application/json");
        if ($avisos) {
            echo json_encode($avisos);
        }
        return $pdo;
    }
}
//EXECUTANDO
$EntrarBd = new MyCRUD;
