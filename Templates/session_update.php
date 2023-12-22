<?php
$sessionIdToUpdate = $_GET['id'];
require_once(__DIR__ . "\..\\Autoloader.php");
use Entity\Session;
use Mapper\SessionMapper;
use Mapper\ModuleMapper;
use Mapper\PromotionMapper;
use Mapper\SpeakerMapper;

$sessionMapper = SessionMapper::getInstance(); 
$moduleMapper = ModuleMapper::getInstance(); 
$promotionMapper = PromotionMapper::getInstance(); 
$speakerMapper = SpeakerMapper::getInstance(); 

$sessionToUpdate = $sessionMapper->getOneById($sessionIdToUpdate);
$modules = $moduleMapper->getList();
$promotions = $promotionMapper->getList();

$speakers = $speakerMapper->getList();
?>
<section class="container">
    <h2 class="text-center">Modification Session <?= $sessionIdToUpdate ?> <?= $sessionToUpdate->getDate() ?> à <?= $sessionToUpdate->getStartTime() ?></h2>
    <form action="/Actions/session_update_process.php" method="post" class="flex flex-col justify-center items-center">
        <div class="grid grid-cols-2 gap-x-8 gap-y-3 mb-8 justify-items-center">
            <div class="flex flex-col items-center">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?= $sessionToUpdate->getDate() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="startTime">Heure de début:</label>
                <input type="time" id="startTime" name="startTime" value="<?= $sessionToUpdate->getStartTime() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="endTime">Heure de fin:</label>
                <input type="time" id="endTime" name="endTime" value="<?= $sessionToUpdate->getEndTime() ?>" required><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="moduleId">Module:</label>
                <select id="moduleId" name="moduleId" required>
                    <?php foreach ($modules as $module): ?>
                        <option value="<?= $module->getId() ?>" <?= ($module->getId() == $sessionToUpdate->getModuleId()) ? 'selected' : '' ?>>
                            <?= $module->getName() ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="promotionId">Promotion:</label>
                <select id="promotionId" name="promotionId" required>
                    <?php foreach ($promotions as $promotion): ?>
                        <option value="<?= $promotion->getId() ?>" <?= ($promotion->getId() == $sessionToUpdate->getPromotionId()) ? 'selected' : '' ?>>
                            <?= $promotion->getId() ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="flex flex-col items-center">
                <label for="speakerId">Speaker:</label>
                <select id="speakerId" name="speakerId" required>
                    <?php foreach ($speakers as $speaker): ?>
                        <option value="<?= $speaker->getId() ?>" <?= ($speaker->getId() == $sessionToUpdate->getSpeakerId()) ? 'selected' : '' ?>>
                            <?= $speaker->getFirstName() . ' ' . $speaker->getLastName() ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
        </div>
        <input type="hidden" name="sessionId" value="<?= $sessionToUpdate->getId() ?>">
        <input type="submit" value="Submit Update">
    </form>    
</section>

