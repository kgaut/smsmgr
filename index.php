<?php

define('BASEPATH',__DIR__);

require_once BASEPATH.'/vendor/autoload.php';

$app = require BASEPATH.'/src/app.php';
require BASEPATH.'/config/prod.php';
require BASEPATH.'/src/controllers.php';

$app->run();


$app->run();