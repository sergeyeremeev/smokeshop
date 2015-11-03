<?php
/**
 * Template Name: Content Page
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="container">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
