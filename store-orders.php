
<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->perfumefest;
$cart_collection = $db->cart;


    
    if (array_key_exists("customer", $_SESSION)) {
    $customer_id =  $_SESSION["customerID"];


    $findCriteria = [
        "cust_id" => $customer_id,
    ];

    $customer_basket = $cart_collection->find($findCriteria);

    echo'<h1>Order Summary....</h1>';
    foreach ($customer_basket as $item) {
        echo '<div id="order-info">';
        echo '<div id="order-img"><img src="'.$item['Img_url'].'" alt=""></div>';
        echo '<div id="order-name">Name:<p>'.$item['Name'].'</p> </div>';
        echo '<div id="order-price">Price:<p>'.$item['Price'].'</p> </div>';
        echo '</div>';

    }
} else {
    echo 'not logged';
}