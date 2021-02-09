<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->www;
$cart_collection = $db->cart;


if (array_key_exists("customer", $_SESSION)) {
    $customer_id =  $_SESSION["customerID"];


    $findCriteria = [
        "cust_id" => $customer_id,
    ];

    $customer_basket = $cart_collection->find($findCriteria);

    foreach ($customer_basket as $item) {

        echo ' <div class="order-details">';
        echo ' <div id="order-img"><img src="' . $item['Img_url'] . '" alt=""></div>';
        echo ' <p id="order-name">Product : ' . $item['Name'] . '</p>';
        echo ' <p id="order-price">Totoal : ' . $item['Price'] . '</p>';
        echo ' Quantity:<input id="order-quantity" placeholder="1" type="text">';
        echo ' <button id="remove-item">Remove</button>';
        echo ' <button id="check-out">Check Out</button>';
        echo ' </div>';
    }
} else {
    $customer_basket = $cart_collection->find();
    echo '<h1>Your Bag...</h1>';
    foreach ($customer_basket as $item) {
        echo ' <div id="order-details">';
        echo ' <div id="order-img"><img src="' . $item['Img_url'] . '" alt=""></div>';
        echo ' <p id="order-name">Product : ' . $item['Name'] . '</p>';
        echo ' <p id="order-price">Totoal : ' . $item['Price'] . '</p>';
        echo ' Quantity:<input id="order-quantity" placeholder="1" type="text">';
        echo ' <button id="remove-item">Remove</button>';
        echo ' <button id="check-out">Check Out</button>';
        echo ' </div>';
    }
}
