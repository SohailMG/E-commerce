/**
 * this script handles the functionality of viewing customers and their
 * orders as well as removing an order of a customer
 */

/**
 * loops through the table and removes the row
 * matching the id being removed
 */
function remove_item() {
     let remove_id = document.getElementById("remove-id");
     var table = document
          .getElementById("customers-table")
          .getElementsByTagName("tbody")[0];
     for (let therow of table.rows) {
          for (let thecell of therow.cells) {
               if (thecell.innerText == remove_id.value) {
                    therow.innerHTML = "";
               }
          }
     }
     deletOrder();
}
/**
 * displays a table of all orders of a given customer
 * by sending a post request to the server of the
 * customer id and replacing the inner html with
 * table of customer orders
 */
function viewOrders() {
     let view_id = document.getElementById("view-id");
     let remove_msg = document.getElementById("removed-msg");
     let viewCustomersBtn = document.getElementById("view-customers");
     let customerstable = document.getElementById("customers-table");

     if (view_id.value == "") {
          remove_msg.innerHTML = "Fill all fields";
          remove_msg.style.color = "red";
          return;
     } else {
          request.onload = function () {
               //Check HTTP status code
               if (request.status === 200) {
                    customerstable.innerHTML = request.responseText;
                    viewCustomersBtn.style.display = "block";
               } else console.log("Error communicating with server");
          };

          //Set up and send request
          request.open("POST", "./CMS/view-orders.php");
          request.setRequestHeader(
               "Content-type",
               "application/x-www-form-urlencoded"
          );
          request.send("id=" + view_id.value);
     }
}
/**
 * sends a post request to the server of the order id given
 * by the user and removes the order
 */
function deletOrder() {
     let remove_id = document.getElementById("remove-id");
     let remove_msg = document.getElementById("removed-msg");
     let view_id = document.getElementById("view-id");

     if (remove_id.value == "") {
          remove_msg.innerHTML = "Fill all fields";
          remove_msg.style.color = "red";
          return;
     } else {
          //Set up and send request
          request.open("POST", "./CMS/remove-order.php");
          request.setRequestHeader(
               "Content-type",
               "application/x-www-form-urlencoded"
          );
          request.send("id=" + remove_id.value);
          // clearing field values
          remove_id.value = "";
          view_id.value = "";
          remove_msg.innerHTML = "";
     }
}
/**
 * sends a get request to the server and
 * displays a table of registered customers
 */
function viewCustomers() {
     let customerstable = document.getElementById("customers-table");
     request.onload = function () {
          //Check HTTP status code
          if (request.status === 200) {
               customerstable.innerHTML = request.responseText;
          } else console.log("Error communicating with server");
     };
     //Set up and send request
     request.open("GET", "./CMS/view-customers.php");
     request.send();
}
