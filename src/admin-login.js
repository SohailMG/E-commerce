//Global variables

//Check login when page loads
let cmsURL = location.href;

let request = new XMLHttpRequest();

if (cmsURL.match("CMS")) {
  window.onload = checkLogin();

  //Checks whether user is logged in.
  function checkLogin() {
    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
      if (request.responseText === "ok") {
        showCMSPage();
        document.getElementById("logoutadmin").style.display = "block";
        sessionStorage.setItem("adminlogged", true);
      } else {
        console.log(request.responseText);
        console.log("not logged");
      }
    };
    //Set up and send request
    request.open("GET", "./Sessions/check_login.php");
    request.send();
  }

  //Attempts to log in user to server
  function login() {
    var usrEmail = document.getElementById("admin-username").value;
    var usrPassword = document.getElementById("admin-password").value;

    if (document.getElementById("admin-username").value == "") {
      console.log("empty");
      return;
    }

    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        //Get data from server
        var responseData = request.responseText;
        console.log(showCMSPage());
        //Add data to page
        if (responseData === "ok") {
          console.log("login successfull");
          showCMSPage();
        } else {
          console.log("login unsuccessfull");
          return;
        }
      } else console.log("Error communicating with server");
    };

    //Extract login data

    //Set up and send request
    request.open("POST", "./Sessions/login-admin.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("username=" + usrEmail + "&password=" + usrPassword);
  }

  //Logs the user out.
  function logoutadmin() {
    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
      checkLogin();
      showCMSlogin();
    };

    //Set up and send request
    request.open("GET", "./Sessions/logout.php");
    request.send();
  }

  
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

        document.getElementById("cms_main").innerHTML = cms_page_content.substr(
          1223,
          331
        );
      }
    };
    request.open("GET", "CMS.php");
    request.send();
  }
}
