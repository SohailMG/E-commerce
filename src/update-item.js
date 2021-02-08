function update_item() {
  let updated_id = document.getElementById("update-id");
  let updated_name = document.getElementById("update-name");
  let updated_price = document.getElementById("update-price");
  let updated_size = document.getElementById("update-size");
  let updated_stock = document.getElementById("update-stock");
  request.onload = function () {
    //Check HTTP status code
    if (request.status === 200) {
      show_updated(request.responseText);
    } else console.log("Error communicating with server");
  };

  //Set up and send request
  request.open("POST", "./update-product.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "id=" +
      updated_id.value +
      "&name=" +
      updated_name.value +
      "&price=" +
      updated_price.value +
      "&size=" +
      updated_size.value +
      "&stock=" +
      updated_stock.value
  );
}

function show_updated(updated_row) {
    let pid = document.getElementById("update-id");
    var table = document.getElementById("table").getElementsByTagName("tbody")[0];
    for (let therow of table.rows) {
        for (let thecell of therow.cells) {
            if (thecell.innerText == pid.value) {
                console.log(therow);
                therow.innerHTML=updated_row;
                therow.style.color="green";
            }
        }
    }
}
