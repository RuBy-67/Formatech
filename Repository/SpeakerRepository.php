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

}