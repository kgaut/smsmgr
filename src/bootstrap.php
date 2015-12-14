<?php

define("ROOT", __DIR__ . "/../");
define("ROOT_SRC", __DIR__ );

use Kgaut\Localization;
use Silex\Provider;
use Silex\Provider\FormServiceProvider;

function t($string) {
  return Localization::t($string);
}

$app = new Silex\Application();

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Provider\HttpFragmentServiceProvider());
$app->register(new Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__.'/views',
));

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
  'locale_fallbacks' => array('fr'),
));

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new FormServiceProvider());

$lang = Localization::init($app);

$conf_file = ROOT_SRC.'/conf/'.str_replace('www.','',$_SERVER['HTTP_HOST']).'.php';
if(is_file($conf_file)) {
  require($conf_file);
}
else {
  require(ROOT_SRC.'/conf/default.php');
}

return $app;