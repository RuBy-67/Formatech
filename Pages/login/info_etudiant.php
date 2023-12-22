<?php 
require_once(__DIR__ . '\..\\..\\Layouts\\header.php');

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'etudiant') {
    header("Location: /index.php");
    exit();
}

use Mapper\StudentMapper;

$studentId = $_SESSION['user_id'];
$studentMapper = StudentMapper::getInstance();
$student = $studentMapper->getOneById($studentId);
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
                <div>
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
    <hr />
    <section>
       
    </section>
</div>

<?php require_once(__DIR__ . "\..\\..\\Layouts\\footer.php") ?>