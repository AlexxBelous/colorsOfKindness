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


		</div>
	</div>
</section>