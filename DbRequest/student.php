<?php

require_once(__DIR__ . "\..\Autoloader.php");
Autoloader::register();

function addNewStudentInDb($firstName, $lastName, $mail, $birthDate, $database)
{
    return $database->executeQuery("INSERT INTO Student (firstName, lastName, mail, birthDate) VALUES (?, ?, ?, ?)", [$firstName, $lastName, $mail, $birthDate]);
}

function modifyStudentInDb($firstName, $lastName, $mail, $birthDate, $studentId, $database)
{
    return $database->executeQuery("UPDATE Student SET firstName = ?, lastName = ?, birthdate = ? WHERE studentId = ?", [$firstName, $lastName, $mail, $birthDate, $studentId]);
}

function deleteStudentInDb($database, $studentId)
{
    return $database->executeQuery("DELETE FROM Student WHERE id = ?", [$studentId]);
}
function getStudentListInDb($database)
{
    return $database->executeQuery("SELECT * FROM Student");
}

function getStudentListInDbByFormation($database, $formationId)
{
    return $database->executeQuery("
        SELECT s.* FROM Student s
        JOIN StudentPromotion sp ON s.studentId = sp.studentId
        JOIN Promotion p ON sp.promotionId = p.promotionId
        WHERE p.formationId = ?;
    ", [$formationId]);
}

function getStudentProfilDetailsInDb($database, $studentId)
{
    return $database->executeQuery("SELECT s.*, p.promotionId, p.promotionYears, p.startingDate, p.endingDate 
    FROM Student s
    JOIN StudentPromotion sp ON s.studentId = sp.studentId
    JOIN Promotion p ON sp.promotionId = p.promotionId
    WHERE s.studentId = ?", [$studentId]);

}

