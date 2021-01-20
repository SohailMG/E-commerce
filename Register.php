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
            Last Name :<input name="password" type="text">
            Email : <input type="text">
            Number: <input type="text">
            Password: <input type="text">
            <button id="signupBtn">Submit</button>
        </div>
        <div id="sign-in">
            Username : <input type="text">
            Password : <input type="text">
            <button id="signinBtn">Login</button>
        </div>
    </div>

        <div id="account-page">
            <div id="account-container">
            <h1>Account Details</h1>
            first Name: <input type="text" name="name"   placeholder="john"  >
            last Name: <input type="text" name="name"    placeholder="wick"  >
            Email : <input type="text" name="email"      placeholder="john@wick.com"  >
            Number : <input type="text" name="password"  placeholder="0792836123"  >
            Password : <input type="text" name="password"placeholder="pass123"  >
            <button id="change-details">Change</button>
            </div>

        </div>




</main>






<?php
outputFooter();
?>