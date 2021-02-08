// let cmsBtn = document.getElementById("login-btn");


/**
 * removes login form and displays cms page
 */




if (cmsURL.match("CMS")) {
  // displying add product form when button is clicked
  function addProduct() {
    document.getElementById("add-form").style.display = "block";
    document.getElementById("remove-form").style.display = "none";
    document.getElementById("update-form").style.display = "none";
    document.getElementById("table").style.display = "none";
    
    // changing backgroun color of selected option
    document.getElementById("add-btn").style.backgroundColor = "rgb(1, 41, 44)";
    document.getElementById("remove-btn").style.backgroundColor = "grey";
    document.getElementById("update-btn").style.backgroundColor = "grey";
    document.getElementById("view-btn").style.backgroundColor = "grey";
  }
  // displaying remove product form once remove button is clicked
  function removeProduct() {
    document.getElementById("add-form").style.display = "none";
    document.getElementById("remove-form").style.display = "block";
    document.getElementById("update-form").style.display = "none";
    document.getElementById("table").style.display = "block";
    document.getElementById("added-item-info").style.display="none";

    document.getElementById("remove-btn").style.backgroundColor = "rgb(1, 41, 44)";
    document.getElementById("add-btn").style.backgroundColor = "grey";
    document.getElementById("update-btn").style.backgroundColor = "grey";
    document.getElementById("view-btn").style.backgroundColor = "grey";
  }
  // displaying update product form
  function updateProduct() {
    document.getElementById("add-form").style.display = "none";
    document.getElementById("remove-form").style.display = "none";
    document.getElementById("update-form").style.display = "block";
    document.getElementById("table").style.display = "block";
    document.getElementById("added-item-info").style.display="none";

    document.getElementById("update-btn").style.backgroundColor = "rgb(1, 41, 44)";
    document.getElementById("add-btn").style.backgroundColor = "grey";
    document.getElementById("remove-btn").style.backgroundColor = "grey";
    document.getElementById("view-btn").style.backgroundColor = "grey";

  }
  function viewProduct() {
    document.getElementById("add-form").style.display = "none";
    document.getElementById("remove-form").style.display = "none";
    document.getElementById("update-form").style.display = "none";
    document.getElementById("table").style.display = "block";
    document.getElementById("added-item-info").style.display="none";

    document.getElementById("view-btn").style.backgroundColor = "rgb(1, 41, 44)";
    document.getElementById("add-btn").style.backgroundColor = "grey";
    document.getElementById("remove-btn").style.backgroundColor = "grey";
    document.getElementById("update-btn").style.backgroundColor = "grey";
  };
} 

