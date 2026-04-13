<?php

/*
|--------------------------------------------------------------------------
| HERO BANNER RENDERER
|--------------------------------------------------------------------------
| Fetches 'main_banner' posts and renders either a static image or a slider.
| Requires: Slick Slider JS/CSS if more than one banner exists.
*/

function novatheme_render_hero_banner() {
    $args = [
        'post_type'      => 'main_banner',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];

    $query = new WP_Query($args);

    if ( $query->have_posts() ) :
        $count = $query->post_count;
        $slider_class = ($count > 1) ? 'js-hero-slider' : 'is-static-banner';
        ?>

        <div class="hero-wrapper swiper <?php echo esc_attr($slider_class); ?>">
            <div class="swiper-wrapper">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>

                    <div class="hero-item swiper-slide" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
                        <div class="hero-content">
                            <h1><?php the_title(); ?></h1>
                            <div class="hero-description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

            <?php if ($count > 1) : ?>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php endif; ?>
        </div>

        <?php
        wp_reset_postdata();
    endif;
}