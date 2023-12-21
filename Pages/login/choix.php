<?php session_start(); 

?>
<?php
require_once(__DIR__ . '\..\\..\\Layouts\\header.php');
?>
<section class="w-full h-[400px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
    <h1 class="text-white text-center ">Se connecter</h1>
</section>
<section class="container">
    <h3 class="mb-8 text-center">Je suis :</h3>
    <ul class="list-none flex flex-col items-center">
        <li><a class="button" href="connexion.php?type=etudiant">Etudiant</a></li>
        <li><a class="button" href="connexion.php?type=intervenant">Intervenant</a></li>
        <li><a class="button" href="connexion.php?type=employe">Employé</a></li>
    </ul>
</section>
<?php
require_once(__DIR__ . '\..\\..\\Layouts\\footer.php');
?>
   
