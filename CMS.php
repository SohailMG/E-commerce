<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("CMS");


//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->www;

// creating a cursor of all product's data
$cursor = $db->Products->find();
?>
<!-- website window resolution 1278 x 1940.58 -->
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