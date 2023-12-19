<?php 
namespace Formation;

use Db\Database;

class Formation
{
    private string $name;
    private string $durationFormationInMonth;
    private string $abbreviation;
    private string $rncpLvl;
    private string $accessibility;
    private array $modules = [];



    public function __construct($name, $durationFormationInMonth, $abbreviation, $rncpLvl, $accessibility, $modules){
        $this->name = $name;
        $this->durationFormationInMonth = $durationFormationInMonth;
        $this->abbreviation = $abbreviation;
        $this->rncpLvl = $rncpLvl;
        $this->accessibility = $accessibility;
        $this->modules = $modules;
    }

}