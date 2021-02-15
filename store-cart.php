<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->www;
$cart_collection = $db->cart;


// extracting data of newly added cart item
$itemName  = filter_input(INPUT_POST, 'itemName', FILTER_SANITIZE_STRING);
$itemPrice = filter_input(INPUT_POST, 'itemPrice', FILTER_SANITIZE_STRING);
$itemSize  = filter_input(INPUT_POST, 'itemSize', FILTER_SANITIZE_STRING);
$itemImg   = filter_input(INPUT_POST, 'itemImg', FILTER_SANITIZE_STRING);

// retrieving the customer id of currelty logged customer
if( array_key_exists("customer", $_SESSION) ){
    $customer_id =  $_SESSION["customerID"];
    // array of item data with key status to delete items from cart later 
    $cartData = [
        "cust_id" => $customer_id,
        "Name"  => $itemName,
        "Price" => $itemPrice,
        "Size"  => $itemSize,
        "Img_url" => $itemImg,
        "status" => "temp"
    ];
    // storing item data in cart collection
    $cart_collection->insertOne($cartData);
}else{

    $cartData = [
        "Name"  => $itemName,
        "Price" => $itemPrice,
        "Size"  => $itemSize,
        "Img_url" => $itemImg,
        "status" => "temp"
    ];
    // storing item data in cart collection
    $cart_collection->insertOne($cartData);

}