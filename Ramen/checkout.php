<!-- 
File name: Checkout.php
Author: Jill Lin, Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for display and functionality. 
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check out</title>
    <link rel="stylesheet" href="./css/checkout.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <script src="./js/checkOut.js" defer ></script>
</head>

<body>
    <?php include("headerM.php"); ?>

<main>
    <div class="phone">
            <h1>Checkout</h1>
        <form id="placeorder" class="form" method="get">
            <div>
                <h2>Customer Information</h2>

                <div class="customer">
                    <p class="customer-information">
                    <?php
                    if(isset($_SESSION["userName"])){
                        echo $_SESSION["userName"];}?><br>
                    <?php
                    if(isset($_SESSION["phone"])){
                        echo $_SESSION["phone"];}?><br>
                    </p>
                </div>
            </div>
            <div>
                <label for="time" class="pickup-time">Pickup Time</label><br>
                <input id="time" type="text" class="time" style="display: none;">
                <select class="ui-timepicker-select">
                    <option value="asap">As soon as possible</option>
                    <option value="04:30 pm">04:30 pm</option>
                    <option value="04:40 pm">04:40 pm</option>
                    <option value="04:50 pm">04:50 pm</option>
                    <option value="05:00 pm">05:00 pm</option>
                    <option value="05:10 pm">05:10 pm</option>
                    <option value="05:20 pm">05:20 pm</option>
                    <option value="05:30 pm">05:30 pm</option>
                    <option value="05:40 pm">05:40 pm</option>
                    <option value="05:50 pm">05:50 pm</option>
                    <option value="06:00 pm">06:00 pm</option>
                    <option value="06:10 pm">06:10 pm</option>
                    <option value="06:20 pm">06:20 pm</option>
                    <option value="06:30 pm">06:30 pm</option>
                    <option value="06:40 pm">06:40 pm</option>
                    <option value="06:50 pm">06:50 pm</option>
                    <option value="07:00 pm">07:00 pm</option>
                    <option value="07:10 pm">07:10 pm</option>
                    <option value="07:20 pm">07:20 pm</option>
                    <option value="07:30 pm">07:30 pm</option>
                    <option value="07:40 pm">07:40 pm</option>
                    <option value="07:50 pm">07:50 pm</option>
                    <option value="08:00 pm">08:00 pm</option>
                    <option value="08:10 pm">08:10 pm</option>
                    <option value="08:20 pm">08:20 pm</option>
                    <option value="08:30 pm">08:30 pm</option>
                    <option value="08:40 pm">08:40 pm</option>
                    <option value="08:50 pm">08:50 pm</option>
                </select>
            </div>

            <fieldset>
                <legend>Payment Method</legend>

                <div class="form__radios">
                    <div class="form__radio">
                        <img src="./img/visa_icon.png" class="icon" alt="visa">
                        <label for="paymentCO">Visa Payment</label>
                        <input type="radio" id="visa" name="paymentCO">
                    </div>

                    <div class="form__radio">
                        <img src="./img/paypal_icon.png" class="icon" alt="paypal">
                        <label for="paymentCO">PayPal</label>
                        <input type="radio" id="paypal" name="paymentCO">
                    </div>

                    <div class="form__radio">
                        <img src="./img/master_icon.png" class="icon" alt="mastercard">
                        <label for="paymentCO">Master Card</label>
                        <input type="radio" id="mastercard" name="paymentCO">
                    </div>
                </div>
            </fieldset>

            <div>
                <h2>Order Bill</h2>
                <table>
                    <tbody>
                        <tr>
                            <td>Price Total</td>
                            <td id="payment" name="chpayment"></td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td id="tax" name="chtax"></td>
                        </tr>
                        <tr>
                            <td>Discount 10%</td>
                            <td id="discount" name="chdiscount"> </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td id="totalAfTD" name="chtotalAfTD"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div>
                <button type="submit" class="button button--full" >Pay Now</button>
            </div>
        </form>
    </div>
</main>
<?php include 'footerM.php'; ?>

