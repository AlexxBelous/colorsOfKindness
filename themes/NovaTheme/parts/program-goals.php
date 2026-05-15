<section class="programs-goals">
    <?php
    $ui_elements = get_field('ui_elements');

    if ($ui_elements && $ui_elements['element_type'] == 'Elements of strokes') {
        $brush = $ui_elements['brush'];
        if (!empty($brush['brush_image'])) {
            $image_html = wp_get_attachment_image(
                    $brush['brush_image']['ID'],
                    'full',
                    false,
                    array('class' => 'decoration-img')
            );
            echo $image_html;
        }
    }
    ?>
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