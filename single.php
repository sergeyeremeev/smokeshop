<?php
/**
 * The template for displaying all single posts.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <div class="container">
                <div class="post-image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <div class="post-meta">
                    <div class="post-author">
                        <i class="user-icon"></i>
                        <span class="author"><?php the_author(); ?></span>
                    </div>
                    <div class="post-date">
                        <i class="clock-icon"></i>
                        <span class="date"><?php echo get_the_date('F jS'); ?></span>
                    </div>
                    <div class="share right">
                        <a href="#" class="share-btn"></a>
                    </div>
                </div>

                <div class="page-content">
                    <?php the_content(); ?>
                </div>

                <div class="navigation">
                    <span class="prev"></span><span class="next"></span>
                    <?php previous_post_link('<span class="left">%link</span>', 'Previous'); ?>
                    <?php next_post_link('<span class="right">%link</span>', 'Next'); ?>
                </div>
            </div>


        <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->


<?php get_footer(); ?>
