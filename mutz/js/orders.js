if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
}else{
    ready();
}

function ready(){
    
// var remove = document.getElementsByClassName('btn-danger');
// for(var i = 0; i< remove.length; i++){
//     var button = remove[i];
//     button.addEventListener('click',removeCartItem);
//     }

    var quantyInputs = document.getElementsByClassName('form-control');
    for(var i = 0; i< quantyInputs.length; i++){

        var input = quantyInputs[i];
        input.addEventListener('change', quantityChanged);

    }

    // var addPizzaToCartBtn = document.getElementsByClassName('add_btn');
    // for(var i = 0; i< addPizzaToCartBtn.length; i++){
    //     var button = addPizzaToCartBtn[i];
    //     button.addEventListener('click', addPizzaToCartClicked);

    // }

//     var addExtrasToCartBtn = document.getElementsByClassName('add-extras-btn');
//     for(var i = 0; i< addExtrasToCartBtn.length; i++){
//         var button = addExtrasToCartBtn[i];
//         button.addEventListener('click', addExtrasToCartClicked);

//     }

//     var addBeverageToCartBtn = document.getElementsByClassName('add-beverage-btn');
//     for(var i = 0; i< addBeverageToCartBtn.length; i++){
//         var button = addBeverageToCartBtn[i];
//         button.addEventListener('click', addBeverageToCartClicked);

//     }

    // document.getElementsByClassName('add_btn')[0].addEventListener('click', alert('Order Placed'));
}

function orderClicked(){
    alert('Thank you for your order')
    // var cartItems = document.getElementsByClassName('order_item')[0];
    // while (cartItems.hasChildNodes()){
    //     cartItems.removeChild(cartItems.firstChild);
    // }
    // updateCartTotal();
}
function cancelClicked(){
    alert('You have cancelled your order')
    var cartItems = document.getElementsByClassName('order_item')[0];
    while (cartItems.hasChildNodes()){
        cartItems.removeChild(cartItems.firstChild);
    }
    updateCartTotal();
}

function addPizzaToCartClicked(event){
    var button = event.target;
    var pizzaItem = button.parentElement.parentElement;
    var pizzaName = pizzaItem.getElementsByClassName('pizza_item_name')[0].innerText;
    var pizzaPrice = pizzaItem.getElementsByClassName('price')[0].innerText;
    console.log(pizzaName, pizzaPrice);
    addItemToCart(pizzaName, pizzaPrice);
    updateCartTotal();

}

function addExtrasToCartClicked(event){
    var button = event.target;
    var extrasItem = button.parentElement.parentElement;
    var extrasName = extrasItem.getElementsByClassName('extra_name')[0].innerText;
    var extrasPrice = extrasItem.getElementsByClassName('price_weight')[0].innerText;
    console.log(extrasName, extrasPrice);   
    addItemToCart(extrasName, extrasPrice);
    updateCartTotal();
}

function addBeverageToCartClicked(event){
    var button = event.target;
    var beverageItem = button.parentElement.parentElement;
    var beverageName = beverageItem.getElementsByClassName('beverage_name')[0].innerText;
    var beveragePrice = beverageItem.getElementsByClassName('beverage_price')[0].innerText;
    console.log(beverageName, beveragePrice);
    addItemToCart(beverageName, beveragePrice);
    updateCartTotal();

}

function addItemToCart(name, price){
    var cartRow = document.createElement('div');
    cartRow.classList.add('order_name');
    var cartItems = document.getElementsByClassName('order_item')[0];
    var cartItemNames = cartItems.getElementsByClassName('pizza_order_name');
    for(var i = 0; i< cartItemNames.length; i++){
        if(cartItemNames[i].innerText == name){
            alert('This item is already added');
            return;
        }
    }
    var cartRowContents = `
    <br>
    <button class="btn btn-danger">Remove</button>
    <div class="pizza_order_name">
      ${name}
    </div>

    <div class="dots"></div>

    <div class="order_price">
    <div class = "order_quantity">
      <input class = "order_quantity_input" type="text" value = 1 maxlength="5" style="color: black" ></input>

    </div>
    <strong>${price}<sup>PhP</sup></strong></div>
    `;
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem);
    cartRow.getElementsByClassName('order_quantity_input')[0].addEventListener('change', quantityChanged);

}

function quantityChanged(event){
    var input = event.target;
    if(isNaN(input.value) || input.value <= 0 ){
        input.value = 1;
    }
}


function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    console.log("text");
    updateCartTotal();
}


function updateCartTotal(){
    var cartContainer = document.getElementsByClassName('order_item')[0];
    var cartRows = cartContainer.getElementsByClassName('order_name');
    var total = 0;
    for(var i = 0; i< cartRows.length; i++){
        var cartRow = cartRows[i];
        var priceElem = cartRow.getElementsByClassName('order_price')[0];
        var quantityElem = cartRow.getElementsByClassName('order_quantity_input')[0];
        
        var price = parseFloat(priceElem.innerText.replace('PhP',''));
        var quantity = quantityElem.value;
        console.log("test");
        total = total + (price * quantity);
    }

    total = Math.round(total * 100) / 100;

    document.getElementsByClassName('total')[0].innerText = "TOTAL: " + total + "PhP";

}
