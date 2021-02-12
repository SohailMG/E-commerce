if (URL.match("payment")) {
  window.onload = checkOut;

  function checkOut() {
    
    let orderDetails = document.getElementById("orders-wrapper");

    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
      if (request.responseText != "not logged") {
        console.log(request.responseText);
        orderDetails.innerHTML = request.responseText;
      } else {
        console.log(request.responseText);
      }
    };
    //Set up and send request
    request.open("GET", "./store-orders.php");
    request.send();
  }


function storeAddressDetails() {
    let street = document.getElementById("street");
    let city = document.getElementById("city");
    let postcode = document.getElementById("postcode");
  request.onload = function () {
    //Check HTTP status code
    if (request.status === 200) {
      
      showOrderConfirmation(request.responseText);
    } else console.log("Error communicating with server");
  };
  // sending a post request to add product data as a json string
  request.open("POST", "./customer-orders.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
          "street=" +
            street.value +
            "&city=" +
            city.value +
            "&postcode=" +
            postcode.value
        );
}


function showOrderConfirmation(orderConfirmation){

    document.getElementsByClassName('order-container')[0].innerHTML = orderConfirmation;
    document.getElementById('ordersTotal').innerHTML = "Total : £" +  localStorage.getItem('cartTotal');
}
}
function gotoPayment() {
  let errorMsg = document.getElementById('checkoutMsg');
  if (localStorage.getItem('customerLogged')) {
    location.href = "payment.php";
    
  }else{
    errorMsg.innerHTML="Must be logged first"

  }
}
