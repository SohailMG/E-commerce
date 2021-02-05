let addToCart_btns = document.getElementsByClassName("addbtn");

for (let i = 0; i < addToCart_btns.length; i++) {
  let addToCart_btn = addToCart_btns[i];
  addToCart_btn.addEventListener("click", addToCart);
}
/**
 * when add to cart button is clicked then,
 * method will select the parent class of that button
 * and query the details of that class.
 *
 * @param {*} event
 */
function addToCart(event) {
  var addToCart_btn = event.target;
  let shopItem = addToCart_btn.parentElement;

  // storing item details
  let itemImage = shopItem.getElementsByClassName("item-img")[0].src;
  let itemname = shopItem.getElementsByClassName("item-name")[0].innerHTML;
  let itemSize = shopItem.getElementsByClassName("item-size")[0].innerHTML;
  let itemPrice = shopItem.getElementsByClassName("item-price")[0].innerHTML;
  console.log(itemname, itemSize, itemPrice, itemImage);
  

  //Create event handler that specifies what should happen when server responds
  request.onload = function () {
    //Check HTTP status code
    if (request.status === 200) {
      console.log(request.responseText);
    } else console.log("Error communicating with server");
  };

  //Set up and send request
  request.open("POST", "./store-cart.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "itemName=" +
      itemname +
      "&itemPrice=" +
      itemPrice +
      "&itemSize=" +
      itemSize +
      "&itemImg=" +
      itemImage
  );
}
