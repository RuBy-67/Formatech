<?php
namespace Repository;

use DB\Database;
use Entity\ClassRoom;
//Interagir avec la Database 
class ClassRoomRepository
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
                                    c.classRoomId, 
                                    c.building, 
                                    c.name, 
                                    c.capacityMax
                                FROM `classroom` c;")
                ->fetchAll();
}


public function createClassroom(string $building, string $name, int $capacityMax): void
{
    $classroom = new Classroom();
    $classroom->setBuilding($building)
              ->setName($name)
              ->setCapacity($capacityMax);
    
    $this->database
         ->executeQuery("INSERT INTO classroom (`building`, `name`, `capacityMax`) 
                        VALUES (?, ?, ?)",
                        [$classroom->getBuilding(), $classroom->getName(), $classroom->getCapacity()]
                    );
}


public function deleteClassroom(int $classroomId): void
{
    $this->database
         ->executeQuery("DELETE FROM `classroom`
                        WHERE `classRoomId` = :classRoomId",
                        [
                            'classRoomId' => $classroomId
                        ]);
}


public function getOneById(int $classroomId): array
{
    return $this->database
                ->executeQuery("SELECT 
                                    c.classRoomId, 
                                    c.building, 
                                    c.name, 
                                    c.capacityMax
                                FROM `classroom` c
                                WHERE c.classRoomId = :classRoomId;",
                                ['classRoomId' => $classroomId])
                ->fetchAll();
}

public function updateClassroom(Classroom $classroom): void
{
    $this->database
         ->executeQuery("UPDATE classroom SET
                            building = :building, 
                            name = :name, 
                            capacityMax = :capacityMax
                         WHERE classRoomId = :classRoomId;",
                        [
                            'classRoomId' => $classroom->getId(),
                            'building' => $classroom->getBuilding(),
                            'name' => $classroom->getName(),
                            'capacityMax' => $classroom->getCapacity(),
                        ]
                    );
}

}
