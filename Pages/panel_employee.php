<?php require_once(__DIR__ . "\..\\Layouts\\header.php") ?>

<div>
    <section class="w-full h-[300px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
        <h1 class="text-center mt-8">Panneau de gestion</h1> 
    </section>
    <div class="flex">
        <section class="flex flex-col gap-2 ml-4"> 
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_creation">Ajouter un étudiant</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_creation_form">Créer une formation</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_creation_form">Créer un module</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_creation">Crée une promotion</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_delete_form">Supprimer une formation</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_delete_form">Supprimer un module</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_list_all">Liste des formations</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_list">Liste des modules</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_list">Liste des étudiants</a>
            
        </section>
        <section class="flex-grow flex flex-col items-center mb-8" >
            <?php if(isset($_GET['action'])): ?>
                <?php require("../Templates/{$_GET['action']}.php"); ?>
            <?php else: ?>
                <?php require("../Templates/formation_creation_form.php"); ?>
            <?php endif; ?>
        </section>
    </div>
</div>

<?php require_once(__DIR__ . "\..\\Layouts\\footer.php") ?>