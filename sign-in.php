<?php
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->perfumefest;

// extracting login details ->email ->password
$customer_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$customer_pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$customer_data = $db->Customers;
// finding customer matching given email address
$find_customer = $customer_data->find(array('email' => $customer_email));

// storing customer's info to be used to display customer's data when logged in 
foreach ($find_customer as $customer) {
    $stored_email = $customer['email'];
    $stored_password = $customer['password'];
    $stored_fname = $customer['firstname'];
    $stored_lname = $customer['lastname'];
    $stored_num = $customer['number'];
    $stored_id = $customer['_id'];
    
}
// checking if customer's email and password matched posted data
if ($stored_email == $customer_email) {
    if ($stored_password == $customer_pass) {
     
        //  creating a session with customer's email and id
    $_SESSION["customer"] = $customer_email;
    $_SESSION["customerID"] = $stored_id;
    // posting back a html account page with customer's details
    echo ' <div id="account-container">';
    echo ' <h1>Account Details</h1>';
    echo ' first Name: <input  id="cust-fname" type="text" name="name" value="' . $stored_fname . '">';
    echo ' last Name: <input   id="cust-lname" type="text" name="name" value="' . $stored_lname . '">';
    echo ' Email : <input      id="cust-email" type="text" name="email" value="' . $stored_email . '">';
    echo ' Number : <input     id="cust-num" type="text" name="password" value="' . $stored_num . '">';
    echo ' Password : <input   id="cust-pass" type="text" name="password" value="' . $stored_password. '">';
    echo ' <button id="change-details" onclick="changeDetails()">Change</button>';
    echo ' <button id="log-out-customer" onclick="log_out()">Logout</button>';
    echo ' <button id="view-customer-orders" onclick="viewCustOrders()">View Orders</button>';
    echo ' </div>';

    }else{
        echo 'incorrect password';
    }
}else{
    echo 'Email not found';
}
