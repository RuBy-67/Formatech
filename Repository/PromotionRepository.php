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
                            p.endingDate as promotion_endingDate
                        FROM Promotion p")
            ->fetchAll();
    }

    public function createPromotion(): void
    {
        $this->database
            ->executeQuery("INSERT INTO Promotion (`promotionId`, `formationId`, `promotionYears`, `startingDate`, `endingDate`) 
                        VALUES (?, ?, ?, ?, ?)",
                [null, ":" . $this->promotion->getFormationId(), ":" . $this->promotion->getPromotionYear(), ":" . $this->promotion->getStartingDate(), ":" . $this->promotion->getEndingDate()]
            );
    }

    function modifyPromotionInDb(Promotion $promotion): void
    {
        $this->database
            ->executeQuery("UPDATE Promotion SET formationId = :formationId, promotionYears = :promotionYear, startingDate = :startingDate, endingDate = :endingDate WHERE promotionId = :promotionId",
                [
                    'formationId' => $promotion->getFormationId(),
                    'promotionYear' => $promotion->getPromotionYear(),
                    'startingDate' => $promotion->getStartingDate(),
                    'endingDate' => $promotion->getEndingDate(),
                    'promotionId' => $promotion->getId()
                ]
            );
    }

    function deletePromotionInDb(Promotion $promotion): void
    {
        $this->database
            ->executeQuery("DELETE FROM Promotion WHERE promotionId = :promotionId",
                [
                    'promotionId' => $promotion->getId()
                ]
            );
    }


}
