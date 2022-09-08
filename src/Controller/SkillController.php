<?php

namespace Controller;

use Entity\Skill;
use PDO;

require_once "PdoController.php";

class SkillController
{
    use PdoController;

    public function getSkillById(int $id): Skill
    {
        $req = $this->pdo->prepare("SELECT * FROM `skill` WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        return new Skill($data);
    }
}