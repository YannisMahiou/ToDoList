<?php

require_once(__DIR__.'/Config/Config.php');

require_once(__DIR__.'/Config/Autoloader.php');

\Config\Autoloader::autoLoad();

new \Controllers\FrontController();

