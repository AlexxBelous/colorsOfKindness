<?php
$section_bg = get_field('section_bg');
$style_attr = !empty($section_bg) ? ' style="background-color: ' . esc_attr($section_bg) . ';"' : '';
?>

<section class="about-organization"<?php echo $style_attr; ?>>
    <div class="container">
        <div class="about-organization__inner">
            <div class="about-organization__block">
                <?php if ($text_block = get_field('text_block')): ?>
                    <?php echo $text_block ?>
                <?php endif; ?>
            </div>
            <?php if ($image = get_field('image')): ?>
                <div class="about-organization__wrapper">
                    <?php echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            ['class' => 'about-organization__image']
                    ) ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>