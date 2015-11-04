<?php
/**
 * Template Name: About Page
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

                <div class="about-banner" style="background: url(<?php the_field('banner_image'); ?>) no-repeat;">
                    <div class="container">
                        <span class="banner-text1"><?php the_field('banner_text_1'); ?></span>
                        <span class="banner-text2"><?php the_field('banner_text_2'); ?></span>
                    </div>
                </div>

                <div class="about-main">
                    <div class="container">
                        <p>
                            <?php
                                $content = get_post_field( 'post_content', get_the_ID() );
                                $content_parts = get_extended( $content );
                                echo $content_parts['main'];
                            ?>
                        </p>
                    </div>

                    <div class="about-video">
                        <div class="container">
                            <h3>Video</h3>
                            <div class="video-container">
                                <?php the_field('video'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <p>
                            <?php if (strpos($post->post_content, '-->')) : ?>
                            <?php $aftermore = 3 + strpos($post->post_content, '-->');
                                echo substr($post->post_content,$aftermore);
                            ?>
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="about-stats">
                        <div class="container">
                            <div class="stat-single products">
                                <div class="icon-space">
                                    <i></i>
                                </div>
                                <span class="bold">38,000,000</span>
                                <span>Total Products Sold</span>
                            </div>
                            <div class="stat-single clients">
                                <div class="icon-space">
                                    <i></i>
                                </div>
                                <span class="bold">140,000</span>
                                <span>New Happy Clients</span>
                            </div>
                            <div class="stat-single discount">
                                <div class="icon-space">
                                    <i></i>
                                </div>
                                <span class="bold">25,000</span>
                                <span>Discount Products</span>
                            </div>
                            <div class="stat-single locations">
                                <div class="icon-space">
                                    <i></i>
                                </div>
                                <span class="bold">5</span>
                                <span>United States Locations</span>
                            </div>
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

                    <div class="about-page-image">
                        <img src="<?php the_field('page_image'); ?>" alt="SmokeShop">
                    </div>

                    <div class="about-locations">
                        <div class="container">
                            <h2>Our Locations</h2>
                            <div class="locations-container">
                                <?php
                                    $args = array('post_type' => 'locations', 'posts_per_page' => 5);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
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
                                    endwhile;
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
