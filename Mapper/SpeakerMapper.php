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

    protected function _construct()
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
     * @return Speakers[]
     */
    public function getList(): array
    {   
        $speakerArrayFromDb = $this->speakerRepository->getList();
        $speakerEntities = [];

        foreach($speakerArrayFromDb as $speakerFromDb){
            $entity = null;
            $speakerId = $speakerFromDb['speaker_speakerId'];

            if (isset($speakerEntities[$speakerId])) {
                $entity = $speakerEntities[$speakerId];
            } else {
                $entity = new Speaker();
            }
                
                $entity ->setId($speakerId)
                        ->setFirstName($speakerFromDb['speaker_firstName'])
                        ->setLastName($speakerFromDb['speaker_lastName'])
                        ->setMail($speakerFromDb['speaker_mail']);
                
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
        $entity ->setId($speakerDataFromDb['speaker_speakerId'])
                ->setFirstName($speakerDataFromDb['speaker_firstName'])
                ->setLastName($speakerDataFromDb['speaker_lastName'])
                ->setMail($speakerDataFromDb['speaker_mail']);

        return $entity;
    }
}