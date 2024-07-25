<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

// Adjust path to the JSON file relative to dbcon.php
$factory = (new Factory)
    ->withServiceAccount(__DIR__ . '/../munting-gabay-4f845-firebase-adminsdk-rlpiz-42522796ee.json') // Corrected path
    ->withDatabaseUri('https://munting-gabay-4f845-default-rtdb.asia-southeast1.firebasedatabase.app/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
