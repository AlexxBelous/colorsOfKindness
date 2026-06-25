<?php
/**
 * Template Name: News
 */

get_header(); ?>

<main>
	<?php get_template_part( 'parts/news', 'list' ); ?>
	<?php get_template_part( 'parts/news', 'slider' ); ?>
</main>

<?php get_footer(); ?>