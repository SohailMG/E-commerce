<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Register");
?>

<main>
    <div id="formBg"><img src="Images/Register.jpg" alt=""></div>
    <div id="register-form">
        <div id="switch-btns">
            <button id="show-signIn">Sign-In</button>
            <button id="show-signup">Sign-Up</button>
        </div>
        <h1 id="formtitle">Sign In</h1>
        <div id="sign-up">
            First Name :<input type="text">
            Username :<input name="password" type="text">
            Email : <input type="text">
            Password: <input type="text">
            <button id="signupBtn">Submit</button>
        </div>
        <div id="sign-in">
            Username : <input type="text">
            Password : <input type="text">
            <button id="signinBtn">Login</button>
        </div>


    </div>
</main>






<?php
outputFooter();
?>