<section class="programs-goals">
    <div class="container">
        <div class="programs-goals__cards">
            <?php if (have_rows('program_cards')) : ?>
                <?php while (have_rows('program_cards')) : the_row();
                    $image = get_sub_field('image');
                    $text = get_sub_field('card_text');
                    $bg_color = get_sub_field('card_bg'); ?>
                    <div class="card programs-goals__card"
                         style="background-color: <?php echo esc_attr($bg_color); ?>">
                        <div class="card__image">
                            <?php if ($image) : ?>
                                <?php echo wp_get_attachment_image(
                                        $image['ID'],
                                        'medium',
                                        false,
                                        array(
                                                'class' => 'card__img'
                                        )
                                ); ?>
                            <?php endif; ?>
                        </div>
                        <?php if ($text) : ?>
                            <p class="card__text">
                                <?php echo esc_html($text); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>