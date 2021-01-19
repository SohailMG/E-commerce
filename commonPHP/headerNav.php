<?php
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
        <title>PerfumeFest</title>
    </head>  
    <body>';

}

function outputHeaderNav($pageName){
    echo '

    <header>
        <div id="logo"><img src="Images/logo.png" alt=""></div>
        <div class="searchContainer">
            <input type="text" placeholder="Search..." id="search-box">

            <div id="search-icon"><a href="search.php"><img src="Images/search.png" alt=""></a></div>
        </div>
        <div id="account"><img src="Images/Account.png" alt=""><a href="Register.php">Account</a></div>
        <div id="cart"><img src="Images/Cart.png" alt=""><a href="#">Cart</a></div>
    </header>
    <nav>';

    $pageNames = array("Home","Perfumes","CMS");
    $pageLinks = array("index.php","perfumes.php","CMS.php");

    for ($i = 0; $i < count($pageNames); $i++) {
        echo '<a ';
        if ($pageNames[$i] == $pageName) {
            echo 'class="selected" ';
        }
        echo 'href="' . $pageLinks[$i] . '">' . $pageNames[$i] . '</a>';  
    }
    echo '</nav>';

}


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
            <a href="CMS.php">CMS</a>
        </div>
        <div id="socials">Socials
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>

        </div>

    </div>
</footer>




</body>
<script src="src/visuals.js"></script>

</html>';
}
