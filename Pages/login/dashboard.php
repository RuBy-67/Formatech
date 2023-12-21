<?php require_once(__DIR__ . "\..\\..\\Layouts\\header.php");
// Start the session

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'employe') {
    header("Location: /Pages/panel_employee.php");
    exit();
}

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'etudiant') {
    header("Location: /Pages/panel_student.php");
    exit();
}

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>