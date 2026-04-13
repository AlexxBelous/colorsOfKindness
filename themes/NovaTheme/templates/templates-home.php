<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

<main>
    <section class="home-hero">
        <div class="full">
            <?php novatheme_render_hero_banner(); ?>
        </div>
    </section>
    <?php get_template_part('parts/home', 'intro'); ?>
</main>


<?php get_footer(); ?>

