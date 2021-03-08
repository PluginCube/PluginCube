<?php
/**
 * Template Name: Full Width Template
 * Template Post Type: post, page
 *
 * @package PluginCube
 * @since 1.0.0
 */
?>

<?php get_header(); ?>
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                the_content();
            }
        }
    ?>
<?php get_footer(); ?>
