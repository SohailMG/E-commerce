/**
 * this script manages customer checkout by displaying
 * an order summary of all customer basket items
 * it also stores delivery address to the order's document
 */

if (URL.match("payment")) {
     window.onload = checkOut;

     /**
      * displays all basket items of currently logged user
      */
     function checkOut() {
          let orderDetails = document.getElementById("orders-wrapper");

          //Create event handler that specifies what should happen when server responds
          request.onload = function () {
               if (request.responseText != "not logged") {
                    
                    orderDetails.innerHTML = request.responseText;
               } else {
                    console.log("Not logged");
               }
          };
          //Set up and send request
          request.open("GET", "./store-orders.php");
          request.send();
     }

     /**
      * sends a POST request to the server of
      * the address details then displays confirmation page
      */
     function storeAddressDetails() {
          let street = document.getElementById("street");
          let city = document.getElementById("city");
          let postcode = document.getElementById("postcode");
          let errorMsg = document.getElementById("errorMsg");

          let formFields = [street, city, postcode];

          if (street.value == "" || city.value == "" || postcode.value == "") {
               errorMsg.innerHTML = "Fill all fields";
               formFields.forEach((element) => {
                    element.style.border = "1px solid red";
               });
          } else {
               request.onload = function () {
                    //Check HTTP status code
                    if (request.status === 200) {
                         showOrderConfirmation(request.responseText);
                    } else console.log("Error communicating with server");
               };
               // sending a post request to add product data as a json string
               request.open("POST", "./order-confirmation.php");
               request.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
               );
               request.send(
                    "street=" +
                         street.value +
                         "&city=" +
                         city.value +
                         "&postcode=" +
                         postcode.value
               );
          }
     }

     /**
      * replaces the inner html of the current order container
      * with the html elements of the server respons to
      * display the confirmation of customer order
      * @param {HTMLElement} orderConfirmation
      */
     function showOrderConfirmation(orderConfirmation) {
          document.getElementsByClassName(
               "order-container"
          )[0].innerHTML = orderConfirmation;
          document.getElementById("ordersTotal").innerHTML =
               "Total : £" + localStorage.getItem("cartTotal");

          localStorage.removeItem("cartName");
     }
}
/**
 * called once user clicks on checkout
 * user only gets redirected to checkout page
 * if they're logged.
 */
function gotoPayment() {
     let errorMsg = document.getElementById("checkoutMsg");
     let cartItem = document.getElementsByClassName("order-details")[0];
     let loginBtn = '<button onclick="goToLogin()">Login</button>';
     if (localStorage.getItem("customerLogged")) {
          if (typeof cartItem != "undefined" && cartItem != null) {
               location.href = "payment.php";
          } else {
               errorMsg.innerHTML = "Add items first";
               errorMsg.style.color = "red";
               
          }
     } else {
          errorMsg.innerHTML = "Must be logged first";
          errorMsg.style.color = "red";
          errorMsg.innerHTML += loginBtn;
     }
}

function goToLogin(){
     location.href="Register.php";
}
