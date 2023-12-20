<?php 

use Mapper\FormationMapper;

$formationMapper = new FormationMapper();
$formations = $formationMapper->getList();

?>
<form action="/Actions/formation_delete.php" method="post">
    
    <label for="formationIdToDelete">Formulaire à supprimé:</label>
    <select id="formationIdToDelete" name="formationIdToDelete" required>
       <?php foreach ($formations as $formation) :?>
            <option value="<?=$formation->getId()?>"><?=$formation->getId()?> - <?= $formation->getName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>