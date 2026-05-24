<section class="methodologies">
    <?php if (have_rows('ui_elements_clouds')) : ?>
        <?php while (have_rows('ui_elements_clouds')) : the_row(); ?>

            <?php if (have_rows('clouds_settings')) :
                while (have_rows('clouds_settings')) : the_row();
                    if (have_rows('clouds_list')) : ?>
                            <?php while (have_rows('clouds_list')) : the_row();
                                $cloud_image = get_sub_field('cloud_image');
                                $cloud_data = get_sub_field('cloud_data');
                                ?>

                                <?php if ($cloud_image) : ?>
                                    <div class="cloud-item <?php echo esc_attr($cloud_data); ?>">
                                        <img src="<?php echo esc_url($cloud_image['url']); ?>"
                                             alt="<?php echo esc_attr($cloud_image['alt']); ?>"
                                             width="<?php echo esc_attr($cloud_image['width']); ?>"
                                             height="<?php echo esc_attr($cloud_image['height']); ?>">
                                    </div>
                                <?php endif; ?>

                            <?php endwhile; ?>
                    <?php endif;

                endwhile;
            endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>



    <div class="container">
        <div class="methodologies__inner">
            <?php if ($meth_title = get_field('meth_title')): ?>
                <h6 class="methodologies__title"><?php echo $meth_title; ?></h6>
            <?php endif; ?>

            <?php if (have_rows('meth_grid')): ?>
                <div class="methodologies__grid">
                    <?php while (have_rows('meth_grid')): the_row();

                        $meth_text = get_sub_field('meth_text');
                        ?>
                        <div class="methodologies-box">
                            <div class="methodologies-box__icon">
                                <?php if ($meth_icon = get_sub_field('meth_icon')) {
                                    echo wp_get_attachment_image(
                                            $meth_icon['ID'],
                                            'thumbnail',
                                            false,
                                            [
                                                    'class' => 'methodologies-box__image',
                                                    'alt' => 'icon'
                                            ]
                                    );
                                } ?>
                            </div>
                            <?php if ($meth_text = get_sub_field('meth_text')): ?>
                                <div class="methodologies-box__text">
                                    <p><?php echo $meth_text; ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>