<?php require_once(__DIR__ . "\..\\Laytouts\\header.php") ?>

<div class="container bg-lightGrey">
    <h2 class="text-black mb-5 text-center">Panneau de gestion</h2>
    <div class="flex">
        <section class="flex flex-col gap-2">
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_creation_form">Créer une formation</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_creation_form">Créer un module</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_delete_form">Supprimer une formation</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_delete_form">Supprimer un module</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_list">Liste des formations</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_list">Liste des modules</a>
        </section>
        <section class="flex-grow flex flex-col items-center" >
            <?php if(isset($_GET['action'])): ?>
                <?php require("../Templates/{$_GET['action']}.php"); ?>
            <?php endif; ?>
        </section>
    </div>
</div>

<?php require_once(__DIR__ . "\..\\Laytouts\\footer.php") ?>