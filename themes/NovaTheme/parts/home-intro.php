<section class="home-intro">
    <div class="container">
        <div class="home-intro__wrapper">
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
            <div class="home-intro__content">
                <?php if ($intro_title = get_field('intro_title')): ?>
                    <h1 class="home-intro__title">
                        <?php echo $intro_title; ?>
                    </h1>
                <?php endif; ?>


                <?php
                $link = get_field('intro_button_link_button');
                $style = get_field('intro_button_button_styles');
                if ($link): ?>
                    <a href="<?php echo esc_url($link['url']); ?>"
                       class="home-intro__btn home-intro__btn-<?php echo esc_attr($style); ?>"
                            <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endif; ?>


            </div>

            <div class="home-intro__description-container">
                <div class="home-intro__text-brush">
                    <?php if ($intro_text = get_field('intro_text')): ?>
                        <div class="home-intro__text">
                            <?php echo $intro_text; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <div class="home-intro__divider"></div>
</section>