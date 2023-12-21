<?php
require_once(__DIR__ . "\..\\Autoloader.php");

use Repository\SpeakerRepository;
use Repository\ModuleRepository;
use Repository\PromotionRepository;
use Repository\ClassRoomRepository;

$speakerRepository = new SpeakerRepository();
$speakers = $speakerRepository->getList();


$moduleRepository = new ModuleRepository();
$modules = $moduleRepository->getList();

$promotionRepository = new PromotionRepository();
$promotions = $promotionRepository->getList();
//$classRoomRepository = new ClassRoomRepository();
//$classRooms = $classRoomRepository->getList();
?>
<h2>Create Session</h2>

<form action="/formatech/Actions/session_creation.php" method="post">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>

    <label for="startTime">Start Time:</label>
    <input type="time" id="startTime" name="startTime" required><br>

    <label for="endTime">End Time:</label>
    <input type="time" id="endTime" name="endTime" required><br>

    <label for="moduleId">Module:</label>
    <select id="moduleId" name="moduleId" required>
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module['module_moduleId'] ?>">
                <?= $module['module_name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>


    <label for="promotionId">Promotion:</label>
    <select id="promotionId" name="promotionId" required>
        <?php foreach ($promotions as $promotion): ?>
            <option value="<?= $promotion['promotion_promotionId'] ?>">
                <?= $promotion['promotion_promotionId'] ?> - 
                <?= $promotion['promotion_promotionYear'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="classRoomId">Classroom:</label>
    <select id="classRoomId" name="classRoomId" required>
        <?php foreach ($classrooms as $classroom): ?>
            <option value="<?= $classroom['classroom_classroomId'] ?>">
                <?= $classroom['classroom_$classroomName'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>


    <label for="speakerId">Speaker:</label>
    <select id="speakerId" name="speakerId" required>
        <?php foreach ($speakers as $speaker): ?>
            <option value="<?= $speaker['speaker_speakerId'] ?>">
                <?= $speaker['speaker_firstName'] . ' ' . $speaker['speaker_lastName'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>


    <input type="submit" value="Create Session">
</form>

</body>