<?php
use Entity\Speaker;
use Mapper\SpeakerMapper;
use Repository\SpeakerRepository;

require_once(__DIR__ . "\..\\Autoloader.php");

$speakerIdToUpdate = $_POST['id'];
$newFirstName = $_POST['newFirstName'];
$newLastName = $_POST['newLastName'];
$newMail = $_POST['newMail'];
$newPassword = $_POST['newPassword'];

$speakerMapper = SpeakerMapper::getInstance();
$speakerToUpdate = $speakerMapper->getOneById($speakerIdToUpdate);

            $speakerToUpdate->setFirstName($newFirstName)
                            ->setLastName($newLastName)
                            ->setMail($newMail)
                            ->setPassword($newPassword);

$speakerRepository = new SpeakerRepository();
            // Appeler la méthode d'update dans le mapper
            $speakerRepository->updateSpeaker($speakerToUpdate);
            header("Location:/Pages/panel_employee.php?action=speaker_list");
            exit;
            