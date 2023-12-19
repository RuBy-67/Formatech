<?php

use Mapper\ModuleMapper;

$moduleMapper = new ModuleMapper();
$modules = $moduleMapper->getList();


?>

<h2>Formulaire de creation de Formation</h02>

<form action="/Actions/formation_creation.php" method="post">
    <label for="name">Nom de la formation:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="durationFormationInMonth">Durée de la formation (en mois):</label>
    <input type="number" id="durationFormationInMonth" name="durationFormationInMonth" required><br>

    <label for="abbreviation">Abréviation:</label>
    <input type="text" id="abbreviation" name="abbreviation" required><br>

    <label for="rncpLvl">Niveau RNCP:</label>
    <input type="number" id="rncpLvl" name="rncpLvl" required><br>

    <label for="accessibility">Modules</label>

    <select multiple id="moduleId" name="moduleId[]" require>
        <?php foreach ($modules as $module) :?>
            <option value="<?=$module->getId()?>"><?=$module->getId()?> - <?= $module->getName()?></option>
        <?php endforeach ;?>
    </select><br>

    <label for="accessibility">Accessibilité:</label>
    <select id="accessibility" name="accessibility" required>
        <option value="public">Public</option>
        <option value="private">Privé</option>
    </select><br>

    <input type="submit" value="Soumettre">
</form>
