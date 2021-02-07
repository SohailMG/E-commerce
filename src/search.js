

function search_item() {
    post_search();


}

function post_search(){
    let search_box = document.getElementById("search-box");
    let results_box = document.getElementsByClassName("products-wrapper");

    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
            // for (var i = 0; i < results_box.length; i++) {
            //     results_box[i].innerHTML= request.responseText;
            //   }
            document.getElementsByTagName('main')[0].innerHTML = request.responseText;

        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("POST", "./search.php");
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send("search=" + search_box.value);

}