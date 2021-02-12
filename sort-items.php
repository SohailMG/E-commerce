<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;


$sortOpt = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);


if ($sortOpt == "PriceAsc") {
    $filter  = [];
    $options = ['sort' => ['Price' => 1]];
    $cursor = $mongoClient->$db->Products->find($filter, $options);

} else if ($sortOpt == "PriceDec") {
    
    $filter  = [];
    $options = ['sort' => ['Price' => -1]];
    $cursor = $mongoClient->$db->Products->find($filter, $options);


} else if ($sortOpt == "AtoZ") {
    $filter  = [];
    $options = ['sort' => ['Name' => 1]];
    $cursor = $mongoClient->$db->Products->find($filter, $options);

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

foreach ($cursor as $product) {
    
    echo '<div class="perfume-data">';
    echo ' <div class="item-picture"><img class="item-img" src="./' . $product['img_url'] . '" alt=""></div>';
    echo ' <div class="item-name">' . $product['Name'] . '</div>';
    echo ' <div class="item-size">' . $product['size'] . '</div>';
    echo ' <div class="item-price">£' . $product['Price'] . '</div>';
    echo ' <button class="addbtn" >Add to Cart</button>
              </div>';
}


