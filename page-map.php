<?php
/**
 * Template Name: Map Page
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="our-shops-banner">
                <h2>Our Shops</h2>
            </div>
            <div class="search-container">
                <div class="container">
                    <div class="search-box">
                        <div id="shop-search" class="search-page-form">
                            <div class="search-menu"><span></span><span></span><span></span></div>
                            <?php get_search_form(); ?>
                            <div class="clear-menu"><span></span></div>
                        </div>
                        <div class="search-results">
                            <?php
                                $args = array('post_type' => 'locations', 'posts_per_page' => -1);
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                                <div class="search-result-single">
                                    <div class="search-result-info">
                                        <a href="<?php the_permalink(); ?>"><h2><span><?php the_field('short_address'); ?></span></h2></a>
                                        <span class="address"><span class="icon"></span><span class="text"><?php the_field('full_address'); ?></span></span>
                                        <span class="phone"><span class="icon"></span><span class="text"><?php the_field('phone_number'); ?></span></span>
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
                                    <a href="<?php the_permalink(); ?>" class="learn-more">learn more</a>
                                </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata(); 
                                ?>
                        </div>
                        <div class="search-footer">
                            <span>Showing results <span class="results-count"></span></span>
                            <div class="controls">
                                <div class="left">&lt;</div>
                                <div class="right">&gt;</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-map">
                    <?php echo do_shortcode('[put_wpgm id=7 marker category name]'); ?>
                </div>
                <div class="search-results-mobile">
                    <?php
                        $args = array('post_type' => 'locations');
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        if (get_field('short_address') !== '') {
                    ?>
                        <div class="search-result-single-mobile">
                            <a href="<?php the_permalink(); ?>">
                                <span class="address"><span class="icon"></span>
                                    <span class="text"><h2><?php the_title(); ?></h2><?php the_field('full_address'); ?></span>
                                </span>
                            </a>
                        </div>
                        <?php }
                              endwhile;
                              wp_reset_postdata(); ?>
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
