<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Home");
?>
</nav>
<main>
    <section>
        <!-- left section displays perfume image -->
        <div id="left-section"><img src="Images/mainsection.jpg" alt=""></div>
        <!-- right section has button to navigate to products -->
        <div id="right-section">
            <p>Explore different scenets</p>
            <button id="shopnow">Shop Now</button>
        </div>
    </section>



</main>

<?php
outputFooter();
?>