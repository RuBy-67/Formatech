<?php 

namespace Entity;


use DB\Database;
use Entity\Formation;

class Employee
{
    private string $firstName;
    private string $lastName;
    private string $job;
    private string $mail;

    public function __construct($firstName, $lastName, $job, $mail){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->job = $job;
        $this->mail = $mail;
    }
  

    public function AddNewEmployee() :void
    {
        $database = Database::getInstance();
        $this->addInDb($this->firstName, $this->lastName, $this->job, $this->mail, $database);
    }

    public function addInDb($firstName, $lastName, $job, $mail,$database ){
        $database->executeQuery("INSERT INTO employees (`employeeId`, `firstName`, `lastName`, `job`, `mail`) VALUES (?, ?, ?, ?, ?)", [null,$firstName, $lastName, $job, $mail]);
    }
   
    //FP1 formation
    public static function createFormation($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $moduleId, $accessibility) :void 
    {
        $database = Database::getInstance();
        
        Formation::addInDb($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility, $database);
        echo "La formation à bien était crée son id ";
    }

    public function modifyFormation(): void 
    { 
        $database = Database::getInstance();
        $database->modifyInDb($promotionId ,$promotionYears, $startingDate, $endingDate, $formation, $database);
    }

    

    // public function deleteFormation() :void
    // {

    // }
    // //! doit afficher la liste des modules associés
    // public function getFormationList() :array
    // {
    //     getModuleListByFormation();
    // }

    // //Fp1 Module
    // public function createModule() :void 
    // {

    // }

    // public function modifyModule() :void 
    // {

    // }

    // public function deleteModule() :void
    // {

    // }

    // public function getModuleList() :array
    // {
        
    // }

    
}


