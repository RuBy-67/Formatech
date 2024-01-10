<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\SpeakerRepository;

$speakerIdToDelete = $_POST['speakerIdToDelete'];


$speakerIdRepositories = new SpeakerRepository();
$speakerIdRepositories->deleteSpeaker($speakerIdToDelete);
$_SESSION['confirmationMessage'] = 'Intervenant ' .$speakerIdToDelete. ' Suprimmée avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;