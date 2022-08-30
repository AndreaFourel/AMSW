<?php

require_once "PdoController.php";

class MissionController
{

    use PdoController;


    public function getAll(): array
    {
        $missions = [];
        $req = $this->pdo->prepare("SELECT * FROM `mission`");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $mission){
            $missions[] = new Mission($mission);
        }
        return $missions;
    }

    public function getMissionById(int $id): Mission
    {
        $req=$this->pdo->prepare("SELECT * FROM `mission` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $mission = $req->fetch();
        return new Mission ($mission);
    }

}