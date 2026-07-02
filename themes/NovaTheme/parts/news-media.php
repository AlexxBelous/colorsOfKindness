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


			<?php
			$id_category = get_field( 'media_cards' );
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4,
				'post_status' => 'publish',
				'cat' => $id_category,
			);
			$media_query = new WP_Query( $args ); ?>


			<?php if ( $media_query->have_posts() ) : ?>
				<div class="media__cards">


					<?php while ( $media_query->have_posts() ) :
						$media_query->the_post(); ?>

						<div class="media__card">

							<h6 class="media__card-title"><?php the_title(); ?></h6>
							<p class="media__card-text">
								<?php
								$content = get_the_content();
								echo wp_trim_words( $content, 27, '...' );
								?>
							</p>


						</div>

					<?php endwhile; ?>

					<div class="media__action">
						<a href="#" id="load-more-media" class="media__btn" data-category="<?php echo $id_category; ?>"
							data-page="1">
							Load more
						</a>
					</div>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</section>