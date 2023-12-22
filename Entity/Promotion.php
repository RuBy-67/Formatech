<?php

namespace Entity;

class Promotion
{
    private int $id;
    private int $formationId;
    private Formation $formation;
    private int $promotionYear;
    private string $startingDate;
    private string $endingDate;
    private string $formationName;




    public function getId(): int
    {
        return $this->id;
    }

    public function getFormationName(): string
    {
        return $this->formationName;
    }


    public function getFormationId(): int
    {
        return $this->formationId;
    }

    public function getPromotionYear(): int
    {
        return $this->promotionYear;
    }
    public function getStartingDate(): string
    {
        return $this->startingDate;
    }

    public function getEndingDate(): string
    {
        return $this->endingDate;
    }


    public function setId(int $id): self
    {
        if ($this->isOnlyNumericCharacters($id)) {
            $this->id = $id;
        }
        return $this;
    }

    public function setFormationId(int $formationId): self
    {
        if ($this->isOnlyNumericCharacters($formationId)) {
            $this->formationId = $formationId;
        }
    
        return $this;
    }

    public function setFormationName(string $formationName): void
    {
        $this->formationName = $formationName;
    }
    

    public function setPromotionYear(int $promotionYear): self
{
    if ($this->isOnlyNumericCharacters($promotionYear)) {
        $this->promotionYear = $promotionYear;
    }

    return $this;
}

public function setStartingDate(string $startingDate): self
{
    if ($this->isOnlyDateCharacter($startingDate)) {
        $this->startingDate = $startingDate;
    }

    return $this;
}

public function setEndingDate(string $endingDate): self
{
    if ($this->isOnlyDateCharacter($endingDate)) {
        $this->endingDate = $endingDate;
    }

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
    public function isOnlyDateCharacter($dateToCheck): bool
    {
        // Le motif regex pour le format "dd-mm-aaaa"
        $regex = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';
        if (!preg_match($regex, $dateToCheck)) {
            echo "Erreur dans la saisie de la date, merci de recommencer.";
            return false;
        }

        return true;
    }

    public function getFormation(): Formation
    {
        return $this->formation;
    }

    public function setFormation(Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}