<!-- 
File name: index.php
Author: Chuang Li, Miao Yang 
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Chuang Li">
    <title>Ichiban_Ramen</title>
    <link rel="stylesheet" href="./css/stylesheetforindex.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
</head>


<body>
<?php include("headerM.php"); ?>
    <main>

        <p id="Menu" class="subheading">Noodles</p>
        <section class="gridContainer1">

            <div class="grid1 item1">
                <img src="./img/noodle1.jpg" class="icon" alt="PorkNoodle">
                <p class="noodleItem">Classic Pork</p>
                <p>Chashu, Black Fungus, Egg, Green Onion</p>
                <p>Chashu porc braisé, Champignons Noirs, euf, Oignons Verts</p>
            </div>

            <div id="grid1 item2">
                <img src="./img/noodle2.jpg" class="icon" alt="BlackSoup">
                <p class="noodleItem">Black Soup</p>
                <p>Chashu, Spicy Kakuni, Egg, Shiitake, Garlic Oil </p>
                <p>Chashu porc braisé, Kakuni épicé, euf, Shiitake, Huile d'Ail Noir</p>
            </div>
            </div>


            <div id="grid1 item3">
                <img src="./img/noodle3.jpg" class="icon" alt="GarlicPork">
                <p class="noodleItem">Garlic Pork</p>
                <p>Chashu, Egg, Bamboo Shoot, Green Onion</p>
                <p>Chashu porc braisé, euf, Pousses de Bambou, Oignons Verts</p>
            </div>

            <div id="grid1 item4">
                <img src="./img/noodle4.jpg" class="icon" alt="TomatoSoup">
                <p class="noodleItem">Tomato Soup</p>
                <p>Chashu, Scallop, Egg, Tomato, Shiitake</p>
                <P>Chashu porc braisé, Pétoncle, euf, Tomates, Shiitake</P>
            </div>
            </div>
        </section>



        <p class="subheading">Sides</p>
        <section class="gridContainer2">

            <div id="grid2 item1">
                <img src="./img/sides1.jpg" class="icon" alt="tofu">
                <p class="sideItem">Agedashi tofu</p>
                <p>tofu, potato starch, soy sauce, green onions</p>
                <P>tofu, purée de pomme de terre, sauce soja, Oignons Verts</P>
            </div>

            <div id="grid2 item2">
                <img src="./img/sides2.jpg" class="icon" alt="friedChicken">
                <p class="sideItem">Fried chicken</p>
                <p>chicken thighs, soy sauce, ginger juice</p>
                <P>cuisses de poulet, sauce soja, jus de gingembre</P>
            </div>

            <div id="grid3 item3">
                <img src="./img/sides3.jpg" class="icon" alt="gyoza">
                <p class="sideItem">Gyoza</p>
                <p>pan fried pork dumplings with cabbage</p>
                <P>dumplings au porc frits à la poêle avec choux</P>
            </div>

            <div id="grid4 item4">
                <img src="./img/sides4.jpg" class="icon" alt="kaniSalad">
                <p class="sideItem">Kani Salad</p>
                <p>kanikama,cucumber,carrot,mango,pepper,sausage</p>
                <P>kanikama,concombre,carotte,mangue,poiron,saucisse</P>
            </div>
        </section>
    </main>
    <?php include 'footerM.php'; ?>
