<?php
namespace App;

class Autoloader
{
        static function register()
        {
            spl_autoload_register([
                __CLASS__,
                'autoload'
            ]);
        }

        static function autoload($class)
        {
            //on reccupere dans $class la totalité du namespace de la classe concernée (App\Client\Compte)
            //on retire App\ (Client\Compte)

            $class = str_replace(__NAMESPACE__ . '\\', '', $class);

            //on remplace les \ par / pour avoir le chemin d'acces aux fichiers:
            $class = str_replace('\\', '/', $class);

            $fichier = __DIR__ . '/' . $class . '.php';
            //on verifie si le fichier existe
            if(file_exists($fichier)){
                require_once $fichier;

            }
        }
}