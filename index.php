<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Home");
?>
<!-- website window resolution 1278 x 1940.58 -->
</nav>
<main>
    <section>
        <!-- left section displays perfume image -->
        <div id="left-section"><img src="Images/mainsection.jpg" alt=""></div>
        <!-- right section has button to navigate to products -->
        <div id="right-section">
            <p>Explore different scenets</p>
            <button onclick="shopNow()"  id="shopnow">Shop Now</button>
        </div>
        <script>
        // redirecting customer to shopping page
        function shopNow(){
            document.location="perfumes.php";
        }
        </script>
    </section>
</main>

<?php
outputFooter();
?>