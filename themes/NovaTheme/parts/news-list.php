<section class="news">
	<div class="news__inner">

		<?php if ( $hero_image = get_field( 'hero_image' ) ) : ?>
			<div class="news__image-wrapper">
				<?php echo wp_get_attachment_image(
					$hero_image['ID'],
					'full',
					false,
					[ 'class' => 'news__img' ]
				) ?>
			</div>
		<?php endif; ?>

		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'post_status' => 'publish'
		);

		$lasts_post_query = new WP_Query( $args );

		if ( $lasts_post_query->have_posts() ) :
			while ( $lasts_post_query->have_posts() ) :
				$lasts_post_query->the_post();
				?>

				<div class="news__posts">
					<div class="news__posts-wrapper">


						<span class="news__post-subtitle">Last news</span>
						<h4 class="news__post-title"><?php the_title(); ?></h4>
						<?php $content = get_the_content(); ?>
						<div class="news__post-content"><?php echo wp_trim_words( $content, 20 ); ?></div>


						<div class="news__post-meta">
							<div class="news__post-meta-info">
								<span class="news__post-category">
									<?php echo get_the_category_list( ', ' ); ?>
								</span>
								<span class="news__post-date">
									<?php echo get_the_date( 'M j Y' ); ?>
								</span>
								</>
							</div>
							<a href="<?php the_permalink(); ?>" class="news__post-link"></a>
						</div>
					</div>
				</div>


				<?php
			endwhile;


			wp_reset_postdata();
		endif;
		?>

	</div>
</section>