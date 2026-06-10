<?php
/**
 * Template Name: About Us
 */

get_header(); ?>

    <main>
        <section class="about-hero">

            <?php
            if (($element_ui = get_field('clouds_ui')) && !empty($element_ui['element_type'])) {
                $clouds_list = $element_ui['clouds_settings']['clouds_list'];

                if (!empty($clouds_list)) {
                    foreach ($clouds_list as $cloud) {

                        $class = $cloud['cloud_data'];
                        $cloud_image = $cloud['cloud_image'];

                        if ($cloud_image) {
                            echo wp_get_attachment_image(
                                    $cloud_image['ID'],
                                    'full',
                                    false,
                                    ['class' => 'about-hero__cloud ' . $class]
                            );
                        }
                    }
                }
            }
            ?>

            <div class="container">
                <div class="about-hero__inner">

                    <div class="about-hero__left">
                        <?php if ($image = get_field('hero_image')): ?>
                            <div class="about-hero__left-image">
                                <?php echo wp_get_attachment_image(
                                        $image['ID'],
                                        'full',
                                        false,
                                        ['class' => 'about-hero__image']
                                ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="about-hero__right">

                        <div class="about-hero__wrapper-img">
                            <?php if ($decor = get_field('decorative_image')) {
                                echo wp_get_attachment_image(
                                        $decor['ID'],
                                        'full',
                                        false,
                                        ['class' => 'about-hero__decor-image']
                                );
                            } ?>
                            <img class="about-hero__image" src="" alt="">
                        </div>

                        <div class="about-hero__info" style="display: none">
                            <?php if ($title = get_field('main_title')): ?>
                                <h3 class="about-hero__title"><?php echo $title ?></h3>
                            <?php endif; ?>
                            <?php if ($text = get_field('text')) : ?>
                                <p class="about-hero__text"><?php echo $text; ?></p>
                            <?php endif; ?>
                            <?php if ($link = get_field('link')):
                                $link_title = $link['title'];
                                $url = $link['url']; ?>
                                <a class="about-hero__link" href="<?php echo $url; ?>"><?php echo $link_title ?></a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>

        </section>
    </main>

<?php get_footer(); ?>