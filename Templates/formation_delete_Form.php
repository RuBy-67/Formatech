<?php 

use Mapper\FormationMapper;

$formationMapper = new FormationMapper();
$formations = $formationMapper->getList();

?>
<form action="/Actions/formation_creation.php" method="post">
    
    <label for="accessibility">Formulaire à supprimé:</label>
    <select id="accessibility" name="accessibility" required>
        <option value="public">Public</option>
        <option value="private">Privé</option>
    </select><br>

    <input type="submit" value="Soumettre">
</form>