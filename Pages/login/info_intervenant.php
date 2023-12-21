<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'intervenant') {
    header("Location: index.php");
    exit();
}
require_once(__DIR__ . "..\..\..\Autoloader.php");

use Mapper\SpeakerMapper;
use Mapper\ModuleMapper;
use Mapper\SessionMapper;
use Mapper\PromotionMapper;

$employeeId = $_SESSION['user_id'];

$speakerMapper = SpeakerMapper::getInstance();
$promotionMapper = PromotionMapper::getInstance();
$promotions = $promotionMapper->getList();
$moduleMapper = ModuleMapper::getInstance();
$modules = $moduleMapper->getList();
$sessionMapper = SessionMapper::getInstance();
$sessions = $sessionMapper->getList();

function compareSessionsByDate($session1, $session2)
{
    $date1 = strtotime($session1->getDate() . ' ' . $session1->getStartTime());
    $date2 = strtotime($session2->getDate() . ' ' . $session2->getStartTime());

    return $date1 <=> $date2;
}

usort($sessions, 'compareSessionsByDate');

$speaker = $speakerMapper->getOneById($employeeId); // Assuming employeeId is the speakerId

// You can add similar methods in the mappers for employee-specific details

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <!-- Add your stylesheet and other head elements here -->
</head>

<body>
    <h1>Welcome to the Employee Dashboard!</h1>

    <h2>Your Information</h2>
    <p>First Name:
        <?= $speaker->getFirstName() ?>
    </p>
    <p>Last Name:
        <?= $speaker->getLastName() ?>
    </p>
    <p>Email:
        <?= $speaker->getMail() ?>
    </p>
    <h2>Modules permis</h2>
    <ul>
        <?php foreach ($modules as $module): ?>
            <li>
                <?= $module->getName() ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Sessions à Venir</h2>
    <ul>
        <?php foreach ($sessions as $session): ?>
            <li>
                <?= (new DateTime($session->getDate()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('j F Y') ?>
                <?= (new DateTime($session->getStartTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                -
                <?= (new DateTime($session->getEndTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                Avec la classe
                <?= $session->getPromotionId() ?> dans la salle
                <?= $session->getClassName() ?>, Module Enseigné :
                <?= $session->getModuleName() ?>
            </li>
        <?php endforeach; ?>
        <h2>Your Promotion</h2>
        <?php foreach ($promotions as $promotion): ?>
            <li>
                Classe :
                <?= $promotion->getId() ?>, Spécialité :
                <?= $promotion->getFormationName() ?> Année :
                <?= $promotion->getPromotionYear() ?>
            </li>
            <form action="liste_etudiants.php" method="post">
                <button type="submit" name="promotionId" value="<?= $promotion->getId() ?>">Voir les étudiants</button>
            </form>
        <?php endforeach; ?>
        <a href="logout.php">Logout ?</a>
</body>

</html>