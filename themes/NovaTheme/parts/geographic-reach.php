<section class="geographic-reach">
    <?php if ($map = get_field('map')): ?>
        <?php echo wp_get_attachment_image(
                $map['ID'],
                'full',
                false,
                ['class' => 'geographic-reach__map']
        ) ?>
    <?php endif; ?>


    <?php if (have_rows('map_markers')): ?>
        <?php while (have_rows('map_markers')): the_row();
            $country = get_sub_field('country');
            $tooltip = get_sub_field('tooltip');
            $x = get_sub_field('x_coordinate');
            $y = get_sub_field('y_coordinate');
            $marker = get_sub_field('marker'); ?>

            <div class="geographic-reach__item"
                 style="position: absolute;
                         top: <?php echo $y; ?>%;
                         left: <?php echo $x; ?>%;
                         transform: translate(-50%, -50%);"
            >
                <?php if ($country): ?>
                    <p><?php echo $country; ?></p>
                <?php endif; ?>
                <?php echo wp_get_attachment_image(
                        $marker['ID'],
                        'thumbnail',
                        false,
                        ['class' => 'geographic-reach__marker']
                ) ?>
                <?php if ($tooltip): ?>
                    <div class="geographic-reach__tooltip">
                        <?php echo $tooltip; ?>
                    </div>
                <?php endif; ?>
            </div>


        <?php endwhile; ?>
    <?php endif; ?>


</section>