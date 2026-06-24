<section class="adaptation">

	<?php if ( $adaptation_title = get_field( 'adaptation_title' ) ) : ?>
		<h6 class="adaptation__title">
			<?php echo $adaptation_title; ?>
		</h6>
	<?php endif; ?>

	<?php if ( have_rows( 'adaptation_cards' ) ) : ?>
		<div class="adaptation__cards">

			<?php while ( have_rows( 'adaptation_cards' ) ) :
				the_row();

				$card_color = get_sub_field( 'card_color' );
				$card_title = get_sub_field( 'card_title' );
				$card_subtitle = get_sub_field( 'card_subtitle' );
				$color_line = get_sub_field( 'color_line' );
				$title_list = get_sub_field( 'title_list' );
				$list = get_sub_field( 'list' );
				?>

				<div class="adaptation__card" style="background: <?php echo esc_attr( $card_color ); ?>">

					<?php if ( $card_title ) : ?>
						<h2 class="adaptation__card-title">
							<?php echo $card_title; ?>
						</h2>
					<?php endif; ?>

					<?php if ( $card_subtitle ) : ?>
						<div class="adaptation__card-subtitle">
							<?php echo $card_subtitle; ?>
						</div>
					<?php endif; ?>
					<?php if ( $color_line ) : ?>
						<div class="adaptation__card-line" style="background: <?php echo esc_attr( $color_line ); ?>"></div>
					<?php endif; ?>

					<?php if ( $title_list ) : ?>
						<h4 class="adaptation__card-list-title">
							<?php echo $title_list; ?>
						</h4>
					<?php endif; ?>

					<?php if ( $list ) : ?>
						<ul class="adaptation__card-list">
							<?php foreach ( $list as $item ) : ?>
								<li class="adaptation__card-list-item">
									<?php echo $item['list_item']; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

				</div>

			<?php endwhile; ?>

		</div>
	<?php endif; ?>

</section>