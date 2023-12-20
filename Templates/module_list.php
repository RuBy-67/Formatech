<?php

use Mapper\ModuleMapper;

$moduleMapper = new ModuleMapper();
$modules = $moduleMapper->getList();
?>

<section>
    <h2>Nos modules</h2>
    <table>
        <thead>
            <tr>
                <th>Id du module</th>
                <th>Nom</th>
                <th>Durée en heures</th>
                <th>Intervenants</th>
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
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>