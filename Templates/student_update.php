<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\StudentRepository;


$studentId = 1;
//isset($_GET['studentId']) ? $_GET['studentId'] : null;


if (!$studentId) {
    header("Location: /path/to/error_page.php");
    exit;
}


$studentRepository = new StudentRepository();


$studentDetails = $studentRepository->getStudentProfilDetailsInDb($studentId);


if (!$studentDetails) {
    header("Location: /path/to/error_page.php");
    exit;
}

$firstName = $studentDetails['firstName'];
$lastName = $studentDetails['lastName'];
$mail = $studentDetails['mail'];
$birthDate = $studentDetails['birthDate'];
$password = $studentDetails['password'];
$promotionId = $studentDetails['promotionId'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour d'étudiant</title>
</head>
<body>

<h2>Mise à jour d'étudiant</h2>

<form action="/formatech/Actions/student_update.php" method="post">
    <input type="hidden" name="studentId" value="<?php echo $studentId; ?>">

    <label for="firstName">Prénom :</label>
    <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required><br>

    <label for="lastName">Nom :</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required><br>

    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail" value="<?php echo $mail; ?>" required><br>

    <label for="birthDate">Date de naissance :</label>
    <input type="date" id="birthDate" name="birthDate" value="<?php echo $birthDate; ?>" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>

    <label for="promotionId">ID de la promotion :</label>
    <input type="number" id="promotionId" name="promotionId" value="<?php echo $promotionId; ?>" required><br>

    <input type="submit" value="Mettre à jour l'étudiant">
</form>


</body>
</html>
