<?php

namespace Mapper;

use Repository\SpeakerRepository;
use Mapper\ModuleMapper;
use Entity\Speaker;

class SpeakerMapper
{
    private SpeakerRepository $speakerRepository;
    private ModuleMapper $moduleMapper;

    public function __construct()
    {
        $this->speakerRepository = new SpeakerRepository();
    }

    /**
     * @return Speakers[]
     */
    public function getList(): array
    {   $this->moduleMapper = new ModuleMapper();
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
                        ->setMail($speakerFromDb['speaker_mail'])
                        ->addModule($this->moduleMapper->getOneByArray($speakerFromDb));

                $speakerEntities[$entity->getId()] = $entity;
            
        }

        
        return $speakerEntities;
    }

    public function getOneByArray(array $speakerDataFromDb): Speaker
    {
        $entity = new Speaker();
        $entity->setFirstName($speakerDataFromDb['speaker_firstName']);     

        return $entity;
    }
}