<?php

namespace Entity;

use DB\Database;

class Student
{
    private string $firstName;
    private string $lastName;
    private string $mail;
    private int $birthDate;
    private int $studentId;

    public function __construct($studentId, $firstName, $lastName, $mail, $birthDate)
    {
        $this->studentId = $studentId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->mail = $mail;
        $this->birthDate = $birthDate;
    }

    public function createStudent($firstName, $lastName, $mail, $birthDate)
    {
        $database = Database::getInstance();
        return addNewStudentInDb($firstName, $lastName, $mail, $birthDate, $database);
    }
    public function modifyStudent($firstName, $lastName, $mail, $birthDate, $studentId)
    {
        $database = Database::getInstance();
        return modifystudentInDb($firstName, $lastName, $mail, $birthDate, $studentId, $database);
    }
    public function deleteStudent($studentId)
    {
        $database = Database::getInstance();
        return deleteStudentInDb($database, $studentId);
    }
    public function getStudentList()
    {
        $database = Database::getInstance();
        return getStudentListInDb($database);
    }
    public function getStudentListByFormation($formationId)
    {
        $database = Database::getInstance();
        getStudentListInDbByFormation($database, $formationId);
    }
    public function getStudentProfilDetails($studentId){
        $database = Database::getInstance();
        getStudentProfilDetailsInDb($database, $studentId);
    }
}
