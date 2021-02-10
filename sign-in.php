<?php
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

$customer_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$customer_pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


$customer_data = $db->Customers;
$find_customer = $customer_data->find(array('email' => $customer_email));

foreach ($find_customer as $adminFind) {
    $stored_email = $adminFind['email'];
    $stored_password = $adminFind['password'];
    $stored_fname = $adminFind['firstname'];
    $stored_lname = $adminFind['lastname'];
    $stored_num = $adminFind['number'];
    $stored_id = $adminFind['_id'];
    
}
if ($stored_email == $customer_email) {
    if ($stored_password == $customer_pass) {
        
    $_SESSION["customer"] = $customer_email;
    $_SESSION["customerID"] = $stored_id;
    echo ' <div id="account-container">';
    echo ' <h1>Account Details</h1>';
    echo ' first Name: <input  id="cust-fname" type="text" name="name" value="' . $stored_fname . '">';
    echo ' last Name: <input   id="cust-lname" type="text" name="name" value="' . $stored_lname . '">';
    echo ' Email : <input      id="cust-email" type="text" name="email" value="' . $stored_email . '">';
    echo ' Number : <input     id="cust-num" type="text" name="password" value="' . $stored_password . '">';
    echo ' Password : <input   id="cust-pass" type="text" name="password" value="' . $stored_num. '">';
    echo ' <button id="change-details" onclick="changeDetails()">Change</button>';
    echo ' <button id="log-out-customer" onclick="log_out()">Logout</button>';
    echo ' </div>';

    }else{
        echo 'incorrect password';
    }
}else{
    echo 'Email not found';
}
