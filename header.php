<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name= "viewport" content="width=device-width,initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header">
   <div class="primary_nav">
        <div class="site_logo">
            <?php  ?>
           <a href="/"> <img src="<?php echo get_header_image() ?>" alt="logo"> </a>
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
