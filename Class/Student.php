<?php

namespace student;

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

    public function createStudent($firstName, $lastName, $mail, $birthDate) : void
    {
        Database::getInstance()->executeQuery("INSERT INTO Student (firstName, lastName, mail, birthDate) VALUES (?, ?, ?, ?)", [$firstName, $lastName, $mail, $birthDate]);
    }
    public function modifyStudent($firstName, $lastName, $mail, $birthDate, $studentId) : void
    {
        Database::getInstance()->executeQuery("UPDATE Student SET firstName = ?, lastName = ?, birthdate = ? WHERE studentId = ?", [$firstName, $lastName, $mail, $birthDate, $studentId]);
        
    }
    public function deleteStudent($studentId) : void
    {
        Database::getInstance()->executeQuery("DELETE FROM Student WHERE id = ?", [$studentId]);  
    }
    public function getStudentList() 
    {
        return Database::getInstance()->executeQuery("SELECT * FROM Student");
    }
    public function getStudentListByFormation($formationId)
    {
       return Database::getInstance()->executeQuery("
        SELECT s.* FROM Student s
        JOIN StudentPromotion sp ON s.studentId = sp.studentId
        JOIN Promotion p ON sp.promotionId = p.promotionId
        WHERE p.formationId = ?;
    ", [$formationId]);

    }
    public function getStudentProfilDetails($studentId)
    {
        return Database::getInstance()->executeQuery("SELECT s.*, p.promotionId, p.promotionYears, p.startingDate, p.endingDate 
        FROM Student s
        JOIN StudentPromotion sp ON s.studentId = sp.studentId
        JOIN Promotion p ON sp.promotionId = p.promotionId
        WHERE s.studentId = ?", [$studentId]);
    
    }
}
