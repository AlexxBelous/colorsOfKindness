<?php
$media_bg = get_field( 'media_bg' );
$style_attr = ! empty( $media_bg ) ? ' style="background-color: ' . esc_attr( $media_bg ) . ';"' : '';
?>

<section class="media" <?php echo $style_attr; ?>>
	<div class="container">
		<div class="media__inner">
			<?php if ( $media_title = get_field( 'media_title' ) ) : ?>
				<h4 class="media__title"><?php echo $media_title ?></h4>
			<?php endif; ?>

			<?php $category_id = get_field( 'media_cards' );
			$args = [
				'post_type' => 'post',
				'posts_per_page' => MEDIA_INITIAL_POSTS,
				'post_status' => 'publish',
				'cat' => $category_id
			];

			$media_query = new WP_Query( $args );
			if ( $media_query->have_posts() ) : ?>
				<div class="media__cards">
					<?php while ( $media_query->have_posts() ) :
						$media_query->the_post(); ?>
						<?php get_template_part( 'parts/media', 'card' ) ?>
					<?php endwhile ?>
				</div>
				<div class="media__action">
					<button type="button" id="load-more-media" class="media__btn">Load More</button>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>


		</div>
	</div>
</section>