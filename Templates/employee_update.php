<?php

use Mapper\EmployeeMapper;


$EmployeeId = $_GET['id'];

$EmployeeMapper = EmployeeMapper::getInstance();
$Employee = $EmployeeMapper->getOneById($EmployeeId);


?>
<section class="container">
    <h2 class="text-center">Formulaire de modification d'information de l'employé <?= $Employee->getFirstName() ?> <?= $Employee->getLastName() ?></h2>
    <form action="/Actions/employee_edit.php"   
      method="post"
      class="flex flex-col justify-center items-center"
    >   
        <input type="hidden" name="id" value="<?= $Employee->getId() ?>" />
        <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
            <div class="flex flex-col items-center">
                <label for="firstName">Prénom :</label>
                <input type="text" id="firstName" name="firstName" value="<?= $Employee->getFirstName() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="lastName">Nom :</label>
                <input type="text" id="lastName" name="lastName" value="<?= $Employee->getLastName() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="mail">Email :</label>
                <input type="email" id="mail" name="mail" value="<?= $Employee->getMail() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="job">job:</label>
                <input type="text" id="job" name="job" value="<?= $Employee->getJob() ?>" required><br>    
            </div>
        </div>

        <button type="submit">Modifier</button>
    </form>
</section>
