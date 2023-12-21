<?php

use Mapper\ModuleMapper;

$moduleMapper = ModuleMapper::getInstance();
$modules = $moduleMapper->getList();

?>

<h2 class="mb-8">Formulaire de suppression de module</h2>

<form action="/Actions/module_delete.php" method="post" class="flex flex-col justify-center items-center ">
    <label for="moduleIdToDelete">Formulaire à supprimé:</label>
    <select id="moduleIdToDelete" name="moduleIdToDelete" required>
       <?php foreach ($modules as $module) :?>
            <option value="<?=$module->getId()?>"><?=$module->getId()?> - <?= $module->getName()?></option>
        <?php endforeach ;?>
    </select><br>

    <input type="submit" value="Soumettre">
</form>