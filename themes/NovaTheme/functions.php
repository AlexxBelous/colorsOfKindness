<?php

/*
|--------------------------------------------------------------------------
| DATABASE REPOSITORY START
|--------------------------------------------------------------------------
| This section describes the core logic for working with entities
*/
define('IS_VITE_DEVELOPMENT', true);
/*----------------------- END OF DATABASE REPOSITORY --------------------*/


/*
|--------------------------------------------------------------------------
| DATABASE REPOSITORY START
|--------------------------------------------------------------------------
| Get the theme version from style.css to use it for cache busting
*/
$theme = wp_get_theme();
define('THEME_VERSION', $theme->get('Version'));
/*----------------------- END OF DATABASE REPOSITORY --------------------*/


/*
|--------------------------------------------------------------------------
| VITE HMR PREAMBLE START
|--------------------------------------------------------------------------
| Output React preamble for Vite HMR (Fast Refresh) to work.
| Uncomment the add_action below when you start working with React.
*/
function novatheme_vite_head_preamble()
{
    if (IS_VITE_DEVELOPMENT) {
        ?>
        <script type="module">
            import RefreshRuntime from 'http://localhost:3000/@react-refresh'

            RefreshRuntime.injectIntoGlobalHook(window)
            window.$RefreshReg$ = () => {
            }
            window.$RefreshSig$ = () => (type) => type
            window.__vite_plugin_react_preamble_installed__ = true
        </script>
        <?php
    }
}

// add_action('wp_head', 'novatheme_vite_head_preamble');
/*----------------------- END OF VITE HMR PREAMBLE -----------------------*/


/*
|--------------------------------------------------------------------------
| ASSETS ENQUEUING START
|--------------------------------------------------------------------------
| Main function to register and enqueue scripts and styles for NovaTheme.
| It handles both Vite development server and production build modes.
*/
function novatheme_enqueue_scripts()
{
    if (IS_VITE_DEVELOPMENT) {

        /* --- DEVELOPMENT MODE (Vite) --- */

        // 1. Enqueue Vite client for HMR
        wp_enqueue_script('vite-client', 'http://localhost:3000/@vite/client', [], null, true);

        // Add type="module" filter for ES modules
        add_filter('script_loader_tag', function ($tag, $handle) {
            if ($handle === 'vite-client' || $handle === 'novatheme-main-js') {
                return str_replace('<script ', '<script type="module" ', $tag);
            }
            return $tag;
        }, 10, 2);

        // 2. Enqueue main JS entry point from source (main.jsx)
        wp_enqueue_script('novatheme-main-js', 'http://localhost:3000/src/js/main.jsx', [], null, true);

    } else {

        /* --- PRODUCTION MODE (Bundled assets from manifest) --- */

        $manifest_path = get_theme_file_path('assets/.vite/manifest.json');

        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);

            if ($manifest) {
                // 1. Подключаем JS
                if (isset($manifest['src/js/main.jsx'])) {
                    $main_js = $manifest['src/js/main.jsx'];

                    wp_enqueue_script('novatheme-main-js', get_theme_file_uri('assets/' . $main_js['file']), [], THEME_VERSION, true);

                    // 2. Подключаем CSS, который привязан к этому JS
                    if (isset($main_js['css'])) {
                        foreach ($main_js['css'] as $css_file) {
                            wp_enqueue_style('novatheme-main-style', get_theme_file_uri('assets/' . $css_file), [], THEME_VERSION);
                        }
                    }

                    // Фильтр для type="module"
                    add_filter('script_loader_tag', function ($tag, $handle) {
                        if ($handle === 'novatheme-main-js') {
                            return str_replace('<script ', '<script type="module" ', $tag);
                        }
                        return $tag;
                    }, 10, 2);
                }
            }
        }
    }
}

add_action('wp_enqueue_scripts', 'novatheme_enqueue_scripts');
/*----------------------- END OF ASSETS ENQUEUING -----------------------*/


