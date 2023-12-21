<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Mapper\SpeakerMapper;

$speakerMapper = SpeakerMapper::getInstance();
$speakers = $speakerMapper->getList();

?>

<section>
    <h2>Liste des Intervenant & leurs modules</h2>
    <table>
        <thead>
            <tr>
                <th hidden>Intervenant Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Module lié</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($speakers as $speaker): ?>
                <tr>
                    <td hidden>
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
                        <?= $speaker->getModuleName() ?>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</section>