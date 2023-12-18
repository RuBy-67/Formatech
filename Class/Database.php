<?php

namespace DB;

require_once(__DIR__ . "\\..\\config.php");

use \PDO;
use \PDOException;

class Database
{
    private static ?Database $db = null;
    private PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$db === null) {
            self::$db = new Database();
        }

        return self::$db;
    }

    public function executeQuery($query, $params = [])
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}