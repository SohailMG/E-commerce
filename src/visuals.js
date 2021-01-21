let cmsBtn = document.getElementById("login-btn");
let formContainer = document.getElementsByClassName("cms-login");
let cmsPage = document.getElementsByClassName("cms-wrapper");
let addProductForm = document.getElementById("add-form");
let removeProductForm = document.getElementById("remove-form");
let updateProductForm = document.getElementById("update-form");
let add_btn = document.getElementById("add-btn");
let databaseTable = document.getElementById("table");

let URL = window.location.href;

/**
 * removes login form and displays cms page
 */
let remove_btn = document.getElementById("remove-btn");
let update_btn = document.getElementById("update-btn");
if (URL.match("CMS")) {
  cmsBtn.onclick = () => {
    for (var i = 0; i < formContainer.length; i++) {
      formContainer[i].style.display = "none";
      cmsPage[i].style.display = "block";
    }
  };
  // displying add product form when button is clicked
  add_btn.onclick = () => {
    addProductForm.style.display = "block";
    updateProductForm.style.display = "none";
    databaseTable.style.display = "block";
    removeProductForm.style.display = "none";

    // changing backgroun color of selected option
    add_btn.style.backgroundColor="rgb(1, 41, 44)";
    remove_btn.style.backgroundColor="grey";
    update_btn.style.backgroundColor="grey";

  };
  // displaying remove product form once remove button is clicked
  remove_btn.onclick = () => {
    console.log("workin")
    addProductForm.style.display = "none";
    updateProductForm.style.display = "none";
    databaseTable.style.display = "block";
    removeProductForm.style.display = "block";

    remove_btn.style.backgroundColor="rgb(1, 41, 44)";
    add_btn.style.backgroundColor="grey";
    update_btn.style.backgroundColor="grey";
  };
  // displaying update product form 
  update_btn.onclick = () => {
    addProductForm.style.display = "none";
    updateProductForm.style.display = "block";
    databaseTable.style.display = "block";
    removeProductForm.style.display = "none";

    update_btn.style.backgroundColor="rgb(1, 41, 44)";
    remove_btn.style.backgroundColor="grey";
    add_btn.style.backgroundColor="grey";
  };



} else if (URL.match("Register")) {
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
  signup_btn.onclick = () =>{
    regist_form.style.display = "none";
    account_page.style.display = "block";
    
  }
  signin_btn.onclick = () =>{
    regist_form.style.display = "none";
    account_page.style.display = "block";
    
  }
}else if (URL.match("cart")){


// checkout button to payment page
let checkout_btn = document.getElementById("check-out")

checkout_btn.onclick = () =>{
  location.href="payment.php"
}
}

