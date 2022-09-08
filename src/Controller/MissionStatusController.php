<?php

namespace Controller;

use Entity\MissionStatus;
use PDO;

require_once "PdoController.php";

class MissionStatusController
{
    use PdoController;

    public function getMissionStatusById(int $id): MissionStatus
    {
        $req = $this->pdo->prepare("SELECT * FROM `mission_status` WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        return new MissionStatus($data);
    }

}