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

return $app;