<?php 
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\SpeakerMapper;

$formationId = 1;
//$_GET['id'];

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();
?>

<h2 class="mb-8">Formulaire de mise à jour d'intervenant</h2>

<form action="formatech/Actions/speaker_update.php" method="post" class="flex flex-col justify-center items-center ">
    <label for="speakerIdToUpdate">Intervenant à mettre à jour</label>
    <select id="speakerIdToUpdate" name="speakerIdToUpdate" required>
        <?php foreach ($speakers as $speaker) :?>
            <option value="<?=$speaker->getId()?>"><?=$speaker->getId()?> - <?= $speaker->getFirstName()?> - <?= $speaker->getLastName()?></option>
        <?php endforeach ;?>
    </select><br>

    <label for="newFirstName">Nouveau prénom</label>
    <input type="text" id="newFirstName" name="newFirstName" required><br>

    <label for="newLastName">Nouveau nom</label>
    <input type="text" id="newLastName" name="newLastName" required><br>

    <label for="newMail">Nouveau mail</label>
    <input type="email" id="newMail" name="newMail" required><br>

    <label for="newPassword">Nouveau mot de passe</label>
    <input type="password" id="newPassword" name="newPassword" required><br>

    <input type="submit" value="Mettre à jour">
</form>