<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\ClassroomRepository; // Assure-toi que le nom de la classe est correct

$building = $_POST['building'];
$name = $_POST['name'];
$capacityMax = $_POST['capacityMax'];

$classroomRepository = new ClassroomRepository();
$classroomRepository->createClassroom($building, $name, $capacityMax);
$_SESSION['confirmationMessage'] = 'Salle de classe ' . $name . ' ajoutée avec succès!';

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
