<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->perfumefest;

//Extract ID from POST data
$item_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$item = $db->orders->find(['cust_id' => new MongoDB\BSON\ObjectID($item_id)]);

   echo' <caption>Customer Orders</caption>';
   echo' <thead>';
   echo'     <tr>';
   echo'         <th>Order No</th>';
   echo'         <th>Name</th>';
   echo'         <th>Price</th>';
   echo'     </tr>';
   echo' </thead>';
   echo' <tbody>';


        foreach ($item as $product) {

        echo ' <tr>';
        echo ' <td>' . $product['_id'] . '</td>';
        echo ' <td>' . $product['Name'] . '</td>';
        echo ' <td>'. $product['Price'] . '</td>';
        echo ' </tr>';
    }

echo '</tbody>';




