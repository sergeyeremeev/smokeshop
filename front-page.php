<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="top-banner">
                    <div class="banner-image image1"><img src="<?php the_field('top_banner_image_1'); ?>"></div>
                    <div class="banner-text-box left">
                        <span class="row1">Welcome to</span><span class="row2">All in one Smoke Shop</span>
                        <span class="row3">The largest network of smoke shops in the USA</span>
                        <a href="<?php echo get_permalink(9); ?>" class="find-shop-btn">Find a shop</a>
                    </div>
                    <div class="banner-image image2"><img src="<?php the_field('top_banner_image_2'); ?>"></div>
                    <div class="bottom-row">
                        <div class="banner-image image3"><img src="<?php the_field('top_banner_image_3'); ?>"></div>
                        <div class="banner-image image4"><img src="<?php the_field('top_banner_image_4'); ?>"></div>
                        <div class="banner-image image5"><img src="<?php the_field('top_banner_image_5'); ?>"></div>
                        <div class="banner-image image2"><img src="<?php the_field('top_banner_image_2'); ?>"></div>
                        <div class="banner-image image1"><img src="<?php the_field('top_banner_image_1'); ?>"></div>
                    </div>
                </div>

                <div class="home-about">
                    <div class="container">
                        <div class="home-about-text">
                            <h2>About Us</h2>
                            <?php
                                setup_postdata( $post = get_post( 7 ) );
                                the_content('');
                                wp_reset_postdata();
                            ?>
                        </div>
                        <div class="home-about-image">
                            <?php the_field('about_image'); ?>
                        </div>
                    </div>
                </div>

                <div class="home-locations">
                    <div class="container">
                        <h2>Our Locations</h2>
                        <div class="locations-container">
                            <?php
                                $args = array('post_type' => 'locations');
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                                if (get_field('short_address') !== '') {
                            ?>
                                <div class="location-single">
                                    <div class="location-image">
                                        <img src="<?php the_field('shop_image'); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <h3><?php the_field('short_address'); ?></h3>
                                    <div class="location-info-box">
                                        <span class="address"><div class="icon-container"><span class="icon"></span></div><span class="text"><?php the_field('full_address'); ?></span></span>
                                        <span class="phone"><div class="icon-container"><span class="icon"></span></div><span class="text"><?php the_field('phone_number'); ?></span></span>
                                        <span class="open-hours">
                                            <div class="icon-container"><span class="icon"></span></div>
                                            <span class="text">
                                                <?php the_field('open_hours_1'); ?>
                                                <?php if ( get_field('open_hours_2') ) { ?>
                                                    <span class="open-hours-optional"><?php the_field('open_hours_2'); ?></span>
                                                <?php } ?>
                                            </span>
                                        </span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="learn-more">learn more</a>
                                </div>
                            <?php
                                }
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
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

                <div class="home-testimonials">
                    <div class="container">
                        <h2>Client Testimonials</h2>
                        <div class="testimonials-container home-testimonials-container">
                            <?php the_field('testimonials_code'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
