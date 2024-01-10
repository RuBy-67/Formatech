<?php
namespace Repository;

use DB\Database;
use Entity\Promotion;

//Interagir avec la Database 
class PromotionRepository
{

    private Database $database;
    private Promotion $promotion;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getList(): array
    {
        return $this->database
            ->executeQuery("SELECT
            p.promotionId as promotion_promotionId,
            p.formationId as promotion_formationId,
            p.promotionYears as promotion_promotionYear,
            p.startingDate as promotion_startingDate,
            p.endingDate as promotion_endingDate,
            f.name as formation_name
        FROM Promotion p
       LEFT JOIN Formation f ON p.formationId = f.formationId")
            ->fetchAll();
    }

    public function getPromotionDetailsInDb($promotionId): array
    {
        return $this->database
            ->executeQuery("SELECT
                            p.promotionId as promotion_promotionId,
                            p.formationId as promotion_formationId,
                            p.promotionYears as promotion_promotionYear,
                            p.startingDate as promotion_startingDate,
                            p.endingDate as promotion_endingDate
                        FROM Promotion p
                        WHERE p.promotionId = ?", [$promotionId]
            )
            ->fetch();
    }

    public function createPromotion($newPromotion): void
    {
        $this->database->executeQuery(
            "INSERT INTO promotion (`formationId`, `promotionYears`, `startingDate`, `endingDate`) 
             VALUES ( :formationId, :promotionYear, :startingDate, :endingDate)",
            [
                'formationId' => $newPromotion->getFormationId(),
                'promotionYear' => $newPromotion->getPromotionYear(),
                'startingDate' => $newPromotion->getStartingDate(),
                'endingDate' => $newPromotion->getEndingDate()
            ]
        );
    }


    public function modifyPromotionInDb(Promotion $promotion): void
    {
        $this->database
            ->executeQuery("UPDATE promotion SET formationId = :formationId, promotionYears = :promotionYear, startingDate = :startingDate, endingDate = :endingDate WHERE promotionId = :promotionId",
                [
                    'formationId' => $promotion->getFormationId(),
                    'promotionYear' => $promotion->getPromotionYear(),
                    'startingDate' => $promotion->getStartingDate(),
                    'endingDate' => $promotion->getEndingDate(),
                    'promotionId' => $promotion->getId()
                ]
            );
    }

    public function deletePromotionInDb($promotion): void
    {
        $this->database
            ->executeQuery("DELETE FROM promotion WHERE promotionId = :promotionId",
                [
                    'promotionId' => $promotion
                ]
            );
        $this->database
            ->executeQuery("UPDATE studentpromotion SET promotionId = NULL WHERE promotionId = :promotionId",
                [
                    'promotionId' => $promotion
                ]
            );
    }


}
