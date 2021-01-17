<?php
function outputHTMLtags(){
    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/common.css">
        <link rel="stylesheet" href="styles/perfumes.css">
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

            <div id="search-icon"><a href="#"><img src="Images/search.png" alt=""></a></div>
        </div>
        <div id="account"><img src="Images/Account.png" alt=""><a href="#">Account</a></div>
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

}


function outputFooter(){
    echo '
<footer></footer>




</body>

</html>';
}
?>