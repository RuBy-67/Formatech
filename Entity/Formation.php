<?php 
namespace Entity;

use Db\Database;

class Formation
{
    private ?int $id;
    private string $name;
    private int $durationInMonth;
    private string $abbreviation;
    private string $rncpLvl;
    private string $accessibility;
    /**
     * @var module[]
     */
    private array $modules = [];

    public function __construct($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility, $modules){
        $this->setName($name);
        $this->setDurationInMonth($durationFormationInMonth);
        $this->setAbbreviation($abbreviation);
        $this->setRncpLvl($rncpLvl);
        $this->setAccessibility($accessibility);
        $this->modules = $modules;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDurationInMonth(): int
    {
        return $this->durationInMonth;
    }

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    public function getRncpLvl(): string
    {
        return $this->rncpLvl;
    }

    public function getAccessibility(): string
    {
        return $this->accessibility;
    }

    /**
     * @return Module[]
     */
    public function getModules(): array
    {
        return $this->modules;
    }

  


 


    //* Set element
    public function setName(string $name): self
    {
      $this->name = $this->isOnlyAlphabeticCharacters($name) ? ucfirst(strtolower($name)) : null;

      return $this;
    }

    public function setDurationInMonth(int $durationInMonth): self
    {
        $this->durationInMonth = $this->isOnlyNumericCharacters($durationInMonth) ? ucfirst(strtolower($durationInMonth)) : null;

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