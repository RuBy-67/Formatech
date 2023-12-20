<?php

namespace Mapper;

use Repository\FormationRepository;
use Entity\Formation;
use Mapper\ModuleMapper;

//Transformer la Donnée de la Database en entité
class FormationMapper
{
    private FormationRepository $formationRepository;
    private ModuleMapper $moduleMapper;

    public function __construct()
    {
        $this->formationRepository = new FormationRepository();
        $this->moduleMapper = ModuleMapper::getInstance();
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
                   ->setDurationInMonth($formationFromDb['formation_durationInMonth'])
                   ->setAbbreviation($formationFromDb['formation_abbreviation'])
                   ->setRncpLvl($formationFromDb['formation_rncpLvl'])
                   ->setAccessibility($formationFromDb['formation_accessibility'])
                   ->addModule($this->moduleMapper->getOneByArray($formationFromDb));

            $formationEntities[$entity->getId()] = $entity;
        }

        return $formationEntities;
    }
}