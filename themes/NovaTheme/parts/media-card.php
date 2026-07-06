<?php
/**
 * Media Single Card Template
 */
?>
<div class="media__card">
	<h6 class="media__card-title"><?php the_title(); ?></h6>
	<p class="media__card-text">
		<?php
		$content = get_the_content();
		echo wp_trim_words( $content, 27, '...' );
		?>
	</p>
</div>