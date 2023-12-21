<?php

use Entity\Formation;
use Mapper\FormationMapper;
use Mapper\ModuleMapper;

$formationId = $_GET['id'];

$formationMapper = FormationMapper::getInstance();
$formation = $formationMapper->getOneById($formationId);

$moduleMapper = ModuleMapper::getInstance();
$modules = $moduleMapper->getList();

if($formation->getAccessibility())
    {
        $visibility = 'Public';
    }
    else
    {
        $visibility = 'Privé';
    }
                


?>

<form action="/Actions/formation_edit.php" method="post" class="flex flex-col gap-4">
    <input type="hidden" name="id" value="<?= $formation->getId() ?>" />
    <div class="flex sm:flex-row gap-8">
        <div class="flex flex-col items-center">
            <label class="text-p" for="name">Nom de la formation:</label>
            <input type="text" name="name" value="<?= $formation->getName() ?>" />
        </div>
        <div class="flex flex-col items-center">
           <label for="durationFormationInMonth">Durée de la formation (en mois):</label>    
            <input type="number" name="durationInMonth" value="<?= $formation->getDurationInMonth() ?>" />
        </div>
    </div>   
    <div class="flex sm:flex-row gap-8">
        <div class="flex flex-col items-center">
            <label for="abbreviation">Abréviation:</label>
            <input type="text" name="abbreviation" value="<?= $formation->getAbbreviation() ?>" />
        </div>
        <div class="flex flex-col items-center">
            <label for="rncpLvl">Niveau RNCP:</label>
            <input type="number" name="rncpLvl" value="<?= $formation->getRncpLvl() ?>" />
        </div>
    </div>

    <label for="accessibility">Visibilité:</label>
    <select id="accessibility" name="accessibility" required>
        <option value="1" <?= $formation->getAccessibility()== 1 ? 'selected' : ''?> >Public</option>
        <option value="0" <?= $formation->getAccessibility()== 0 ? 'selected' : ''?> >Privé</option>
    </select><br>
    <label for="modules[]">Modules de la formation:</label>
    <select multiple name="modules[]">
        <?php foreach($modules as $module): ?>
            <option
                value="<?= $module->getId() ?>"
                <?= in_array($module->getId(), $formation->getModulesIds()) ? 'selected' : '' ?>
            >
                <?= $module->getId() ?> <?= $module->getName() ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Modifier</button>
</form>