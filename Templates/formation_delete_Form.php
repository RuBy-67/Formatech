<?php 

use Mapper\FormationMapper;

$formationMapper = FormationMapper::getInstance();
$formations = $formationMapper->getList();

?>

<h2 class="mb-8">Formulaire de suppression de formation</h2>
<form action="/Actions/formation_delete.php" method="post" class="flex flex-col justify-center items-center ">
    
    <label for="formationIdToDelete">Formation à supprimé:</label>
    <select id="formationIdToDelete" name="formationIdToDelete" required>
       <?php foreach ($formations as $formation) :?>
            <option value="<?=$formation->getId()?>"><?=$formation->getId()?> - <?= $formation->getName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>