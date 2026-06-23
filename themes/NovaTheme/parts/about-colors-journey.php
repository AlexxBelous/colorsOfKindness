<section class="colors-journey">
	<div class="container">
		<div class="colors-journey__inner">
			<?php if ( $title = get_field( 'journey_title' ) ) : ?>
				<h6 class="colors-journey__title"><?php echo $title ?></h6>
			<?php endif; ?>
			<?php if ( $text = get_field( 'journey_description' ) ) : ?>
				<div class="colors-journey__text">
					<?php echo $text; ?>
				</div>
			<?php endif; ?>

			<?php $journey_timeline = get_field( 'journey_timeline' ); ?>
			<?php if ( have_rows( 'journey_timeline' ) ) : ?>
				<div class="colors-journey__timeline">
					<?php while ( have_rows( 'journey_timeline' ) ) :
						the_row(); ?>
						<div class="colors-journey__block">
							<?php if ( $item_data = get_sub_field( 'item_date' ) ) : ?>
								<p class="colors-journey__date"><?php echo $item_data ?></p>
							<?php endif; ?>
							<?php if ( $item_text = get_sub_field( 'item_text' ) ) : ?>
								<?php echo $item_text ?>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>

				</div>
			<?php endif; ?>
		</div>
	</div>
</section>