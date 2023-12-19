<?php 
namespace Entity;

use Db\Database;

class Formation
{
    private string $name;
    private int $durationFormationInMonth;
    private string $abbreviation;
    private string $rncpLvl;
    private string $accessibility;
    private array $modules = [];



    public function __construct($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility, $modules){
        $this->setName($name);
        $this->setDurationFormationInMonth($durationFormationInMonth);
        $this->setAbbreviation($abbreviation);
        $this->setRncpLvl($rncpLvl);
        $this->setAccessibility($accessibility);
        $this->modules = $modules;
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




    //* Set element
    public function setName(string $name): self
    {
      $this->name = $this->isOnlyAlphabeticCharacters($name) ? ucfirst(strtolower($name)) : null;

      return $this;
    }

    public function setDurationFormationInMonth(int $durationFormationInMonth): self
    {
        $this->durationFormationInMonth = $this->isOnlyNumericCharacters($durationFormationInMonth) ? ucfirst(strtolower($durationFormationInMonth)) : null;

        return $this;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $this->isOnlyAlphabeticCharacters($abbreviation) ? ucfirst(strtolower($abbreviation)) : null; 
        
        return $this;
    }

    public function setRncpLvl(int $rncpLvl): self
    {
        $this->rncpLvl = $this->isOnlyNumericCharacters($rncpLvl) ? ucfirst(strtolower($rncpLvl)) : null;
        
        return $this;
    }

    public function setAccessibility(string $accessibility): self
    {
        $this->accessibility = $this->isOnlyAlphabeticCharacters($accessibility) ? ucfirst(strtolower($accessibility)) : null; 

        return $this;
    }



    //* Method
    public static function addInDb($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility, $database){
    
        $database->executeQuery("INSERT INTO formation (`formationId`, `name`, `durationFormationInMonth`, `abbreviation`, `rncpLvl`, `accessibility`) VALUES (?, ?, ?, ?, ?, ?)",
         [null, $name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility]);
    }

    public function modifyInDb(){
         $database->executeQuery("UPDATE formation SET formationId = ?, promotionYears = ?, startingDate = ?, endingDate = ? WHERE promotionId = ?",
          [$name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility, $database]);
    }
}