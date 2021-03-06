<?php
    //Start session management
    session_start();

    //Include libraries
require __DIR__ . '/vendor/autoload.php';

//Creating instance of MongoDB client
$mongoClient = (new MongoDB\Client);
//Selecting a database collection of customers
$customers = $mongoClient->perfumefest->Customers;

    // checking if a customer session is active, then outputting customer's info
    if( array_key_exists("customer", $_SESSION) ){
        $customer_id =  $_SESSION["customerID"];

        $customer = $customers->findOne(['_id' => new MongoDB\BSON\ObjectID($customer_id)]);
        // account details container
        echo ' <div id="account-container">';
        echo ' <h1>Account Details</h1>';
        echo ' first Name: <input id="cust-fname" type="text" name="name" value="' . $customer['firstname'] . '">';
        echo ' last Name: <input  id="cust-lname" type="text" name="name" value="' . $customer['lastname']. '">';
        echo ' Email : <input     id="cust-email" type="text" name="email" value="' . $customer['email']. '">';
        echo ' Number : <input    id="cust-num" type="text" name="password" value="' . $customer['number'] . '">';
        echo ' Password : <input  id="cust-pass" type="text" name="password" value="' . $customer['password']. '">';
        echo ' <button id="change-details" onclick="changeDetails()">Change</button>';
        echo ' <button id="log-out-customer" onclick="log_out()">Logout</button>';
        echo ' <button id="view-customer-orders" onclick="viewCustOrders()">View Orders</button>';
        echo ' </div>';

    }
    else{
        echo 'not logged';
    }