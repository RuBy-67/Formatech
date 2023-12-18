<?php

require_once(__DIR__ . "\..\Autoloader.php");
require_once('data.php');
Autoloader::register();
use DB\Database;

// $database = new Database('localhost', 'formatechfutur', 'root', '');
$database = Database::getInstance();

$database->executeQuery();

// Fonction pour ajouter les formations
function addFormations($formations, $db)
{
    foreach ($formations as $formation) {
        $db->executeQuery("INSERT INTO Formation (name, durationFormationInMonth, abbreviation, rncpLvl, moduleId, accessibility) VALUES (?, ?, ?, ?, ?, ?)", [$formation['nom'], $formation['duree'], $formation['abreviation'], $formation['niveau'], 1, 1]);
    }
}

// Fonction pour ajouter les modules
function addModules($modules, $db)
{
    foreach ($modules as $module) {
        $db->executeQuery("INSERT INTO Module (name, durationModuleInHours, speakerId) VALUES (?, ?, ?)", [$module['nom'], $module['duree'], 1]); // Remplacez 1 par l'ID du conférencier approprié
    }
}

// Fonction pour ajouter les salles
function addClassRooms($salles, $db)
{
    foreach ($salles as $salle) {
        $db->executeQuery("INSERT INTO ClassRoom (building, name, capacityMax) VALUES (?, ?, ?)", [$salle['batiment'], $salle['nom'], $salle['capacite']]);
    }
}


// Appels de fonctions avec vos données
addFormations($formations, $database);
addModules($modules, $database);
addClassRooms($salles, $database);


?>