<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Payment");
?>
<main>

    <div class="pay-form">
        <div class="address">
            <p>Enter delivery details</p>
            Street : <input type="text" name="" id="street">
            City : <input type="text" name="" id="city">
            Postcode: <input type="text" name="" id="postcode">
        </div>
        <button>Pay</button>

    </div>
</main>













<?php
outputFooter();
?>