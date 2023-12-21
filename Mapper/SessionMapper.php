<?php

namespace Mapper;

use Repository\SessionRepository;
use Entity\Session;

class SessionMapper
{
    private static ?SessionMapper $instance = null;
    private SessionRepository $sessionRepository;

    public function __construct()
    {
        $this->sessionRepository = new SessionRepository();
    }

    public static function getInstance(): SessionMapper
    {
        if (self::$instance === null) {
            self::$instance = new SessionMapper();
        }

        return self::$instance;
    }

    /**
     * @return Session[]
     */
    public function getList(): array
    {
        $sessionArrayFromDb = $this->sessionRepository->getList();
        $sessionEntities = [];

        foreach ($sessionArrayFromDb as $sessionFromDb) {
            $entity = null;
            $sessionId = $sessionFromDb['sessionId'];

            if (isset($sessionEntities[$sessionId])) {
                $entity = $sessionEntities[$sessionId];
            } else {
                $entity = new Session();
            }

            $entity->setId($sessionId)
            ->setDate($sessionFromDb['date'])
            ->setStartTime($sessionFromDb['startTime'])
            ->setEndTime($sessionFromDb['endTime'])
            ->setModuleId($sessionFromDb['moduleId'])
            ->setModuleName($sessionFromDb['moduleName']) 
            ->setPromotionId($sessionFromDb['promotionId'])
            ->setClassRoomId($sessionFromDb['classRoomId'])
            ->setClassName($sessionFromDb['className']) 
            ->setSpeakerId($sessionFromDb['SpeakerId'])
            ->setSpeakerFirstName($sessionFromDb['speakerFirstName'])
            ->setSpeakerLastName($sessionFromDb['speakerLastName']);

            $sessionEntities[$entity->getId()] = $entity;
        }

        return $sessionEntities;
    }

    public function getOneById(int $sessionId): ?Session
{
    $sessionDataFromDb = $this->sessionRepository->getOneById($sessionId);

    return $sessionDataFromDb !== null
        ? (new Session())
            ->setId($sessionDataFromDb['sessionId'])
            ->setDate($sessionDataFromDb['date'])
            ->setStartTime($sessionDataFromDb['startTime'])
            ->setEndTime($sessionDataFromDb['endTime'])
            ->setModuleId($sessionDataFromDb['moduleId'])
            ->setPromotionId($sessionDataFromDb['promotionId'])
            ->setClassRoomId($sessionDataFromDb['classRoomId'])
            ->setSpeakerId($sessionDataFromDb['SpeakerId'])
        : null;
}

    
}
