<?php 

namespace StructureMembers;


require_once(__DIR__ . "\..\DbRequest\\employee.php");

use DB\Database;
use Formation\Formation;

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
        addNewEmployeeInDb($this->firstName, $this->lastName, $this->job, $this->mail, $database);
    }
   
    //FP1 formation
    public function createFormation($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $moduleId, $accessibility,) :void 
    {
        $database = Database::getInstance();
        new Formation($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $moduleId, $accessibility,);
        addNewFormationInDb($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $moduleId, $accessibility, $database);
    }

    public function modifyFormation() :void 
    {

    }

    public function deleteFormation() :void
    {

    }
    //! doit afficher la liste des modules associés
    public function getFormationList() :array
    {

    }

    //Fp1 Module
    public function createModule() :void 
    {

    }

    public function modifyModule() :void 
    {

    }

    public function deleteModule() :void
    {

    }

    public function getModuleList() :array
    {
        
    }

    
}