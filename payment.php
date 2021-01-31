<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Payment");
?>
<!-- website window resolution 1278 x 1940.58 -->
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