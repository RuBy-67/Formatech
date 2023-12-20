<?php
require_once(__DIR__ . "\..\\Autoloader.php");

?>
<form method="get">
    <label for="action">Action à effectuer:</label>
    <select id="action" name="action" required>
        <option value="formation_creation_form">Crée une nouvelle formation</option>
        <option value="module_creation_from">Crée un nouveau Module</option>
        <option value="formation_delete_form">Supprimer une formation</option>
        <option value="module_delete_form">Supprimer un module</option>
        <option value="formation_list">Afficher la liste des formations</option>
        <option value="module_list">Afficher la liste des modules</option>
    </select><br>
    <input type="submit" value="Acceder au panel de gestion de l'action">
</form>


<?php 
if(isset($_GET['action']))
{
    require("../Templates/{$_GET['action']}.php");
    
}

?>