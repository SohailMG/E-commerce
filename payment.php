<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Payment");
?>
<!-- website window resolution 1278 x 1940.58 -->
<div class="order-container">
    <div id="orders-wrapper">
    <!-- container for each order's details -->
        <div id="order-info">
            <div id="order-img"><img src="" alt=""></div>
            <div id="order-name">Name:<p></p>
            </div>
            <div id="order-price">Price:<p></p>
            </div>
            <div id="order-quantity">Quantity:<p></p>
            </div>
        </div>
    </div>
    <!-- form to insert delivery details -->
    <div class="pay-form">
        <div class="address">
            <p>Enter delivery details</p>
            Street : <input type="text" name="" id="street">
            City : <input type="text" name="" id="city">
            Postcode: <input type="text" name="" id="postcode">
            <p id="errorMsg"></p>
        </div>
        <button onclick="storeAddressDetails()">Pay</button>
    </div>
</div>
<?php
outputFooter();
?>