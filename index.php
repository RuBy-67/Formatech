<?php 
use Entity\Student;
use Mapper\StudentMapper;

require_once(__DIR__ . "./Autoloader.php");
require_once(__DIR__ . "./Mapper/StudentMapper.php");

// Instancier la classe StudenttMapper
$StudentMapper = StudentMapper::getInstance();

// Appeler la méthode getList
var_dump ($StudentMapper->getList());