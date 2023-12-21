<?php

use Entity\Session;
use Mapper\SessionMapper;
use Repository\SessionRepository;

require_once(__DIR__ . "\..\\Autoloader.php");

// Assuming you have the necessary includes for Session entity and SessionMapper

$sessionIdToUpdate = $_POST['sessionId'];
$newDate = $_POST['date'];
$newStartTime = $_POST['startTime'];
$newEndTime = $_POST['endTime'];
$newModuleId = $_POST['moduleId'];
$newPromotionId = $_POST['promotionId'];
$newClassRoomId = $_POST['classRoomId'];
$newSpeakerId = $_POST['speakerId'];

$sessionMapper = SessionMapper::getInstance();
$sessionToUpdate = $sessionMapper->getOneById($sessionIdToUpdate);

$sessionToUpdate->setDate($newDate)
    ->setStartTime($newStartTime)
    ->setEndTime($newEndTime)
    ->setModuleId($newModuleId)
    ->setPromotionId($newPromotionId)
    ->setClassRoomId($newClassRoomId)
    ->setSpeakerId($newSpeakerId);

    $speakerRepository = new SessionRepository();
    $speakerRepository ->modifySessionInDb($sessionToUpdate);

header("index.php");
exit;