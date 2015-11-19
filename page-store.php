<?php
/**
 * Template Name: Store Page
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="store-banner" style="background: url(<?php the_field('page_banner'); ?>) no-repeat;">
                    <div class="container">
                        <span class="banner-text-1"><?php the_field('banner_text_1'); ?></span>
                        <span class="banner-text-2"><?php the_field('banner_text_2'); ?></span>
                    </div>
                </div>
                <div class="page-content-1">
                    <div class="container">
                        <?php the_field('content_1'); ?>
                    </div>
                </div>
                <div class="page-content-2">
                    <div class="container">
                        <?php the_field('content_2'); ?>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>