<?php
/* Template Name: Homepage Template */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <div class="row">
                    <?php get_template_part('inc/slider'); ?>
                    <section class="services">
                        <div class="top-ser">

                        </div>
                        <ul class="row">
                            <?php
                            $args = array(
                                'post_type' => 'Services',
                                'posts_per_page' => 4,
                            );
                            $servicePosts = new WP_Query($args);
                            if ($servicePosts->have_posts()) :
                                while ($servicePosts->have_posts()) : $servicePosts->the_post();
                                    ?>
                                    <li class="col-xs-6 col-sm-4 col-md-3">
                                        <h3 class="our-ser"><?php echo get_the_title($post) ?></h3>
                                        <?php the_content(); ?>
                                        <a class="more" href="<?php the_permalink(); ?>">
                                            read more
                                        </a>
                                    </li>
                                <?php endwhile; ?>

                            <?php endif;
                            wp_reset_postdata();
                            ?>
                        </ul>

                    </section>
                    <section class="why-modus">

                    </section>
                    <section class="clients">

                    </section>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
