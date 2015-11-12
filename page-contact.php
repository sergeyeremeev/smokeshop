<?php
/**
 * Template Name: Contact Page
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

                <div class="contact-banner" style="background: url(<?php the_field('banner_image'); ?>) no-repeat;">
                    <div class="container">
                        <span class="banner-text"><?php the_field('banner_text'); ?></span>
                    </div>
                </div>

                <div class="contact-main">
                    <div class="container">
                        <div class="contact-content">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="contact-blocks">
                        <div class="container">
                            <h1>Contact Us</h1>
                            <div class="contact-block-single email">
                                <div class="icon-space"><i></i></div>
                                <span>Send us an Email and we will respond within 24 hours</span>
                                <a href="mailto:customer@allin1smokeshop.com">customer@allin1smokeshop.com</a>
                            </div>
                            <div class="contact-block-single phone">
                                <div class="icon-space"><i></i></div>
                                <span>Call our hotline for FREE informations</span>
                                <a href="#">
                                    <?php
                                        $args = array('post_type' => 'social');
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                    ?>
                                        <?php the_field('phone'); ?>
                                    <?php endwhile;
                                            wp_reset_postdata(); ?>
                                </a>
                            </div>
                            <div class="contact-block-single chat">
                                <div class="icon-space"><i></i></div>
                                <span>We are available for instant Live chat with you</span>
                                <a href="#">START NOW</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <div class="container">
                        <i class="email-icon"></i>
                        <?php the_field('contact_form_code'); ?>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
