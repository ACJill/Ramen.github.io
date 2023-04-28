/*
 * File name: shoppingCart.js
 * Author: Jun Wan
 * Course: CST8285 – 311
 * Assignment: Assignment 2
 * Due Date: 12-04-2022
 * Professor: Abul Qasim
 * Purpose: This file is used for 
	  1. adding selected  food  to  cart
	  2. searching food by name
	  3. filtering food category : 
	  4. if selected food already in cart, only quantity will be increased without adding a new record for the selected food
	  5. delete from cart
	  6. change the quantity of foods in cart, the minimum quantity user can order is zero, no negative quantity is allowed
	  7. keep order subtotal and totals data and transfer to checkout page.
	  8. auto calculate tax, the tax rate is 13%
	  9. Checkout support deduction calculation
	  10. eventlistener to monitor user input in the search box
 */

function addCart(btn) {
    // get the clicked button div class name
    let parButtonClicked = btn.parentNode.parentNode;
    // get the clicked food product name
    let productName = parButtonClicked.querySelector(".title").innerHTML;
    // get the clicked food unit price
    let price = parButtonClicked.querySelector(".amount span").innerHTML;

    //Is food added to cart or not
    // get how many type of foods have been added to cart based on the name of the food
    var tbody_Node = document.getElementById("goods"); // get the table we will write data in HTML
    var ItemsinCart = tbody_Node.getElementsByTagName("tr"); //  rows


    // if the food already put into cart, then we can just add quantity without adding new record in the cart table
    for (var item of ItemsinCart)
        {
        // get the name of ordered food in the cart
        var nameInCart = item.getElementsByTagName("td")[0].innerText;
        // get the button of the added item that should be just increase quantity while not adding new record in the cart table
        addButton = item.getElementsByTagName("td")[2].getElementsByTagName("input")[2];
        // if the ordered food is already in the cart, click once , just let   quantity  increase 1
        if (nameInCart == productName) {
            // call  changeOrderedQuantity function to add ordered food quantity
            changeOrderedQuantity(1, addButton);
            return;
        }
    }

    // insert new row to cart
    let html =
        '<td>' + productName + '</td>' +
        '<td>' + price + '</td>' +
        '<td align="center">' +
        '<input type="button" value="-" onclick="changeOrderedQuantity(-1,this)"/>' +
        '<input type="number" size="4" min="0" class="field" value="1"/>' +
        '<input type="button" value="+" onclick="changeOrderedQuantity(1,this)"/>' +
        '</td>' +
        '<td class="subTotal1">' + price + '</td>' +
        '<td align="center"><input type="button" id="deleteItems" value="x" onclick="del(this)"/></td>';

    // new cart table
    let table = document.getElementById("goods");
    // insert new row
    let newRow = table.insertRow();

    newRow.innerHTML = html;

    // call totalAmount to calcualte sub-total amount owned by customer, total tax  and after tax total owned by customer for the order.
    totalAmount();
}

// function to calculate quantity by clicking the input minus or add button,
// at present , the directly input quantity is on the to-do-list
function changeOrderedQuantity(num, btn) {
    var minusButton = btn.parentNode.getElementsByTagName("input")[0];
    var inputField = btn.parentNode.getElementsByTagName("input")[1];
    var plusButton = btn.parentNode.getElementsByTagName("input")[2];

    // locate the ordered foods
    var tds = btn.parentNode.parentNode.getElementsByTagName("td");
    // find the ordered food price
    var price = tds[1].innerText.split("$")[1];
    //var NumOrdered=1;

    // keep the orignial quantity before changing
    var originalValue = Number(inputField.value) || 0;

    // the minimum quantity of a order  is 0 which means that quantity a customer ordered must be non-negative
    if (originalValue == 1 && num == -1) {
        return;
    }
    // calcuate the quantity after click minus or plus button
    var currentValue = originalValue + num;
    if (currentValue < 0) {
        currentValue = 0;

    }
    inputField.value = currentValue;
    var subTotal = (price) * (currentValue)
    tds[3].innerText = subTotal.toFixed(2);

    totalAmount();

}
// fuction to calcualte total amount
function totalAmount() {
    // locate the subtotal
    var tds = document.getElementsByClassName("subTotal1");
    // initial value for the payment by customer
    var payment = 0;
    for (var i = 0; i <= tds.length - 1; i++) {
        // calculate payment while replacing $ mark
        payment += parseFloat((tds[i].innerText).replace(/[,$]/g, ""));
    }
    // rounding payment to the 2nd decimal, namely the precision of  payment    is one cent
    document.getElementById("SubTotal").innerText = payment.toFixed(2);
    // tax rate was set 13%
    var taxRate = 0.13;
    // calculate the tax payable
    var tax = payment * taxRate;
    // rounding tax payable to the 2nd decimal
    document.getElementById("Tax").innerText = tax.toFixed(2);
    // calculate the after tax payable
    var totalAFterTax = payment * (1 + taxRate);
    document.getElementById("Total").innerText = totalAFterTax.toFixed(2);
    localStorage.setItem("payment", payment);
    localStorage.setItem("tax", tax);
    localStorage.setItem("totalAFterTax", totalAFterTax);
}

//delete cart items
function del(btn) {
    if (confirm("Sure to delete???")) {
        var i = btn.parentNode.parentNode.rowIndex - 1;
        document.getElementById('goods').deleteRow(i);

    }

    totalAmount();
}

 

// add enent listener to monitor user search food by name
document.getElementById("myInput").addEventListener("keyup", myFunction);

function myFunction() {
    // search food names
    let items = document.querySelectorAll('.title')
        // keep user input in the search box
        let search_query = document.getElementById("myInput").value;

    for (var i = 0; i < items.length; i++) {
        /*   to faciliate comparing, convert all input to lowercase, if the user search input partially or full match food icon,names
        price will be shown , otherwide it will be hidden */
        if (items[i].innerText.toLowerCase()
            .includes(search_query.toLowerCase())) {
            items[i].parentNode.parentNode.classList.remove("hidden");
        } else {
            items[i].parentNode.parentNode.classList.add("hidden");
        }
    }
}

/*   dropdowns list filter, user can use filter to filter two types of food
namely noodles and sides */
function favFoods() {
    // locate the dropdowns button
    var dropdowns = document.getElementById('myList');
    // find all the noodles classes
    let Noodles = document.querySelectorAll('.Noodles');
    // find all the sides classes
    let Sides = document.querySelectorAll('.Sides');

    // to faciliate comparing, convert all the input as upper case
    var noodleFood = 'Noodles'.toUpperCase();

    // find the user input options, namely options is noodle or sides
    options = dropdowns.options[dropdowns.selectedIndex].value.toUpperCase();
    // if the user option is noodles
    if (options == "NOODLES") {
        /*   display itmes which class name 	are noodles and hide items
        which class name are sides */
        Noodles.forEach(noodle => noodle.classList.remove("hidden"));
        Sides.forEach(side => side.classList.add("hidden"));

    }
    // if the user option is sides
    if (options == "SIDES") {
        /*   display itmes which class name 	are sides and hide items
        which class name are noodles */
        Noodles.forEach(noodle => noodle.classList.add("hidden"));
        Sides.forEach(side => side.classList.remove("hidden"));
    }
	// if user choose to display all, all noodles and sides will be shown
	else if (options == "ALL") {
        Noodles.forEach(noodle => noodle.classList.remove("hidden"));
        Sides.forEach(side => side.classList.remove("hidden"));

    }
}
