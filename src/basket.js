
if (URL.match('cart')) {

    // window.onload = updateCartTotal;

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
            updateCartTotal()
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



    function updateCartTotal(){
        let cartContainer = document.getElementsByClassName('cart-container')[0];
        let cartItems = cartContainer.getElementsByClassName('order-details');
        let orderTotalElm = cartContainer.getElementsByClassName('order-total')[0];
        let cartTotal = 0;

        for (let i = 0; i < cartItems.length; i++) {
            

            let cartItem = cartItems[i];
            let itemPriceElm = cartItem.getElementsByClassName('order-price')[0];
            let itemQuantityElm = cartItem.getElementsByClassName('order-quantity')[0];

            let itemPrice = parseFloat( itemPriceElm.innerHTML.replace('Price : £',''));
            let quantity = itemQuantityElm.value;
            cartTotal = cartTotal + (itemPrice * quantity);
            orderTotalElm.innerHTML='Total : £' +  cartTotal;
            // storeTotal(cartTotal);
            if (localStorage.getItem('cartTotal') == null) {
                localStorage.setItem('cartTotal',cartTotal);
                
                
            }else{
                localStorage.removeItem('cartTotal');
                localStorage.setItem('cartTotal',cartTotal);
            }


        }

    }

    
  
}