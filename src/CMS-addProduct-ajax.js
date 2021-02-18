/**
 * this script handles the functionality of adding
 * new products to the database
 */

/**
 * takes the values of the add form and sends a post
 * request with the new product data into the server
 */
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
               document.getElementById("errorMsg").innerText =
                    "Fill all fileds";
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
                    if (request.responseText != "failed") {
                         let added_item_form = document.getElementById(
                              "added-item-info"
                         );
                         add_to_table(request.responseText);

                         added_item_form.innerHTML = request.responseText;
                    }
               } else console.log("Error communicating with server");
          };
          // sending a post request to add product data as a json string
          request.open("POST", "./CMS/add-product.php");
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

/**
 * adds a new row to the table of the added
 * item
 * @param {HTMLElement} new_item
 */
function add_to_table(new_item) {
     var table = document
          .getElementById("table")
          .getElementsByTagName("tbody")[0];
     table.innerHTML += new_item;
}

/**
 * creates a formData object to store file information by
 * using fetch API
 */
async function uploadFile() {
     let NewProductImage = document.getElementById("addform-Image");
     // creating a form data object to contain information sent to server
     let formData = new FormData();
     // appending chosen file to formdata object
     formData.append("file", fileupload.files[0]);
     // Asynchronously calling server-side resource to handle the upload
     await fetch("./uploadImg.php", {
          method: "POST",
          body: formData,
          // returning server response
     })
          .then(function (response) {
               return response.text();
               // setting the value of image url fields to the file path to the image
          })
          .then(function (text) {
               NewProductImage.value = "Images/" + text;
          });
     document.getElementById("errorMsg").innerText =
          "Image Uploaded Successfuly";
     document.getElementById("errorMsg").style.color = "green";
}
