<?php

class CountryController
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
        $countries = [];
        $req = $this->pdo->prepare("SELECT * FROM `country`");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $country){
            $countries[] = new Country($country);
        }
        return $countries;
    }

    public function getCountryById(string $id): Country
    {
        $req = $this->pdo->prepare("SELECT * FROM `country` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_STR);
        $req->execute();
        $country =$req->fetch();
        return new Country(($country));
    }
}