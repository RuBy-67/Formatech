<?php

namespace Entity;

class Student
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $mail;
    private int $birthDate;
    private string $password;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirsName(): string
    {
        return $this->firstName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getmail(): string
    {
        return $this->mail;
    }
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setId(int $id): self
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

    public function setBirthDate(int $birthDate): self
    {
        $this->birthDate = $this->isOnlyNumericCharacters($birthDate) ?: null;

        return $this;
    }



    public function setMail(string $mail): self
    {
        $this->mail = $this->isEmailFormatCorrect($mail) ? ucfirst(strtolower($mail)) : null;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $this->isSecureParameter($password) ?: null;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
        return $this;
    }


    //TODO mettre en place les checker de format comme dans la classe formation
    //* Format check method
    public function isOnlyAlphabeticCharacters($stringToCheck): bool
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
    

    public function isSecureParameter($stringToCheck): bool
    {
        $hasMinLength = strlen($stringToCheck) >= 8;
        $hasUpperCase = preg_match('/[A-Z]/', $stringToCheck);
        $hasLowerCase = preg_match('/[a-z]/', $stringToCheck);
        $hasDigit = preg_match('/\d/', $stringToCheck);
        $hasSpecialChar = preg_match('/[!@#$%^&*()\-_=+\[\]{}|;:\'",.<>?\/]/', $stringToCheck);
        $hasNoSpace = !preg_match('/\s/', $stringToCheck);

        if (!$hasMinLength || !$hasUpperCase || !$hasLowerCase || !$hasDigit || !$hasSpecialChar || !$hasNoSpace) {
            echo "Erreur dans la saisie, merci de recommencer.";
            return false;
        }

        return true;
    }

    public function isEmailFormatCorrect($emailToCheck){
        $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

         if (!preg_match($regex, $emailToCheck)) {
            echo "Erreur dans la saisie merci de recommencer";
            exit;
        } 
        return true;
    }

}