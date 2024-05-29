<?php

require_once("../data/connection.php");
use App\data\Connection;

class DeleteHandler{


    public function deleteCar(int $id){

        $db = new Connection();

        $stmt = $db->pdo->prepare("DELETE FROM cars WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->rowCount();

    }

}

$handler = new DeleteHandler();

$result = $handler->deleteCar($_POST["id"]);

echo json_encode(["success" => $result > 0]);