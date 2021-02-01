<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/perfumes.css">
    <title>Document</title>
</head>
<body>
<?php


//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

//Extract the data that was sent to the server
$name = filter_input(INPUT_GET, 'Name', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    "Name" => $name,
];

//Find all of the customers that match  this criteria
$cursor = $db->Products->find();

//Output the results
echo "<h1>Results</h1>";
echo '<div class="products-wrapper">
            <div class="gridwrapper">';
foreach ($cursor as $cust) {
    
              echo'<div class="item-one">
               <div id="item-picture"></div>
               <div id="item-name">'. $cust['Name'].'</div>
               <div id="item-price">'. $cust['Price'].'</div>
               <button id="addbtn">Add to Cart</button>
        </div>

               ';
}
echo'    </div>
</div>';

echo '</body>
</html>';
