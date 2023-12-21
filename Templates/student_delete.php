<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\StudentRepository;
$studentId = 2;

if (!$studentId) {
    header("Location: /path/to/error_page.php");
    exit;
}
// Créez une instance de StudentRepository
$studentRepository = new StudentRepository();
// Utilisez la méthode getStudentProfilDetailsInDb pour obtenir les détails de l'étudiant par ID
$studentDetails = $studentRepository->getStudentProfilDetailsInDb($studentId);

// Vérifiez si l'étudiant existe
if (!$studentDetails) {
    header("Location: /path/to/error_page.php");
    exit;
}

// Les détails de l'étudiant sont maintenant dans $studentDetails
$firstName = $studentDetails['firstName'];
$lastName = $studentDetails['lastName'];
$mail = $studentDetails['mail'];
$birthDate = $studentDetails['birthDate'];
$promotionId = $studentDetails['promotionId'];
?>

Voulez vous suprimmer l'user "<?php echo $firstName; ?> <?php echo $lastName; ?>" ?

<form action="/formatech/Actions/student_delete.php" method="post">
    <input type="hidden" name="studentId" value="<?php echo $studentId; ?>">
    <input type="submit" value="Confirmer la suppression">
</form>