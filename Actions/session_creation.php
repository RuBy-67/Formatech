<?php
require_once(__DIR__ . "/../Autoloader.php");

use Entity\Session;
use Mapper\SessionMapper;
use Repository\SessionRepository;

$date = $_POST['date'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$moduleId = $_POST['moduleId'];
$promotionId = $_POST['promotionId'];
$classRoomId = 0;
$speakerId = $_POST['speakerId'];

// Create a Session object
$session = new Session();
$session->setDate($date)
    ->setStartTime($startTime)
    ->setEndTime($endTime)
    ->setModuleId($moduleId)
    ->setPromotionId($promotionId)
    ->setClassRoomId($classRoomId)
    ->setSpeakerId($speakerId);

// Use the SessionMapper to create the session
$sessionMapper = new SessionRepository();
$sessionMapper->createSession($session);

// Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
?>
