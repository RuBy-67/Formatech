<?php require_once(__DIR__ . "\..\\Layouts\\header.php") ?>

<?php 

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'etudiant') {
    header("Location: /index.php");
    exit();
}

require_once(__DIR__ . "/../Autoloader.php");

use Mapper\StudentMapper;

$studentId = $_SESSION['user_id'];
$studentMapper = StudentMapper::getInstance();
$student = $studentMapper->getOneById($studentId);
?>

<div>
    <section class="w-full h-[300px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
        <h1 class="text-center mt-8">Mes informations</h1> 
    </section>
    <section>
        <p><span>Prénom : </span><span><?= $student->getFirstName() ?></span></p>
        <p><span>Nom : </span><span><?= $student->getLastName() ?></span></p>
        <p><span>Email : </span><span><?= $student->getMail() ?></span></p>
        <p><span>Date de naissance : </span><span><?= $student->getBirthDate() ?></span></p>
    </section>
    <hr />
    <section>
        <?php foreach($student->getPromotions() as $promotion): ?>
            <p>
                <span>Promotion : </span>
                <span><?= $promotion->getPromotionYear() ?></span>
                <span>Du <?= $promotion->getStartingDate() ?> au <?= $promotion->getEndingDate() ?></span>
            
                <div class="pl-8">
                    <?php $formation = $promotion->getFormation() ?>
                    <p><span>Nom de la formation : </span><span><?= $formation->getName() ?></span></p>
                    <p><span>Nombres de mois : </span><span><?= $formation->getDurationInMonth() ?></span></p>
                    <p><span>Abbreviation : </span><span><?= $formation->getAbbreviation() ?></span></p>
                    <p><span>Niveau RNCP : </span><span><?= $formation->getRncpLvl() ?></span></p>
                    <p><span>Accessibilité : </span><span><?= $formation->getAccessibility() ?></span></p>
                    
                    <div class="pl-8">
                        <?php foreach($formation->getModules() as $module): ?>
                            <p><span>Nom du module : </span><span><?= $module->getName() ?></span></p>
                            <p><span>Heures : </span><span><?= $module->getDurationInHours() ?></span></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </p>
        <?php endforeach; ?>
    </section>
    <hr />
    <section>
       
    </section>
</div>

<?php require_once(__DIR__ . "\..\\Layouts\\footer.php") ?>