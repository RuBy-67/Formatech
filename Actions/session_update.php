<?php
$sessionIdToUpdate = $_POST['sessionId'];
require_once(__DIR__ . "\..\\Autoloader.php");
use Entity\Session;
use Mapper\SessionMapper;
use Mapper\ModuleMapper;
use Mapper\PromotionMapper;
use Mapper\ClassRoomMapper;
use Mapper\SpeakerMapper;

$sessionMapper = SessionMapper::getInstance(); 
$moduleMapper = ModuleMapper::getInstance(); 
$promotionMapper = PromotionMapper::getInstance(); 
//$classRoomMapper = new ClassRoomMapper();
$speakerMapper = SpeakerMapper::getInstance(); 

$sessionToUpdate = $sessionMapper->getOneById($sessionIdToUpdate);
$modules = $moduleMapper->getList();
$promotions = $promotionMapper->getList();
//$classRooms = $classRoomMapper->getList();
$speakers = $speakerMapper->getList();
?>
<h2>Modification Session <?= $sessionIdToUpdate ?> <?= $sessionToUpdate->getStartTime() ?></h2>
<form action="/formatech/Actions/session_update_process.php" method="post">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="<?= $sessionToUpdate->getDate() ?>" required><br>

    <label for="startTime">Start Time:</label>
    <input type="time" id="startTime" name="startTime" value="<?= $sessionToUpdate->getStartTime() ?>" required><br>

    <label for="endTime">End Time:</label>
    <input type="time" id="endTime" name="endTime" value="<?= $sessionToUpdate->getEndTime() ?>" required><br>

    <label for="moduleId">Module:</label>
    <select id="moduleId" name="moduleId" required>
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module->getId() ?>" <?= ($module->getId() == $sessionToUpdate->getModuleId()) ? 'selected' : '' ?>>
                <?= $module->getName() ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="promotionId">Promotion:</label>
    <select id="promotionId" name="promotionId" required>
        <?php foreach ($promotions as $promotion): ?>
            <option value="<?= $promotion->getId() ?>" <?= ($promotion->getId() == $sessionToUpdate->getPromotionId()) ? 'selected' : '' ?>>
                <?= $promotion->getId() ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="classRoomId">Classroom:</label>
    <select id="classRoomId" name="classRoomId" required>
        <?php foreach ($classRooms as $classRoom): ?>
            <option value="<?= $classRoom->getId() ?>" <?= ($classRoom->getId() == $sessionToUpdate->getClassRoomId()) ? 'selected' : '' ?>>
                <?= $classRoom->getName() ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="speakerId">Speaker:</label>
    <select id="speakerId" name="speakerId" required>
        <?php foreach ($speakers as $speaker): ?>
            <option value="<?= $speaker->getId() ?>" <?= ($speaker->getId() == $sessionToUpdate->getSpeakerId()) ? 'selected' : '' ?>>
                <?= $speaker->getFirstName() . ' ' . $speaker->getLastName() ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="hidden" name="sessionId" value="<?= $sessionToUpdate->getId() ?>">
    <input type="submit" value="Submit Update">
</form>
