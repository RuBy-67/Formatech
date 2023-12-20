<?php
namespace Repository;

use DB\Database;

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
                    ->executeQuery("SELECT m.moduleId as module_moduleId, m.name as module_name, m.durationModuleInHours as module_durationModuleInHours,
                                    ms.speakerId as modulespeaker_speakerId, ms.moduleId as modulespeaker_moduleId,
                                    s.speakerId as speaker_speakerId, s.firstName as speaker_firstName, s.lastName as speaker_lastName, s.mail as speaker_mail, s.password as speaker_password
                                    FROM `speaker` s
                                    JOIN modulespeaker ms ON m.moduleId = ms.moduleId
                                    JOIN module m ON m.moduleId = ms.moduleId;")
                    ->fetchAll();
    }

    public function getList(): array
    {
        return $this->database
            ->executeQuery("SELECT * FROM speaker")
            ->fetchAll();
    }
}