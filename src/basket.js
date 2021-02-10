
if (URL.match('cart')) {

    var removeCartItem = document.getElementsByClassName('remove-item');
    console.log(removeCartItem);

    for (let i = 0; i < removeCartItem.length; i++) {
        let removeBtn = removeCartItem[i];

        removeBtn.addEventListener('click',function(event){
            let removeClicked = event.target
            let itemDetails = removeClicked.parentElement;

            let itemName = itemDetails.getElementsByClassName('order-name')[0].innerHTML;
            let item_name = itemName.substr(10);
            removeBasketItem(item_name);


             removeClicked.parentElement.remove();
        })
        
    }


    function removeBasketItem(itemName){

        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
            } else console.log("Error communicating with server");
          };
        
          //Set up and send request
          request.open("POST", "./remove-basket.php");
          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request.send(
            "name=" + itemName
          );

    }



    
  
}