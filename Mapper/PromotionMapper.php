<?php

namespace Mapper;

use Repository\PromotionRepository;
use Mapper\FormationMapper;
use Entity\Promotion;

//Transformer la Donnée de la Database en entité
class PromotionMapper
{
    private static ?PromotionMapper $instance = null;
    private PromotionRepository $promotionRepository;
    private FormationMapper $formationMapper;

    /**
     * @var Promotions[]
     */
    private array $loadedPromotions = [];
    
    public function __construct()
    {
        $this->promotionRepository = new promotionRepository();
        $this->formationMapper = FormationMapper::getInstance();
    }

    public static function getInstance(): PromotionMapper
    {

        if (self::$instance === null) {
            self::$instance = new PromotionMapper();
            self::$instance->__construct();
        }

        return self::$instance;
    }

    /**
     * @return Promotion[]
     */
    public function getList(): array
    {
        $promotionArrayFromDb = $this->promotionRepository->getList();
        $promotionEntities = [];

        foreach ($promotionArrayFromDb as $promotionFromDb) {
            $entity = new Promotion(); // Toujours créer une nouvelle entité

            $entity->setId($promotionFromDb['promotion_promotionId'])
                ->setFormationId($promotionFromDb['promotion_formationId'])
                ->setPromotionYear($promotionFromDb['promotion_promotionYear'])
                ->setStartingDate($promotionFromDb['promotion_startingDate'])
                ->setEndingDate($promotionFromDb['promotion_endingDate']);

            $promotionEntities[] = $entity; // Utilisez un tableau indexé par des clés numériques
        }

        return $promotionEntities;
    }

    public function getOneByArray(array $promotionDataFromDb = null): ?Promotion
    {
        if (!isset($promotionDataFromDb['promotion_promotionId'])) {
            return null;
        }

        $entity = null;
        $promotionId = $promotionDataFromDb['promotion_promotionId'];
        
        if (isset($this->loadedPromotions[$promotionId])) {
            $entity = $this->loadedPromotions[$promotionId];
        } else {
            $entity = new Promotion();
        }

        $entity->setId($promotionDataFromDb['promotion_promotionId'])
               ->setFormationId($promotionDataFromDb['promotion_formationId'])
               ->setPromotionYear($promotionDataFromDb['promotion_Years'])
               ->setStartingDate($promotionDataFromDb['promotion_startingDate'])
               ->setEndingDate($promotionDataFromDb['promotion_endingDate']);

        $promotionFormation = $this->formationMapper->getOneByArray($promotionDataFromDb);
        if ($promotionFormation !== null) {
            $entity->setFormation($promotionFormation);
        }

        $this->loadedPromotions[$entity->getId()] = $entity;

        return $entity;
    }
}

