<?php

namespace Mapper;

use Repository\SpeakerRepository;
use Entity\Speaker;

class SpeakerMapper
{
    private SpeakerRepository $speakerRepository;

    public function __construct()
    {
        $this->speakerRepository = new SpeakerRepository();
    }

    /**
     * @return Module[]
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
                $entity = new speaker();
            }
            
            $entity->setId($speakerId)
                   ->setName($speakerFromDb['speaker_name'])
                   ->setDurationInHours($speakerFromDb['speaker_durationspeakerInHours'])
                   ->addSpeaker($this->speakerMapper->getOneByArray($speakerFromDb));

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