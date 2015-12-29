<?php

define("ROOT", __DIR__ . "/../");
define("ROOT_SRC", __DIR__ );

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());

$conf_file = ROOT.'/config/'.str_replace('www.','',$_SERVER['HTTP_HOST']).'.php';
if(is_file($conf_file)) {
  require($conf_file);
}
else {
  require(ROOT_SRC.'/config/prod.php');
}



$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
}));

return $app;
