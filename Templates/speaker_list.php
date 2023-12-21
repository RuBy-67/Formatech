<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Mapper\SpeakerMapper;

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();

?>

<section class="container">
    <h2 class="text-center">Liste des Intervenant & leurs modules</h2>
    <table class="w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th>Intervenant Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Module lié</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($speakers as $speaker): ?>
                <tr>
                    <td>
                        <?= $speaker->getId() ?>
                    </td>
                    <td>
                        <?= $speaker->getFirstName() ?>
                    </td>
                    <td>
                        <?= $speaker->getLastName() ?>
                    </td>
                    <td>
                        <?= $speaker->getMail() ?>
                    </td>
                    <td>
                        <?php foreach ($speaker->getModules() as $module): ?>
                            <span class="border border-black border-solid rounded-md px-2"><?= $module->getName() ?></span>
                        <?php endforeach ?>
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=speaker_update&id=<?= $speaker->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>