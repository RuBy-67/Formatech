<?php
require_once(__DIR__ . "/../Autoloader.php");
use Mapper\SessionMapper;

$sessionMapper = SessionMapper::getInstance();
$sessions = $sessionMapper->getList();
?>
<section>
    <h2>Formulaire de suppression</h2>
    <form action="/Actions/session_delete.php" method="post" class="flex flex-col items-center">
        <select id="sessionToDelete" name="sessionId" required>
            <?php
            $sessions = $sessionMapper->getList();
            foreach ($sessions as $session) :?>
                <option value="<?= $session->getId()?>">Session du :<?=$session->getDate()?> de <?=$session->getStartTime()?> à <?=$session->getEndTime()?></option>";
            <?php endforeach;?>
        </select><br>
    <input type="submit" value="Delete Session">
</form>
</section>

