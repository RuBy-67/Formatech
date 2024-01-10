<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\SpeakerRepository;

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$mail = $_POST['mail'];
$password = $_POST['password'];

$speakerRepository = new SpeakerRepository();
$speakerRepository->createSpeaker($firstName, $lastName, $mail, $password);
$_SESSION['confirmationMessage'] = 'Intervenant(e) '.$firstName .'-'. $lastName.' ajoutées avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;