function addNewProduct() {
  let NewProductName = document.getElementById("addform-Name").value;
  let NewProductPrice = document.getElementById("addform-Price").value;
  let NewProductSize = document.getElementById("addform-Size").value;
  let NewProductQuantity = document.getElementById("addform-Quantity").value;
  let NewProductImage = document.getElementById("addform-Image").value;
  let NewProductKeywords = document.getElementById("addform-keywords").value;


  let newItemData = {
    Name: NewProductName,
    Price: NewProductPrice,
    Quantity: NewProductQuantity,
    size: NewProductSize,
    img_url: NewProductImage,
    KeyWords: NewProductKeywords,
  };

  request.onload = function () {
    //Check HTTP status code
    if (request.status === 200) {
      console.log(request.responseText);
    } else console.log("Error communicating with server");
  };
  request.open("POST", "./add-product.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "newItemData=" +
     JSON.stringify(newItemData)
  );
}
