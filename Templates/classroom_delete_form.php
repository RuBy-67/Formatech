<?php

use Mapper\ClassroomMapper;

$classroomMapper = ClassroomMapper::getInstance();
$classrooms = $classroomMapper->getList();

?>

<h2 class="mb-8">Formulaire de suppression de salle de classe</h2>
<form action="/Actions/classRoom_delete.php" method="post" class="flex flex-col justify-center items-center ">
    
    <label for="classroomIdToDelete" class="mb-3">Salle de classe à supprimer:</label>
    <select id="classroomIdToDelete" name="classroomIdToDelete" required>
       <?php foreach ($classrooms as $classroom) :?>
            <option value="<?=$classroom->getId()?>"><?=$classroom->getId()?> - <?= $classroom->getName()?> - <?= $classroom->getBuilding()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>
