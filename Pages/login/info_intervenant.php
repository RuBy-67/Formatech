<?php
require_once(__DIR__ . '\..\\..\\Layouts\\header.php');

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'intervenant') {
    header("Location: index.php");
    exit();
}

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
//$upcomingSessions = $speakerMapper->getUpcomingSessions($sessions);

function compareSessionsByDate($session1, $session2)
{
    $date1 = strtotime($session1->getDate() . ' ' . $session1->getStartTime());
    $date2 = strtotime($session2->getDate() . ' ' . $session2->getStartTime());

    return $date1 <=> $date2;
}

usort($sessions, 'compareSessionsByDate');

$speaker = $speakerMapper->getOneById($employeeId); // Assuming employeeId is the speakerId


?>
<section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
    <h1 class="text-center mb-8">Mes informations</h1>
</section>
<section class="container mb-12">
    <h2 class="text-center">Informations personnelles :</h2>
    <div class="grid grid-cols-3 justify-items-center">
        <p>Prénom:
            <?= $speaker->getFirstName() ?>
        </p>
        <p>Nom:
            <?= $speaker->getLastName() ?>
        </p>
        <p>Email:
            <?= $speaker->getMail() ?>
        </p>
    </div>
</section>
<section class="container mb-12">
    <h2 class="text-center">Modules données :</h2>
    <ul class="grid grid-cols-3 justify-items-center gap-y-3">
        <?php foreach ($modules as $module): ?>
            <li class="border border-black border-solid rounded-md px-2">
                <?= $module->getName() ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="container mb-12">
    <h2 class="text-center">Sessions à Venir :</h2>
    <ul class="grid grid-cols-3 justify-items-center gap-y-3 gap-x-4">
        <?php foreach ($sessions as $session):
            // Convertir la date et l'heure de la session en timestamp
            $sessionTimestamp = strtotime($session->getDate() . ' ' . $session->getStartTime());

            // Vérifier si la date de la session est passée
            $isSessionPassed = ($sessionTimestamp < time());
            ?>

            <?php if (!$isSessionPassed): ?>
                <li class="border border-black border-solid rounded-md px-2 mx-3">
                    <?= (new DateTime($session->getDate()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('j F Y') ?>
                    <?= (new DateTime($session->getStartTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                    -
                    <?= (new DateTime($session->getEndTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                    Avec la classe
                    <?= $session->getPromotionId() ?> dans la salle
                    <?= $session->getClassName() ?>, Module Enseigné :
                    <?= $session->getModuleName() ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

    </ul>
</section>
<section class="container mb-12">
    <h2 class="text-center">Vos Promotions :</h2>
    <ul class="grid grid-cols-3 justify-items-center gap-y-3">
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
    </ul>
</section>