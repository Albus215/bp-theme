<?php

use \YAWPT\Core\Core;
use \YAWPT\Helpers\NavWalkerBootstrap;
//$scripts = get_field('scripts', 'options');
$header = get_field('header', 'options');

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700&display=swap" rel="stylesheet">
    <!--        --><? //= trim($scripts['header']); ?>
    <?php wp_head(); ?>

</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php wp_nav_menu([
            'theme_location'  => 'main_menu',
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'menu_class'      => 'navbar-nav ms-auto',
            'fallback_cb'     => NavWalkerBootstrap::class . '::fallback',
            'walker'          => new NavWalkerBootstrap(),
        ]); ?>

        <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php wp_nav_menu([
                    'theme_location'  => 'main_menu',
                    'container'       => '',
                    'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 pe-3',
                    'fallback_cb'     => NavWalkerBootstrap::class . '::fallback',
                    'walker'          => new NavWalkerBootstrap(),
                ]); ?>
            </div>
        </div>

    </div>
</nav>