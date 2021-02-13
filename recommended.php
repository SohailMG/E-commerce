<?php

require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->www;
$search_string = filter_input(INPUT_POST, 'topKeyword', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => ['$search' => $search_string]
];

//Find all of the customers that match  this criteria
$cursor = $db->Products->find($findCriteria, ['limit' => 4]);

//Output the results

// looping through arrays of data from mongodb and outputing specific product values

echo '    <p>Recommended</p>';
echo '  <div id="suggesteds">';
foreach ($cursor as $product) {


    echo ' <div class="perfume-data">';
    echo ' <div class="item-picture"><img class="item-img" src="./' . $product['img_url'] . '" alt=""></div>';
    echo ' <div class="item-name">' . $product['Name'] . '</div>';
    echo ' <div class="item-size">' . $product['size'] . '</div>';
    echo ' <div class="item-price">£' . $product['Price'] . '</div>';
    echo ' <button class="addbtn" >Add to Cart</button>
              </div>';
}
echo '    </div>';
