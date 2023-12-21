<?php

use Mapper\FormationMapper;

$formationMapper = FormationMapper::getInstance();
$formations = $formationMapper->getList();
?>

<h2 >Nos formations</h2>
<table class="table-spacing">
    <thead class="bg-darkGrey text-white">
        <tr>
            <th>Id de la formation</th>
            <th>Nom</th>
            <th>Durée en mois</th>
            <th>Abréviation</th>
            <th>Niveau RNCP</th>
            <th>Visibilité</th>
            <th>Modules liés</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($formations as $formation):?>
            <?php if($formation->getAccessibility())
            {
                $visibility = 'Public';
            }
            else
            {
                    $visibility = 'Privé';
            }
                
            ?>
            <tr>
                <td><?= $formation->getId()?></td>
                <td><?= $formation->getName()?></td>
                <td><?= $formation->getDurationInMonth()?></td>
                <td><?= $formation->getAbbreviation()?></td>
                <td><?= $formation->getRncpLvl()?></td>
                <td><?= $visibility?></td>
                <td>
                    <?php foreach($formation->getModules() as $module):?>
                    <span><?= $module->getName() ?></span>
                    <?php endforeach ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
