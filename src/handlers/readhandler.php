<?php

require_once("../data/connection.php");
use App\data\Connection;

class ReadHandler{


    public function getCars(){

        $db = new Connection();

        $stmt = $db->pdo->query("SELECT * FROM cars");

        return $stmt->fetchAll();

    }

}

$handler = new ReadHandler();

echo json_encode($handler->getCars());