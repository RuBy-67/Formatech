<?php

namespace Mapper;

use Repository\SpeakerRepository;
use Mapper\ModuleMapper;
use Entity\Speaker;

class SpeakerMapper
{
    private static ?SpeakerMapper $instance = null;
    private SpeakerRepository $speakerRepository;
    private ModuleMapper $moduleMapper;

    public function _construct()
    {
        $this->speakerRepository = new SpeakerRepository();
        $this->moduleMapper = ModuleMapper::getInstance();
    }

    public static function getInstance(): SpeakerMapper
    {
        if (self::$instance === null) {
            self::$instance = new SpeakerMapper();
            self::$instance->_construct();
        }

        return self::$instance;
    }

    /**
     * @return Speaker[]
     */
    public function getList(): array
    {
        $speakerArrayFromDb = $this->speakerRepository->getList();
        $speakerEntities = [];

        foreach ($speakerArrayFromDb as $speakerFromDb) {
            $entity = null;
            $moduleId = $speakerFromDb['speaker_speakerId'];

            if (isset($speakerEntities[$moduleId])) {
                $entity = $speakerEntities[$moduleId];
            } else {
                $entity = new Speaker();
            }

            $entity->setId($moduleId)
                ->setFirstName($speakerFromDb['speaker_firstName'])
                ->setLastName($speakerFromDb['speaker_lastName'])
                ->setMail($speakerFromDb['speaker_mail'])
                ->setPassword($speakerFromDb['speaker_password']);

            $entityModule = $this->moduleMapper->getOneByArray($speakerFromDb);
            if ($entityModule !== null) {
                $entity->addModule($entityModule);
            }

            $speakerEntities[$entity->getId()] = $entity;
        }

        return $speakerEntities;
    }


    public function getOneByArray(array $speakerDataFromDb): ?Speaker
    {
        if (!isset($speakerDataFromDb['speaker_speakerId'])) {
            return null;
        }

        $entity = new Speaker();
        $entity->setId($speakerDataFromDb['speaker_speakerId'])
            ->setFirstName($speakerDataFromDb['speaker_firstName'])
            ->setLastName($speakerDataFromDb['speaker_lastName'])
            ->setMail($speakerDataFromDb['speaker_mail']);

        return $entity;
    }
    public function getOneById(int $speakerId): ?Speaker
    {
        $speakerDataFromDb = $this->speakerRepository->getOneById($speakerId);

        if ($speakerDataFromDb !== null) {
            $entity = new Speaker();
            $entity->setId($speakerDataFromDb['speaker_speakerId'])
                ->setFirstName($speakerDataFromDb['speaker_firstName'])
                ->setLastName($speakerDataFromDb['speaker_lastName'])
                ->setMail($speakerDataFromDb['speaker_mail'])
                ->setPassword($speakerDataFromDb['speaker_password']);

            return $entity;
        }

        return null;
    }
}