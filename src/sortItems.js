function sortItems() {
  let selectOpt = document.getElementById("select-options");
  let productsContainer = document.getElementsByClassName("gridwrapper")[0];


  if (selectOpt.value == "noSort") {
    return;
  } else {
    if (request.status === 200) {
      console.log("success");
      console.log(request.responseText);
      productsContainer.innerHTML = request.responseText;
    } else {
      console.log("connection failed");
    }

    request.open("POST", "./sort-items.php");
    request.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    request.send("sortBy=" + selectOpt.value);

    //ADD EVENT LISTNEERS FOR BUTTRONS
    let addToCart_btns = document.getElementsByClassName("addbtn");

    for (let i = 0; i < addToCart_btns.length; i++) {
      let addToCart_btn = addToCart_btns[i];

      addToCart_btn.addEventListener("click", addToCart);
    }
  }
}
