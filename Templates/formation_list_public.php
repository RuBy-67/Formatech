<?php

use Mapper\FormationMapper;

$formationMapper = FormationMapper::getInstance();
$formations = $formationMapper->getListPublic();
?>

<h2 class="text-center mb-8">Nos formations</h2>
    <article class=" container grid grid-cols-3 gap-y-12 ">
        <?php foreach($formations as $formation):?>
                <div class="flex flex-col justify-center items-center card p-3 ">
                    <p><?= $formation->getName()?></p>
                    <p>Durée: <strong><?= $formation->getDurationInMonth()?> mois</strong></p>
                    <p>Niveau Rncp: <strong><?= $formation->getRncpLvl()?></strong></p>
                    <p><strong>---</strong></p>
                    <p class="flex flex-col items-center">Contenue de la formation : 
                        <?php foreach($formation->getModules() as $module):?>
                            <center><span><?= $module->getName() ?></span><center>
                        <?php endforeach ?>
                    </p>
                </div>
            <?php endforeach ?>
     </article>
    
