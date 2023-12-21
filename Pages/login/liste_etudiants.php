<?php
require_once(__DIR__ . "..\..\..\Autoloader.php");
use Repository\StudentRepository;
?>
<?php
if (isset($_POST['promotionId'])) {
    $promotionId = $_POST['promotionId'];
    ?>
    <h2>Liste Etudiants :</h2>
    <?php
    // Utilisation du StudentRepository pour récupérer la liste des étudiants par promotion
    $studentRepository = new StudentRepository();
    $students = $studentRepository->getStudentListInDbByPromotion($promotionId);
    // Affichage de la liste des étudiants
    foreach ($students as $student) {
        // Afficher les détails de l'étudiant
        echo "<li>" . $student['firstName'] . ' ' . $student['lastName'] ." <br></li>";
    }
} else {
    echo "Aucune promotion sélectionnée";
}
?>