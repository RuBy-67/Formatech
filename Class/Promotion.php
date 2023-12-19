<?php 

namespace promotion;
use DB\Database;

class Promotion{
    private int $formationId;
    private string $promotionYears;
    private int $startingDate;
    private int $endingDate;

    public function __construct($formationId, $promotionYears, $startingDate, $endingDate){
        $this->formations= $formationId;
        $this->promotionYears = $promotionYears;
        $this->startingDate = $startingDate;
        $this->endingDate = $endingDate;
    }

    public function createPromotion ($promotionYears, $startingDate, $endingDate, $formation) {
        $database = Database::getInstance();
        return addNewPromotionInDb($formation, $promotionYears, $startingDate, $endingDate, $database); 
    }
    public function modifyPromotion ($promotionId ,$promotionYears, $startingDate, $endingDate, $formation) {
        $database = Database::getInstance();
        return modifyPromotionInDb($promotionId ,$promotionYears, $startingDate, $endingDate, $formation, $database);
    }
    public function deletePromotion ($promotionId) {
        $database = Database::getInstance();
        return deletePromotionInDb($database, $promotionId);
    }
    public function getPromotionList () {
        $database = Database::getInstance();
        return getPromotionListInDb($database);
    }

}
