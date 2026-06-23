<?php
$section_bg = get_field( 'bg_section' );
$style_attr = ! empty( $section_bg ) ? ' style="background-color: ' . esc_attr( $section_bg ) . ';"' : '';
?>

<section class="how-it-works-hero" <?php echo $style_attr ?>>
	<div class="container">
		<div class="how-it-works-hero__inner">
			<?php if ( $main_title = get_field( 'main_title' ) ) : ?>
				<h1><?php echo $main_title; ?></h1>
			<?php endif; ?>


			<?php if ( ( $clouds_decor_ui = get_field( 'clouds_decor' ) ) && ! empty( $clouds_decor_ui['element_type'] ) ) {
				$cloud_list = $clouds_decor_ui['clouds_settings']['clouds_list'];

				if ( ! empty( $cloud_list ) ) {
					foreach ( $cloud_list as $cloud ) {
						$class = $cloud['cloud_data'];
						$cloud_image = $cloud['cloud_image'];

						if ( $cloud_image ) {
							echo wp_get_attachment_image(
								$cloud_image['ID'],
								'full',
								false,
								[ 'class' => 'how-it-works-hero__image ' . $class ]
							);
						}
					}
				}
			}
			?>


			<?php if ( have_rows( 'cards_banner' ) ) : ?>
				<div class="how-it-works-hero__cards">
					<?php while ( have_rows( 'cards_banner' ) ) :
						the_row(); ?>


						<div class="how-it-works-hero__card">
							<?php if ( $image_card = get_sub_field( 'image_card' ) ) : ?>
								<div class="how-it-works-hero__card-image">
									<?php echo wp_get_attachment_image(
										$image_card['ID'],
										'full',
										false,
										[ 'class' => 'card-image' ]
									) ?>
								</div>
							<?php endif; ?>
							<?php if ( $title_card = get_sub_field( 'title_card' ) ) : ?>
								<h6><?php echo $title_card; ?></h6>
							<?php endif; ?>
							<?php if ( $text_card = get_sub_field( 'text_card' ) ) : ?>

								<?php echo $text_card; ?>

							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>