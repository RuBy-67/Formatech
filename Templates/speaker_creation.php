<?php


?>
<h2 class="mb-8">Formulaire de creation d'Intervenant</h2>


<form 
    action="/formatech/Actions/speaker_creation.php" 
    method="post"
    class="flex flex-col justify-center items-center"
>
    <div class="flex sm:flex-row gap-8">
        <div class="flex flex-col items-center">
            <label for="name">Nom de l'Intervenant:</label>
            <input type="text" id="firstName" name="firstName" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="prenom">Prénom Intervenants : </label>
            <input type="text" id="lastName" name="lastName" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="mail">mail</label>
            <input type="mail" id="mail" name="mail" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="password">password</label>
            <input type="password" id="password" name="password" required><br>
        </div>
    </div>

    </select><br>

    <input type="submit" value="Crée l'Intervenant">
</form>
