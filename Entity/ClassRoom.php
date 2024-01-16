<?php

namespace Entity;


use DB\Database;
use Entity\Formation;

class ClassRoom
{
    private int $id;
    private int $building;
    private string $name;
    private int $capacityMax;

    public function getId(): int
    {
        return $this->id;
    }

    public function getBuilding(): int
    {
        return $this->building;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCapacity(): int
    {
        return $this->capacityMax;
    }


    public function setId(int $id): self
    {
        $this->id = $this->isOnlyNumericCharacters($id) ? ucfirst(strtolower($id)) : null;

        return $this;
    }

    public function setBuilding(string $building): self
    {
        $this->building = $this->isOnlyAlphabeticCharacters($building) ? ucfirst(strtolower($building)) : null;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $this->isOnlyAlphabeticCharacters($name) ? ucfirst(strtolower($name)) : null;

        return $this;
    }
    public function setCapacity(string $capacityMax): self
    {
        $this->$capacityMax = $this->isOnlyNumericCharacters($capacityMax) ? ucfirst(strtolower($capacityMax)) : null;

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
        $regex = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\s]+$/u';

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


}