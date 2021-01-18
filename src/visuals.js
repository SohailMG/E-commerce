
let cmsBtn = document.getElementById("login-btn");
let formContainer = document.getElementsByClassName("cms-login");
let cmsPage = document.getElementsByClassName("cms-wrapper");

/**
 * removes login form and displays cms page
 */
cmsBtn.onclick = () =>{
    for(var i=0; i<formContainer.length; i++) { 
        formContainer[i].style.display='none';
        cmsPage[i].style.display='block';

      }

}