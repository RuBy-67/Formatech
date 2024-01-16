<?php

namespace Mapper;

use Repository\ClassRoomRepository;
use Entity\ClassRoom;

//Transformer la Donnée de la Database en entité
class ClassRoomMapper
{
    private static ?ClassRoomMapper $instance = null;
    private ClassRoomRepository $classRoomRepository;

    public function _construct(): void
    {
        $this->classRoomRepository = new classRoomRepository();
    }

    public static function getInstance(): ClassRoomMapper
    {

        if (self::$instance === null) {
            self::$instance = new ClassRoomMapper();
            self::$instance->_construct();
        }

        return self::$instance;
    }

    /**
     * @return classRoom[]
     */
    public function getList(): array
    {
        $classRoomArrayFromDb = $this->classRoomRepository->getList();
        $classRoomEntities = [];

        foreach ($classRoomArrayFromDb as $classRoomFromDb) {
            $entity = null;
            $classRoomId = $classRoomFromDb['classroom_classRoomId'];

            if (isset($classRoomEntities[$classRoomId])) {
                $entity = $classRoomEntities[$classRoomId];
            } else {
                $entity = new classRoom();
            }

            $entity->setId($classRoomId)
                ->setName($classRoomFromDb['classroom_name'])
                ->setCapacity($classRoomFromDb['classroom_capacityMax'])
                ->setBuilding($classRoomFromDb['classroom_building']);

            $classRoomEntities[$entity->getId()] = $entity;
        }

        return $classRoomEntities;
    }

    public function getOneByArray(array $ClassRoomDataFromDb = null): ?classRoom
    {
        if (!isset($ClassRoomDataFromDb['classroom_classRoomId'])) {
            return null;
        }

        $entity = new classRoom();
        $entity->setId($ClassRoomDataFromDb['classroom_classRoomId'])
            ->setName($ClassRoomDataFromDb['classroom_name'])
            ->setCapacity($ClassRoomDataFromDb['classroom_capacityMax'])
            ->setBuilding($ClassRoomDataFromDb['classroom_building']);

        return $entity;
    }

    public function getOneById(int $classroomId): ?Classroom
    {
        $classroomRowsFromDb = $this->classRoomRepository->getOneById($classroomId);

        if (empty($classroomRowsFromDb)) {
            return null;
        }

        $classroomEntities = [];
        foreach ($classroomRowsFromDb as $row) {
            $entity = null;
            $classRoomId = $row['classRoomId'];

            if (isset($classroomEntities[$classRoomId])) {
                $entity = $classroomEntities[$classRoomId];
            } else {
                $entity = new Classroom();
            }

            $entity->setClassRoomId($row['classRoomId'])
                ->setBuilding($row['building'])
                ->setName($row['name'])
                ->setCapacityMax($row['capacityMax']);

            $classroomEntities[$entity->getClassRoomId()] = $entity;
        }

        return reset($classroomEntities) ?: null;
    }

}