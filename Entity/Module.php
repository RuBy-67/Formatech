<?php

namespace Entity;

use Entity\Speaker;
use Entity\Formation;

//Entity représente la chose du même nom dans la vrai vie
class Module{

    private int $id;
    private string $name;
    private int $durationInHours;

    /**
     * @var Speaker[]
     */
    private array $speakers = [];

    /**
     * @var Formation[]
     */
    private array $formations = [];

    

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

    /**
     * @return Formation[]
     */
    public function getFormations(): array
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

    /**
     * @param Formation[] $formations
     */
    public function setFormations(array $formations): self
    {
        $this->formations = $formations;

        return $this;
    }

    public function addSpeaker(Speaker $speaker): self
    {
        if (!in_array($speaker, $this->speakers, true)) {
        $this->speakers[] = $speaker;
        }

        return $this;
    }

    public function getSpeakersIds(): array
    {
        return array_map(
            function (Speaker $speaker) {
                return $speaker->getId();
            },
            $this->speakers
        );
    }

    public function addFormation(Formation $formation): self
    {
        if (!in_array($formation, $this->formations, true)) {
        $this->formations[] = $formation;
        }

        return $this;
    }

    //TODO mettre en place les checker de format comme dans la classe formation
    //* Format check method
    public function isOnlyAlphabeticCharacters($stringToCheck) :bool
    {
        $regex = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\s]+$/u';


        if (!preg_match($regex, $stringToCheck)) {
            var_dump($stringToCheck);
            echo "Erreur dans la saisie merci de recommencer module ALPHA";
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