<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo get_theme_file_uri('/img/favicon.ico');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('/img/favicon.ico');?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>
        <?php 
        if (!is_front_page()) echo (get_the_title().' | ');
        bloginfo('name'); 
        ?> 
    </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 
        <nav class="mainmenu">
            <div class="mainmenu__topbar">
                <div class="mainmenu__logo--desktop">
                    <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_theme_file_uri() . '/img/400m_logo.svg'; ?>">
                    </a>
                </div>
                <div class="mainmenu__logo--mobile">
                    <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_theme_file_uri() . '/img/400m_logo_simple.svg'; ?>">
                    </a>
                </div>
                <?php
                    if (has_nav_menu('m400-main-menu')) {
                        wp_nav_menu( array( 
                            'theme_location' => 'm400-main-menu' 
                        ) );
                    } 
                ?>
                <div class="mainmenu__searchbutton">
                    <a><img src="<?php echo get_theme_file_uri() . '/img/search.svg'; ?>" alt=""></a>
                </div>
                <div class="mainmenu__menubutton">
                    <a><span></span></a>
                </div>
            </div>
        </nav>
<div class="wrapper"> 