<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("CMS");
?>
<main>
    <div class="cms-login">
        <h1>Admin Login</h1>
        Username: <input type="text" id="admin-username">
        Password : <input type="text" id="admin-password">
        <a href="#">Forget Password?</a>
        <button id="login-btn">Login</button>
    </div>

    <div class="cms-wrapper">
    <div class="cms-container">
        <div class="side-menu">
            <div id="">Menu</div>
            <button id="add-btn">Add Product</button>
            <button id="remove-btn">Remove Product</button>
            <button id="update-product">Update Product</button>
            <button id="update-customer">Update Customer Details</dbuttoniv>
        </div>
        <div class="task-container"></div>


    </div>
    </div>
</main>






<?php
outputFooter();
?>