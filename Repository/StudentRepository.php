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
                        LEFT JOIN studentpromotion sp ON s.studentId = sp.studentId
                        LEFT JOIN Promotion p ON sp.promotionId = p.promotionId")
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


    public function deleteStudentInDb(int $student): void
    {
        $this->database
            ->executeQuery("DELETE FROM student WHERE studentId = :studentId",
                [
                    'studentId' => $student
                ]

            );
        $this->database->executeQuery("DELETE FROM studentpromotion WHERE studentId = :studentId", ['studentId' => $student]);
    }

    public function getStudentListInDbByFormation($formationId)
    {
        return $this->database->executeQuery("SELECT s.* FROM Student s
            JOIN studentpromotion sp ON s.studentId = sp.studentId
            JOIN Promotion p ON sp.promotionId = p.promotionId
            WHERE p.formationId = ?",
            [$formationId]
        )->fetchAll();
    }
    //getOneById
    public function getOneById($id)
    {   
        return $this->database
                    ->executeQuery("SELECT 
                                        s.studentId as student_studentId, 
                                        s.firstName as student_firstName, 
                                        s.lastName as student_lastName, 
                                        s.mail as student_mail, 
                                        s.birthDate as student_birthDate, 
                                        s.password as student_password,
                                        sp.studentId as modulestudent_studentId, 
                                        sp.promotionId as promotionstudent_promotionId,
                                        p.promotionId as promotion_promotionId, 
                                        p.formationId as promotion_formationId, 
                                        p.promotionYears as promotion_Years,
                                        p.startingDate as promotion_startingDate,
                                        p.endingDate as promotion_endingDate,
                                        f.formationId as formation_formationId,
                                        f.name as formation_name,
                                        f.durationFormationInMonth as formation_durationFormationInMonth,
                                        f.abbreviation as formation_abbreviation,
                                        f.rncpLvl as formation_rncpLvl,
                                        f.accessibility as formation_accessibility,
                                        m.moduleId as module_moduleId,
                                        m.name as module_name,
                                        m.durationModuleInHours as module_durationModuleInHours
                                    FROM `student` s
                                    LEFT JOIN studentpromotion sp ON s.studentId = sp.studentId
                                    LEFT JOIN promotion p ON sp.promotionId = p.promotionId
                                    LEFT JOIN formation f ON p.formationId = f.formationId
                                    LEFT JOIN moduleformation mf ON mf.formationId = f.formationId
                                    LEFT JOIN module m ON m.moduleId = mf.moduleId
                                    WHERE s.studentId = :studentId;",
                                    ['studentId' => $id])
                    ->fetchAll();
    }

    public function addStudentInPromotion($studentId, $promotionId)
    {
        // Vérifier si la paire étudiant-promotion existe déjà
        $existingPair = $this->database->executeQuery("SELECT * FROM studentpromotion WHERE studentId = ? AND promotionId = ?",
            [$studentId, $promotionId]
        )->fetch();

        if (!$existingPair) {
            return $this->database->executeQuery("INSERT INTO studentpromotion (studentId, promotionId) VALUES (?, ?)",
                [$studentId, $promotionId]
            );
        }
    }

    public function getStudentListInDbByPromotion($promotionId)
    {
        return $this->database->executeQuery("SELECT s.* FROM student s
            JOIN studentpromotion sp ON s.studentId = sp.studentId
            JOIN promotion p ON sp.promotionId = p.promotionId
            WHERE p.promotionId = ?",
            [$promotionId]
        )->fetchAll();
    }



}
