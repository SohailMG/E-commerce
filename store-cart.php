<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->www;
$cart_collection = $db->cart;


// storing posted data of added item
$itemName  = filter_input(INPUT_POST, 'itemName', FILTER_SANITIZE_STRING);
$itemPrice = filter_input(INPUT_POST, 'itemPrice', FILTER_SANITIZE_STRING);
$itemSize  = filter_input(INPUT_POST, 'itemSize', FILTER_SANITIZE_STRING);
$itemImg   = filter_input(INPUT_POST, 'itemImg', FILTER_SANITIZE_STRING);

// array of item 
$cartData = [
    "Name"  => $itemName,
    "Price" => $itemPrice,
    "Size"  => $itemSize,
    "Img_url" => $itemImg
];
// storing item data in cart collection
$cart_collection->insertOne($cartData);