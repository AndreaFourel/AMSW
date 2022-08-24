<?php



class MissionController
{

    private PDO $pdo;

    public function __construct()
    {
        try {
            (new DotEnv(__DIR__ . '/../.env'))->load();
            $pdo = new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
            $this->setPdo($pdo);
        } catch (PDOException $e) {
            var_dump($e);
            echo $e->getMessage();
        }
    }

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function getAll(): array
    {
        $missions = [];
        $req = $this->pdo->query("SELECT * FROM `mission`");
        $data = $req->fetchAll();
        foreach ($data as $mission){
            $missions[] = new Mission($mission);
        }
        return $missions;
    }
}