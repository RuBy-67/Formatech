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
                ->setPromotionId($sessionFromDb['promotionId']);

            $sessionEntities[$entity->getId()] = $entity;
        }

        return $sessionEntities;
    }
}
