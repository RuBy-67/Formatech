<?php
namespace Repository;

use DB\Database;
use Entity\Student;

//Interagir avec la Database 
class StudentRepository
{

    private Database $database;
    private Student $student;
    public function __construct()
    {
        $this->database = Database::getInstance();
    }
    public function getList(): array
    {
        return $this->database
            ->executeQuery("SELECT
                            s.studentId as student_studentId,
                            s.firstName as student_firstName,
                            s.lastName as student_lastName,
                            s.mail as student_mail,
                            s.password as student_password,
                            s.birthDate as student_birthDate,
                            sp.promotionId as student_promotionId,
                            p.formationId as student_formationId
                        FROM student s
                        JOIN StudentPromotion sp ON s.studentId = sp.studentId
                        JOIN Promotion p ON sp.promotionId = p.promotionId")
            ->fetchAll();
    }



    public function createStudent(Student $student, int $promotionId): void
    {
        // Inserting the student into the 'student' table
        $this->database->executeQuery(
            "INSERT INTO student (`firstName`, `lastName`, `mail`, `password`, `birthDate`) 
        VALUES (?, ?, ?, ?, ?)",
            [
                $student->getFirstName(),
                $student->getLastName(),
                $student->getMail(),
                $student->getPassword(),
                $student->getBirthDate()
            ]
        );

        // Get the ID of the newly created student
        $studentId = $this->database->getLastInsertId();

        // Associate the student with the promotion in the 'studentpromotion' table
        $this->database->executeQuery(
            "INSERT INTO studentpromotion (`studentId`, `promotionId`) 
        VALUES (?, ?)",
            [$studentId, $promotionId]
        );
    }


    function modifyStudentInDb(Student $student, int $promotionId): void
    {
        $this->database
            ->executeQuery("UPDATE student SET firstName = :firstName, lastName = :lastName, mail = :mail, password = :password, birthDate = :birthDate WHERE studentId = :studentId",
                [
                    'firstName' => $student->getFirstName(),
                    'lastName' => $student->getLastName(),
                    'mail' => $student->getMail(),
                    'password' => $student->getPassword(),
                    'birthDate' => $student->getBirthDate(),
                    'studentId' => $student->getId()
                ]
            );

        // Mettre à jour l'association de l'étudiant à la promotion dans la table de liaison
        $this->database
            ->executeQuery("UPDATE StudentPromotion SET promotionId = :promotionId WHERE studentId = :studentId",
                [
                    'promotionId' => $promotionId,
                    'studentId' => $student->getId()
                ]
            );
    }


    function deleteStudentInDb(int $student): void
    {
        $this->database
            ->executeQuery("DELETE FROM student WHERE studentId = :studentId",
                [
                    'studentId' => $student
                ]
            );
    }

    public function getStudentListInDbByFormation($formationId)
    {
        return $this->database->executeQuery("SELECT s.* FROM Student s
            JOIN StudentPromotion sp ON s.studentId = sp.studentId
            JOIN Promotion p ON sp.promotionId = p.promotionId
            WHERE p.formationId = ?",
            [$formationId]
        )->fetchAll();
    }

    public function getStudentProfilDetailsInDb($studentId)
    {
        return $this->database->executeQuery("SELECT s.*, p.promotionId, p.promotionYears, p.startingDate, p.endingDate 
            FROM Student s
            JOIN StudentPromotion sp ON s.studentId = sp.studentId
            JOIN Promotion p ON sp.promotionId = p.promotionId
            WHERE s.studentId = ?",
            [$studentId]
        )->fetch();
    }


}
