<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Mapper\SessionMapper;

$sessionMapper = SessionMapper::getInstance();
$sessions = $sessionMapper->getList();
?>

<section>
    <h2>Liste des sessions</h2>
    <table>
        <thead>
            <tr>
                <th hidden>Session ID</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Module ID</th>
                <th>Promotion ID</th>
                <th>Classroom ID</th>
                <th>Speaker ID</th>
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
                        <?= $session->getClassName() ?>
                    </td>
                    <td>
                        <?= $session->getSpeakerFirstName() ?> - <?= $session->getSpeakerLastName() ?>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</section>
