<?php
require_once(__DIR__ . "/../Autoloader.php");

use Mapper\SessionMapper;

$sessionMapper = SessionMapper::getInstance();
$sessions = $sessionMapper->getList();
?>

<section class="container">
    <h2 class=" text-center">Liste des sessions</h2>
    <table class=" w-full">
        <thead class="bg-darkGrey text-white">
            <tr>
                <th hidden>Session ID</th>
                <th>Date</th>
                <th>Heure de Début:</th>
                <th>Heure de fin</th>
                <th>Module ID</th>
                <th>Promotion ID</th>
                <th>Speaker ID</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
                <tr>
                    <td hidden>
                        <?= $session->getId() ?>
                    </td>
                    <td>
                        <?= $session->getDate() ?>
                    </td>
                    <td>
                        <?= $session->getStartTime() ?>
                    </td>
                    <td>
                        <?= $session->getEndTime() ?>
                    </td>
                    <td>
                        <?= $session->getModuleName() ?>
                    </td>
                    <td>
                        <?= $session->getPromotionId() ?>
                    </td>
                    <td>
                        <?= $session->getSpeakerFirstName() ?> - <?= $session->getSpeakerLastName() ?>
                    </td>
                    <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=session_update&id=<?= $session->getId() ?>" class="bg-white rounded-md px-1">Modifier</a></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</section>
