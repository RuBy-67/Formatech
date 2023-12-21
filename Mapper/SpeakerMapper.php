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
            $entity = new Speaker();
    
            $entity->setId($speakerFromDb['speaker_speakerId'])
                   ->setFirstName($speakerFromDb['speaker_firstName'])
                   ->setLastName($speakerFromDb['speaker_lastName'])
                   ->setMail($speakerFromDb['speaker_mail'])
                   ->setPassword($speakerFromDb['speaker_password']);
    
            $entityModule = $this->moduleMapper->getOneByArray($speakerFromDb);
            if ($entityModule !== null) {
                $entity->addModule($entityModule);
            }
    
            $speakerEntities[] = $entity;
        }
    
        return $speakerEntities;
    }
    

    public function getOneByArray(array $speakerDataFromDb): ?Speaker
    {
        if (!isset($speakerDataFromDb['speaker_speakerId'])) {
            return null;
        }

        $entity = new Speaker();
        $entity ->setId($speakerDataFromDb['speaker_speakerId'])
                ->setFirstName($speakerDataFromDb['speaker_firstName'])
                ->setLastName($speakerDataFromDb['speaker_lastName'])
                ->setMail($speakerDataFromDb['speaker_mail']);

        return $entity;
    }
}