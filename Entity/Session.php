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
        if ($this->isTimeFormatCorrect($startTime)) {
            $this->startTime = $startTime;
        } else {
            $this->startTime = null;
        }

        return $this;
    }

    public function setEndTime(string $endTime): self
    {
        if ($this->isTimeFormatCorrect($endTime)) {
            $this->endTime = $endTime;
        } else {
            $this->endTime = null;
        }

        return $this;
    }

    public function setModuleId(int $moduleId): self
    {
        if ($this->isOnlyNumericCharacters($moduleId)) {
            $this->moduleId = $moduleId;
        }

        return $this;
    }

    public function setPromotionId(int $promotionId): self
    {
        if ($this->isOnlyNumericCharacters($promotionId)) {
            $this->promotionId = $promotionId;
        }

        return $this;
    }
    public function setSpeakerId(?int $speakerId): self
    {
        $this->speakerId = $speakerId;

        return $this;
    }
    public function setClassRoomId(?int $classRoomId): self
    {
        $this->classRoomId = $classRoomId;

        return $this;
    }

    //* Format check method
    public function isOnlyNumericCharacters($stringToCheck): bool
    {
        $regex = '/^[0-9]+$/';

        if (!preg_match($regex, $stringToCheck)) {
            echo "Erreur dans la saisie, merci de recommencer, Numeric";
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
