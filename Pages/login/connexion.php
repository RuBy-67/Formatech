<?php
session_start();
use Db\Database;

$database = Database::getInstance();
$type = $_GET['type'];
if ($type != "etudiant" || $type != "intervenant" || $type != "employe") {
    header("Location: index.php");
    exit();

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Connexion
        <?php echo $type; ?>
    </title>
</head>

<body>
    <h2>Connexion
        <?php echo $type; ?>
    </h2>
    <form method="post">
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        <label for="mail">Adresse e-mail :</label>
        <input type="text" id="mail" name="mail" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Se connecter">
    </form>
</body>

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

    $result = getUserbyDb($type, $mail, $password, $database);
    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $_SESSION['user_id'] = $user[$idColumnName];
            $_SESSION['user_type'] = $type;
            $_SESSION['user_firstname'] = $user['firstName'];
            $_SESSION['user_lastname'] = $user['lastName'];
            $_SESSION['user_mail'] = $user['mail'];

            //! Redirigez l'utilisateur vers une page de tableau de bord par exemple
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Aucun utilisateur correspondant sur " . $type . ".";
        }
    } else {
        echo "Erreur dans la requête SQL.";
    }
}
?>