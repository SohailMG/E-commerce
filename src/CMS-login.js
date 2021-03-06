
/**
 * This script handles CMS login page functionality
 * including login verification,logout functionality 
 * as well as session tracking.
 */
let cmsURL = location.href;

let request = new XMLHttpRequest();

// checking if current page is CMS.php
if (cmsURL.match("CMS")) {
  window.onload = checkLogin();

  //Checks whether admin is logged in.
  function checkLogin() {
      let logoutStr = '<button id="logoutadmin" onclick="logoutadmin()">Logout</button>'
      let header_wrpr = document.getElementById("header-wrapper");
    // displays CMS site page when server respons with ok
    request.onload = function () {
      if (request.responseText === "ok") {
        showCMSPage();

        // adds logout button to the header
        header_wrpr.innerHTML+=logoutStr;
        sessionStorage.setItem("adminlogged", true);
        localStorage.setItem("adminlogged", true);
      } else {
        console.log("not logged");
      }
    };
    //Set up and send request
    request.open("GET", "./Sessions/check_login.php");
    request.send();
  }

  /**
   * sends a post request to the server of the attempted login details
   * depending on the respons the innerHTML is changed
   */
  function login() {
    var usrEmail = document.getElementById("admin-username").value;
    var usrPassword = document.getElementById("admin-password").value;
    let logoutStr = '<button id="logoutadmin" onclick="logoutadmin()">Logout</button>'
    let header_wrpr = document.getElementById("header-wrapper");

    // checks if fields are empty
    if (document.getElementById("admin-username").value == "") {
      document.getElementById("admin-username").style.border = "1px solid red";
      document.getElementById("admin-password").style.border = "1px solid red";
      document.getElementById("errorMsg").innerText = "Fill all fileds";
      return;
    }

    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        //Get data from server
        var responseData = request.responseText;
        //Add data to page
        if (responseData === "ok") {
          // displaying logout button
          header_wrpr.innerHTML+=logoutStr;
          showCMSPage();
        } else {
          document.getElementById("errorMsg").innerText = "Incorrect details...Try again";
          
          return;
        }
      } else console.log("Error communicating with server");
    };

    //Set up and send request
    request.open("POST", "./Sessions/login-admin.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("username=" + usrEmail + "&password=" + usrPassword);
  }

  //Logs the admin out.
  function logoutadmin() {
    // calls chekcLogin and displays the login screen of CMS page
    request.onload = function () {
      checkLogin();
      showCMSlogin();
      localStorage.removeItem("adminlogged");
    };

    //Set up and send request
    request.open("GET", "./Sessions/logout.php");
    request.send();
  }

  /**
   * sends a get request to the server and replaces the innerHTML 
   * if the CMS login screen with the server's respons being the CMS site
   */
  function showCMSPage() {
    let request = new XMLHttpRequest();
    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        //Get data from server
        var cms_page_content = request.responseText;

        document.getElementById("cms_main").innerHTML = cms_page_content;
      }
    };
    request.open("GET", "CMSsite.php");
    request.send();
  }
  /**
   * makes a http request for content of CMS.php page
   * stores login form wrapper only
   * replaces current html of main section to login form
   */
  function showCMSlogin() {
    let request = new XMLHttpRequest();
    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        //Get data from server
        var cms_page_content = request.responseText;
        
        document.querySelector('html').innerHTML = cms_page_content;
      }
    };
    request.open("GET", "CMS.php");
    request.send();
  }

}