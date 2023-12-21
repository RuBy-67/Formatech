<?php 

namespace Entity;


use DB\Database;
use Entity\Formation;

class Employee
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $job;
    private string $mail;
    private string $password;

     public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function getMail(): string
    {
        return $this->mail;
    }
    
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setId(int $id): self
    {
      $this->id = $this->isOnlyNumericCharacters($id) ? ucfirst(strtolower($id)) : null;

      return $this;
    }

    public function setFirstName(string $firstName): self
    {
      $this->firstName = $this->isOnlyAlphabeticCharacters($firstName) ? ucfirst(strtolower($firstName)) : null;

      return $this;
    }

    public function setLastName(string $lastName): self
    {
      $this->lastName = $this->isOnlyAlphabeticCharacters($lastName) ? ucfirst(strtolower($lastName)) : null;

      return $this;
    }
    public function setJob(string $job): self
    {
      $this->job = $this->isOnlyAlphabeticCharacters($job) ? ucfirst(strtolower($job)) : null;

      return $this;
    }

    public function setMail(string $mail): self
    {
      $this->mail = $this->isEmailFormatCorrect($mail) ? ucfirst(strtolower($mail)) : null;

      return $this;
    }

    public function setPassword(string $password): self
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;

        return $this;
    }

  

    // public function AddNewEmployee() :void
    // {
    //     $database = Database::getInstance();
    //     $this->addInDb($this->firstName, $this->lastName, $this->job, $this->mail, $database);
    // }

    // public function addInDb($firstName, $lastName, $job, $mail,$database ){
    //     $database->executeQuery("INSERT INTO employees (`employeeId`, `firstName`, `lastName`, `job`, `mail`) VALUES (?, ?, ?, ?, ?)", [null,$firstName, $lastName, $job, $mail]);
    // }

    



 //* Format check method
    public function isOnlyAlphabeticCharacters($stringToCheck): bool
    {
        $regex = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/u';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie merci de recommencer, Alphabetic";
            exit;
        }
        return true;
    }

    public function isOnlyNumericCharacters($stringToCheck): bool
    {
        $regex = '/^[0-9]+$/';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie merci de recommencer, Numeric";
            exit;
        }
        return true;
    }
    
    public function isEmailFormatCorrect($emailToCheck){
        $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

         if (!preg_match($regex, $emailToCheck)) {
            echo "Erreur dans la saisie merci de recommencer, EMAIL";
            exit;
        } 
        return true;
    }
    
}