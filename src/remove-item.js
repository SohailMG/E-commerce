

function remove_item() {
    let remove_id = document.getElementById("remove-id");
    var table = document.getElementById("customers-table").getElementsByTagName("tbody")[0];
    for (let therow of table.rows) {
        for (let thecell of therow.cells) {
            if (thecell.innerText == remove_id.value) {
                console.log(therow);
                therow.innerHTML="";
            }
        }
    }
    deletOrder();
}

function viewOrders(){
    let remove_id = document.getElementById("view-id");
    let viewCustomersBtn = document.getElementById("view-customers");
    let customerstable = document.getElementById("customers-table");
    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
          console.log(request.responseText);
          
          customerstable.innerHTML = request.responseText;
          viewCustomersBtn.style.display="block";
        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("POST", "./CMS/view-orders.php");
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send("id=" + remove_id.value);

}
function deletOrder(){
    let remove_id = document.getElementById("remove-id");
    let remove_msg = document.getElementById("removed-msg");
    let customerstable = document.getElementById("customers-table");
    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
          console.log(request.responseText);
        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("POST", "./CMS/remove-order.php");
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send("id=" + remove_id.value);

}

function viewCustomers(){
    let customerstable = document.getElementById("customers-table");

    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
          console.log(request.responseText);
          customerstable.innerHTML= request.responseText;
          
        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("GET", "./CMS/view-customers.php");
      request.send();

}


