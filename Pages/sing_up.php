<?php 
require_once(__DIR__ . "\..\\Autoloader.php");
session_start(); 

use Entity\Employee;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $job = $_POST["job"];
    $mail = $_POST["mail"];

    // Créer une instance de la classe Employee
    $employee = new Employee($firstName, $lastName, $job, $mail);

    // Appeler la méthode pour ajouter un nouvel employé
    $employee->addNewEmployee($firstName, $lastName, $job, $mail);

    // Afficher un message de succès
    echo "Nouvel employé ajouté avec succès!";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>

    <h2>Formulaire de Connexion</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="firstName">Prénom:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Nom de famille:</label>
        <input type="text" name="lastName" required><br>

        <label for="job">Poste:</label>
        <input type="text" name="job" required><br>

        <label for="mail">Email:</label>
        <input type="email" name="mail" required><br>

        <input type="submit" value="Connexion">
    </form>

</body>
</html>