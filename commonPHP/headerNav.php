<?php
/**
 * outputs the head tags of html as well as css links
 */
function outputHTMLtags(){
    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/common.css">
        <link rel="stylesheet" href="styles/perfumes.css">
        <link rel="stylesheet" href="styles/CMS.css">
        <link rel="stylesheet" href="styles/register.css">
        <link rel="stylesheet" href="styles/cart.css">
        <title>PerfumeFest</title>
    </head>  
    <body>';

}
/**
 * creates hyperlinks for each page in a given array
 * and adds a selected class to highlight the active page
 * @param pageName is name of the each page
 */
function outputHeaderNav($pageName){
    echo '

    <header>
        <div id="logo"><img src="Images/logo.png" alt=""></div>
        <div class="searchContainer">
            <input type="text" placeholder="Search..." id="search-box">

            <div id="search-icon"><a href="search.php"><img src="Images/search.png" alt=""></a></div>
        </div>
        <div id="account"><img src="Images/Account.png" alt=""><a href="Register.php">Account</a></div>
        <div id="cart"><img src="Images/Cart.png" alt=""><a href="cart.php">Cart</a></div>
        <button id="logoutadmin" onclick="logoutadmin()">Logout</button>
    </header>
    <nav>';

    $pageNames = array("Home","Perfumes");
    $pageLinks = array("index.php","perfumes.php");

    for ($i = 0; $i < count($pageNames); $i++) {
        echo '<a ';
        if ($pageNames[$i] == $pageName) {
            echo 'class="selected" ';
        }
        echo 'href="' . $pageLinks[$i] . '">' . $pageNames[$i] . '</a>';  
    }
    echo '</nav>';

}

/**
 * outputs the footer design for each [age]
 */
function outputFooter(){
    echo '
    <footer>
    <div class="footer-grid">

        <div id="about">About
            <p>Making of a fine scent is like making of fine precious stone gems. A sharp gem specialist will have an eye for the ideal precious stone.</p>
        </div>

        <div id="quick-links">Quick Links
            <a href="index.php">Home</a>
            <a href="perfumes.php">Perfumes</a>
            <a href="Register.php">Account</a>
            <a href="cart.php">Cart</a>
        </div>
        <div id="socials">Socials
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>

        </div>

    </div>
</footer>


</body>
<script src="src/admin-login.js"></script>
<script src="src/CMS-manager.js"></script>
<script src="src/account.js"></script>

</html>';
}
