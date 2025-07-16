<?php

class Conn {
    private $host = 'localhost';
    private $user = 'root';
    private $dbname = 'blogmaker';
    private $pass = '';

    private $pdo;

    public function __construct(){
        try{
            $dns = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

            $options = [
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $this->pdo = new PDO($dns,$this->user, $this->pass,$options ); 
        }catch(PDOException $e){
            die('Erro de conexão' . $e->getMessage());
        }
    }

    public function getPdo(){
        return $this->pdo;
    }
}

    try {
        $bd = new Conn();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    };
