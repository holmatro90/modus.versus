<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package modus
 */
get_header();
get_template_part( 'template-parts/page-title');?>

    <main class="section section-team primary-content">
        <div class="container">
            <?php
            if ( have_posts() ) :
                while (  have_posts() ) : the_post();?>
                    <h3 class="photo-wrapper">
                        <?php the_post_thumbnail(); ?>
                    </h3>

                    <?php the_content(); ?>
                    <p><?php the_content(); ?></p>
                <?php  endwhile; // End of the loop.
            endif;
            ?>
        </div><!-- .container -->
    </main><!-- #main -->


<?php
get_footer();