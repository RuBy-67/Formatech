<!-- promotion_creation_form.php -->
<section>
    <h2 class="text-center">Formulaire de création de Promotion</h2>
    <form action="/Actions/promotion_creation.php" method="post" class="flex flex-col justify-center items-center">
        <div class="grid grid-cols-2 gap-8">
            <div class="flex flex-col items-center">
                <label for="formationId">ID de la formation liée :</label>
                <input type="number" id="formationId" name="formationId" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="promotionYear">Année de la promotion :</label>
                <input type="number" id="promotionYear" name="promotionYear" placeholder="Année de la promotion" min="1950" max="2150" required>
            </div>
            <div class="flex flex-col items-center">
                <label for="startingDate">Date de début :</label>
                <input type="date" id="startingDate" name="startingDate" required><br>
 
            </div>
            <div class="flex flex-col items-center">
                <label for="endingDate">Date de fin :</label>
                <input type="date" id="endingDate" name="endingDate" required><br>
            </div>
        </div>
        <input type="submit" value="Ajouter la promotion">
    </form>
</section>

    
