<?php
require_once(__DIR__ . '\..\\..\\Layouts\\header.php');
use Repository\StudentRepository;
?>
<?php
if (isset($_POST['promotionId'])) :
    $promotionId = $_POST['promotionId'];
    
    $studentRepository = new StudentRepository();
    $students = $studentRepository->getStudentListInDbByPromotion($promotionId);
    ?>
<section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
    <h1 class="text-center mb-8">Liste Etudiants :</h1> 
</section>
<section class="container">
    <ul class="w-full flex flex-col items-center">
        <?php
        // Utilisation du StudentRepository pour récupérer la liste des étudiants par promotion

        // Affichage de la liste des étudiants
        foreach ($students as $student) :?>
            <li><?=$student['firstName']?> <?= $student['lastName']?><br>Contact: <?=$student['mail'] ?> <br><br></li>
        <?php 
            endforeach;
            else :
        ?>
        <li>Aucune liromotion sélectionnée</li>
        <?php endif?>
    </ul>
</section>

<?php require_once(__DIR__ . '\..\\..\\Layouts\\header.php');?>