/*
|--------------------------------------------------------------------------
| MENUS REGISTRATION
|--------------------------------------------------------------------------
| Function to register navigation menu locations for NovaTheme.
| This allows assigning menus via the WordPress admin panel.
*/
function novaTheme_register_menus()
{
    register_nav_menus(array(
            'main-menu' => 'Main Menu',
            'footer-menu' => 'Footer Menu'
    ));
}

add_action('after_setup_theme', 'novaTheme_register_menus');
/*----------------------- END MENUS REGISTRATION -----------------------*/


/*
|--------------------------------------------------------------------------
| THEME SUPPORT: CUSTOM LOGO
|--------------------------------------------------------------------------
| Enables support for a custom logo in NovaTheme.
| Allows uploading and managing the site logo via the WordPress customizer.
*/
function novaTheme_setup()
{
    add_theme_support('custom-logo', array(
//            'height'      => 100,
//            'width'       => 300,
            'flex-height' => true,
            'flex-width' => true,
    ));
}

add_action('after_setup_theme', 'novaTheme_setup');
/*----------------------- END THEME SUPPORT: CUSTOM LOGO -----------------------*/


/*
|--------------------------------------------------------------------------
| BEM CLASSES FOR MAIN NAVIGATION MENU
|--------------------------------------------------------------------------
| Adds full BEM-style classes to the main navigation menu:
|  - <ul> uses 'header__menu-list' (set via 'menu_class' in wp_nav_menu)
|  - <li> items get 'header__menu-item'
|  - <a> links get 'header__menu-link'
|  - Active <li> items get 'header__menu-item--active'
| This ensures clean and consistent BEM markup for styling.
*/
function novaTheme_bem_menu_classes($classes, $item, $args)
{
    // Only modify the main-menu
    if ($args->theme_location === 'main-menu') {
        // Add class to <li>
        $classes[] = 'header__menu-item';

        // Add active modifier if current menu item
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'header__menu-item--active';
        }
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'novaTheme_bem_menu_classes', 10, 3);

/*
|--------------------------------------------------------------------------
| BEM CLASS FOR MENU LINKS <a>
|--------------------------------------------------------------------------
| Adds 'header__menu-link' class to <a> elements in the main navigation.
*/
function novaTheme_bem_menu_link_class($atts, $item, $args)
{
    if ($args->theme_location === 'main-menu') {
        $atts['class'] = 'header__menu-link';
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'novaTheme_bem_menu_link_class', 10, 3);
/*----------------------- END BEM MENU CLASSES -----------------------*/


/*
|--------------------------------------------------------------------------
| CUSTOM POST TYPES REGISTRATION
|--------------------------------------------------------------------------
| Includes the file that registers all custom post types for this theme.
| For example: Main Banners, Portfolio, Services, etc.
| Keeping this separate ensures a cleaner functions.php file.
*/
require_once get_parent_theme_file_path('/inc/cpt.php');

/*----------------------- END CPT REGISTRATION -----------------------*/


/*
|--------------------------------------------------------------------------
| THEME COMPONENTS & RENDERERS
|--------------------------------------------------------------------------
| Includes helper functions for rendering various theme components.
| 'main-banner.php' handles the logic and HTML output for the Hero section.
| This keeps template files clean and focuses on logic reuse.
*/
require_once get_parent_theme_file_path('/inc/main-banner.php');

/*----------------------- END THEME COMPONENTS -----------------------*/


/*
|--------------------------------------------------------------------------
| ENABLE FEATURED IMAGES
|--------------------------------------------------------------------------
| Adds support for post thumbnails (featured images) across the site.
| This is required for the 'thumbnail' support in custom post types.
| Essential for displaying banner images and post previews.
*/
add_theme_support('post-thumbnails');
/*----------------------- END THEME SUPPORTS -----------------------*/


function dump($data)
{
    echo '<pre style="background-color: black; color: greenyellow; padding: 20px">';
    print_r($data);
    echo '</pre>';
}