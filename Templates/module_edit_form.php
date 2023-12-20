<?php

use Mapper\ModuleMapper;
use Mapper\SpeakerMapper;

$moduleId = $_GET['id'];

$moduleMapper = ModuleMapper::getInstance();
$module = $moduleMapper->getOneById($moduleId);

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();
?>

<form action="/Actions/module_edit.php" method="post" class="flex flex-col gap-4">
    <input type="hidden" name="id" value="<?= $module->getId() ?>" />
    <input type="text" name="name" value="<?= $module->getName() ?>" />
    <input type="number" name="durationInHours" value="<?= $module->getDurationInHours() ?>" />
    <select multiple name="speakers[]">
        <?php foreach($speakers as $speaker): ?>
            <option
                value="<?= $speaker->getId() ?>"
                <?= in_array($speaker->getId(), $module->getSpeakersIds()) ? 'selected' : '' ?>
            >
                <?= $speaker->getFirstName() ?> <?= $speaker->getLastName() ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Modifier</button>
</form>