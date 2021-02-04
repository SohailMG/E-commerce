

let URL = window.location.href;

if (URL.match("Register")) {
    let switch_signIn = document.getElementById("show-signIn");
    let switch_signUp = document.getElementById("show-signup");
    let signUpform = document.getElementById("sign-up");
    let signInform = document.getElementById("sign-in");
    let formtitle = document.getElementById("formtitle");
  
    // switching to sign in form and hiding sign up form
    switch_signIn.onclick = () => {
      if (signInform.style.display != "block") {
        signInform.style.display = "block";
        signUpform.style.display = "none";
        formtitle.innerHTML = "Sign In";
  
        switch_signIn.style.backgroundColor = "white";
        switch_signIn.style.color = "black";
        switch_signUp.style.backgroundColor = "teal";
        switch_signUp.style.color = "white";
      }
    };
    // switching to sign up form and hiding sign in form
    switch_signUp.onclick = () => {
      signInform.style.display = "none";
      signUpform.style.display = "block";
      formtitle.innerHTML = "Sign Up";
  
      switch_signUp.style.backgroundColor = "white";
      switch_signUp.style.color = "black";
  
      switch_signIn.style.backgroundColor = "teal";
      switch_signIn.style.color = "white";
    };
  
    let signup_btn = document.getElementById("signupBtn");
    let signin_btn = document.getElementById("signinBtn");
    let regist_form = document.getElementById("register-form");
    let account_page = document.getElementById("account-page");
  
    // hiding register fomrs and displaying account page
    signup_btn.onclick = () => {
      regist_form.style.display = "none";
      account_page.style.display = "block";
    };
    signin_btn.onclick = () => {
      regist_form.style.display = "none";
      account_page.style.display = "block";
    };
  } else if (URL.match("cart")) {
    // checkout button to payment page
    let checkout_btn = document.getElementById("check-out");
  
    checkout_btn.onclick = () => {
      location.href = "payment.php";
    };
  }