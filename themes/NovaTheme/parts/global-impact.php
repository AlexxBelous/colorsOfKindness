<section class="global-impact">
    <div class="container">


        <?php if ($btn_data = get_field('ui_elements_button')):
            $link = $btn_data['link_button'];
            if ($link): ?>
                <div class="global-impact__btn">
                    <a href="<?php echo esc_url($link['url']); ?>"
                       class="btn btn--<?php echo esc_attr($btn_data['button_styles']); ?>"
                       target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($title = get_field('title')): ?>
            <h4 class="global-impact__title"><?php echo $title ?></h4>
        <?php endif; ?>

        <?php if (have_rows('list_number')): ?>
            <div class="global-impact__list">
                <?php while (have_rows('list_number')): the_row(); ?>
                    <div class="global-impact__item">
                        <?php if ($item_number = get_sub_field('item_number')): ?>
                            <h3 class="global-impact__item-number"><?php echo $item_number; ?></h3>
                        <?php endif ?>
                        <?php if ($subtitle = get_sub_field('item_sub_title')): ?>
                            <p class="global-impact__item-subtitle"><?php echo $subtitle ?></p>
                        <?php endif; ?>
                        <?php if ($item_text = get_sub_field('item_title')): ?>
                            <p class="global-impact__item-text"><?php echo $item_text; ?></p>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

</section>