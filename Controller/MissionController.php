<?php

class MissionController
{
    private PDO $pdo;

    public function __construct()
    {
       try {
           (new DotEnv(__DIR__ . '/../.env'))->load();
           $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
       } catch (PDOException $error) {
           var_dump($error);
           echo "<p style='color: red'>$error</p>";
       }
    }

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