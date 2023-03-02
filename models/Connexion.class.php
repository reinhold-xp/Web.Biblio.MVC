<?php

const HOST_NAME = "localhost";
const DATABASE_NAME = "biblio";
const USER_NAME = "root";
const PASSWORD = "root";

abstract class Connexion
{
    private static $pdo;

    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=" . HOST_NAME . ";dbname=" . DATABASE_NAME . ";charset=utf8", USER_NAME, PASSWORD);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
