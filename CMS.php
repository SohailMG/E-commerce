<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("CMS");
?>
<!-- website window resolution 1278 x 1940.58 -->

<!-- admin login form  -->
<main id="cms_main">
    <div class="cms-login">
        <h1>Admin Login</h1>
        Username: <input type="text" id="admin-username" >
        Password : <input type="password" id="admin-password" >
        <p id="errorMsg"></p>
        <a href="#">Forget Password?</a>
        <button id="login-btn" onclick="login()">Login</button>
    </div>
    </div>
</main>

<?php
outputFooter();
?>