/**
 * acccount script deals with customer registration
 * customer login and displaying of account
 * details using ajax
 *
 */
let URL = window.location.href;

// displaying name of currently logged user
let custName = localStorage.getItem("custName");
let accountName = document.getElementById("account-name");
if (custName == null) {
  accountName.innerHTML="Account"
  console.log(custName);
  
}else{
  
  accountName.innerHTML = custName;
}

// checking if current page is Register.php
if (URL.match("Register")) {
     window.onload = () => {
          // checking if customer is logged
          check_customer_logged();
     };

     // storing html elements of sign-in and up forms 
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
}

/**
 * sign up works by retireving fileds values from
 * sign up form and posting them to a sign-up.php
 * script to store into the customer collection
 */
function sing_up() {
     let cust_fname = document.getElementById("customer-fname");
     let cust_lname = document.getElementById("customer-lname");
     let cust_email = document.getElementById("customer-email");
     let cust_num = document.getElementById("customer-number");
     let cust_pass = document.getElementById("customer-password");

     let account_page = document.getElementById("register-form");

     let form_fields = [
          cust_num,
          cust_email,
          cust_fname,
          cust_lname,
          cust_pass,
     ];

     // checking for empty fileds
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
          // creating an array of customer data as json
          let customer_data = {
               firstname: cust_fname.value,
               lastname: cust_lname.value,
               email: cust_email.value,
               password: cust_pass.value,
               number: cust_num.value,
          };

          request.onload = function () {
               //Check HTTP status code
               if (request.status === 200) {
                    if (request.responseText != "failed") {
                         // replacing signup form with sign in form
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
          // sending customer data as json array
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
               //checking if request returns incorrect password
               if (responseData == "incorrect password") {
                    error_msg.innerHTML = responseData;

                    return;
               } else if (responseData == "Email not found") {
                    error_msg.innerHTML = request.responseText;

                    return;
               } else {
                    // setting a logged customer key in local storage used to prevent
                    // checkout without user being logged in
                    localStorage.setItem("customerLogged", true);
                    // replacing login form with customer details sent from server
                    account_page.innerHTML = request.responseText;
                    let custName = document.getElementById("cust-fname");
                    localStorage.setItem("custName", custName.value);
                    document.getElementById("account-name").innerHTML=custName.value;
                    
                    console.log(custName);
               }
          } else console.log("Error communicating with server");
     };

     //Set up and send request
     request.open("POST", "./sign-in.php");
     request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
     );
     request.send(
          "email=" + login_email.value + "&password=" + login_pass.value
     );
}

/**
 * sets up a get request from php script to check
 * if a customer is logged depening on server respond
 * innerHTML of page is replaced
 */
function check_customer_logged() {
     let account_page = document.getElementById("register-form");
     //Create event handler that specifies what should happen when server responds
     request.onload = function () {
          if (request.responseText != "not logged") {
               // displaying account details page
               account_page.innerHTML = request.responseText;
          } else {
               console.log("not logged");
          }
     };
     //Set up and send request
     request.open("GET", "./Sessions/check-customer-login.php");
     request.send();
}

/**
 * removes customerlogged key from localstorage
 * and reloads page to display sign in form
 */
function log_out() {
     // checks if session has been destroyed and server respons with ok
     request.onload = function () {
          if (request.responseText === "ok") {
               localStorage.removeItem("customerLogged");
               localStorage.removeItem('custName');
               document.location = "Register.php";
          }
     };

     //Set up and send request
     request.open("GET", "./Sessions/logout.php");
     request.send();
}

/**
 * changeDetails works by posting form values to
 * the server and replacing current details with updated
 * details using ajax
 */
function changeDetails() {
     let cust_fname = document.getElementById("cust-fname");
     let cust_lname = document.getElementById("cust-lname");
     let cust_email = document.getElementById("cust-email");
     let cust_pass = document.getElementById("cust-pass");
     let cust_num = document.getElementById("cust-num");
     let account_page = document.getElementById("register-form");

     // storing current form values of customer details
     let fitstname = cust_fname.value;
     let lastname = cust_lname.value;
     let email = cust_email.value;
     let pass = cust_pass.value;
     let number = cust_num.value;

     if (request.status === 200) {
          console.log(request.responseText);
          // replacing old details with new details
          account_page.innerHTML = request.responseText;
     } else console.log("Error communicating with server");

     //Set up and send request
     request.open("POST", "./changeCustomerDetails.php");
     request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
     );
     request.send(
          "firstname=" +
               fitstname +
               "&lastname=" +
               lastname +
               "&email=" +
               email +
               "&password=" +
               pass +
               "&number=" +
               number
     );
}

/**
 * sends a get request to the server for customer orders
 * and replaces the innerhtml of main tage with
 * html containing customer's order details
 */
function viewCustOrders() {
     let account_page = document.querySelector("main");

     request.onload = function () {
          //Check HTTP status code
          if (request.status === 200) {
               //Get data from server
               console.log(request.responseText);
               account_page.innerHTML = request.responseText;
          } else {
               console.log("failed");
          }
     };
     request.open("GET", "./view-orders.php");
     request.send();
}
// returns from order screen to account details
function returnToAccount() {
     location.href = "Register.php";
}
