<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

//Extract the customer details 
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Echo result back to user
$item = $db->Products->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);



//Data to replace
$productData = [
    "Name" => $name,
    "Price" => $price,
    "Quantity" => $stock,
    "size" => $size,
    "img_url" => $item['img_url'],
    "KeyWords" => $item['KeyWords']
];

//Replace customer data for this ID
$updateRes = $db->Products->replaceOne($replaceCriteria, $productData);

if ($updateRes->getModifiedCount() == 1) {
    echo ' <td>' . $id . '</td>';
    echo ' <td>' . $name . '</td>';
    echo ' <td>£'. $price . '</td>';
    echo ' <td>' . $size. '</td>';
    echo ' <td>' . $stock. '</td>';
} else {
    echo 'Item replacement error.';
}

