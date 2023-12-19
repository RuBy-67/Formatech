<?php

namespace Mapper;

use Repository\ModuleRepository;
use Mapper\SpeakerMapper;
use Entity\Module;
//Transformer la Donnée de la Database en entité
class ModuleMapper
{
    private ModuleRepository $moduleRepository;
    private SpeakerMapper $speakerMapper;

    public function __construct()
    {
        $this->moduleRepository = new ModuleRepository();
        $this->speakerMapper = new SpeakerMapper();
    }

    /**
     * @return Module[]
     */
    public function getList(): array
    {
        $moduleArrayFromDb = $this->moduleRepository->getList();
        $moduleEntities = [];

        foreach($moduleArrayFromDb as $moduleFromDb){
            $entity = null;
            $moduleId = $moduleFromDb['module_moduleId'];

            if (isset($moduleEntities[$moduleId])) {
                $entity = $moduleEntities[$moduleId];
            } else {
                $entity = new Module();
            }
            
            $entity->setId($moduleId)
                   ->setName($moduleFromDb['module_name'])
                   ->setDurationInHours($moduleFromDb['module_durationModuleInHours'])
                   ->addSpeaker($this->speakerMapper->getOneByArray($moduleFromDb));

            $moduleEntities[$entity->getId()] = $entity;
        }

        return $moduleEntities;
    }
}