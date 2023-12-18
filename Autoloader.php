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
            // Seules les classes du namespace \MonBlog seront chargées par l'autoload
            $nom_classe = str_replace('DB\\','',$nom_classe);

            require_once(__DIR__ . "\\Class\\{$nom_classe}.php");
        }
    }
}

