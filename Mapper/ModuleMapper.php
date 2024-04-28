<?php

namespace Mapper;

use Repository\ModuleRepository;
use Mapper\SpeakerMapper;
use Entity\Module;

//Transformer la Donnée de la Database en entité
class ModuleMapper
{
    private static ?ModuleMapper $instance = null;
    private ModuleRepository $moduleRepository;
    private SpeakerMapper $speakerMapper;

    public function _construct(): void
    {
        $this->moduleRepository = new ModuleRepository();
        $this->speakerMapper = SpeakerMapper::getInstance();
    }

    public static function getInstance(): ModuleMapper
    {

        if (self::$instance === null) {
            self::$instance = new ModuleMapper();
            self::$instance->_construct();
        }

        return self::$instance;
    }

    /**
     * @return Module[]
     */
    public function getList(): array
    {
        $moduleArrayFromDb = $this->moduleRepository->getList();
        $moduleEntities = [];

        foreach ($moduleArrayFromDb as $moduleFromDb) {
            $entity = null;
            $moduleId = $moduleFromDb['module_moduleId'];

            if (isset($moduleEntities[$moduleId])) {
                $entity = $moduleEntities[$moduleId];
            } else {
                $entity = new Module();
            }

            $entity->setId($moduleId)
                ->setName($moduleFromDb['module_name'])
                ->setDurationInHours($moduleFromDb['module_durationModuleInHours']);

            $moduleSpeaker = $this->speakerMapper->getOneByArray($moduleFromDb);
            if ($moduleSpeaker !== null) {
                $entity->addSpeaker($moduleSpeaker);
            }

            $moduleEntities[$entity->getId()] = $entity;
        }

        return $moduleEntities;
    }

    public function getListBySpeakerId($speakerId): array
    {
        $moduleArrayFromDb = $this->moduleRepository->getListBySpeakerId($speakerId);
        $moduleEntities = [];

        foreach ($moduleArrayFromDb as $moduleFromDb) {
            $entity = new Module();

            $entity->setId($moduleFromDb['module_moduleId'])
                ->setName($moduleFromDb['module_name'])
                ->setDurationInHours($moduleFromDb['module_durationModuleInHours']);

            $moduleEntities[] = $entity;
        }

        return $moduleEntities;
    }

    public function getOneByArray(array $moduleDataFromDb = null): ?Module
    {
        if (!isset($moduleDataFromDb['module_moduleId'])) {
            return null;
        }

        $entity = new Module();
        $entity->setId($moduleDataFromDb['module_moduleId'])
            ->setName($moduleDataFromDb['module_name'])
            ->setDurationInHours($moduleDataFromDb['module_durationModuleInHours']);

        $moduleSpeaker = $this->speakerMapper->getOneByArray($moduleDataFromDb);
        if ($moduleSpeaker !== null) {
            $entity->addSpeaker($moduleSpeaker);
        }

        return $entity;
    }

    public function getOneById(int $moduleId): ?Module
    {
        $moduleRowsFromDb = $this->moduleRepository->getOneById($moduleId);

        if (empty($moduleRowsFromDb)) {
            return null;
        }

        $moduleEntities = [];
        foreach ($moduleRowsFromDb as $row) {
            $entity = null;
            $moduleId = $row['module_moduleId'];

            if (isset($moduleEntities[$moduleId])) {
                $entity = $moduleEntities[$moduleId];
            } else {
                $entity = new Module();
            }

            $entity->setId($row['module_moduleId'])
                ->setName($row['module_name'])
                ->setDurationInHours($row['module_durationModuleInHours']);

            $moduleSpeaker = $this->speakerMapper->getOneByArray($row);
            if ($moduleSpeaker !== null) {
                $entity->addSpeaker($moduleSpeaker);
            }

            $moduleEntities[$entity->getId()] = $entity;
        }

        return reset($moduleEntities) ?: null;
    }
}