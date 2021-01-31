
<?php

require './vendor/autoload.php';

// creating instance of mongodb client
$client = new MongoDB\Client("mongodb://localhost:27017");

// selecting database
$database = $client->www;

// selecting collection
$collection = $database->Products;

$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

echo "Inserted with Object ID '{$result->getInsertedId()}'";