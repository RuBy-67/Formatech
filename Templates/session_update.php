<?php
require_once(__DIR__ . "\..\\Autoloader.php");
use Mapper\SessionMapper;

$sessionMapper = SessionMapper::getInstance();
$sessions = $sessionMapper->getList();
?>

<form action="/formatech/Actions/session_update.php" method="post">
    <select id="sessionToUpdate" name="sessionId" required>
        <?php
        $sessions = $sessionMapper->getList();
        foreach ($sessions as $session) {
            echo "<option value=\"{$session->getId()}\">{$session->getDate()} - {$session->getStartTime()}</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="update Session">
</form>