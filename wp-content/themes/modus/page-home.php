<?php
/* Template Name: Homepage Template */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php get_template_part('inc/slider'); ?>
            <div class="container">
                <div class="row">

                    <section class="services">
                        <div class="container">
                            <?php if (!dynamic_sidebar('main-1')) : ?>
                            <?php endif; // end widget area ?>
                            <ul class="row our-service">
                                <?php
                                $args = array(
                                    'post_type' => 'Services',
                                    'posts_per_page' => 4,
                                );
                                $servicePosts = new WP_Query($args);
                                if ($servicePosts->have_posts()) :
                                    while ($servicePosts->have_posts()) : $servicePosts->the_post();
                                        ?>
                                        <li class="col-xs-12 col-sm-3 ">
                                            <i class="<?php echo get_post_meta(get_the_ID(), 'fa', true); ?>"
                                               aria-hidden="true"></i>
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
                        </div>
                </div>

                </section>
                <section class="why-modus">
                    <div class="container">
                        <div class="row">
                            <?php if (!dynamic_sidebar('main-2')) : ?>
                            <?php endif; // end widget area ?>
                        </div>
                    </div>
                </section>
                <section class="clients">
                    <div class="row">
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <div id="suspendisse" class="progres"></div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div id="maecenas" class="progres"></div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div id="aliquam" class="progres"></div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div id="habitasse" class="progres"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">

                        </div>

                    </div>
                </section>
                <section class="section-client">
                    <div class="container">
                        <?php echo do_shortcode('[logo_carousel_slider slider_title = "Our Happy Clients"]'); ?>
                    </div>
                </section>
            </div>
    </div>
    </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
