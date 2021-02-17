/**
 * retrieving data of added item and posting it's data
 * to a php script to be stored in database
 */

// creating an event listner for the add to cart buttons
let addToCart_btns = document.getElementsByClassName("addbtn");

for (let i = 0; i < addToCart_btns.length; i++) {
     let addToCart_btn = addToCart_btns[i];

     addToCart_btn.addEventListener("click", addToCart);
}
/**
 * when add to cart button is clicked then,
 * method will select the parent class of that button
 * and query the details of that class such as item name,price,img
 *
 * @param {*} event
 */
var cart_count = 1;
function addToCart(event) {
     var addToCart_btn = event.target;
     let cart_amount = document.getElementById("cart-amount");
     let shopItem = addToCart_btn.parentElement;

     // storing item details
     let itemImage = shopItem.getElementsByClassName("item-img")[0].src;
     let itemname = shopItem.getElementsByClassName("item-name")[0].innerHTML;
     let itemSize = shopItem.getElementsByClassName("item-size")[0].innerHTML;
     let itemPrice = shopItem.getElementsByClassName("item-price")[0].innerHTML;
     let itemMsg = shopItem.getElementsByClassName("item-msg")[0];
     // checking if item is already added to cart
     if (isAddedAlready(itemname)) {
          alertNotAdded(itemMsg);
     } else {
          alertAdded(itemMsg);
          cart_amount.style.color = "red";
          cart_amount.innerHTML = cart_count++;
          console.log(cart_count);

          // Create event handler that specifies what should happen when server responds
          request.onload = function () {
               //Check HTTP status code
               if (request.status === 200) {
               } else console.log("Error communicating with server");
          };

          //Set up and send request
          request.open("POST", "./store-cart.php");
          request.setRequestHeader(
               "Content-type",
               "application/x-www-form-urlencoded"
          );
          request.send(
               "itemName=" +
                    itemname +
                    "&itemPrice=" +
                    itemPrice +
                    "&itemSize=" +
                    itemSize +
                    "&itemImg=" +
                    itemImage.substr(26)
          );
     }
}
/**
 * stores names of added items into localstorage array
 * checks if item is already added and returns boolean value
 * @param {String} itemname
 */
function isAddedAlready(itemname) {
     let cartNames = [];
     if (localStorage.getItem("cartName") == null) {
          cartNames.push(itemname);
          localStorage.setItem("cartName", JSON.stringify(cartNames));
     } else {
          let currentNames = JSON.parse(localStorage.getItem("cartName"));

          if (currentNames.includes(itemname)) {
               return true;
          } else {
               currentNames.push(itemname);
               localStorage.setItem("cartName", JSON.stringify(currentNames));
               return false;
          }
     }
}

/**
 * displays message for one second when
 * item has already been added to cart
 * @param {HTMLElement} itemMsg
 */
function alertNotAdded(itemMsg) {
     itemMsg.style.display = "block";
     itemMsg.innerHTML = "Already Added to Cart";
     itemMsg.style.color = "red";
     setTimeout(() => {
          itemMsg.style.display = "none";
     }, 1000);
}
/**
 * displays message for one second when
 * item gets added to cart
 * @param {HTMLElement} itemMsg
 */
function alertAdded(itemMsg) {
     itemMsg.style.display = "block";
     itemMsg.innerHTML = "Item added to Cart";
     itemMsg.style.color = "green";
     setTimeout(() => {
          itemMsg.style.display = "none";
     }, 1000);
}
