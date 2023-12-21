<?php

namespace Entity;

class Student
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $mail;
    private string $birthDate;
    private string $password;
    /**
     * @var Promotion
     */
    private  $promotionId = [];

    /**
     * @var Promotion[]
     */
    private  $promotions = [];

    public function getId(): int
    {
        return $this->id;
    }
    public function getPromotionId(): int
    {
        return $this->promotionId;
    }

    public function getFirstName(): string
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
   

    public function setPromotionId(int $id): self
    {
        if ($this->isOnlyNumericCharacters($id)) {
            $this->promotionId = $id;
        }
    
        return $this;
    }

    public function setId(int $id): self
    {
        if ($this->isOnlyNumericCharacters($id)) {
            $this->id = $id;
        }
    
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

    public function setBirthDate(string $birthDate): self
    {
        if ($this->isOnlyDateCharacter($birthDate)) {
            $this->birthDate = $birthDate;
        } else {
            $this->birthDate = null;
        }
    
        return $this;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $this->isEmailFormatCorrect($mail) ? ucfirst(strtolower($mail)) : null;

        return $this;
    }

    public function setPassword(string $password): self
    {
        // $this->password = $this->isSecureParameter($password);

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
    

    // public function isSecureParameter($stringToCheck): bool
    // {
    //     $hasMinLength = strlen($stringToCheck) >= 8;
    //     $hasUpperCase = preg_match('/[A-Z]/', $stringToCheck);
    //     $hasLowerCase = preg_match('/[a-z]/', $stringToCheck);
    //     $hasDigit = preg_match('/\d/', $stringToCheck);
    //     $hasSpecialChar = preg_match('/[!@#$%^&*()\-_=+\[\]{}|;:\'",.<>?\/]/', $stringToCheck);
    //     $hasNoSpace = !preg_match('/\s/', $stringToCheck);

    //     if ($hasMinLength) {
    //         //? !$hasMinLength || !$hasUpperCase || !$hasLowerCase || !$hasDigit || !$hasSpecialChar || !$hasNoSpace
    //         echo "Erreur dans la saisie, merci de recommencer, MDP";
    //         return false;
    //     }

    //     return true;
    // }

    public function isEmailFormatCorrect($emailToCheck){
        $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

         if (!preg_match($regex, $emailToCheck)) {
            echo "Erreur dans la saisie merci de recommencer, EMAIL";
            exit;
        } 
        return true;
    }
    public function isOnlyDateCharacter($dateToCheck): bool
    {
        // Le motif regex pour le format "dd-mm-aaaa"
        $regex = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';
    
        if (!preg_match($regex, $dateToCheck)) {
            echo "Erreur dans la saisie de la date, merci de recommencer, DATE_FORMAT";
            return false;
        }

        return true;
    }

    public function addPromotion(Promotion $promotionToAdd): self
    {
        $promotionToAddInPromotions = array_filter(
            $this->promotions,
            function (Promotion $currentPromotion) use ($promotionToAdd) {
                return $currentPromotion->getId() === $promotionToAdd->getId();
            }
        );

        if (!$promotionToAddInPromotions) {
            $this->promotions[] = $promotionToAdd;
        }

        return $this;
    }

    /**
     * @return Promotion[]
     */
    public function getPromotions(): array
    {
        return $this->promotions;
    }
}