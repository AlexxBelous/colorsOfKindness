<section class="home-intro">
    <div class="container">
        <div class="home-intro__wrapper">

            <div class="home-intro__content">
                <div class="home-intro__body">
                    <?php if ($intro_title = get_field('intro_title')): ?>
                        <h1 class="home-intro__title">
                            <?php echo $intro_title; ?>
                        </h1>
                    <?php endif; ?>

                    <?php $ui_button_field = get_field('link_btn');
                    if (!empty($ui_button_field) && is_array($ui_button_field) && !empty($ui_button_field['button'])):

                        $button_data = $ui_button_field['button'];
                        $link = $button_data['link_button'] ?? null;
                        $style = $button_data['button_styles'] ?? 'primary';
                        if (!empty($link) && !empty($link['url'])): ?>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               class="btn btn--<?php echo esc_attr($style); ?> home-intro__btn"
                                    <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif;
                    endif; ?>
                </div>
            </div>

            <div class="home-intro__info">
                <div class="home-intro__brush">
                    <?php
                    $intro_image = get_field('intro_image');
                    if ($intro_image):
                        $image_id = is_array($intro_image) ? $intro_image['ID'] : $intro_image;
                        echo wp_get_attachment_image(
                                $image_id,
                                'full',
                                false,
                                array('class' => 'home-intro__bg-img')
                        );
                    endif;
                    ?>

                    <?php if ($intro_text = get_field('intro_text')): ?>
                        <div class="home-intro__text">
                            <?php echo $intro_text; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php
                if (!empty($ui_button_field) && is_array($ui_button_field) && !empty($ui_button_field['button'])):
                    $button_data = $ui_button_field['button'];
                    $link = $button_data['link_button'] ?? null;
                    $style = $button_data['button_styles'] ?? 'primary';

                    if (!empty($link) && !empty($link['url'])): ?>
                        <a href="<?php echo esc_url($link['url']); ?>"
                           class="btn btn--<?php echo esc_attr($style); ?> home-intro__info-btn"
                                <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    <?php endif;
                endif; ?>
            </div>

        </div>
    </div>

    <div class="home-intro__divider"></div>
</section>