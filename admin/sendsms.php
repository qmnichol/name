<?php
require_once 'vendor/autoload.php';
$messagebird = new MessageBird\Client('Ibnjzi3dO2Kqqc2u6s3ElXtDC');
$message = new MessageBird\Objects\Message;
$message->originator = '+639565844525';
$message->recipients = [ '+639565844525' ];
$message->body = 'Hi! You are now registered on SERVICE FINDER IROSIN SORSOGON.';
$response = $messagebird->messages->create($message);
var_dump($response);