<?php

use Mapper\SpeakerMapper;

$speakerMapper = new SpeakerMapper();
$speakers = $speakerMapper->getList();

?>

<h2>Formulaire de creation de Module</h2>


<form action="/Actions/module_creation.php" method="post">
    <label for="name">Nom du module:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="durationFormationInHours">Durée de la formation (en heures):</label>
    <input type="number" id="durationFormationInHours" name="durationFormationInHours" required><br>

    <label for="speakerId">Ids des Intervenants:</label>
    <select multiple id="speakerId" name="speakerId[]" require>
        <?php foreach ($speakers as $speaker) :?>
            <option value="<?=$speaker->getId()?>"><?=$speaker->getId()?> - <?= $speaker->getName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Crée le module">
</form>
