<?php
require_once(__DIR__ . "/../Autoloader.php");
use Mapper\StudentMapper;

$studentMapper = StudentMapper::getInstance();
$students = $studentMapper->getList();
$studentId = 1;
// Vérifier si un ID d'étudiant est sélectionné via la méthode POST
$selectedStudentId = isset($_POST['selectedStudentId']) ? (int) $_POST['selectedStudentId'] : null;

// Trouver l'étudiant avec l'ID spécifié
$selectedStudent = null;
foreach ($students as $student) {
    if ($student->getId() === $selectedStudentId) {
        $selectedStudent = $student;
        break;
    }
}
?>

<section>
        <h2>Informations sur l'étudiant</h2>

        <!-- Formulaire pour sélectionner un étudiant via POST -->
        <form method="post">
            <label for="selectedStudentId">Sélectionnez un étudiant :</label>
            <select id="selectedStudentId" name="selectedStudentId" required>
                <?php foreach ($students as $student) : ?>
                    <option value="<?= $student->getId() ?>"><?= $student->getFirstName() . ' ' . $student->getLastName() ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Afficher les détails de l'étudiant">
        </form>

        <br>

        <!-- Tableau des détails de l'étudiant spécifié -->
        <table>
            <thead>
                <tr>
                    <th>StudentId</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Birth Date</th>
                    <th>Promotion ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($selectedStudent !== null) : ?>
                    <tr>
                        <td><?= $selectedStudent->getId() ?></td>
                        <td><?= $selectedStudent->getFirstName() ?></td>
                        <td><?= $selectedStudent->getLastName() ?></td>
                        <td><?= $selectedStudent->getMail() ?></td>
                        <td><?= $selectedStudent->getBirthDate() ?></td>
                        <td><?= $selectedStudent->getPromotionId() ?></td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Aucun étudiant trouvé avec l'ID spécifié</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
