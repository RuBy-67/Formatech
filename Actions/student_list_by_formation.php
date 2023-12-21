<?php

require_once(__DIR__ . "/../Autoloader.php");

use Repository\StudentRepository;


// Récupérer l'ID de la formation à partir du formulaire
$formationId = isset($_POST['formationId']) ? $_POST['formationId'] : null;
$formationName = isset($_POST['name']) ? $_POST['name'] : null;

if (!$formationId) {
    header("Location: /path/to/error_page.php");
    exit;
}

// Créer une instance de StudentMapper
$studentMapper = new StudentRepository();

// Utiliser la méthode getStudentListInDbByFormation pour obtenir la liste des étudiants par formation
$students = $studentMapper->getStudentListInDbByFormation($formationId);

// Afficher les informations des étudiants de la formation 
?>
<h2>Liste des Étudiants de <?php echo ($formationName) ?>
</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Date de naissance</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td>
                <?php echo $student['studentId']; ?>
            </td>
            <td>
                <?php echo $student['firstName']; ?>
            </td>
            <td>
                <?php echo $student['lastName']; ?>
            </td>
            <td>
                <?php echo $student['mail']; ?>
            </td>
            <td>
                <?php echo $student['birthDate']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>