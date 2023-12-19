<h2>Formulaire de creation de Module</h2>

<form action="/Actions/module_creation.php" method="post">
    <label for="name">Nom du module:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="durationFormationInHours">Durée de la formation (en heures):</label>
    <input type="number" id="durationFormationInHours" name="durationFormationInHours" required><br>

    <label for="speakerIDs">Ids des Intervenants:</label>
    <legend>Merci de les saisir avec un ; pour séparer les ids des modules</legend>
    <input type="text" id="speakerIDs" name="speakerIDs" required><br>

    <input type="submit" value="Crée le module">
</form>
