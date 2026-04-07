<?php get_header(); ?>
    <main id="primary" class="site-main">
        <div class="container">
<!--            <div id="root"></div>-->
            <?php if ( have_posts() ) :


                while ( have_posts() ) :
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php body_class(); ?>>
                        <header class="entry-header">

                        </header>

                        <div class="entry-content">
                            <?php
                            // Выводит либо весь текст, либо краткое описание (excerpt)
                            the_excerpt();
                            ?>
                        </div>
                    </article>

                <?php endwhile; // Конец цикла

                // Навигация (следующая/предыдущая страница)
                the_posts_navigation();

            else :
                // Если постов нет вообще
                echo '<p>Контент не найден.</p>';

            endif;
            ?>

        </div>
    </main>

<?php
// Подключаем footer.php
get_footer();