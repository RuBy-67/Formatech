<?php

namespace Entity;

class Session
{
    private int $id;
    private string $date;
    private string $startTime;
    private string $endTime;
    private int $moduleId;
    private int $promotionId;
    private int $classRoomId;
    private int $speakerId;
    private ?string $className;
    private ?string $moduleName;
    private ?string $speakerFirstName;
    private ?string $speakerLastName;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }

    public function getModuleId(): int
    {
        return $this->moduleId;
    }

    public function getPromotionId(): int
    {
        return $this->promotionId;
    }
    public function getClassRoomId(): ?int
    {
        return $this->classRoomId;
    }
    public function getSpeakerId(): ?int
    {
        return $this->speakerId;
    }

    public function setId(int $id): self
    {
        if ($this->isOnlyNumericCharacters($id)) {
            $this->id = $id;
        }

        return $this;
    }

    public function setDate(string $date): self
    {
        if ($this->isOnlyDateCharacter($date)) {
            $this->date = $date;
        } else {
            $this->date = null;
        }

        return $this;
    }

    public function setStartTime(string $startTime): self
    {
            $this->startTime = $startTime;

        return $this;
    }

    public function setEndTime(string $endTime): self
    {
            $this->endTime = $endTime;
        return $this;
    }

    public function setModuleId(int $moduleId): self
    {
        if ($this->isOnlyNumericCharacters($moduleId)) {
            $this->moduleId = $moduleId;
        }

        return $this;
    }

    public function setPromotionId(?int $id): self
    {
        if ($id === null) {
            $this->promotionId = 0;
        } else {
            if ($this->isOnlyNumericCharacters((string) $id)) {
                $this->promotionId = $id;
            } else {

                $this->promotionId = 0;
            }
        }
    
        return $this;
    }
    
    public function setSpeakerId(?int $speakerId): self
    {
        $this->speakerId = $speakerId;

        return $this;
    }


    public function setClassRoomId(?int $classRoomId = null): self
    {
        $this->classRoomId = $classRoomId;

        return $this;
    }

    public function getSpeakerFirstName(): ?string
    {
        return $this->speakerFirstName;
    }

    public function setSpeakerFirstName(?string $speakerFirstName): self
    {
        $this->speakerFirstName = $speakerFirstName;
        return $this;
    }

    public function getSpeakerLastName(): ?string
    {
        return $this->speakerLastName;
    }
    public function getClassName(): ?string
    {
        return $this->className;
    }
    public function getModuleName(): ?string
    {
        return $this->moduleName;
    }

    public function setModuleName(?string $moduleName): self
    {
        $this->moduleName = $moduleName;
        return $this;
    }
    public function setClassName(?string $className): self
    {
        $this->className = $className;
        return $this;
    }

    public function setSpeakerLastName(?string $speakerLastName): self
    {
        $this->speakerLastName = $speakerLastName;
        return $this;
    }

    //* Format check method
    public function isOnlyNumericCharacters($stringToCheck): bool
    {
        $regex = '/^[0-9]+$/';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie, merci de recommencer, Numeric session";
            return false;
        }

        return true;
    }

    public function isTimeFormatCorrect($timeToCheck): bool
    {
        $regex = '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';

        if (!preg_match($regex, $timeToCheck)) {
            echo "Erreur dans la saisie, merci de recommencer, TimeFormat";
            return false;
        }

        return true;
    }

    public function isOnlyDateCharacter($dateToCheck): bool
    {
        // Le motif regex pour le format "aaaa-mm-jj"
        $regex = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';

        if (!preg_match($regex, $dateToCheck)) {
            echo "Erreur dans la saisie de la date, merci de recommencer, DATE_FORMAT";
            return false;
        }

        return true;
    }
}
