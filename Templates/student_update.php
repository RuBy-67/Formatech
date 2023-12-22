<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\StudentRepository;
use Mapper\PromotionMapper;

$promotionMapper = PromotionMapper::getInstance();
$promotions = $promotionMapper->getList();

isset($_GET['id']) ? $studentId = $_GET['id'] : null;

if (!isset($studentId)) {
    header("Location: /path/to/error_page.php");
    exit;
}


$studentRepository = new StudentRepository();


$studentDetails = $studentRepository->getOneById($studentId);

if (!$studentDetails) {
    header("Location: /path/to/error_page.php");
    exit;
}

$studentId = $studentDetails[0]['student_studentId'];
$firstName = $studentDetails[0]['student_firstName'];
$lastName = $studentDetails[0]['student_lastName'];
$mail = $studentDetails[0]['student_mail'];
$birthDate = $studentDetails[0]['student_birthDate'];
$password = $studentDetails[0]['student_password'];
$promotionId = $studentDetails[0]['promotion_formationId'];
?>

<form action="/Actions/student_update.php" method="post" class="flex flex-col justify-center items-center">
    <input type="hidden" name="studentId" value="<?php echo $studentId; ?>">
    <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
        <div class="flex flex-col items-center">
            <label for="firstName">Prénom :</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="lastName">Nom :</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="mail">Email :</label>
            <input type="email" id="mail" name="mail" value="<?php echo $mail; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="birthDate">Date de naissance :</label>
            <input type="date" id="birthDate" name="birthDate" value="<?php echo $birthDate; ?>" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>
        </div>
        <div class="flex flex-col items-center">
            <label for="promotionId">ID de la promotion :</label>
            <select id="promotionId" name="promotionId" required>
                <?php foreach ($promotions as $promotion): ?>
                    <option value="<?php echo $promotion->getId(); ?>" <?php echo ($promotion->getId() == $promotionId) ? 'selected' : ''; ?>>
                        <?php echo $promotion->getId(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="submit" value="Mettre à jour l'étudiant">
</form>