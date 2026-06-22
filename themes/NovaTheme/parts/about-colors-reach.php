<section class="colors-reach">
	<div class="container">
		<?php if ( have_rows( 'reach_items' ) ) : ?>
			<div class="colors-reach__items">
				<?php while ( have_rows( 'reach_items' ) ) :
					the_row(); ?>

					<div class="colors-reach__item">
						<div class="colors-reach__meta">

							<?php if ( $item_note = get_sub_field( 'item_note' ) ) : ?>
								<h6 class="colors-reach__note">
									<?php echo esc_html( $item_note ); ?>
								</h6>
							<?php endif; ?>

							<div class="colors-reach__meta-body">

								<?php if ( $item_number = get_sub_field( 'item_number' ) ) : ?>
									<span class="colors-reach__number">
										<?php echo esc_html( $item_number ); ?>
									</span>
								<?php endif; ?>

								<?php if ( $item_label = get_sub_field( 'item_label' ) ) : ?>
									<span class="colors-reach__label">
										<?php echo esc_html( $item_label ); ?>
									</span>
								<?php endif; ?>

							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>