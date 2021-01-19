let cmsBtn = document.getElementById("login-btn");
let formContainer = document.getElementsByClassName("cms-login");
let cmsPage = document.getElementsByClassName("cms-wrapper");
let addProductForm = document.getElementById("add-form");
let add_btn = document.getElementById("add-btn");

let URL = window.location.href;
/**
 * removes login form and displays cms page
 */
if (URL.match("CMS")) {
  cmsBtn.onclick = () => {
    for (var i = 0; i < formContainer.length; i++) {
      formContainer[i].style.display = "none";
      cmsPage[i].style.display = "block";
    }
  };
  add_btn.onclick = () => {
    addProductForm.style.display = "block";
  };
} else if (URL.match("Register")) {
  let switch_signIn = document.getElementById("show-signIn");
  let switch_signUp = document.getElementById("show-signup");
  let signUpform = document.getElementById("sign-up");
  let signInform = document.getElementById("sign-in");
  let formtitle = document.getElementById("formtitle");

  // switching between sign in and sign up forms
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
