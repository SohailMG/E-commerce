<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

// getting value of selectd sorted option
$sortOpt = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);

// checking if sort option is price from low to high
if ($sortOpt == "PriceAsc") {
    $filter  = [];
    $options = ['sort' => ['Price' => 1]];
    $cursor = $mongoClient->$db->Products->find($filter, $options);
// checking if sort option is price from high to low
} else if ($sortOpt == "PriceDec") {
    
    $filter  = [];
    $options = ['sort' => ['Price' => -1]];
    $cursor = $mongoClient->$db->Products->find($filter, $options);

// checking if sort option is in alphabatical order
} else if ($sortOpt == "AtoZ") {
    $filter  = [];
    $options = ['sort' => ['Name' => 1]];
    $cursor = $mongoClient->$db->Products->find($filter, $options);

    // checking if no option was selected
} else {
    foreach ($cursor as $product) {
    
        echo '<div class="perfume-data">';
        echo ' <div class="item-picture"><img class="item-img" src="./' . $product['img_url'] . '" alt=""></div>';
        echo ' <div class="item-name">' . $product['Name'] . '</div>';
        echo ' <div class="item-size">' . $product['size'] . '</div>';
        echo ' <div class="item-price">£' . $product['Price'] . '</div>';
        echo ' <button class="addbtn" >Add to Cart</button>
                  </div>';
    }


}
// echoing back sorted results depending on posted value
foreach ($cursor as $product) {
    
    echo '<div class="perfume-data">';
    echo ' <div class="item-picture"><img class="item-img" src="./' . $product['img_url'] . '" alt=""></div>';
    echo ' <div class="item-name">' . $product['Name'] . '</div>';
    echo ' <div class="item-size">' . $product['size'] . '</div>';
    echo ' <div class="item-price">£' . $product['Price'] . '</div>';
    echo ' <button class="addbtn" >Add to Cart</button>
              </div>';
}


