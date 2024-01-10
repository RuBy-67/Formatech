<?php
session_start();
require_once(__DIR__ . "/../Autoloader.php");

use Repository\SessionRepository;

$sessionId = $_POST['sessionId'];
    // Create an instance of SessionMapper
    $sessionRepository = new SessionRepository();
    // Call the deleteSessionInDb method
    $sessionRepository->deleteSessionInDb($sessionId);

    // Redirect back to the previous page
    $_SESSION['confirmationMessage'] = 'Sessions '. $sessionId. ' Suprimmée avec succès!';
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
?>