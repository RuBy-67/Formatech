<h2 class="mb-8">Formulaire d'ajout de salle de classe</h2>

<form action="/Actions/classRoom_creation.php"   
      method="post"
      class="flex flex-col justify-center items-center"
>
    <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
        <div class="flex flex-col items-center">
            <label for="building">Bâtiment :</label>
            <input type="text" id="building" name="building" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="name">Nom de la salle :</label>
            <input type="text" id="name" name="name" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="capacityMax">Capacité maximale :</label>
            <input type="number" id="capacityMax" name="capacityMax" required><br>
        </div>
    </div>

    <input type="submit" value="Ajouter la Salle de Classe">
</form>
