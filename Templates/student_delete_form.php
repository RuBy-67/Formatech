<?php 

use Mapper\StudentMapper;

$studentMapper = StudentMapper::getInstance();
$students = $studentMapper->getList();

?>

<h2 class="mb-8">Formulaire de suppression d'Etudiant</h2>
<form action="/Templates/student_delete.php" method="post" class="flex flex-col justify-center items-center ">
    
    <label for="studentIdToDelete">Student à retirer de l'école:</label>
    <select id="studentIdToDelete" name="studentIdToDelete" required>
       <?php foreach ($students as $student) :?>
            <option value="<?=$student->getId()?>"><?=$student->getId()?> - <?= $student->getFirstName()?> <?= $student->getLastName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>