<?php

use Mapper\ModuleMapper;

$moduleMapper = ModuleMapper::getInstance();
$modules = $moduleMapper->getList();
?>

<section class="container">
    <h2  class=" text-center">Nos modules</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>Id du module</th>
                <th>Nom</th>
                <th>Durée en heures</th>
                <th>Intervenants</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($modules as $module):?>
                <tr>
                    <td><?= $module->getId()?></td>
                    <td><?= $module->getName()?></td>
                    <td><?= $module->getDurationInHours()?></td>
                    <td>
                        <?php foreach($module->getSpeakers() as $speaker):?>
                            <span><?= $speaker->getFirstName() ?> <?= $speaker->getLastName() ?> </span>
                        <?php endforeach ?>
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_edit_form&id=<?= $module->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>