<?php

namespace Mapper;

use Repository\StudentRepository;
use Entity\Student;

//Transformer la Donnée de la Database en entité
class StudentMapper
{
    private static ?StudentMapper $instance = null;
    private StudentRepository $studentRepository;

    public function _construct()
    {
        $this->studentRepository = new StudentRepository();
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
            $entity = new Student(); // Toujours créer une nouvelle entité

            $entity->setId($studentFromDb['student_studentId'])
                ->setFirstName($studentFromDb['student_firstName'])
                ->setLastName($studentFromDb['student_lastName'])
                ->setMail($studentFromDb['student_mail'])
                ->setPassword($studentFromDb['student_password'])
                ->setBirthDate($studentFromDb['student_birthDate'])
                ->setPromotionId($studentFromDb['student_promotionId']);

            $studentEntities[] = $entity; // Utilisez un tableau indexé par des clés numériques
        }

        return $studentEntities;
    }
    
}