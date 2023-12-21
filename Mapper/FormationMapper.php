<?php

namespace Mapper;

use Repository\FormationRepository;
use Entity\Formation;
use Mapper\ModuleMapper;

//Transformer la Donnée de la Database en entité
class FormationMapper
{
    private static ?FormationMapper $instance = null;
    private FormationRepository $formationRepository;
    private ModuleMapper $moduleMapper;

    /**
     * @var Formation[]
     */
    private array $loadedFormations = [];

    public function _construct()
    {
        $this->formationRepository = new FormationRepository();
        $this->moduleMapper = ModuleMapper::getInstance();
    }
    public static function getInstance(): FormationMapper
    {

        if (self::$instance === null) {
            self::$instance = new FormationMapper();
            self::$instance->_construct();
        }

        return self::$instance;
    }
    /**
     * @return Formation[]
     */
    public function getList(): array
    {

        $formationArrayFromDb = $this->formationRepository->getList();
        $formationEntities = [];

        foreach ($formationArrayFromDb as $formationFromDb) {
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
                ->setAccessibility($formationFromDb['formation_accessibility']);

            $formationModule = $this->moduleMapper->getOneByArray($formationFromDb);
            if ($formationModule !== null) {
                $entity->addModule($formationModule);
            }

            $formationEntities[$entity->getId()] = $entity;
        }

        return $formationEntities;
    }

    public function getOneByArray(array $formationDataFromDb = null): ?Formation
    {
        if (!isset($formationDataFromDb['formation_formationId'])) {
            return null;
        }

        $entity = null;
        $formationId = $formationDataFromDb['formation_formationId'];
        
        if (isset($this->loadedFormations[$formationId])) {
            $entity = $this->loadedFormations[$formationId];
        } else {
            $entity = new Formation();
        }

        $entity->setId($formationDataFromDb['formation_formationId'])
               ->setName($formationDataFromDb['formation_name'])
               ->setDurationInMonth($formationDataFromDb['formation_durationFormationInMonth'])
               ->setAbbreviation($formationDataFromDb['formation_abbreviation'])
               ->setRncpLvl($formationDataFromDb['formation_rncpLvl'])
               ->setAccessibility($formationDataFromDb['formation_accessibility']);

        $formationModule = $this->moduleMapper->getOneByArray($formationDataFromDb);
        if ($formationModule !== null) {
            $entity->addModule($formationModule);
        }

        $this->loadedFormations[$entity->getId()] = $entity;

        return $entity;
    }

    /**
     * @return Formation[]
     */
    public function getListPublic(): array
    {

        $formationArrayFromDb = $this->formationRepository->getListPublic();
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
                   ->setAccessibility($formationFromDb['formation_accessibility']);

            $formationModule = $this->moduleMapper->getOneByArray($formationFromDb);
            if ($formationModule !== null) {
                $entity->addModule($formationModule);
            }

            $formationEntities[$entity->getId()] = $entity;
        }

        return $formationEntities;
    }


    public function getOneById(int $formationId): ?Formation
    {
        $formationRowsFromDb = $this->formationRepository->getOneById($formationId);

        if (empty($formationRowsFromDb)) {
            return null;
        }

        $formationEntities = [];
        foreach ($formationRowsFromDb as $row) {
            $entity = null;
            $formationId = $row['formation_formationId'];

            if (isset($formationEntities[$formationId])) {
                $entity = $formationEntities[$formationId];
            } else {
                $entity = new Formation();
            }

            $entity->setId($row['formation_formationId'])
                ->setName($row['formation_name'])
                ->setDurationInMonth($row['formation_durationInMonth'])
                ->setAbbreviation($row['formation_abbreviation'])
                ->setRncpLvl($row['formation_rncpLvl'])
                ->setAccessibility($row['formation_accessibility']);

            $formationModule = $this->moduleMapper->getOneByArray($row);
            if ($formationModule !== null) {
                $entity->addModule($formationModule);
            }

            $formationEntities[$entity->getId()] = $entity;
        }

        return reset($formationEntities) ?: null;
    }
}