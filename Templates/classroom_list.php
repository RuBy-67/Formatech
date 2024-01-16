<?php
require_once(__DIR__ . "/../Autoloader.php");

use Mapper\ClassroomMapper;

$classroomMapper = ClassroomMapper::getInstance();
$classrooms = $classroomMapper->getList();

?>

<section class="container">
    <h2 class="text-center">Liste des Salles de Classe & leurs modules</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>ClassRoom Id</th>
                <th>Building</th>
                <th>Name</th>
                <th>Capacity Max</th>
                <th>Module lié</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classrooms as $classroom): ?>
                <tr>
                    <td>
                        <?= $classroom->getId() ?>
                    </td>
                    <td>
                        <?= $classroom->getBuilding() ?>
                    </td>
                    <td>
                        <?= $classroom->getName() ?>
                    </td>
                    <td>
                        <?= $classroom->getCapacity() ?>
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=classroom_update_form&id=<?= $classroom->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>
