<section class="geographic-reach">
    <?php if ($map = get_field('map')): ?>
        <?php echo wp_get_attachment_image(
                $map['ID'],
                'full',
                false,
                ['class' => 'geographic-reach__map']
        ) ?>
    <?php endif; ?>

</section>