<?php
namespace Formation;

use Db\Database;

class Module{

    private string $name;
    private int $durationFormationInHours;
    private $speakers = [];

     public function __construct($name, $durationFormationInHours, $speakers){
        $this->name = $name;
        $this->durationFormationInHours = $durationFormationInHours;
        $this->speakers = $speakers;
    }
   
}