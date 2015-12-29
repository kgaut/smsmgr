<?php
namespace Kgaut;

class Sms {
  public $address;
  public $date;
  public $type;
  public $body;
  public $read;
  public $status;
  public $date_sent;
  public $readable_date;
  public $contact_name;
  private $checksum;

  public static function createFromXml(\SimpleXMLElement $element) {
    $sms = new static();
    $sms->address = (String) $element->attributes()->address;
    $sms->date = (Integer) $element->attributes()->date;
    $sms->type = (Integer) $element->attributes()->type;
    $sms->body = (String) $element->attributes()->body;
    $sms->read = (Boolean) $element->attributes()->read;
    $sms->status = (Integer) $element->attributes()->status;
    $sms->date_sent = (String) $element->attributes()->date_sent;
    $sms->readable_date = (String) $element->attributes()->readable_date;
    $sms->contact_name = (String) $element->attributes()->contact_name;
    $sms->generateChecksum();
    return $sms;
  }

  public function generateChecksum() {
    $this->checksum = sha1($this->date.$this->body);
  }

  public function save() {
    global $DBcon;
    $query = 'INSERT into sms (`address`,`date`,`type`,`body`,`read`,`status`,`date_sent`,`readable_date`,`contact_name`,`checksum`) ';
    $query .= 'VALUES (:address,:date,:type,:body,:read,:status,:date_sent,:readable_date,:contact_name,:checksum)';
    $stmt = $DBcon->prepare($query);
    $properties = get_object_vars($this);
    foreach( array_keys( $properties ) as $property ){
      $value = utf8_decode($this->{$property});
      $stmt->bindValue(':'.$property,$value);
    }
    $stmt->execute() or die ($DBcon->errorInfo()[2]);
  }
}