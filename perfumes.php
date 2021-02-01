<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Perfumes");
?>
<!-- website window resolution 1278 x 1940.58 -->
<?php


//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

// creating a cursor of all product's data
$cursor = $db->Products->find();

//outputting a grid wrapper and a wrapper for all products
echo '<div class="products-wrapper">';
echo '<div class="gridwrapper">';
// looping through arrays of data from mongodb and outputing specific product values
foreach ($cursor as $product) {

    echo '<div class="item-one">';
    echo ' <div id="item-picture"><img src="./'.$product['img_url'].'" alt=""></div>';
    echo ' <div id="item-name">' . $product['Name'] . '</div>';
    echo ' <div id="item-price">£' . $product['Price'] . '</div>';
    echo ' <button id="addbtn">Add to Cart</button>
              </div>';
}
echo '</div>
</div>';
?>
<?php
outputFooter();
?>