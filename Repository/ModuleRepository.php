<?php
namespace Repository;

use DB\Database;
use Entity\Module;
//Interagir avec la Database 
class ModuleRepository
{
    private Database $database;
    private Module $module;

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
                                    FROM `module` m
                                    JOIN modulespeaker ms ON m.moduleId = ms.moduleId
                                    JOIN speaker s ON s.speakerId = ms.speakerId;")
                    ->fetchAll();
    }

    public function createModule(): void
    {
    
        $this->database
             ->executeQuery("INSERT INTO module (`formationId`, `name`, `durationFormationInMonth`) 
                            VALUES (?, ?, ?, ?, ?, ?)",
                            [null, ":". $this->module->getName(), ":" . $this->module->getDurationInHours()]
                        );
    }
}
