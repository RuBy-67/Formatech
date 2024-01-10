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
            <p><span>Prénom : </span><span>
                    <?= $student->getFirstName() ?>
                </span></p>
            <p><span>Nom : </span><span>
                    <?= $student->getLastName() ?>
                </span></p>
            <p><span>Email : </span><span>
                    <?= $student->getMail() ?>
                </span></p>
            <p><span>Date de naissance : </span><span>
                    <?= $student->getBirthDate() ?>
                </span></p>
        </div>
    </section>
    <section class="container mb-12">
        <h2 class="text-center">Promotions de l'étudiant :</h2>
        <div class="grid grid-cols-2 justify-items-center">
            <?php foreach ($student->getPromotions() as $promotion): ?>
                <div class="border border-black border-solid rounded-md px-2 mx-3">
                    <p class="flex flex-col items-center">
                        <span class> <strong>Promotion :</strong> </span>
                        <span>
                            <?= $promotion->getPromotionYear() ?>
                        </span>
                        <span>Du
                            <?= $promotion->getStartingDate() ?> au
                            <?= $promotion->getEndingDate() ?>
                        </span>

                    <div class="pl-8 flex flex-col items-center gap-x-3">
                        <?php $formation = $promotion->getFormation() ?>
                        <p class="flex flex-row "><span>Nom de la formation :
                                <?= $formation->getName() ?>
                            </span></p>
                        <p class="flex flex-row "><span>Nombres de mois :
                                <?= $formation->getDurationInMonth() ?>
                            </span></p>
                        <p class="flex flex-row "><span>Abbreviation :
                                <?= $formation->getAbbreviation() ?>
                            </span></p>
                        <p class="flex flex-row "><span>Niveau RNCP :
                                <?= $formation->getRncpLvl() ?>
                            </span></p>
                        <p class="flex flex-row "><span>Accessibilité :
                                <?= $formation->getAccessibility() ?>
                            </span></p>
                        <p><strong>--------</strong></p>
                        <p class="flex flex-row"> <strong>Modules de la formation :</strong></p>
                        <div class="pl-8 grid justify-items-center">
                            <?php foreach ($formation->getModules() as $module): ?>
                                <p class="flex flex-row"><span>Nom du module :
                                        <?= $module->getName() ?>
                                    </span></p>
                                <p class="flex flex-row "><span>Heures :
                                        <?= $module->getDurationInHours() ?>
                                    </span></p>
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
            <?php foreach ($sessions as $session): ?>
                <div class="border border-black border-solid rounded-md px-2 mx-3">
                    <?php // Convertir la date et l'heure de la session en timestamp
                        $sessionTimestamp = strtotime($session->getDate() . ' ' . $session->getStartTime()); // Vérifier si la date de la session est passée
                        $isSessionPassed = ($sessionTimestamp < time());
                        if (!$isSessionPassed): ?>
                        <div>
                            <?= (new DateTime($session->getDate()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('j F Y') ?>
                            <?= (new DateTime($session->getStartTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?>
                            -
                            <?= (new DateTime($session->getEndTime()))->setTimezone(new DateTimeZone('Europe/Paris'))->format('G:i') ?><br>
                            <p><strong>---</strong></p>
                            Classe :
                            <?= $session->getPromotionId() ?> <br> Salle : 'N/A'
                            <?= $session->getClassName() ?> <br> Module Enseigné :
                            <?= $session->getModuleName() ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
</div>

<?php require_once(__DIR__ . "/../../Layouts/footer.php") ?>