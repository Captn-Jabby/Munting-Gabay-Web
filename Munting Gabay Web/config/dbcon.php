<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

// Correct the path to the JSON file relative to dbcon.php
$serviceAccountPath = __DIR__ . '/../munting-gabay-4f845-firebase-adminsdk-rlpiz-342aad293d.json';

if (!file_exists($serviceAccountPath)) {
    die('Service account file not found at: ' . $serviceAccountPath);
}

$factory = (new Factory)
    ->withServiceAccount($serviceAccountPath)
    ->withDatabaseUri('https://munting-gabay-4f845-default-rtdb.asia-southeast1.firebasedatabase.app/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
