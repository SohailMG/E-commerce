<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Cart");
?>
<!-- website window resolution 1278 x 1940.58 -->


<div class="cart-container">
    <?php
    session_start();
    //Include libraries
    require __DIR__ . '/vendor/autoload.php';
    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->perfumefest;
    $cart_collection = $db->cart;
    // checking if cart collection is empty
    if ($cart_collection->count() == 0) {
        echo '<h1>Your Bag is emtpy...</h1>';
    }else
    if (array_key_exists("customer", $_SESSION)) {
        $customer_id =  $_SESSION["customerID"];

        // creating find criteria for customer id
        $findCriteria = [
            "cust_id" => $customer_id,
        ];

        // quering only basket items with the same customer id 
        $customer_basket = $cart_collection->find($findCriteria);
        echo '<h1>Your Bag...</h1>';

        foreach ($customer_basket as $item) {
            echo ' <div class="order-details">';
            echo ' <div class="order-img"><img src="' . $item['Img_url'] . '" alt=""></div>';
            echo ' <p class="order-name">Product : ' . $item['Name'] . '</p>';
            echo ' Quantity:<input class="order-quantity" value="1" type="text" onfocusout="updateCartTotal()">';
            echo ' <button class="remove-item">Remove</button>';
            echo ' <p class="order-price">Price : ' . $item['Price'] . '</p>';          
            echo ' </div>';
        }
        echo ' <p id="checkoutMsg"></p>';
        echo ' <p class="order-total">Total : </p>';
    echo ' <button class="checkout-btn" onclick="gotoPayment()">Check-out</button>';
    // displaying all cart items when customer is not logged
    } else {
        $customer_basket = $cart_collection->find();
        echo '<h1>Your Bag...</h1>';
        foreach ($customer_basket as $item) {
            echo ' <div class="order-details">';
            echo ' <div class="order-img"><img src="' . $item['Img_url'] . '" alt=""></div>';
            echo ' <p class="order-name">Product : ' . $item['Name'] . '</p>';
            echo ' Quantity:<input class="order-quantity" value="1" type="text" onfocusout="updateCartTotal()">';
            echo ' <button class="remove-item">Remove</button>';
            echo ' <p class="order-price">Price : ' . $item['Price'] . '</p>';
            
            echo ' </div>';
        }
        echo ' <p id="checkoutMsg"></p>';
        echo ' <p class="order-total">Total : </p>';
    echo ' <button class="checkout-btn" onclick="gotoPayment()">Check-out</button>';
    } 
    ?>
    <!-- recommened items container  -->
</div>
<div class="suggested-items">
</div>

<?php
outputFooter();
?>