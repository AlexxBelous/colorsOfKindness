<?php
/**
 * Template Name: About Us
 */

get_header(); ?>

    <main>
        <?php get_template_part('parts/about', 'hero' ); ?>
        <?php get_template_part('parts/about', 'organization' ); ?>
        <?php get_template_part('parts/about-colors', 'journey' ); ?>
    </main>

<?php get_footer(); ?>