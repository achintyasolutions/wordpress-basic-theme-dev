<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
<div class="container-main">
<header class="site-header">
   <div class="primary_nav">
        <div class="site_logo">
           <a href="/amity"> <img src="http://localhost/amity/wp-content/uploads/2023/09/amity-logo-final-1_page-0001-e1695065823579.jpg" alt="logo"> </a>
        </div>
        <div class="menu_items"> 
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Apartment</a></li>
                <li><a href="#">Villa</a></li>
                <li><a href="#">Warehouse</a></li>
                <li><a href="#">Office Space</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
       <div class="custom_button">
            <a href=""><button>List Your Property</button></a>
       </div>
   </div>
</header>
