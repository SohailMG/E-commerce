let URL = window.location.href;

if (URL.match("Register")) {
 
  window.onload = check_customer_logged;


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
} else if (URL.match("cart")) {
  // checkout button to payment page
  let checkout_btn = document.getElementById("check-out");

  checkout_btn.onclick = () => {
    location.href = "payment.php";
  };
}

function sing_up() {
  let cust_fname = document.getElementById("customer-fname");
  let cust_lname = document.getElementById("customer-lname");
  let cust_email = document.getElementById("customer-email");
  let cust_num = document.getElementById("customer-number");
  let cust_pass = document.getElementById("customer-password");

  let account_page = document.getElementById("register-form");

  let form_fields = [cust_num, cust_email, cust_fname, cust_lname, cust_pass];

  if (
    cust_fname.value == "" ||
    cust_lname.value == "" ||
    cust_num.value == "" ||
    cust_pass.value == "" ||
    cust_email.value == ""
  ) {
    form_fields.forEach((element) => {
      element.style.border = "1px solid red";
    });
    return;
  } else {
    let customer_data = {
      firstName: cust_fname.value,
      lastName: cust_lname.value,
      email: cust_email.value,
      password: cust_pass.value,
      number: cust_num.value,
    };

    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        if (request.responseText != "failed") {
          account_page.innerHTML = request.responseText;
        }
      } else console.log("Error communicating with server");
    };
    // sending a post request to add product data as a json string
    request.open("POST", "./sign-up.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("CustomerData=" + JSON.stringify(customer_data));
  }
}
/**
 * posts login details to php scripts and depening 
 * on request the account page is displayed and user is logged
 */
function login_customer() {
  let login_email = document.getElementById("login-email");
  let login_pass = document.getElementById("login-password");
  let account_page = document.getElementById("register-form");
  let error_msg = document.getElementById("error-msg");

  request.onload = function () {
    //Check HTTP status code
    if (request.status === 200) {
      //Get data from server
      var responseData = request.responseText;
      //Add data to page
      if (responseData == "incorrect password") {
        error_msg.innerHTML = request.responseText;
        return;
      } else if (responseData == "Email not found") {
        error_msg.innerHTML = request.responseText;
        return;
      } else {
        account_page.innerHTML = request.responseText;
      }
    } else console.log("Error communicating with server");
  };

  //Set up and send request
  request.open("POST", "./sign-in.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send("email=" + login_email.value + "&password=" + login_pass.value);
}

function check_customer_logged() {
  let account_page = document.getElementById("register-form");
  //Create event handler that specifies what should happen when server responds
  request.onload = function () {
    if (request.responseText != "not logged") {
      account_page.innerHTML = request.responseText;
      
    } else {
      console.log("not logged");
    }
  };
  //Set up and send request
  request.open("GET", "./check-customer-login.php");
  request.send();
}

function log_out(){
      //Create event handler that specifies what should happen when server responds
      request.onload = function () {
        document.location="Register.php";
      };
  
      //Set up and send request
      request.open("GET", "./Sessions/logout.php");
      request.send();

}


