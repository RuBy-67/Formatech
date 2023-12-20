<?php

namespace Entity;

class Speaker {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $mail;
    /**
     * @var module[]
     */
    private array $modules = [];



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

     public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return Module[]
     */
    public function getModules(): array
    {
        return $this->modules;
    }




    public function setId(string $id): self
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

    public function setMail(string $mail): self
    {
        $this->mail = $this->isOnlyAlphabeticCharacters($mail) ? ucfirst(strtolower($mail)) : null;

        return $this;
    }

    /**
     * @param Module[] $modules
     */
    public function setModules(array $modules): self
    {
        $this->modules = $modules;

        return $this;
    }

    public function addModule(Module $module): self
    {
        // TODO : Vérifier que le module n'existe pas deja dans le tableau avant de l'ajouter
        $this->modules[] = $module;

        return $this;
    }


    //* Format check method
    public function isOnlyAlphabeticCharacters($stringToCheck) :bool
    {
        $regex = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/u';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie merci de recommencer";
            exit;
        } 
        return true;
    }

    public function isOnlyNumericCharacters($stringToCheck): bool
    {
        $regex = '/^[0-9]+$/';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie merci de recommencer";
            exit;
        } 
        return true;
    }
}