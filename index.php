<?php

require_once(__DIR__.'/Config/Config.php');

require_once(__DIR__.'/Config/Autoloader.php');

\Config\Autoloader::autoLoad();

new \Controllers\FrontController();

/*on peut appeller desd routes : (index.php?route=....&id=...
 *
 * $routes[ = [
 *  'liste_publique' => [
 *      'ctrl' => '\controllers\ctrlListe',
 *      'action => 'lsiter'
 *      'authentificated' => False
 *      'prenoms' => [
 *          'id' => PARAM_INT
 *       ]
 *  ]
 */