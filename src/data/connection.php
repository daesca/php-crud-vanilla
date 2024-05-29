<?php 

namespace App\data;

class Connection {

    private string $user = "root";
    private string $password = "";
    private string $db_name = "concesionario";
    private string $host = "localhost";
    public \PDO $pdo;

    public function __construct() {
        try {
            //echo "mysql:host={$this->host};dbname={$this->db_name}";
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->user, $this->password);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Connect Failed: "  . $e->getMessage());
        }
       
    }

}