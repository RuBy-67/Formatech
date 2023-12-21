<?php

require_once(__DIR__ . "..\..\..\Autoloader.php");
use DB\Database;

$database = new Database();
$type = $_GET['type'];
if ($type != "etudiant" && $type != "intervenant" && $type != "employe") {
    header("Location: index.php");
    exit();

}

?>

<?php
require_once(__DIR__ . '\..\\..\\Layouts\\header.php');
?>
<section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
    <h1 class="text-white text-center ">Connexion
        <?php echo $type; ?></h1>
</section>
<section class="container">
    <form method="post" class="flex flex-col items-center">
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        <label for="mail">Adresse e-mail :</label>
        <input type="text" id="mail" name="mail" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Se connecter">
    </form>
    </section>
<?php
var_dump(password_hash('mdp', PASSWORD_DEFAULT));
require_once(__DIR__ . '\..\\..\\Layouts\\footer.php');
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $table = '';
    $idColumnName = '';
    if ($type == "etudiant") {
        $table = "Student";
        $idColumnName = 'studentId';
    } else if ($type == "intervenant") {
        $table = "Speaker";
        $idColumnName = 'speakerId';
    } else if ($type == "employe") {
        $table = "Employees";
        $idColumnName = 'employeeId';
    } else {
        header("Location: index.php");
        exit();
    }

    $result = getUserbyDb( $mail, $password, $table, $database);
    if ($result->rowCount() > 0) {
        $user = $result->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user_id'] = $user[$idColumnName];
        $_SESSION['user_type'] = $type;
        $_SESSION['user_firstname'] = $user['firstName'];
        $_SESSION['user_lastname'] = $user['lastName'];
        $_SESSION['user_mail'] = $user['mail'];

        // Redirect the user to a dashboard page, for example
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Aucun utilisateur correspondant sur " . $type . ".";
    }
}
function getUserbyDb($mail, $password, $table, $database)
{
    $result = $database->executeQuery(
        "SELECT * FROM $table WHERE mail = ? AND password = ?",
        [$mail, $password]
    );

    return $result;
}
?>