<?php

require_once(__DIR__ . "\..\Autoloader.php");
Autoloader::register();

function addNewPromotionInDb($formation, $promotionYears, $startingDate, $endingDate, $database) {
    return $database->executeQuery("INSERT INTO Promotion (formationId, promotionYears, startingDate, endingDate) VALUES (?, ?, ?, ?)", [$formation, $promotionYears, $startingDate, $endingDate]);
}

function modifyPromotionInDb($promotionId ,$promotionYears, $startingDate, $endingDate, $formation, $database) {
   return $database->executeQuery("UPDATE Promotion SET formationId = ?, promotionYears = ?, startingDate = ?, endingDate = ? WHERE promotionId = ?", [$formation, $promotionYears, $startingDate, $endingDate, $promotionId]);
}

function deletePromotionInDb($database, $promotionId) {
   return  $database->executeQuery("DELETE FROM Promotion WHERE id = ?", [$promotionId]);
}
 function getPromotionListInDb ($database) {
    return $database->executeQuery("SELECT * FROM Promotion");
}