<?php $type = get_field('activation_type'); ?>
<section class="geographic-reach geographic-reach--activation-<?php echo esc_attr($type) ?>">
    <div class="geographic-reach__map-container">
        <?php if ($map = get_field('map')): ?>
            <?php echo wp_get_attachment_image(
                    $map['ID'],
                    'full',
                    false,
                    ['class' => 'geographic-reach__map']
            ) ?>
        <?php endif; ?>

        <?php if (have_rows('map_markers')) : ?>
            <div class="geographic-reach__markers">
                <?php while (have_rows('map_markers')): the_row();
                    $country = get_sub_field('country');
                    $marker = get_sub_field('marker');
                    $x = get_sub_field('x_coordinate');
                    $y = get_sub_field('y_coordinate');
                    $tooltip = get_sub_field('tooltip'); ?>
                    <div class="geographic-reach__marker" style="left: <?php echo $x; ?>%; top: <?php echo $y; ?>%">
                        <?php if ($country): ?>
                            <p class="geographic-reach__label"><?php echo $country; ?></p>
                        <?php endif; ?>
                        <?php if ($marker) {
                            echo wp_get_attachment_image(
                                    $marker['ID'],
                                    'thumbnail',
                                    false,
                                    ['class' => 'geographic-reach__pin']
                            );
                        } ?>
                        <?php if ($tooltip): ?>
                            <div class="geographic-reach__tooltip">
                                <?php echo $tooltip; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>

            </div>
        <?php endif; ?>

        <?php if ($btn_geographic = get_field('btn_geographic')): ?>
            <?php if ($btn_geographic['element_type'] === 'Button Elements' && !empty($btn_geographic['button']['link_button'])):
                $link = $btn_geographic['button']['link_button'];
                $style = $btn_geographic['button']['button_styles'];


                if (!empty($link['url'])):
                    $link_target = !empty($link['target']) ? $link['target'] : '_self';
                    ?>
                    <div class="geographic-reach__btn">
                        <a class="btn btn--<?php echo esc_attr($style); ?>"
                           href="<?php echo esc_url($link['url']); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>