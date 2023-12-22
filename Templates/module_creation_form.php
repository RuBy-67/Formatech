<?php

use Mapper\SpeakerMapper;
use Mapper\FormationMapper;

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();

$formationMapper = FormationMapper::getInstance();
$formations = $formationMapper->getList();
?>
<section class="container">
    <h2 class="text-center">Formulaire de creation de Module</h2>

    <form 
        action="/Actions/module_creation.php" 
        method="post"
        class="flex flex-col justify-center items-center"
    >
        <div class="flex sm:flex-row gap-8">
            <div class="flex flex-col items-center">
                <label for="name">Nom du module:</label>
                <input type="text" id="name" name="name" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="durationFormationInHours">Durée de la formation (en heures):</label>
                <input type="number" id="durationFormationInHours" name="durationFormationInHours" required><br>
            </div>
        </div>

        <label for="speakerId">Intervenants du module:</label>
        <select multiple id="speakerId" name="speakerId[]" require>
            <?php foreach ($speakers as $speaker) :?>
                <option value="<?=$speaker->getId()?>"><?=$speaker->getId()?> - <?= $speaker->getFirstName()?> <?= $speaker->getLastName()?></option>
            <?php endforeach?>
        </select><br>
        
        <label for="formationId">Formations liée au module:</label>
        <select multiple id="formationId" name="formationId[]" require>
            <?php foreach ($formations as $formation) :?>
                <option value="<?=$formation->getId()?>"><?=$formation->getId()?> - <?= $formation->getName()?></option>
            <?php endforeach?>
        </select><br>

        <input type="submit" value="Crée le module">
    </form>
</section>
