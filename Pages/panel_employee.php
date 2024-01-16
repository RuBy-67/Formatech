<?php require_once(__DIR__ . "/../Layouts/header.php");
$confirmationMessage = '';
if (isset($_SESSION['confirmationMessage'])) {
    $confirmationMessage = $_SESSION['confirmationMessage'];
    unset($_SESSION['confirmationMessage']); // Supprimer le message après l'avoir récupéré
}

// Check if the user is not an employee
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employe') {
    // Redirect the user to index.php or any other login page
    header("Location: /index.php");
    exit();
}

?>

<div>
    <section class="w-full h-[300px] banner-bg bg-cover flex flex-col justify-center items-center mb-8 ">
        <h1 class="text-center mt-8">Panneau de gestion</h1>
    </section>
    <div class="flex mb-8">
        <section class="flex flex-col gap-2 ml-4">
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_creation">➕ Ajouter un étudiant</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_delete_form">🗑️ Retirer un étudiant</a>
            <span class="leading-span"></span>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=employee_creation_form">➕ Ajouter un employé</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=employee_delete_form">🗑️ Retirer un employé</a>
            <span class="leading-span"></span>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=speaker_creation">➕ Ajouter un intervenant</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=speaker_delete">🗑️ Retirer
                un intervenant</a>
            <span class="leading-span"></span>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_creation_form">➕ Créer une formation</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_creation_form">➕ Créer un module</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=promotion_creation">➕ Crée une promotion</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=session_creation">➕Créer
                une session</a>
            <span class="leading-span"></span>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_delete_form">🗑️ Supprimer une formation</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_delete_form">🗑️ Supprimer un module</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=promotion_delete_form">🗑️ Supprimer une promotion</a>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=session_delete">🗑️ Supprimer une session</a>
            <span class="leading-span"></span>
            <a class="bg-white rounded-md px-4 py-1"
                href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=formation_list_all">🧾 Liste des formations</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=module_list">🧾 Liste des
                modules</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=promotion_list">🧾 Liste
                des promotions</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=student_list">🧾 Liste des
                étudiants</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=employee_list">🧾 Liste
                des employés</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=speaker_list">🧾 Liste des
                intervenants</a>
            <a class="bg-white rounded-md px-4 py-1" href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=session_list">🧾 Liste des
                sessions</a>

        </section>
        <section class="flex-grow flex flex-col items-center mb-8">
            <?php if ($confirmationMessage): ?>
                <div style= "color: green; font-weight: bold; margin: 10px;">
                    <?php echo $confirmationMessage; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['action'])): ?>
                <?php require_once("../Templates/{$_GET['action']}.php"); ?>
            <?php else: ?>
                <?php require_once("../Templates/formation_creation_form.php"); ?>
            <?php endif; ?>
        </section>
    </div>
</div>

<?php require_once(__DIR__ . "/../Layouts/footer.php") ?>