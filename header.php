<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?><?php if(wp_title('', false)){ echo " - "; } ?><?php wp_title(''); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>  <!-- carga los estilos y scripts encolados en functions.php -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">

    <!-- etiquetas modo app para iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="udemy">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/apple-touch-icon.jpg">
    <!-- etiquetas modo app para android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-title" content="udemy">
    <meta name="theme-color" content="#333333">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/icono.jpg">
</head>
<body <?php body_class(); ?>>
    
<div class="container-fluid bg-color-container pw-bg-color">    
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <?php 
                        if( function_exists('the_custom_logo') ){
                            the_custom_logo();
                        }
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link disabled">Disabled</a>
                    </div>
                </div> -->
                <?php 
                    wp_nav_menu(array(
                        'theme_location'    => 'menu_principal',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbarNavDropdown',
                        'menu_class'        => 'navbar-nav'
                    ));
                ?>
            </div>
        </nav>
    </div>
</div>