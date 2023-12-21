<form action="/Actions/student_creation.php" method="post">
    <label for="firstName">Prénom :</label>
    <input type="text" id="firstName" name="firstName" required><br>

    <label for="lastName">Nom :</label>
    <input type="text" id="lastName" name="lastName" required><br>

    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail" required><br>

    <label for="birthDate">Date de naissance :</label>
    <input type="date" id="birthDate" name="birthDate" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>

    <label for="promotionId">ID de la promotion :</label>
    <input type="number" id="promotionId" name="promotionId" required><br>

    <input type="submit" value="Ajouter l'étudiant">
</form>
