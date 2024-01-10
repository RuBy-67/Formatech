<?php
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(['Autoloader', 'autoload']);
    }

    public static function autoload($nom_classe)
    {
        if (strpos($nom_classe, 'DB\\') === 0) {
            // Seules les classes du namespace \DB seront chargées par l'autoload
            $nom_classe = str_replace('DB\\', '', $nom_classe);

            require_once(__DIR__ . "/Db/{$nom_classe}.php");
        }

        if (strpos($nom_classe, 'Entity\\') === 0) {
            // Seules les classes du namespace \Structure seront chargées par l'autoload
            $nom_classe = str_replace('Entity\\', '', $nom_classe);

            require_once(__DIR__ . "/Entity/{$nom_classe}.php");
        }

        if (strpos($nom_classe, 'Repository\\') === 0) {
            // Seules les classes du namespace \Structure seront chargées par l'autoload
            $nom_classe = str_replace('Repository\\', '', $nom_classe);

            require_once(__DIR__ . "/Repository/{$nom_classe}.php");
        }

        if (strpos($nom_classe, 'Mapper\\') === 0) {
            // Seules les classes du namespace \Structure seront chargées par l'autoload
            $nom_classe = str_replace('Mapper\\', '', $nom_classe);

            require_once(__DIR__ . "/Mapper/{$nom_classe}.php");
        }
    }
}

Autoloader::register();
