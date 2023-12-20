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

    
}


