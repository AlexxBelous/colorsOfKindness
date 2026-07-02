<?php
/**
 * Template Name: News
 */

get_header(); ?>

<main>
	<?php get_template_part( 'parts/news', 'list' ); ?>
	<?php get_template_part( 'parts/news', 'slider' ); ?>
	<?php get_template_part( 'parts/news', 'media' ) ?>
</main>

<?php get_footer(); ?>