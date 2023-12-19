<?php
require_once(__DIR__ . "\..\\Autoloader.php");
?>
<form method="get">
    <label for="action">Action à effectuer:</label>
    <select id="action" name="action" required>
        <option value="create_formation">Crée une nouvelle formation</option>
        <option value="create_module">Crée un nouveau Module</option>
    </select><br>
    <input type="submit" value="Acceder au panel de gestion de l'action">
</form>


<?php 
if(isset($_GET['action']))
{
    if($_GET['action']=='create_formation')
    {
        //add new formation
        require('../Templates/formation_creation_form.php');
    }
    elseif($_GET['action']=='create_module')
    {
        //add new formation
        require_once('../Templates/module_creation_form.php');
    }
}

?>