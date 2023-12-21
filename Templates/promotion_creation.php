<!-- promotion_creation_form.php -->
<form action="/formatech/Actions/promotion_creation.php" method="post">
    <label for="formationId">Formation liée :</label>
    <input type="number" id="formationId" name="formationId" required><br>

    <label for="promotionYear">Année de la promotion :</label>
    <input type="number" id="promotionYear" name="promotionYear" placeholder="Année de la promotion" min="1950" max="2150" required>

    <label for="startingDate">Date de début :</label>
    <input type="date" id="startingDate" name="startingDate" required><br>

    <label for="endingDate">Date de fin :</label>
    <input type="date" id="endingDate" name="endingDate" required><br>

    <input type="submit" value="Ajouter la promotion">
</form>
