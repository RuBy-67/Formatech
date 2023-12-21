<h2 class="mb-8">Formulaire de ajouts d'étudiant</h2>

<form action="/Actions/student_creation.php"   
      method="post"
      class="flex flex-col justify-center items-center h-full"
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
            <label for="birthDate">Date de naissance :</label>
            <input type="date" id="birthDate" name="birthDate" required><br>    
        </div>
        <div class="flex flex-col items-center">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>   
        </div>
        <div class="flex flex-col items-center">
            <label for="promotionId">ID de la promotion :</label>
            <input type="number" id="promotionId" name="promotionId" required><br>            
        </div>



    </div>

    <input type="submit" value="Ajouter l'étudiant">
</form>
