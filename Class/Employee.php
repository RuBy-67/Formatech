<?php 

namespace employee;
use Db\Database;

class Employee{
    private string $firstName;
    private string $lastName;
    private string $job;
    private string $mail;

    public function __construct($firstName, $lastName, $job, $mail){
        $this->firstName= $firstName;
        $this->lastName = $lastName;
        $this->job = $job;
        $this->mail = $mail;
    }

    public function AddNewEmployee($firstName, $lastName, $job, $mail){
        $database = Database::getInstance();
        addNewEmployeeInDb($firstName, $lastName, $job, $mail,$database);
    }
}


