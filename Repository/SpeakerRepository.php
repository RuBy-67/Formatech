<?php
namespace Repository;

use DB\Database;
use Entity\Speaker;

class SpeakerRepository
{
    private Database $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }
    public function getList(): array
    {
        return $this->database
            ->executeQuery("SELECT
                                        s.speakerId as speaker_speakerId,
                                        s.firstName as speaker_firstName,
                                        s.lastName as speaker_lastName,
                                        s.mail as speaker_mail,
                                        s.password as speaker_password,
                                        ms.speakerId as modulespeaker_speakerId,
                                        ms.moduleId as modulespeaker_moduleId,
                                        m.moduleId as module_moduleId,
                                        m.name as module_name,
                                        m.durationModuleInHours as module_durationModuleInHours
                                    FROM
                                        `speaker` s
                                    LEFT JOIN
                                        modulespeaker ms ON s.speakerId = ms.speakerId
                                    LEFT JOIN
                                        module m ON m.moduleId = ms.moduleId;")
            ->fetchAll();
    }
    public function createSpeaker(string $firstName, string $lastName, string $mail, string $password): void
    {
        $speaker = new Speaker();
        $speaker->setFirstName($firstName)
                ->setLastName($lastName)
                ->setMail($mail)
                ->setPassword($password);
        $this->database
            ->executeQuery("INSERT INTO speaker (`firstName`, `lastName`, `mail`, `password`) 
                            VALUES (?, ?, ?, ?)",
                             [$speaker->getFirstName(), $speaker->getLastName(), $speaker->getMail(), $speaker->getPassword()]);
    }
    public function updateSpeaker(Speaker $speaker): void
    {
        $this->database
            ->executeQuery("UPDATE speaker SET 
                            firstName = :firstName, 
                            lastName = :lastName, 
                            mail = :mail, 
                            password = :password 
                            WHERE speakerId = :speakerId",
                [
                    'firstName' => $speaker->getFirstName(),
                    'lastName' => $speaker->getLastName(),
                    'mail' => $speaker->getMail(),
                    'password' => $speaker->getPassword(),
                    'speakerId' => $speaker->getId(),
                ]
            );
    }
    public function deleteSpeaker(int $speakerId): void
    {
        // Delete from modulespeaker
        $this->database
            ->executeQuery("DELETE FROM modulespeaker WHERE speakerId = :speakerId", ['speakerId' => $speakerId]);

        // Delete from speaker
        $this->database
            ->executeQuery("DELETE FROM speaker WHERE speakerId = :speakerId", ['speakerId' => $speakerId]);
    }

    public function getOneById(int $speakerId): ?array
    {
        return $this->database
            ->executeQuery("SELECT
                                s.speakerId as speaker_speakerId,
                                s.firstName as speaker_firstName,
                                s.lastName as speaker_lastName,
                                s.mail as speaker_mail,
                                s.password as speaker_password
                            FROM
                                `speaker` s
                            WHERE
                                s.speakerId = :speakerId ;",
                            [
                                'speakerId' => $speakerId
                            ])
            ->fetch();
    }

}