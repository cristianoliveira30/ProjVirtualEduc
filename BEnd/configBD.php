<?php
class MyCRUD
{
    //variavéis
    private $entrando;
    private $mysqli;
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
        $usernome = "root";
        $usersenha = "M/vUz[rC124r899y";
        $database = "myclientes";
        $mysqli = new mysqli($host, $usernome, $usersenha, $database);
        $mysqli->set_charset("utf8");

        if ($mysqli->connect_errno) {
            echo "Falha ao conectar (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
        }

        header("AcessControl-Allow-Origin: *");
        header("Acess-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTION");
        header("ContentType: application/json");
        if ($avisos) {
            echo json_encode($avisos);
        }
        return $mysqli;
    }

    //FUNÇÃO PARA INSERIR DADOS DOD FORMULÁRIOS
    public function inserir()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        //VALIDANDO OS FORMULÁRIOS
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
                global $mysqli;

                //verifica se já tem o EMAIL cadastrado no sistema
                $stmt = $mysqli->prepare("SELECT * FROM clientesativos WHERE EMAIL = :email");
                $stmt->bindValue(":email", $email);
                $stmt->execute();

                if ($mysqli->rowCount() === 0) { //SE N TIVER EMAIL CADASTRADO AINDA...
                    $mysqli->prepare("INSERT INTO clientesativos (NOME, SENHA, EMAIL, ESCOLARIDADE) VALUES (:name, :senha, :email, :escolaridade)");
                    $mysqli->bindValue(':name', $nomeUsu);
                    $mysqli->bindValue(':senha', $senha);
                    $mysqli->bindValue(':email', $email);
                    $mysqli->bindValue(':escolaridade', $escolaridade);

                    $mysqli->execute();

                    header('location: home.php');
                    exit;
                    //SE DER ERRO NO CÓDIGO DE ACESSO VAI EXIBIR
                    if ($mysqli->connect_errno) {
                        echo "Falha na conexão (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    if ($stmt === false) {
                        echo "Erro na preparação da consulta (" . $mysqli->errno . ") " . $mysqli->error;
                    }
                } else { //CASO JÁ TENHA EMAIL CADASTRADO
                    header('location: cadastro.php');
                    exit;
                }
            } else { //CASO N TENHA VALIDADO AS INFORMAÇÕES
                header('location: cadastro.php');
                exit;
            }
        } else { //CASO O METÓDO N SEJA POST
            header('location: ../cadastro.php');
        }
    }
}
//EXECUTANDO
$EntrarBd = new MyCRUD;
$EntrarBd->inserir();
