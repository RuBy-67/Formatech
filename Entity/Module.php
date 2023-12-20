<?php

namespace Entity;

use Entity\Speaker;
//Entity représente la chose du même nom dans la vrai vie
class Module{

    private int $id;
    private string $name;
    private int $durationInHours;

    /**
     * @var Speaker[]
     */
    private array $speakers = [];

    
    public function __construct($name, $durationInHours, $speakeriD){
        $this->setName($name);
        $this->setDurationInHours($durationInHours);
        $this->setSpeakers($speakeriD);
    }

    

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDurationInHours(): int
    {
        return $this->durationInHours;
    }

    /**
     * @return Speaker[]
     */
    public function getSpeakers(): array
    {
        return $this->speakers;
    }

    public function setId(int $id): self
    {
      $this->id = $this->isOnlyNumericCharacters($id) ? ucfirst(strtolower($id)) : null;

      return $this;
    }

    public function setName(string $name): self
    {
      $this->name = $this->isOnlyAlphabeticCharacters($name) ? ucfirst(strtolower($name)) : null;

      return $this;
    }

    public function setDurationInHours(int $durationInHours): self
    {
      $this->durationInHours = $this->isOnlyNumericCharacters($durationInHours) ? ucfirst(strtolower($durationInHours)) : null;

      return $this;
    }

    /**
     * @param Speaker[] $speakers
     */
    public function setSpeakers(array $speakers): self
    {
        $this->speakers = $speakers;

        return $this;
    }

    public function addSpeaker(Speaker $speaker): self
    {
        // TODO : Vérifier que le speaker n'existe pas deja dans le tableau avant de l'ajouter
        $this->speakers[] = $speaker;

        return $this;
    }

    //TODO mettre en place les checker de format comme dans la classe formation
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