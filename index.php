<?php 
use Entity\Promotion;
use Mapper\PromotionMapper;

require_once(__DIR__ . "./Autoloader.php");
require_once(__DIR__ . "./Mapper/PromotionMapper.php");

// Instancier la classe PromotiontMapper
$PromotionMapper = new PromotionMapper();

// Appeler la méthode getList
var_dump ($PromotionMapper->getList());