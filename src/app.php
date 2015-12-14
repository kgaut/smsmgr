<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;
use Kgaut\BBF\NewsletterSubscriptionForm;


$app = require(__DIR__.'/bootstrap.php');

$app->get('/', function () use ($app)  {
  $streamer = Prewk\XmlStringStreamer::createStringWalkerParser(BASEPATH.'/sms-2015-09-07 11-55-39.xml');
  $i = 0;
  while ($node = $streamer->getNode() && $i<=50) {
    $i++;
    $simpleXmlNode = simplexml_load_string($node);
    dump($simpleXmlNode);
  }
});


return $app;