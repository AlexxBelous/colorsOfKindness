<?php
$bg_section = get_field( 'bg_section' );
$style_attr = ! empty( $bg_section ) ? ' style="background-color: ' . esc_attr( $bg_section ) . ';"' : '';
?>

<section class="slider" <?php echo $style_attr; ?>>
	<div class="container">
		<div class="slider__inner">

			<div class="slider__top">
				<?php if ( $title_slider = get_field( 'title_slider' ) ) : ?>
					<h4 class="slider__title">
						<?php echo esc_html( $title_slider ); ?>
					</h4>
				<?php endif; ?>

				<div class="slider__navigation">
					<div class="swiper-button-prev slider__btn slider__btn--prev"></div>
					<div class="swiper-button-next slider__btn slider__btn--next"></div>
				</div>
			</div>


			<?php if ( have_rows( 'slider' ) ) : ?>
				<div class="swiper js-news-slider">
					<div class="swiper-wrapper">

						<?php while ( have_rows( 'slider' ) ) :
							the_row(); ?>

							<div class="swiper-slide slider__card">

								<?php $image_slider = get_sub_field( 'image_slider' );
								if ( $image_slider ) : ?>
									<div class="slider__image-wrapper">
										<?php echo wp_get_attachment_image(
											$image_slider['ID'],
											'thumbnail',
											false,
											[ 'class' => 'slider__image' ]
										); ?>
									</div>
								<?php endif; ?>

								<?php $text_slider = get_sub_field( 'text_slider' );
								if ( $text_slider ) : ?>
									<p class="slider__text">
										<?php echo esc_html( $text_slider ); ?>
									</p>
								<?php endif; ?>

							</div>
						<?php endwhile; ?>

					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>