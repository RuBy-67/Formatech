<?php

require_once(__DIR__ . "/../Autoloader.php");

use Repository\SessionRepository;

$sessionId = $_POST['sessionId'];
    // Create an instance of SessionMapper
    $sessionRepository = new SessionRepository();
    // Call the deleteSessionInDb method
    $sessionRepository->deleteSessionInDb($sessionId);

    // Redirect back to the previous page
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
?>