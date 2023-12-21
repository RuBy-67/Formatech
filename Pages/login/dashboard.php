<?php require_once(__DIR__ . "\..\\..\\Layouts\\header.php");
// Start the session


var_dump(isset($_SESSION['user_type']) || $_SESSION['user_type'] == 'employee');
// Check if the user is not an employee
if (isset($_SESSION['user_type']) || $_SESSION['user_type'] == 'employee') {
    // Redirect the user to index.php or any other login page
    header("Location: /Pages/panel_employee.php");
    exit();
}
?>