/*
 * File name: checkOut.js
 * Author: Jun Wan, Miao Yang 
 * Course: CST8285 – 311
 * Assignment: Assignment 2
 * Due Date: 12-04-2022
 * Professor: Abul Qasim
 * Purpose: This file is used for 
	  1. keep data from order page
	  2. calculalte tax payable
	  3. calcualte discount
	  4. calculate total total payable 
	 
 */

// define payment number from order pange
var payment1 = +localStorage.getItem("payment");
// define tax payable
var tax1 = +localStorage.getItem("tax");
// calculate total discount, it is should be the 10 percent of payment before tax and tax 
var discount1 = parseFloat((payment1 + tax1)*0.1);

// get payment number from order pange and round to 2 decimal digits
document.getElementById("payment").innerHTML = payment1.toFixed(2);
// get tax payable number from order pange and round to 2 decimal digits 
document.getElementById("tax").innerHTML = tax1.toFixed(2);
// get discount number from order pange and round to 2 decimal digits 
document.getElementById("discount").innerHTML = discount1.toFixed(2);
document.getElementById("totalAfTD").innerHTML = ((payment1 + tax1)*0.9).toFixed(2);
// get total payable  number from order pange and round to 2 decimal digits 
let paymentValue = payment1.toFixed(2);
let discountValue = 0.1
// pass data to php
document.getElementById("placeorder").addEventListener("submit", () => { 
    event.preventDefault();
        if (paymentValue != "") {
            console.log(paymentValue);
            window.location.href = "orderplace.php?paymentValue=" + paymentValue + '&discountValue=' + discountValue ;
        } else
            alert('Oops.!!');
            return true;
})
