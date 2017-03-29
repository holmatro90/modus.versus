<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modus
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><?php if (!dynamic_sidebar('footer-1')) : ?>
                <?php endif; // end footer widget area ?>
            </div>
            <div class="col-sm-2"><?php if (!dynamic_sidebar('footer-2')) : ?>
                <?php endif; // end footer widget area ?>
            </div>
            <div class="col-sm-2"><?php if (!dynamic_sidebar('footer-3')) : ?>
                <?php endif; // end footer widget area ?>
            </div>
            <div class="col-sm-4"><?php if (!dynamic_sidebar('footer-4')) : ?>
                <?php endif; // end footer widget area ?>
            </div>
            <div class="social">
                <?php ct_modus_social_icons_output(); ?>
            </div>
        </div>
    </div><!--end .container-->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php get_template_directory('/js/progres-bar.js'); ?>"></script>
</body>
</html>
