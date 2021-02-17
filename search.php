<?php

// script handles indexed search funtionality
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->perfumefest;
// extracting search keywords
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with  search criteria
$findCriteria = [
    '$text' => ['$search' => $search_string]
];

//Finding all of the products that match  this criteria
$cursor = $db->Products->find($findCriteria);

//posting back results into the server to be added using ajax
echo '<p>Search Results.....</p>';
echo '<div class="gridwrapper">';
// looping through arrays of data from mongodb and outputing specific product values
foreach ($cursor as $product) {

    echo ' <div class="perfume-data">';
    echo ' <h1 class="item-msg"></h1>';
    echo ' <div class="item-picture"><img class="item-img" src="./' . $product['img_url'] . '" alt=""></div>';
    echo ' <div class="item-name">' . $product['Name'] . '</div>';
    echo ' <div class="item-size">' . $product['size'] . '</div>';
    echo ' <div class="item-price">£' . $product['Price'] . '</div>';
    echo ' <button class="addbtn" >Add to Cart</button>
              </div>';
}
echo '</div>
</div>';
