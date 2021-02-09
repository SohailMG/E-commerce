<?php
    //Start session management
    session_start();

    //Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$customers = $mongoClient->www->Customers;
    
    if( array_key_exists("customer", $_SESSION) ){
        $customer_id =  $_SESSION["customerID"];

        $customer = $customers->findOne(['_id' => new MongoDB\BSON\ObjectID($customer_id)]);

        echo ' <div id="account-container">';
        echo ' <h1>Account Details</h1>';
        echo ' first Name: <input type="text" name="name" placeholder="' . $customer['firstName'] . '">';
        echo ' last Name: <input type="text" name="name" placeholder="' . $customer['lastName']. '">';
        echo ' Email : <input type="text" name="email" placeholder="' . $customer['email']. '">';
        echo ' Number : <input type="text" name="password" placeholder="' . $customer['password'] . '">';
        echo ' Password : <input type="text" name="password" placeholder="' . $customer['number']. '">';
        echo ' <button id="change-details" onclick="change_details()">Change</button>';
        echo ' <button id="log-out-customer" onclick="log_out()">Logout</button>';
        echo ' </div>';

    }
    else{
        echo 'not logged';
    }