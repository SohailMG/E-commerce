<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Cart");
?>
<!-- website window resolution 1278 x 1940.58 -->
<main>

    <div class="cart-container">
        <h1>Your Bag...</h1>
        <div class="order-details">
            <div id="order-img"></div>
            <p id="order-name">Product : Savage Doir</p>
            <p id="order-price">Totoal : £40.99</p>
            Quantity:<input id="order-quantity" placeholder="1" type="text">
            <button id="remove-item">Remove</button>
            <button id="check-out">Check Out</button>
        </div>
    </div>
    <div class="suggested-items">
        <p>You may also like</p>
        <div id="suggesteds">
            <div id="item1"></div>
            <div id="item2"></div>
            <div id="item3"></div>
            <div id="item4"></div>
        </div>
    </div>
</main>













<?php
outputFooter();
?>