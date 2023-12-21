<?php

namespace Mapper;

use Repository\PromotionRepository;
use Entity\Promotion;

//Transformer la Donnée de la Database en entité
class PromotionMapper
{
    private static ?PromotionMapper $instance = null;
    private PromotionRepository $promotionRepository;
    
    public function __construct()
    {
        $this->promotionRepository = new promotionRepository();
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
     * @return promotion[]
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

}

