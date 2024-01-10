<?php
require_once(__DIR__ . "/../Autoloader.php");
use Mapper\SpeakerMapper;

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();
?>
<section>
    <h2 class="text-center">Formulaire de suppression d'Intervenant</h2>

    <form action="/Actions/speaker_delete.php" method="post" class="flex flex-col justify-center items-center ">
        <label for="speakerIdToDelete">Intervant à suprimmer</label>
        <select id="speakerIdToDelete" name="speakerIdToDelete" required>
        <?php foreach ($speakers as $speaker) :?>
                <option value="<?=$speaker->getId()?>"><?=$speaker->getId()?> - <?= $speaker->getFirstName()?> <?= $speaker->getLastName()?></option>
            <?php endforeach ;?>
        </select><br>

        <input type="submit" value="Suprimmer">
    </form>   
</section>
