<?php

namespace Controller;

use Entity\Country;
use PDO;

require_once "PdoController.php";

class CountryController
{
    use PdoController;

    public function getAll(): array
    {
        $countries = [];
        $req = $this->pdo->prepare("SELECT * FROM `country`");
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $country) {
            $countries[] = new Country($country);
        }
        return $countries;
    }

    public function getCountryById(string $id): Country
    {
        $req = $this->pdo->prepare("SELECT * FROM `country` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch();
        return new Country(($data));
    }
}