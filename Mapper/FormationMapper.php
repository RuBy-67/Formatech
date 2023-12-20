<?php

namespace Mapper;

use Repository\FormationRepository;
use Mapper\formationMapper;
use Entity\Formation;
//Transformer la Donnée de la Database en entité
class ModuleMapper
{
    private FormationRepository $formationRepository;
    private ModuleMapper $moduleMapper;

    public function __construct()
    {
        $this->formationRepository = new FormationRepository();
        $this->moduleMapper = new ModuleMapper();
    }

    /**
     * @return Formation[]
     */
    public function getList(): array
    {
        $formationArrayFromDb = $this->formationRepository->getList();
        $formationEntities = [];

        foreach($formationArrayFromDb as $formationFromDb){
            $entity = null;
            $formationId = $formationFromDb['formation_formationId'];

            if (isset($formationEntities[$formationId])) {
                $entity = $formationEntities[$formationId];
            } else {
                $entity = new Formation();
            }
            
            $entity->setId($formationId)
                   ->setName($formationFromDb['formation_name'])
                   ->setDurationInHours($formationFromDb['formation_durationformationInHours'])
                   ->addModule($this->moduleMapper->getOneByArray($formationFromDb));

            $formationEntities[$entity->getId()] = $entity;
        }

        return $formationEntities;
    }
}