<?php
use Kgaut\Sms;

define('BASEPATH',__DIR__.'/../');

require_once BASEPATH.'/vendor/autoload.php';
require_once BASEPATH.'/config/settings.php';

$file = 'sms-2014-08-28 01-00-01.xml';
$file = 'sms-2015-09-07 11-55-39.xml';

$options = array(
  "uniqueNode" => "sms",
  "checkShortClosing" => TRUE,
);

$streamer = Prewk\XmlStringStreamer::createUniqueNodeParser(BASEPATH.$file,$options);

$i = 0;
while ($node = $streamer->getNode()) {
  if($i>=50) {
    break;
  }
  $i++;
  $simpleXmlNode = simplexml_load_string($node);
  $s = Sms::createFromXml($simpleXmlNode);
  dump($s);

  $s->save();
}

echo "$i sms inserted";