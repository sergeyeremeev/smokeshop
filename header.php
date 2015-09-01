<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <!--[if lt IE 9]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="top-bar bold">
            <div class="container">
                <div class="top-bar-left left">
                    You must be at least <span class="red">18 years old</span> to use our site
                </div>
                <div class="top-bar-right right">
                    To Order: <span class="red">1-855-XXX-XXX</span>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="site-branding left">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                </div>
                <div class="header-search right">
                    <?php get_search_form(); ?>
                </div>
                <nav id="site-navigation" class="main-navigation right" role="navigation">
                    <button class="menu-toggle"><?php _e( 'Primary Menu', '_mbbasetheme' ); ?></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
