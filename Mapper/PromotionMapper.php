<?php

namespace Mapper;

use Repository\PromotionRepository;
use Entity\Promotion;

//Transformer la Donnée de la Database en entité
class PromotionMapper
{
    private static ?PromotionMapper $instance = null;
    private PromotionRepository $promotionRepository;

    protected function _construct()
    {
        $this->promotionRepository = new promotionRepository();
    }

    public static function getInstance(): PromotionMapper
    {
        
        if (self::$instance === null) {
            self::$instance = new PromotionMapper();
            self::$instance->_construct();
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
            $entity = null;
            $promotionId = $promotionFromDb['promotion_promotionId'];

            if (isset($promotionEntities[$promotionId])) {
                $entity = $promotionEntities[$promotionId];
            } else {
                $entity = new promotion();
            }

            $entity->setId($promotionId)
                ->setFormationId($promotionFromDb['promotion_formationId'])
                ->setPromotionYear($promotionFromDb['promotion_promotionYear'])
                ->setStartingDate($promotionFromDb['promotion_startingDate'])
                ->setEndingDate($promotionFromDb['promotion_endingDate']);

            $promotionEntities[$entity->getId()] = $entity;
        }
        
        return $promotionEntities;
    }
}

