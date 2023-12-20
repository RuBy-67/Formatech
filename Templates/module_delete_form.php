<?php

use Mapper\ModuleMapper;

$moduleMapper = new ModuleMapper();
$modules = $moduleMapper->getList();

?>
<form action="/Actions/module_delete.php" method="post">
    
    <label for="moduleIdToDelete">Formulaire à supprimé:</label>
    <select id="moduleIdToDelete" name="moduleIdToDelete" required>
       <?php foreach ($modules as $module) :?>
            <option value="<?=$module->getId()?>"><?=$module->getId()?> - <?= $module->getName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>