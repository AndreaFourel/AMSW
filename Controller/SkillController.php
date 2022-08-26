<?php

class SkillController
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

    public function getSkillById(int $id): Skill
    {
        $req = $this->pdo->prepare("SELECT * FROM `skill` WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $skill = $req->fetch();
        return new Skill($skill);
    }
}