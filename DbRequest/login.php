<?php

require_once(__DIR__ . "\..\Autoloader.php");
Autoloader::register();

function getUserbyDb($table, $mail, $password, $database)  {
    return $database->executeQuery("SELECT * FROM $table WHERE mail = ? AND password = ?",[$mail, $password]);

}