<?php

require_once("../data/connection.php");
use App\data\Connection;

class CreateHandler{


    public function createCar(string $name){

        $db = new Connection();

        $stmt = $db->pdo->prepare("INSERT INTO cars (name) VALUES (?)");
        $stmt->execute([$name]);

        return $stmt->rowCount();

    }

}

$handler = new CreateHandler();

$result = $handler->createCar($_POST["name"]);

echo json_encode(["success" => $result > 0]);