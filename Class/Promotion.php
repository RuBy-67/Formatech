<?php

namespace promotion;

use DB\Database;

class Promotion
{
    private int $formationId;
    private string $promotionYears;
    private int $startingDate;
    private int $endingDate;

    public function __construct($formationId, $promotionYears, $startingDate, $endingDate)
    {
        $this->formations = $formationId;
        $this->promotionYears = $promotionYears;
        $this->startingDate = $startingDate;
        $this->endingDate = $endingDate;
    }

    public function createPromotion($promotionYears, $startingDate, $endingDate, $formation): void
    {
        Database::getInstance()->executeQuery("INSERT INTO Promotion (formationId, promotionYears, startingDate, endingDate) VALUES (?, ?, ?, ?)", [$formation, $promotionYears, $startingDate, $endingDate]);
    }
    public function modifyPromotion($promotionId, $promotionYears, $startingDate, $endingDate, $formation) : void
    {
        Database::getInstance()->executeQuery("UPDATE Promotion SET formationId = ?, promotionYears = ?, startingDate = ?, endingDate = ? WHERE promotionId = ?", [$formation, $promotionYears, $startingDate, $endingDate, $promotionId]);
    }
    public function deletePromotion($promotionId) : void
    {
        Database::getInstance()->executeQuery("DELETE FROM Promotion WHERE id = ?", [$promotionId]);
    }
    public function getPromotionList()
    {
        return Database::getInstance()->executeQuery("SELECT * FROM Promotion");
    }

}
