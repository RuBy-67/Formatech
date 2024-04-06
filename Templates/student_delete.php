<?php
require_once(__DIR__ . "/../Autoloader.php");
use Repository\StudentRepository;
$studentId = $_POST['studentIdToDelete'] ?? null;

if (!$studentId) {
    header("Location: /Templates/student_delete_form.php");
    exit;
}
// Créez une instance de StudentRepository
$studentRepository = new StudentRepository();
// Utilisez la méthode getOneById pour obtenir les détails de l'étudiant par ID
$studentDetails = $studentRepository->getOneById($studentId);

// Vérifiez si l'étudiant existe
if (!$studentDetails) {
    // Si l'étudiant n'existe pas, redirigez l'utilisateur vers la page de suppression de l'étudiant
    header("Location: /Templates/student_delete_form.php");
    exit;

}

// Les détails de l'étudiant sont maintenant dans $studentDetails
$studentId = $studentDetails[0]['student_studentId'];
$firstName = $studentDetails[0]['student_firstName'];
$lastName = $studentDetails[0]['student_lastName'];
$mail = $studentDetails[0]['student_mail'];
$birthDate = $studentDetails[0]['student_birthDate'];
$password = $studentDetails[0]['student_password'];
$promotionId = $studentDetails[0]['promotion_formationId'];
?>
<?php
require_once(__DIR__ . '/../Layouts/header.php');
?>
<section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
    <h1 class="text-white text-center ">Supprimer un étudiant</h1>
</section>
<section class="container h-100%">
    <h3 class="mb-8 text-center">Voulez vous suprimmer l'user "<?php echo $firstName; ?> <?php echo $lastName; ?>" ?</h3>
    <form action="/Actions/student_delete.php" method="post" class="flex items-center justify-center">
        <input type="hidden" name="studentId" value="<?php echo $studentId; ?>">
        <input type="submit" value="Confirmer la suppression">
    </form>
</section>
<?php
require_once(__DIR__ . '/../Layouts/footer.php');
?>
