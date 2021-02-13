<?php
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->www;
$cursor = $db->Customers->find();


    echo'<caption>Customers Database</caption>';
    echo'<thead>';
    echo'    <tr>';
    echo'        <th>ID</th>';
    echo'        <th>Name</th>';
    echo'        <th>email</th>';
    echo'    </tr>';
    echo'</thead>';
    echo'<tbody>';
        //Include libraries
        foreach ($cursor as $product) {

            echo ' <tr>';
            echo ' <td>' . $product['_id'] . '</td>';
            echo ' <td>' . $product['firstname'] . '</td>';
            echo ' <td>' . $product['email'] . '</td>';
            echo ' </tr>';
        }
    echo'</tbody>';
