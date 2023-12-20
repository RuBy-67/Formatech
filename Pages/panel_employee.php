<?php
require_once(__DIR__ . "\..\\Autoloader.php");
?>
<form method="get">
    <label for="action">Action à effectuer:</label>
    <select id="action" name="action" required>
        <option value="formation_creation">Crée une nouvelle formation</option>
        <option value="module_creation">Crée un nouveau Module</option>
        <option value="module_creation">Supprimer une formation</option>
    </select><br>
    <input type="submit" value="Acceder au panel de gestion de l'action">
</form>


<?php 
if(isset($_GET['action']))
{
    require("../Templates/{$_GET['action']}_form.php");
    
}

?>