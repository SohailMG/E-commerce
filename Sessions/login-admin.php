<?php
session_start();

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->perfumefest;

// extracting login details of CMS page
$adminName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$adminPass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// looping through the database for username match
$staffData = $db->staff;
$findAdmin = $staffData->find(array('username' => $adminName));

foreach ($findAdmin as $adminFind) {
    $storedUsername = $adminFind['username'];
    $storedPassword = $adminFind['password'];
}
// checking if posted username and password match a stored admin details
if ($adminName == $storedUsername && $adminPass == $storedPassword) {
    // creating a session with admin name
    $_SESSION["admin"] = $adminName;
    echo 'ok';
} else {
    echo 'incorrect password';
    $wrongflag = 1;
}
