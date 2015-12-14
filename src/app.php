<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;
use Kgaut\BBF\NewsletterSubscriptionForm;


$app = require(__DIR__.'/bootstrap.php');

$app->get('/', function () use ($app)  {
  return "laaa";
});


return $app;