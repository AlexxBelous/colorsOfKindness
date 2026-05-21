<section class="methodologies">
    <!--    --><?php //$ui_elements_clouds = get_field('ui_elements_clouds'); dump($ui_elements_clouds);?>
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