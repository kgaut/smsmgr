<?php

define("ROOT", __DIR__ . "/../");
define("ROOT_SRC", __DIR__ );

use Kgaut\Localization;
use Silex\Provider;
use Silex\Provider\FormServiceProvider;


$app = new Silex\Application();

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Provider\HttpFragmentServiceProvider());
$app->register(new Provider\ServiceControllerServiceProvider());

$conf_file = ROOT_SRC.'/conf/'.str_replace('www.','',$_SERVER['HTTP_HOST']).'.php';
if(is_file($conf_file)) {
  require($conf_file);
}
else {
  require(ROOT_SRC.'/conf/default.php');
}

return $app;