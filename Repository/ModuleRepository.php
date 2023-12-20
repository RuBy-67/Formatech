<?php
namespace Repository;

use DB\Database;
use Entity\Module;
//Interagir avec la Database 
class ModuleRepository
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
                                        m.moduleId as module_moduleId, 
                                        m.name as module_name, 
                                        m.durationModuleInHours as module_durationModuleInHours,
                                        ms.speakerId as modulespeaker_speakerId, 
                                        ms.moduleId as modulespeaker_moduleId,
                                        s.speakerId as speaker_speakerId, 
                                        s.firstName as speaker_firstName, 
                                        s.lastName as speaker_lastName, 
                                        s.mail as speaker_mail, 
                                        s.password as speaker_password
                                    FROM `module` m
                                    JOIN modulespeaker ms ON m.moduleId = ms.moduleId
                                    JOIN speaker s ON s.speakerId = ms.speakerId;")
                    ->fetchAll();
    }


    public function createModule(string $name, int $durationInHours, array $speakerIDs): void
    {
        
        $module = new Module();
        $module ->setName($name)
                ->setDurationInHours($durationInHours)
                ->setSpeakers($speakerIDs);
        //Insert just le module dans la table module
        $this->database
             ->executeQuery("INSERT INTO module (`moduleId`, `name`, `durationModuleInHours`) 
                            VALUES (?, ?, ?)",
                            [null, $module->getName(), $module->getDurationInHours()]
                        );
    
        $idNewModule = $this ->database
                                ->executeQuery("SELECT moduleId
                                                FROM module
                                                WHERE name = :name
                                                AND durationModuleInHours = :durationModuleInHours
                                                " ,[':name' => $name,
                                                    ':durationModuleInHours' => $durationInHours,
                                                  ])
                                ->fetch();
        
        foreach($module->getSpeakers() as $speakerId){
          
            $this   ->database
                    ->executeQuery("INSERT INTO modulespeaker (`moduleId`,`speakerId`) 
                                    VALUES (?, ?)",
                                    [$idNewModule['moduleId'], $speakerId]
                                    );
        }
    }
}
