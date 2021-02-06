function addNewProduct() {
  let NewProductName = document.getElementById("addform-Name");
  let NewProductPrice = document.getElementById("addform-Price");
  let NewProductSize = document.getElementById("addform-Size");
  let NewProductQuantity = document.getElementById("addform-Quantity");
  let NewProductImage = document.getElementById("addform-Image");
  let NewProductKeywords = document.getElementById("addform-keywords");

  // array of form elms
  let formElms = [
    NewProductName,
    NewProductPrice,
    NewProductSize,
    NewProductQuantity,
    NewProductImage,
    NewProductKeywords,
  ];
  //   checking if form is input fields are empty
  if (
    NewProductName.value == "" ||
    NewProductPrice.value == "" ||
    NewProductSize.value == "" ||
    NewProductQuantity.value == "" ||
    NewProductImage.value == "" ||
    NewProductKeywords.value == ""
  ) {
    // setting border to red when all fileds are empty
    formElms.forEach((element) => {
      element.style.border = "1px solid red";
      document.getElementById("errorMsg").innerText = "Fill all fileds";
    });
    return;
  } else {
    // creating json object to of new product data
    let newItemData = {
      Name: NewProductName.value,
      Price: NewProductPrice.value,
      Quantity: NewProductQuantity.value,
      size: NewProductSize.value,
      img_url: NewProductImage.value,
      KeyWords: NewProductKeywords.value,
    };

    request.onload = function () {
      //Check HTTP status code
      if (request.status === 200) {
        console.log(request.responseText);
        if (request.responseText != "failed") {
          let added_item_form = document.getElementById("added-item-info");
          added_item_form.style.display="block";
          added_item_form.innerHTML = request.responseText;
        }
      } else console.log("Error communicating with server");
    };
    // sending a post request to add product data as a json string
    request.open("POST", "./add-product.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("newItemData=" + JSON.stringify(newItemData));
  }

  //   setting form border to green and clear each field
  formElms.forEach((element) => {
    element.style.border = "1px solid green";
    element.value = "";
    document.getElementById("errorMsg").innerText = "";
  });
}

function showAdded( name, price, size, stock) {
  let name_field = document.getElementById("new-item-name");
  let price_field = document.getElementById("new-item-price");
  let size_field = document.getElementById("new-item-size");
  let qnty_field = document.getElementById("new-item-qty");

  name_field.innerHTML += name;
  price_field.innerHTML += price;
  size_field.innerHTML += size;
  qnty_field.innerHTML += stock;
}
