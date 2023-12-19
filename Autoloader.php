<?php
class Autoloader
{

    public static function register()
    {
        spl_autoload_register(['Autoloader','autoload']); 
    
    }

    public static function autoload($nom_classe)
    {
        if( strpos($nom_classe,'DB\\') === 0 ){
            // Seules les classes du namespace \DB seront chargées par l'autoload
            $nom_classe = str_replace('DB\\','',$nom_classe);

            require_once(__DIR__ . "\\Class\\{$nom_classe}.php");
        }

        if( strpos($nom_classe,'StructureMembers\\') === 0 ){
            // Seules les classes du namespace \Structure seront chargées par l'autoload
            $nom_classe = str_replace('StructureMembers\\','',$nom_classe);

            require_once(__DIR__ . "\\Class\\{$nom_classe}.php");
        }

        if( strpos($nom_classe,'Formation\\') === 0 ){
            // Seules les classes du namespace \Structure seront chargées par l'autoload
            $nom_classe = str_replace('Formation\\','',$nom_classe);

            require_once(__DIR__ . "\\Class\\{$nom_classe}.php");
        }
    }
}

