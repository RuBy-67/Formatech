<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\ClassroomRepository;
use Mapper\ClassroomMapper;

$classroomId = $_POST['id'];
$newBuilding = $_POST['building'];
$newName = $_POST['name'];
$newCapacityMax = $_POST['capacityMax'];

$classroomMapper = ClassroomMapper::getInstance();
$classroom = $classroomMapper->getOneById($classroomId);

$classroom->setBuilding($newBuilding)
         ->setName($newName)
         ->setCapacity($newCapacityMax);

$classroomRepository = new ClassroomRepository();
$classroomRepository->updateClassroom($classroom);
$_SESSION['confirmationMessage'] = 'Salle de classe ' . $newName . ' modifiée avec succès!';

header("Location: /Pages/panel_classroom.php?action=classroom_list");
exit;
