<?php

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->www;

//Extracting and storing the customer details 
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);


// storing current logged customer's ID
if (array_key_exists("customer", $_SESSION)) {
    $customer_id =  $_SESSION["customerID"];
}
//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($customer_id)
];

//Data to replace
$customerInfo = [
    "firstname" => $firstname,
    "lastname" => $lastname,
    "email" => $email,
    "password" => $password,
    "number" => $number
];

//Replacing customer's data and echoing an account details of updated data
$updateRes = $db->Customers->replaceOne($replaceCriteria, $customerInfo);
$customer = $db->Customers->findOne($replaceCriteria);

if ($updateRes->getModifiedCount() == 1) {
    echo ' <div id="account-container">';
    echo ' <h1>Account Details</h1>';
    echo ' first Name: <input id="cust-fname" type="text" name="name" value="' . $customer['firstname'] . '">';
    echo ' last Name: <input  id="cust-lname" type="text" name="name" value="' . $customer['lastname'] . '">';
    echo ' Email : <input     id="cust-email" type="text" name="email" value="' . $customer['email'] . '">';
    echo ' Number : <input    id="cust-num" type="text" name="password" value="' . $customer['number'] . '">';
    echo ' Password : <input  id="cust-pass" type="text" name="password" value="' . $customer['password'] . '">';
    echo ' <button id="change-details" onclick="changeDetails()">Change</button>';
    echo ' <button id="log-out-customer" onclick="log_out()">Logout</button>';
    echo ' <button id="view-customer-orders" onclick="viewCustOrders()">View Orders</button>';
    echo ' </div>';
} else {
    echo 'Item replacement error.';
}
