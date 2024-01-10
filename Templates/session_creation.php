<?php
require_once(__DIR__ . "/../Autoloader.php");

use Repository\SpeakerRepository;
use Repository\ModuleRepository;
use Repository\PromotionRepository;
// use Repository\ClassRoomRepository;

$speakerRepository = new SpeakerRepository();
$speakers = $speakerRepository->getList();


$moduleRepository = new ModuleRepository();
$modules = $moduleRepository->getList();

$promotionRepository = new PromotionRepository();
$promotions = $promotionRepository->getList();
//$classRoomRepository = new ClassRoomRepository();
//$classRooms = $classRoomRepository->getList();
?>
<section class="container">
    <h2 class="text-center">Création de Sessions</h2>

    <form action="/Actions/session_creation.php" method="post" class="flex flex-col justify-center items-center">
        <div class="grid grid-cols-2 gap-8">
            <div class="flex flex-col items-center">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br>
            </div>
            <div class="flex flex-col items-center">  
                <label for="startTime">Start Time:</label>
                <input type="time" id="startTime" name="startTime" required><br>
            </div>
            <div class="flex flex-col items-center">  
                <label for="endTime">End Time:</label>
                <input type="time" id="endTime" name="endTime" required><br>
            </div>
            <div class="flex flex-col items-center">  
                <label for="moduleId">Module:</label>
                <select id="moduleId" name="moduleId" required>
                    <?php foreach ($modules as $module): ?>
                        <option value="<?= $module['module_moduleId'] ?>">
                            <?= $module['module_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="flex flex-col items-center">  
                <label for="promotionId">Promotion:</label>
                <select id="promotionId" name="promotionId" required>
                    <?php foreach ($promotions as $promotion): ?>
                        <option value="<?= $promotion['promotion_promotionId'] ?>">
                            <?= $promotion['promotion_promotionId'] ?> - 
                            <?= $promotion['promotion_promotionYear'] ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
            <div class="flex flex-col items-center">  
                <label for="speakerId">Speaker:</label>
                <select id="speakerId" name="speakerId" required>
                    <?php foreach ($speakers as $speaker): ?>
                        <option value="<?= $speaker['speaker_speakerId'] ?>">
                            <?= $speaker['speaker_firstName'] . ' ' . $speaker['speaker_lastName'] ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
            </div>
        </div>

        <input type="submit" value="Create Session">
    </form>


