<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__logo">
                <?php the_custom_logo(); ?>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Open menu">
                <span class="hamburger"></span>
            </button>

            <nav id="site-navigation" class="header__menu js-mobile-menu">
                <div class="mobile-menu-logo">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . home_url('/') . '">' . get_bloginfo('name') . '</a>';
                    }
                    ?>
                </div>
                <?php wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_id' => 'primary-menu',
                        'menu_class'     => 'header__menu-list',
                ));
                ?>
            </nav>
        </div>


    </div>
</header>
