<?php

namespace Mapper;

use Repository\StudentRepository;
use Entity\Student;

//Transformer la Donnée de la Database en entité
class StudentMapper 
{
    private StudentRepository $studentRepository;

    public function __construct()
    {
        $this->studentRepository = new StudentRepository();
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
            var_dump($studentFromDb);

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
                ->setBirthDate($studentFromDb['student_birthDate']);
               // ->setPromotionId($studentFromDb['student_promotionId']);


            $studentEntities[$entity->getId()] = $entity;
        }

        return $studentEntities;
    }
}