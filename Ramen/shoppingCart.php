<!-- 
File name: shoppingCart.php
Author: Jill Lin, Jun Wan, Miao Yang 
Course: CST8285 – 311
Assignment: Assignment 2
Due Date: 12-04-2022
Professor: Abul Qasim
Purpose: This file is for display, and functionality. 
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu and Shopping Cart</title>
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/shoppingCart.css">
	<script src="./js/shoppingCart.js" defer></script>
</head>

<body>
    <?php include("headerM.php"); ?>

    <main>

		<div class="Cart-Container">
        <h1>Menu</h1>

			<form class="search">
				<b> Search </b>
				<input type="text" id="myInput"  placeholder="Search for names.."
				title="Type in a name">
				<b> Catalog </b>
				<select id="myList" onchange="favFoods()">
					<option> ---Choose foods--- </option>
					<option> Noodles </option>
					<option> Sides </option>
					<option> All </option>
				</select>
			</form>



			<div class="Noodles">
				<div class="image-box">
					<img src="./img/noodle1.jpg" class="pictures" alt="Classic Pork">
				</div>
				<div class="about">
					<h1 class="title">Classic Pork</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$13.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>

			</div>
			<div class="Noodles">
				<div class="image-box">
					<img src="./img/noodle2.jpg" class="pictures" alt="Black Soup">
				</div>
				<div class="about">
					<h1 class="title">Black Soup</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$14.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<div class="Noodles">
				<div class="image-box">
					<img src="./img/noodle3.jpg" class="pictures" alt="Garlic Pork">
				</div>
				<div class="about">
					<h1 class="title">Garlic Pork</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$15.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<div class="Noodles">
				<div class="image-box">
					<img src="./img/noodle4.jpg" class="pictures" alt="Tomato Soup">
				</div>
				<div class="about">
					<h1 class="title">Tomato Soup</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$15.99</span>
					</div>
				</div>
				<div class="counter ">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<div class="Sides">
				<div class="image-box">
					<img src="./img/sides1.jpg" class="pictures" alt="Agedashi Tofu">
				</div>
				<div class="about">
					<h1 class="title">Agedashi Tofu</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$6.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<div class="Sides">
				<div class="image-box">
					<img src="./img/sides2.jpg" class="pictures" alt="Fried Chicken">
				</div>
				<div class="about">
					<h1 class="title">Fried Chicken</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$8.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<div class="Sides">
				<div class="image-box">
					<img src="./img/sides3.jpg" class="pictures" alt="Gyoza">
				</div>
				<div class="about">
					<h1 class="title">Gyoza</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$9.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<div class="Sides">
				<div class="image-box">
					<img src="./img/sides4.jpg" class="pictures" alt="Kani Salad">
				</div>
				<div class="about">
					<h1 class="title">Kani Salad</h1>
				</div>
				<div class="prices">
					<div class="amount">
						<span>$9.99</span>
					</div>
				</div>
				<div class="counter">
					<input type="button" value="add to cart" onclick="addCart(this)" />
				</div>
			</div>
			<h1>Cart</h1>
			<table class="cart">
				<thead>
					<tr>
						<th>Menu_Ordered</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody id="goods">


				</tbody>
				<tfoot>
					<tr>
						<td colspan="3" style="text-align:right"> SubTotal before Tax </td>
						<td id="SubTotal">0 </td>
						<td></td>
					</tr>
					<td colspan="3" style="text-align:right"> Tax </td>
					<td id="Tax">0 </td>
					<td></td>
					</tr>
					<td colspan="3" style="text-align:right"> total after Tax </td>
					<td id="Total">0 </td>
					<td></td>
					</tr>
				</tfoot>
			</table><br>
			<div class="checkout">
				<div class="ckbtn">
					<a class="button" <?php
                    if (!session_id()) session_start();
                    if(isset($_SESSION["userName"])){
                        echo " href=checkout.php"; //if the account has logged in successfully
					}
                    else{
                        echo "href=login.php";
                    }
                    ?>>Checkout</a>
				</div>
			</div>
			<div>
				<p id="announcement">PICK UP AND PAY IN-STORE ONLY!</p>
			</div>
		</div>
	</main>
    <?php include 'footerM.php'; ?>