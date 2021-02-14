<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Perfumes");
?>
<!-- </div>
<div class="suggested-items">
</div> -->
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

echo '<div id="sort-products">
      <form id="sort-options">
      <select id="select-options" size="1" name="pet" onchange="sortItems()">
      <option value="noSort">None</option>
      <option value="PriceAsc">Price-[low-high]</option>
      <option value="PriceDec">Price-[high-low]</option>
      <option value="AtoZ">Order from[A-Z]</option>
      </select>
      </form>
      <button onclick="sortItems()">Sort</button>
      </div>';
echo '<div class="products-wrapper">';
echo '<div class="gridwrapper">';
// looping through arrays of data from mongodb and outputing specific product values
foreach ($cursor as $product) {

      echo '<div class="perfume-data">';
      echo ' <div class="item-picture"><img class="item-img" src="./' . $product['img_url'] . '" alt=""></div>';
      echo ' <div class="item-name">' . $product['Name'] . '</div>';
      echo ' <div class="item-size">' . $product['size'] . '</div>';
      echo ' <div class="item-price">£' . $product['Price'] . '</div>';
      echo ' <button class="addbtn" >Add to Cart</button>
              </div>';
}
echo '</div>
</div>';

?>

<?php
outputFooter();
?>