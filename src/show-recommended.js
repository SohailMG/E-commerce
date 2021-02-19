//Import recommender class
import { Recommender } from "./recommender.js";

//Create recommender object - it loads its state from local storage
let recommender = new Recommender();
/* Set up button to call search function. We have to do it here 
because search() is not visible outside the module. */

//Display recommendation
if (!URL.match(/payment|perfumes|Register/)) {
  document.getElementById("search-btn").onclick = search;
  window.onload = showRecommendation;
  //Searches for products in database
  function search() {
    //Extract the search text
    let searchText = document.getElementById("search-box").value;
    //Add the search keyword to the recommender
    recommender.addKeyword(searchText);
    showRecommendation();
    search_item();
  }
  /**
   * sends a post request of the most frequent word 
   * and replaces innerHTML of recommended with all
   * searches matching given word
   */
  function showRecommendation() {
    let suggestedBox = document.getElementsByClassName("suggested-items")[0];
    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        
        if (URL.match('cart')) {

        suggestedBox.innerHTML = request.responseText;
        }
      } else console.log("Error communicating with server");
    };

    //Set up and send request
    request.open("POST", "./recommended.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("topKeyword=" + recommender.getTopKeyword());

    // updating cart total when page is cart
    if (URL.match("cart")) {
      updateCartTotal();
    }
    //
    if (URL.match("perfumes")) {
      let suggestedItems = document.getElementsByClassName(
        "suggested-items"
      )[0];
      suggestedItems.style.marginBottom = "0%";
      suggestedItems.style.marginTop = "0%";
    }
  }

  // }
}
