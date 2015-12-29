<?php
use Kgaut\Sms;

define('BASEPATH',__DIR__.'/../');

require_once BASEPATH.'/vendor/autoload.php';

$file = 'sms-2014-08-28 01-00-01.xml';

$options = array(
  "uniqueNode" => "sms",
  "checkShortClosing" => TRUE,
);

$streamer = Prewk\XmlStringStreamer::createUniqueNodeParser(BASEPATH.$file,$options);

$i = 0;
while ($node = $streamer->getNode()) {
  $i++;
  $simpleXmlNode = simplexml_load_string($node);
  $s = new Sms();
}