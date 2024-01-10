<?php 
require_once(__DIR__ . "/../Autoloader.php");
use Mapper\SpeakerMapper;

$id = $_GET['id'];

$speakerMapper = SpeakerMapper::getInstance();
$speaker = $speakerMapper->getOneById($id);
?>
<section>
    <h2 class="mb-8">Formulaire de mise à jour d'intervenant</h2>

    <form action="/Actions/speaker_update.php" method="post" class="flex flex-col justify-center items-center ">
        <input type="hidden" name="id" value="<?= $speaker->getId() ?>" />
        <label for="newFirstName">Nouveau prénom</label>
        <input type="text" id="newFirstName" name="newFirstName" value="<?= $speaker->getFirstName() ?>" ><br>

        <label for="newLastName">Nouveau nom</label>
        <input type="text" id="newLastName" name="newLastName" value="<?= $speaker->getLastName() ?>" ><br>

        <label for="newMail">Nouveau mail</label>
        <input type="email" id="newMail" name="newMail" value="<?= $speaker->getMail() ?>" ><br>

        <label for="newPassword">Nouveau mot de passe</label>
        <input type="password" id="newPassword" name="newPassword" ><br>

        <input type="submit" value="Mettre à jour">
    </form>    
</section>
