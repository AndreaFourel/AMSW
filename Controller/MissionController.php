<?php

require_once "PdoController.php";

class MissionController extends PdoController
{
    private PDO $pdo;

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $missions = [];
        $req = $this->pdo->query("SELECT * FROM `missions`");
        $data = $req->fetchAll();
        foreach ($data as $mission){
            $missions[] = new Mission($mission);
        }
        return $missions;
    }
}