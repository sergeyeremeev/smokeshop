<?php
/**
 * Template Name: Coming soon
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="coming-soon-section">
                    <div class="coming-soon-content">
                        <h2>Our online shop <span class="bold">is coming soon!</span></h2>
                        <?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 9 ); } ?>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
