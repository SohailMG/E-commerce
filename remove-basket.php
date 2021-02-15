<!-- used to remove an item from cart page -->
<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

// extracting name of item to be deleted
$item_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);


$deleteCriteria = [
    "Name" => $item_name
];
// deleting item 
$deleteItem = $db->cart->deleteOne($deleteCriteria);

