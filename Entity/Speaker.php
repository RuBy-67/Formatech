<?php

namespace Entity;

class Speaker
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $mail;
    private string $password;
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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return Module[]
     */
    public function getModules(): array
    {
        return $this->modules;
    }
    public function setPassword(string $password): self
    {
        $this->password = $this->isSecureParameter($password);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
        return $this;
    }



    public function setId(string $id): self
    {
        $this->id = $this->isOnlyNumericCharacters($id) ?: null;
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
        $this->mail = $this->isEmailFormatCorrect($mail) ? ucfirst(strtolower($mail)) : null;

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

        if (!in_array($module, $this->modules, true)) {
            $this->modules[] = $module;
        }

        return $this;
    }


    //* Format check method
    public function isOnlyAlphabeticCharacters($stringToCheck): bool
    {
        $regex = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/u';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie de {$stringToCheck} merci de recommencer";
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

    public function isEmailFormatCorrect($emailToCheck)
    {
        $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        if (!preg_match($regex, $emailToCheck)) {
            echo "Erreur dans la saisie merci de recommencer";
            exit;
        }
        return true;
    }

    public function isSecureParameter($stringToCheck): bool
    {
        $hasMinLength = strlen($stringToCheck) >= 8;
        $hasUpperCase = preg_match('/[A-Z]/', $stringToCheck);
        $hasLowerCase = preg_match('/[a-z]/', $stringToCheck);
        $hasDigit = preg_match('/\d/', $stringToCheck);
        $hasSpecialChar = preg_match('/[!@#$%^&*()\-_=+\[\]{}|;:\'",.<>?\/]/', $stringToCheck);
        $hasNoSpace = !preg_match('/\s/', $stringToCheck);

        //if ($hasMinLength) {
        //  //? !$hasMinLength || !$hasUpperCase || !$hasLowerCase || !$hasDigit || !$hasSpecialChar || !$hasNoSpace
        //  echo "Erreur dans la saisie, merci de recommencer, MDP";
        //  return false;
        //}

        return true;
    }
}