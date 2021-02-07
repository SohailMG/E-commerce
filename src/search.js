

function search_item() {
    post_search();
    // location.href="search.php";


}

function search_item(){
    let search_box = document.getElementById("search-box");
    let results_box = document.getElementsByClassName("products-wrapper");

    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
            if (URL.match("perfumes")) {
                
                for (var i = 0; i < results_box.length; i++) {
                    results_box[i].innerHTML= request.responseText;
                }
            }else{
                document.querySelector('main').innerHTML = request.responseText;
                document.querySelector('footer').style.marginTop="15%";
                document.querySelector('main').style.height="100%";
            }
              

        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("POST", "./search.php");
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send("search=" + search_box.value);

}

function getSearches(){


    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
            console.log(request.responseText);

        } else console.log("Error communicating with server");
      };
    
      //Set up and send request
      request.open("GET", "./perfumes.php");
      request.send();


}