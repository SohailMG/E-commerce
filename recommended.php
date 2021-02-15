<?php

require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->perfumefest;
$search_string = filter_input(INPUT_POST, 'topKeyword', FILTER_SANITIZE_STRING);

// checking if no keywords was stored then will echo back default recommended items 
// of the current season
if ($search_string == "") {
    $findCriteria = [
        '$text' => ['$search' => "valentine"]
    ];
    $cursor = $db->Products->find($findCriteria, ['limit' => 4]);
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


    // perfomring an indexed search on the top keyword searched by user
} else {
    $findCriteria = [
        '$text' => ['$search' => $search_string]
    ];

    //Find only 4  products that has seach criteria
    $cursor = $db->Products->find($findCriteria, ['limit' => 4]);

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
}
