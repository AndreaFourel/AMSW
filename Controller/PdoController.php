<?php

abstract class PdoController
{

    public function __construct()
    {
        try {
            (new DotEnv(__DIR__ . '/../.env'))->load();
            $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
        } catch (PDOException $e) {
            var_dump($e);
            echo $e->getMessage();
        }
    }

    abstract public function setPdo(PDO $pdo);
}