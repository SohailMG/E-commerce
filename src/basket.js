/**
 * this script deals with basket functionality such as
 * removing an item from the basket as well as
 * displaying and updating the current total of the
 * basket.
 *
 */

if (URL.match("cart")) {
     // creating an event listner to the remove item button
     var removeCartItem = document.getElementsByClassName("remove-item");
     let cartNames = JSON.parse(localStorage.getItem("cartName"));

     for (let i = 0; i < removeCartItem.length; i++) {
          let removeBtn = removeCartItem[i];

          removeBtn.addEventListener("click", function (event) {
               let removeClicked = event.target;
               let itemDetails = removeClicked.parentElement;

               // storing the name of the item being removed
               let itemName = itemDetails.getElementsByClassName(
                    "order-name"
               )[0].innerHTML;
               let item_name = itemName.substr(10);
               removeBasketItem(item_name);

               // removing the clicked item from the basket
               removeClicked.parentElement.remove();
               // updating the current total
               updateCartTotal();
               // updating cart names in localstorage by removing item name
               var newCartNames = cartNames.filter(
                    (value) => value != item_name
               );
               console.log(newCartNames);
               localStorage.setItem("cartName", JSON.stringify(newCartNames));
          });
     }
     /**
      * takes a string name of the item being removed
      * and post it to the server to be removed from the cart
      * collection
      * @param {string} itemName
      */
     function removeBasketItem(itemName) {
          request.onload = function () {
               //Check HTTP status code
               if (request.status === 200) {
               } else console.log("Error communicating with server");
          };

          //Set up and send request
          request.open("POST", "./remove-basket.php");
          request.setRequestHeader(
               "Content-type",
               "application/x-www-form-urlencoded"
          );
          request.send("name=" + itemName);
     }
     /**
      * extracts the innerHTML of all price classes within the document
      * and calculates the total by multipling quantity with the current
      *  total with each item's price.
      */
     function updateCartTotal() {
          let cartContainer = document.getElementsByClassName(
               "cart-container"
          )[0];
          let cartItems = cartContainer.getElementsByClassName("order-details");
          let orderTotalElm = cartContainer.getElementsByClassName(
               "order-total"
          )[0];
          let cartTotal = 0;

          for (let i = 0; i < cartItems.length; i++) {
               // getting the html elements of each item
               let cartItem = cartItems[i];
               // getting the price and quantity element of each item
               let itemPriceElm = cartItem.getElementsByClassName(
                    "order-price"
               )[0];
               let itemQuantityElm = cartItem.getElementsByClassName(
                    "order-quantity"
               )[0];

               // converting string into float
               let itemPrice = parseFloat(
                    itemPriceElm.innerHTML.replace("Price : £", "")
               );
               let quantity = itemQuantityElm.value;
               cartTotal = cartTotal + itemPrice * quantity;
               orderTotalElm.innerHTML = "Total : £" + cartTotal.toFixed(2);

               // storing total into localStorage to be used in checkout
               if (localStorage.getItem("cartTotal") == null) {
                    localStorage.setItem("cartTotal", cartTotal.toFixed(2));
               } else {
                    localStorage.removeItem("cartTotal");
                    localStorage.setItem("cartTotal", cartTotal.toFixed(2));
               }
          }
     }
}
