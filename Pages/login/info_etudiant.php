<?php 
require_once(__DIR__ . '/../../Layouts/header.php');

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'etudiant') {
    header("Location: /index.php");
    exit();
}

use Mapper\StudentMapper;
use Mapper\SessionMapper;

$studentId = $_SESSION['user_id'];
$studentMapper = StudentMapper::getInstance();
$student = $studentMapper->getOneById($studentId);

$sessionMapper = SessionMapper::getInstance();
$sessions = $sessionMapper->getList();

function compareSessionsByDate($session1, $session2)
{
    $date1 = strtotime($session1->getDate() . ' ' . $session1->getStartTime());
    $date2 = strtotime($session2->getDate() . ' ' . $session2->getStartTime());

    return $date1 <=> $date2;
}

usort($sessions, 'compareSessionsByDate');
?>

<div>
    <section class="w-full h-[300px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
        <h1 class="text-center mt-8">Mes informations</h1> 
    </section>
    <section class="container mb-12">
        <h2 class="text-center">Informations personnelles :</h2>
        <div class="grid grid-cols-2 justify-items-center">
            <p><span>Prénom : </span><span><?= $student->getFirstName() ?></span></p>
            <p><span>Nom : </span><span><?= $student->getLastName() ?></span></p>
            <p><span>Email : </span><span><?= $student->getMail() ?></span></p>
            <p><span>Date de naissance : </span><span><?= $student->getBirthDate() ?></span></p>
        </div>
    </section>
    <section class="container mb-12">
        <h2 class="text-center">Promotions de l'étudiant :</h2>
        <div class="grid grid-cols-2 justify-items-center">
             <?php foreach($student->getPromotions() as $promotion): ?>
                <div class="border border-black border-solid rounded-md px-2 mx-3">
                    <p class="flex flex-col items-center">
                        <span class>Promotion : </span>
                        <span><?= $promotion->getPromotionYear() ?></span>
                        <span>Du <?= $promotion->getStartingDate() ?> au <?= $promotion->getEndingDate() ?></span>
                
                        <div class="pl-8 flex flex-col items-center gap-x-3">
                            <?php $formation = $promotion->getFormation() ?>
                            <p class="flex flex-row "><span>Nom de la formation : </span><span> <?= $formation->getName() ?></span></p>
                            <p class="flex flex-row "><span>Nombres de mois : </span><span> <?= $formation->getDurationInMonth() ?></span></p>
                            <p class="flex flex-row "><span>Abbreviation : </span><span> <?= $formation->getAbbreviation() ?></span></p>
                            <p class="flex flex-row "><span>Niveau RNCP : </span><span> <?= $formation->getRncpLvl() ?></span></p>
                            <p class="flex flex-row "><span>Accessibilité : </span><span> <?= $formation->getAccessibility() ?></span></p>
                            <span class=" leading-span "> </span>
                            <p class="flex flex-row ">Modules de la formation :</p>
                            <div class="pl-8 grid grid-cols-2 justify-items-center">
                                <?php foreach($formation->getModules() as $module): ?>
                                    <p class="flex flex-row mr-2"><span>Nom du module : </span><span> <?= $module->getName() ?></span></p>
                                    <p class="flex flex-row "><span>Heures : </span><span> <?= $module->getDurationInHours() ?></span></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </p>
                </div>
                
            <?php endforeach; ?>
        </div>
        
    </section>
    <section class="container mb-12">
        <h2 class="text-center">Sessions à venir :</h2>
        <div class="grid grid-cols-2 justify-items-center">
            <div class="border border-black border-solid rounded-md px-2 mx-3">
                <?php foreach ($sessions as $session):
                    // Convertir la date et l'heure de la session en timestamp
                    $sessionTimestamp = strtotime($session->getDate() . ' ' . $session->getStartTime());

                    // Vérifier si la date de la session est passée
                    $isSessionPassed = ($sessionTimestamp < time());
                    ?>

                    <?php if (!$isSessionPassed): ?>
                        <div>
                            <?= (new DateTime($session->getDate()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('j F Y') ?>
                            <?= (new DateTime($session->getStartTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                            -
                            <?= (new DateTime($session->getEndTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                            Avec la classe
                            <?= $session->getPromotionId() ?> dans la salle
                            <?= $session->getClassName() ?>, Module Enseigné :
                            <?= $session->getModuleName() ?>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        
    </section>
</div>

<?php require_once(__DIR__ . "/../../Layouts/footer.php") ?>