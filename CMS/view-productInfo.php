<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->perfumefest;
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Criteria for finding document to replace

//Echo result back to user
$item = $db->Products->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);

$productData = [
    "Name" => $item['Name'],
    "Price" => $item['Price'],
    "Quantity" => $item['Quantity'],
    "size" => $item['size'],
];

echo json_encode($productData);