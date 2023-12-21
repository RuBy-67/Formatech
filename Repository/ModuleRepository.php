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
                                    LEFT JOIN modulespeaker ms ON m.moduleId = ms.moduleId
                                    LEFT JOIN speaker s ON s.speakerId = ms.speakerId;")
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
    
        $idNewModule = $this    ->database
                                ->getLastInsertId();

        foreach($module->getSpeakers() as $speakerId){
          
            $this   ->database
                    ->executeQuery("INSERT INTO modulespeaker (`moduleId`,`speakerId`) 
                                    VALUES (?, ?)",
                                    [$idNewModule, $speakerId]
                                    );
        }

        foreach($module->getFormations() as $formationId){
          
            $this   ->database
                    ->executeQuery("INSERT INTO moduleformation (`moduleId`,`formationId`) 
                                    VALUES (?, ?)",
                                    [$idNewModule, $formationId]
                                    );
        }
    }

    public function deleteModule(int $id): void
    {
        //Delete into Table Formation
        $this   ->database
                ->executeQuery("DELETE FROM `module`
                                WHERE `moduleId` = :moduleId"
                                ,[
                                    ':moduleId' => $id
                                ]);
        //Delete into pivot table moduleSpeaker
        $this   ->database
                ->executeQuery("DELETE FROM `modulespeaker`
                                WHERE `moduleId` = :moduleId"
                                ,[
                                    ':moduleId' => $id
                                ]
                            );
        //Delete into pivot table moduleformation
        $this   ->database
                ->executeQuery("DELETE FROM `moduleformation`
                                WHERE `moduleId` = :moduleId"
                                ,[
                                    ':moduleId' => $id
                                ]
                            );
    }

    public function getOneById(int $id): array
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
                                    LEFT JOIN modulespeaker ms ON m.moduleId = ms.moduleId
                                    LEFT JOIN speaker s ON s.speakerId = ms.speakerId
                                    WHERE m.moduleId = :moduleId;",
                                    ['moduleId' => $id])
                    ->fetchAll();
    }

    public function updateModule(Module $module): void
    {
        $this->database
             ->executeQuery("UPDATE module SET
                             name = :name,
                             durationModuleInHours = :durationModuleInHours
                             WHERE moduleId = :moduleId;",
                            [
                                'moduleId' => $module->getId(),
                                'name' => $module->getName(),
                                'durationModuleInHours' => $module->getDurationInHours()
                            ]
                        );
    }

    public function addSpeakersToModule(int $moduleId, array $speakerIdsToAdd): void
    {
        foreach($speakerIdsToAdd as $speakerIdToAdd){
            $this->database
                 ->executeQuery(
                    "INSERT INTO modulespeaker
                    (moduleId, speakerId) 
                    VALUES (:moduleId, :speakerId);",
                    [
                        'moduleId' => $moduleId,
                        'speakerId' => $speakerIdToAdd
                    ]
                 );
        }
    }

    public function removeSpeakersFromModule(int $moduleId, array $speakerIdsToRemove): void
    {
        foreach($speakerIdsToRemove as $speakerIdToRemove){
            $this->database
                 ->executeQuery(
                    "DELETE FROM modulespeaker
                    WHERE moduleId = :moduleId AND speakerId = :speakerId;",
                    [
                        'moduleId' => $moduleId,
                        'speakerId' => $speakerIdToRemove
                    ]
                 );
        }
    }
}
