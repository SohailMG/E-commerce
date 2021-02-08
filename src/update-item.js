/**
 * posts the form data to be updated to an updateproduct.php
 * script and displays the updated data back into the table
 */
function update_item() {
  let updated_id = document.getElementById("update-id");
  let updated_name = document.getElementById("update-name");
  let updated_price = document.getElementById("update-price");
  let updated_size = document.getElementById("update-size");
  let updated_stock = document.getElementById("update-stock");

  let formelms = [
    updated_stock,
    updated_id,
    updated_name,
    updated_price,
    updated_size,
  ];
  request.onload = function () {
    //Check HTTP status code
    if (request.status === 200) {
      show_updated(request.responseText);
      formelms.forEach((element) => {
        element.value = "";
      });
    } else console.log("Error communicating with server");
  };

  //Set up and send request
  request.open("POST", "./CMS/update-product.php");
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

/**
 * loops through each row of the table and
 * checks if a cells contains the given ID
 * if so then it will update the row with
 * the new details
 *
 * @param {string} updated_row
 */
function show_updated(updated_row) {
  let pid = document.getElementById("update-id");
  var table = document.getElementById("table").getElementsByTagName("tbody")[0];
  for (let therow of table.rows) {
    for (let thecell of therow.cells) {
      if (thecell.innerText == pid.value) {
        therow.innerHTML = updated_row;
        highlight(therow);
      }
    }
  }
}

/**
 * takes a row and changes color
 * to green for a short amount
 * of time
 * @param {HTMLElement} elm
 */
function highlight(elm) {
  var original = elm.style.color;
  elm.style.color = "green";
  window.setTimeout(function () {
    elm.style.color = original;
  }, 1000);
}
