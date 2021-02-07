

function remove_item() {
    let remove_id = document.getElementById("remove-id");
    var table = document.getElementById("table").getElementsByTagName("tbody")[0];
    for (let therow of table.rows) {
        for (let thecell of therow.cells) {
            if (thecell.innerText == remove_id.value) {
                therow.innerHTML="";
            }
        }
    }
    post_id();
}

function post_id(){
    let remove_id = document.getElementById("remove-id");
    let remove_msg = document.getElementById("removed-msg");
    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
          console.log(request.responseText);
          remove_msg.innerHTML=request.responseText;
        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("POST", "./removeProduct.php");
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send("id=" + remove_id.value);

}
