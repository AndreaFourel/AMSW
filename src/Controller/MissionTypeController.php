<?php

namespace Controller;

use Entity\MissionType;
use PDO;

require_once "PdoController.php";

class MissionTypeController
{
    use PdoController;

    public function getMissionTypeById(int $id): MissionType
    {
        $req = $this->pdo->prepare("SELECT * FROM `mission_type` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        return new MissionType($data);
    }
}