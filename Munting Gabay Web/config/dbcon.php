<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

$factory = (new Factory)
    ->withServiceAccount(__DIR__ . '/../munting-gabay-4f845-firebase-adminsdk-rlpiz-ccc43488d4.json') // Make sure the path is correct
    ->withDatabaseUri('https://munting-gabay-4f845-default-rtdb.asia-southeast1.firebasedatabase.app/');
// munting-gabay-4f845-firebase-adminsdk-rlpiz-ccc43488d4.json
$database = $factory->createDatabase();
$auth = $factory->createAuth();
