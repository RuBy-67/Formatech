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

    public function getOneByArray(array $speakerDataFromDb): Speaker
    {
        $entity = new Speaker();
        $entity->setName($speakerDataFromDb['speaker_firstName']);     

        return $entity;
    }
}