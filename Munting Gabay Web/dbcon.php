<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

$factory = (new Factory)->withServiceAccount('munting-gabay-4f845-firebase-adminsdk-rlpiz-42522796ee.json')
    ->withDatabaseUri('https://munting-gabay-4f845-default-rtdb.asia-southeast1.firebasedatabase.app/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>
