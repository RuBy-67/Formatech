<?php

namespace Repository;

use DB\Database;
use Entity\Session;

class SessionRepository
{
    private Database $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getList(): array
    {
        return $this->database
            ->executeQuery("SELECT s.sessionId, s.date, s.startTime, s.endTime, s.moduleId, m.name 
            AS moduleName, s.promotionId, s.classRoomId, c.name 
            AS className, s.SpeakerId, spk.firstName 
            AS speakerFirstName, spk.lastName 
            AS speakerLastName 
            FROM session s 
            LEFT JOIN module m 
            ON s.moduleId = m.moduleId 
            LEFT JOIN classroom c ON s.classRoomId = c.classroomId 
            LEFT JOIN speaker spk ON s.SpeakerId = spk.speakerId")
            ->fetchAll();
    }

    public function createSession(Session $session): void
    {
        $this->database->executeQuery(
            "INSERT INTO session (`date`, `startTime`, `endTime`, `moduleId`, `promotionId`, `classRoomId`, `SpeakerId`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $session->getDate(),
                $session->getStartTime(),
                $session->getEndTime(),
                $session->getModuleId(),
                $session->getPromotionId(),
                $session->getClassRoomId(),
                $session->getSpeakerId()
            ]
        );
    }

    public function modifySessionInDb(Session $session): void
    {
        $this->database->executeQuery(
            "UPDATE session 
            SET date = :date, startTime = :startTime, endTime = :endTime, moduleId = :moduleId, 
                promotionId = :promotionId, classRoomId = :classRoomId, SpeakerId = :SpeakerId
            WHERE sessionId = :sessionId",
            [
                'date' => $session->getDate(),
                'startTime' => $session->getStartTime(),
                'endTime' => $session->getEndTime(),
                'moduleId' => $session->getModuleId(),
                'promotionId' => $session->getPromotionId(),
                'classRoomId' => $session->getClassRoomId(),
                'SpeakerId' => $session->getSpeakerId(),
                'sessionId' => $session->getId()
            ]
        );
    }

    public function deleteSessionInDb(int $sessionId): void
    {
        $this->database->executeQuery(
            "DELETE FROM session WHERE sessionId = :sessionId",
            ['sessionId' => $sessionId]
        );
    }
    public function getOneById(int $sessionId): ?array
    {
        return $this->database
            ->executeQuery("SELECT
                        s.sessionId,
                        s.date,
                        s.startTime,
                        s.endTime,
                        s.moduleId,
                        s.promotionId,
                        s.classRoomId,
                        s.SpeakerId
                    FROM session s
                    WHERE s.sessionId = ?",
                [$sessionId]
            )
            ->fetch();
    }

}
