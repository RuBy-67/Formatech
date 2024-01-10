<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\SpeakerRepository;

$speakerIdToDelete = $_POST['speakerIdToDelete'];


$speakerIdRepositories = new SpeakerRepository();
$speakerIdRepositories->deleteSpeaker($speakerIdToDelete);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;