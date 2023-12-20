<?php
namespace Repository;

use DB\Database;
use Entity\Formation;
//Interagir avec la Database 

class FormationRepository
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
                                        f.formationId as formation_formationId, 
                                        f.name as formation_name, 
                                        f.durationFormationInMonth as formation_durationInMonth, 
                                        f.abbreviation as formation_abbreviation, 
                                        f.rncpLvl as formation_rncpLvl, 
                                        f.accessibility as formation_accessibility,
                                        mf.moduleId as moduleformation_moduleId,
                                        mf.formationId as moduleformation_formationId, 
                                        m.moduleId as module_moduleId, 
                                        m.name as module_name, 
                                        m.durationModuleInHours as module_durationModuleInHours
                                    FROM `formation` f
                                    JOIN moduleformation mf ON f.formationId = mf.formationId
                                    JOIN module m ON m.moduleId = mf.moduleId;")
                    ->fetchAll();
    }

    public function createFormation($name, $durationInMonth, $abbreviation, $rncpLvl, $accessibility, $selectedModuleIds): void
    {
        $formation = new Formation();
        $formation  ->setName($name)
                    ->setDurationInMonth($durationInMonth)
                    ->setAbbreviation($abbreviation)
                    ->setRncpLvl($rncpLvl)
                    ->setAccessibility($accessibility)
                    ->setModules($selectedModuleIds);

        //Insert just le module dans la table module
        $this->database
             ->executeQuery("INSERT INTO formation (`formationId`, `name`, `durationFormationInMonth`, `abbreviation`, `rncpLvl` , `accessibility`) 
                            VALUES (?, ?, ?, ?, ?, ?)",
                            [null, $formation->getName(), $formation->getDurationInMonth(), $formation->getAbbreviation(), $formation->getRncpLvl(), $formation->getAccessibility()]
        );
        
        $idNewFormation = $this ->database
                                ->executeQuery("SELECT formationId
                                                FROM formation
                                                WHERE name = :name
                                                AND durationFormationInMonth = :durationInMonth
                                                AND abbreviation = :abbreviation
                                                AND rncpLvl = :rncpLvl
                                                AND accessibility = :accessibility
                                                " ,[':name' => $name,
                                                    ':durationInMonth' => $durationInMonth,
                                                    ':abbreviation' => $abbreviation,
                                                    ':rncpLvl' => $rncpLvl,
                                                    ':accessibility' => $accessibility
                                                  ])
                                ->fetch();

        foreach($formation->getModules() as $moduleId){
            $this   ->database
                    ->executeQuery("INSERT INTO moduleformation (`moduleId`,`formationId`) 
                                    VALUES (?, ?)",
                                    [$moduleId, $idNewFormation['formationId']]
                                    );
        }
    }

    public function deleteFormation(int $id): void
    {
        //Delete into Table Formation
        $this   ->database
                ->executeQuery("DELETE FROM `formation`
                                WHERE `formationId` = :formationId"
                                ,[
                                    ':formationId' => $id
                                ]);
        //Delete into pivot table
        $this   ->database
                ->executeQuery("DELETE FROM `moduleformation`
                                WHERE `formationId` = :formationId"
                                ,[
                                    ':formationId' => $id
                                ]
                            );
    }
}
