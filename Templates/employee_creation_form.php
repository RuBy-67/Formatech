<h2 class="mb-8">Formulaire d'ajouts d'employé</h2>

<form action="/Actions/employee_creation.php"   
      method="post"
      class="flex flex-col justify-center items-center"
>
    <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
        <div class="flex flex-col items-center">
            <label for="firstName">Prénom :</label>
            <input type="text" id="firstName" name="firstName" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="lastName">Nom :</label>
            <input type="text" id="lastName" name="lastName" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="mail">Email :</label>
            <input type="email" id="mail" name="mail" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="job">job:</label>
            <input type="text" id="job" name="job" required><br>    
        </div>
        <div class="flex flex-col items-center">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>   
        </div>
    </div>

    <input type="submit" value="Ajouter l'Employé">
</form>
