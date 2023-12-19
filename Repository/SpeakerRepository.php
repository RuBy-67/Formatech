<?php
namespace Repository;

use DB\Database;

class SpeakerRepository
{
    private Database $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getList(): array
    {
        return $this->database
            ->executeQuery("SELECT * FROM speaker")
            ->fetchAll();
    }
}