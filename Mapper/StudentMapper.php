<?php

namespace Mapper;

use Repository\StudentRepository;
use Mapper\PromotionMapper;
use Entity\Student;

//Transformer la Donnée de la Database en entité
class StudentMapper
{
    private static ?StudentMapper $instance = null;
    private StudentRepository $studentRepository;
    private PromotionMapper $promotionMapper;

    public function _construct(): void
    {
        $this->studentRepository = new StudentRepository();
        $this->promotionMapper = PromotionMapper::getInstance();
    }
   
    public static function getInstance(): StudentMapper
    {
        
        if (self::$instance === null) {
            self::$instance = new StudentMapper();
            self::$instance->_construct();
        }

        return self::$instance;
    }

    /**
     * @return student[]
     */
    public function getList(): array
    {
        $studentArrayFromDb = $this->studentRepository->getList();
        $studentEntities = [];

        foreach ($studentArrayFromDb as $studentFromDb) {
            $entity = null;
            $studentId = $studentFromDb['student_studentId'];

            if (isset($studentEntities[$studentId])) {
                $entity = $studentEntities[$studentId];
            } else {
                $entity = new student();
            }

            $entity->setId($studentId)
                   ->setFirstName($studentFromDb['student_firstName'])
                   ->setLastName($studentFromDb['student_lastName'])
                   ->setMail($studentFromDb['student_mail'])
                   ->setPassword($studentFromDb['student_password'])
                   ->setBirthDate($studentFromDb['student_birthDate'])
                   ->setPromotionId($studentFromDb['student_promotionId']);


            $studentEntities[$entity->getId()] = $entity;
        }

        return $studentEntities;
    }

    public function getOneById(int $studentId): ?Student
    {
        $studentRowsFromDb = $this->studentRepository->getOneById($studentId);

        if (empty($studentRowsFromDb)) {
            return null;
        }

        $studentEntities = [];
        foreach($studentRowsFromDb as $row) {
            $entity = null;
            $studentId = $row['student_studentId'];

            if (isset($studentEntities[$studentId])) {
                $entity = $studentEntities[$studentId];
            } else {
                $entity = new Student();
            }

            $entity->setId($row['student_studentId'])
                   ->setFirstName($row['student_firstName'])
                   ->setLastName($row['student_lastName'])
                   ->setBirthDate($row['student_birthDate'])
                   ->setMail($row['student_mail'])
                   ->setPassword($row['student_password']);

            $studentPromotion = $this->promotionMapper->getOneByArray($row);
            if ($studentPromotion !== null) {
                $entity->addPromotion($studentPromotion);
            }

            $studentEntities[$entity->getId()] = $entity;
        }        

        return reset($studentEntities) ?: null;
    }
    
}