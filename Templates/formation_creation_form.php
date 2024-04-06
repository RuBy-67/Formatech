<?php

use Mapper\ModuleMapper;

$moduleMapper = ModuleMapper::getInstance();
$modules = $moduleMapper->getList();


?>
<section class="container">
    <h2 class="text-center">Formulaire de création de Formation</h2>

    <form   action="/Actions/formation_creation.php" 
            method="post"
            class="flex flex-col justify-center items-center"
    >
        <div class="grid grid-cols-2 gap-8">
            <div class="flex flex-col items-center">
                <label class="text-p" for="name">Nom de la formation:</label>
                <input type="text" id="name" name="name" required><br>
            </div>
            <div class="flex flex-col items-center">   
                <label for="durationFormationInMonth">Durée de la formation (en mois):</label>
                <input type="number" id="durationFormationInMonth" name="durationFormationInMonth" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="abbreviation">Abréviation:</label>
                <input type="text" id="abbreviation" name="abbreviation" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="rncpLvl">Niveau RNCP:</label>
<input type="number" id="rncpLvl" name="rncpLvl" min="4" max="7" pattern="[4-7]" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="accessibility">Modules</label>
                <select multiple id="moduleId" name="moduleId[]">
                    <?php foreach ($modules as $module) :?>
                        <option value="<?=$module->getId()?>"><?=$module->getId()?> - <?= $module->getName()?></option>
                    <?php endforeach ;?>
                </select><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="accessibility">Accessibilité:</label>
                <select id="accessibility" name="accessibility" required>
                    <option value="1">Public</option>
                    <option value="0">Privé</option>
                </select><br>
            </div>
        </div>       
        <input type="submit" value="Soumettre">
    </form>
</section>

