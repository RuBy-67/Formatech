
<?php

session_start();


session_destroy();

// Redirigez vers la page de connexion ou une autre page après la déconnexion
header("Location:/Pages/login/choix.php");
exit();
?>