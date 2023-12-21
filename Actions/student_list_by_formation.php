<?php

use Repository\StudentRepository;

// Créer une instance de StudentMapper
$studentMapper = new StudentRepository();

// Utiliser la méthode getStudentListInDbByFormation pour obtenir la liste des étudiants par formation
$students = $studentMapper->getStudentListInDbByFormation($formationId);

// Afficher les informations des étudiants de la formation 
?>
<div class="flex flex-col gap-x-5 w-full">
    <h4 class=" text-center mb-8">Liste des Étudiants</h4>
    <table class="w-full mb-8">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Date de naissance</th>
            </tr>
        </thead>
       
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
</div>