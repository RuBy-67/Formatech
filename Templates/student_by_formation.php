<?php
use Mapper\FormationMapper ?>
<h2>Sélection de Formation</h2>

<form action="/formatech/Actions/student_list_by_formation.php" method="post">
    <label for="formationId">Sélectionnez une formation :</label>
    <select id="formationId" name="formationId" required>
        <?php
        // Remplacez ces lignes par la vraie récupération des formations depuis la base de données
        $formationMapper = FormationMapper::getInstance();
        $formationMapper = new FormationMapper();
        $formations = $formationMapper->getList();

        foreach ($formations as $formation) {
            echo "<option value='{$formation['formation_formationId']}'>{$formation['formation_name']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Afficher la liste des étudiants">
</form>