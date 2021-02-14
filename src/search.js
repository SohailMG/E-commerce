/**
 * this script handles the search functionality of the website
 * 
 */

// checking if current page is cart then search is dissabled 
if (URL.match("cart")) {
  let search_box = document.getElementById("search-box");
  let search_btn = document.getElementById("search-btn");
  search_box.placeholder = "Cannot search in cart";
  search_btn.disabled = true;
} else {
  function search_item() {
    post_search();
  }

  /**
   * takes the current value of the search box 
   * and sends a post request to the server 
   * then inner html is replaced with search results
   */
  function search_item() {
    let search_box = document.getElementById("search-box");
    let results_box = document.getElementsByClassName("products-wrapper");

    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        console.log(request.responseText);
        if (URL.match("perfumes")) {
          for (var i = 0; i < results_box.length; i++) {
            results_box[i].innerHTML = request.responseText;
          }
        } else {
          // changing styles to allow main section to fit all searches
          document.querySelector("main").innerHTML = request.responseText;
          document.querySelector("footer").style.marginTop = "15%";
          document.querySelector("main").style.height = "100%";
        }

        //ADD EVENT LISTNEERS FOR BUTTRONS
        let addToCart_btns = document.getElementsByClassName("addbtn");

        for (let i = 0; i < addToCart_btns.length; i++) {
          let addToCart_btn = addToCart_btns[i];

          addToCart_btn.addEventListener("click", addToCart);
        }
      } else console.log("Error communicating with server");
    };

    //Set up and send request
    request.open("POST", "./search.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("search=" + search_box.value);
  }

  /**
   * sends a GET request of all searches 
   */
  function getSearches() {
    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        console.log(request.responseText);
      } else console.log("Error communicating with server");
    };

    //Set up and send request
    request.open("GET", "./perfumes.php");
    request.send();
  }
}
