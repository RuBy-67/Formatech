<?php

use Mapper\ClassroomMapper;

$classroomId = $_GET['id'];

$classroomMapper = ClassroomMapper::getInstance();
$classroom = $classroomMapper->getOneById($classroomId);

?>
<section class="container">
    <h2 class="text-center">Formulaire de modification d'information de la salle de classe <?= $classroom->getName() ?></h2>
    <form action="/Actions/classRoom_edit.php"   
      method="post"
      class="flex flex-col justify-center items-center"
    >   
        <input type="hidden" name="id" value="<?= $classroom->getId() ?>" />
        <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
            <div class="flex flex-col items-center">
                <label for="building">Bâtiment :</label>
                <input type="text" id="building" name="building" value="<?= $classroom->getBuilding() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="name">Nom de la salle :</label>
                <input type="text" id="name" name="name" value="<?= $classroom->getName() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="capacityMax">Capacité maximale :</label>
                <input type="number" id="capacityMax" name="capacityMax" value="<?= $classroom->getCapacity() ?>" required><br>
            </div>
        </div>

        <button type="submit">Modifier</button>
    </form>
</section>
