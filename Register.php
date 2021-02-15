<?php
include_once('commonPHP/headerNav.php');
outputHTMLtags();
outputHeaderNav("Register");
?>
<!-- website window resolution 1278 x 1940.58 -->
<main>
    <!-- right section of registration back with background image -->
    <div id="formBg"><img src="Images/Register.jpg" alt=""></div>
    <!-- register form that stores all forms -->
    <div id="register-form">
    <!-- buttons used to switch between sign in and up forms -->
        <div id="switch-btns">
            <button id="show-signIn">Sign-In</button>
            <button id="show-signup">Sign-Up</button>
        </div>
        <h1 id="formtitle">Sign In</h1>
        <!-- sign up form layout -->
        <div id="sign-up">
            First Name :<input id="customer-fname" type="text">
            Last Name :<input id="customer-lname" name="password" type="text">
            Email : <input id="customer-email" type="text">
            Number: <input id="customer-number" type="text">
            Password: <input id="customer-password" type="text">
            <button id="signupBtn" onclick="sing_up()">Submit</button>
        </div>
        <!-- sign in form layout -->
        <div id="sign-in">
            Email : <input type="text"    id="login-email">
            Password : <input type="text" id="login-password">
            <p id="error-msg"></p>
            <button id="signinBtn" onclick="login_customer()">Login</button>
        </div>
    </div>

    </div>

</main>


<?php
outputFooter();
?>