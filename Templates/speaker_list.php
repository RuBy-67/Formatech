<?php
//Todo voir si pk la list est bizzar
use Mapper\SpeakerMapper;

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();
?>

<section class="container">
    <h2  class=" text-center">Nos speakers</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>Id du speaker</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Modules de l'intervenant</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($speakers as $speaker):?>
                <tr>
                    <td><?= $speaker->getId()?></td>
                    <td><?= $speaker->getFirstName()?></td>
                    <td><?= $speaker->getLastName()?></td>
                    <td><?= $speaker->getMail()?></td>
                    <td>
                        <?php foreach($speaker->getModules() as $module):?>
                            <span> <?= $module->getId() ?> - <?= $module->getName() ?></span>
                        <?php endforeach ?>
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=speaker_update&id=<?= $speaker->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>