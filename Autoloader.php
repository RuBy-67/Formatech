<?php
class Autoloader
{

    public static function register()
    {
        spl_autoload_register(['Autoloader','autoload']); 
    }

    public static function autoload($nom_classe)
    {
        if( strpos($nom_classe,'DB\ ') === 0 ){
            // Seules les classes du namespace \MonBlog seront chargées par l'autoload
            $nom_classe = str_replace('DB\ ','',$nom_classe);

            require_once(DIR . "\Class\{$nom_classe}.php");
        }

        if( strpos($nom_classe,'StructureMember\ ') === 0 ){
            // Seules les classes du namespace \MonBlog seront chargées par l'autoload
            $nom_classe = str_replace('StructureMember\ ','',$nom_classe);

            require_once(DIR . "\Class\{$nom_classe}.php");
        }
    }
}
