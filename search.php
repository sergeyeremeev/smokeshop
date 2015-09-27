<?php
/**
 * The template for displaying search results pages.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="search-container">
                <div class="container">
                    <div class="search-box">
                        <div class="search-page-form">
                            <div class="search-menu"><span></span><span></span><span></span></div>
                            <?php get_search_form(); ?>
                            <div class="clear-menu"><span>X</span></div>
                        </div>
                        <div class="search-results">
                            <?php if ( have_posts() ) : ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                <div class="search-result-single">
                                    <div class="search-result-info">
                                        <h2><?php the_title(); ?> <a href="<?php the_permalink(); ?>">read more</a></h2>
                                        <span class="address"><span class="icon"></span><span class="text"><?php the_field('full_address'); ?></span></span>
                                        <span class="open-hours">
                                            <span class="icon"></span>
                                            <span class="text">
                                                <?php the_field('open_hours_1'); ?>
                                                <?php if ( get_field('open_hours_2') ) { ?>
                                                    <span class="open-hours-optional"><?php the_field('open_hours_2'); ?></span>
                                                <?php } ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="search-result-image">
                                        <img src="<?php the_field('shop_image'); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="no-results-msg">
                                    <span>No Results</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="search-footer">
                            <span>Showing results <span class="results-count"></span></span>
                            <div class="controls">
                                <div class="left"></div>
                                <div class="right"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-map">
                    <?php echo do_shortcode('[put_wpgm id=7]'); ?>
                </div>
                <div class="search-results-mobile">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="search-result-single-mobile">
                            <a href="<?php the_permalink(); ?>">
                                <span class="address"><span class="icon"></span>
                                    <span class="text"><h2><?php the_title(); ?></h2><?php the_field('full_address'); ?></span>
                                </span>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="no-results-msg-mobile">
                            <span>No Results</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="page-subscribe-module">
                <div class="container">
                    <h2>BE THE FIRST TO GET EXCLUSIVES AND DISCOUNTS FROM US!</h2>
                    <?php
                        if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); }
                    ?>
                </div>
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->
<?php get_footer(); ?>
