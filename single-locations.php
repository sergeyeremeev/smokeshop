<?php
/**
 * Template Name: Location
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _mbbasetheme
 */

$postTitleError = '';
$postid = get_the_ID();

if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {

    if ( trim( $_POST['name'] ) === '' ) {
        $postTitleError = 'Please enter a name.';
        $hasError = true;
    }

    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['name'] ),
        'post_type' => 'location-review',
        'post_status' => 'pending'
    );

    $post_id = wp_insert_post( $post_information );

    $location_arr = 'a:1:{i:0;s:2:"'.$postid.'";}';

    add_post_meta($post_id, 'name', wp_strip_all_tags( $_POST['name'] ), true);
    add_post_meta($post_id, 'company_name', wp_strip_all_tags( $_POST['company_name'] ), true);
    add_post_meta($post_id, 'stars', $_POST['stars'], true);
    add_post_meta($post_id, 'testimonial', wp_strip_all_tags( $_POST['name'] ), true);
    add_post_meta($post_id, 'location_name', get_the_title( $postid ), true);
    add_post_meta($post_id, 'location', $location_arr, true);

}

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <?php $this_location = get_the_title(); ?>

                <div class="location-banner" style="background: url(<?php the_field('banner_image'); ?>) no-repeat;">
                    <div class="container">
                        <div class="banner-info">
                            <div class="shop-image">
                                <img src="<?php the_field('shop_image'); ?>" alt="<?php the_title(); ?>">
                            </div>

                            <div class="location-info-box">
                                <h1><?php the_field('short_address'); ?></h1>
                                <span class="address"><span class="icon"><i></i></span><span class="text"><?php the_field('full_address'); ?></span></span>
                                <span class="phone"><span class="icon"><i></i></span><span class="text"><?php the_field('phone_number'); ?></span></span>
                                <span class="open-hours">
                                    <span class="icon"><i></i></span>
                                    <span class="text">
                                        <?php the_field('open_hours_1'); ?>
                                        <?php if ( get_field('open_hours_2') ) { ?>
                                            <span class="open-hours-optional"><?php the_field('open_hours_2'); ?></span>
                                        <?php } ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="location-main">
                    <div class="container">
                        <div class="about-shop">
                            <h2>About the Shop</h2>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="shop-media">
                        <div class="container">
                            <h2>Photos &amp; Videos</h2>
                            <div class="controls">
                                <div class="left">&lt;</div>
                                <div class="right">&gt;</div>
                            </div>
                            <?php the_field('shop_media'); ?>
                        </div>
                    </div>
                    <div class="shop-tour">
                        <div class="container">
                            <h2>Virtual Tour</h2>
                            <?php the_field('virtual_tour'); ?>
                        </div>
                    </div>
                    <div class="shop-reviews">
                        <div class="container">
                            <div class="review-top">
                                <?php
                                    $one = 0;
                                    $two = 0;
                                    $three = 0;
                                    $four = 0;
                                    $five = 0;
                                    $total_submissions = 0;
    
                                    $args = array('post_type' => 'location-review', 'posts_per_page' => -1);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
    
                                        if ($this_location == get_field('location_name')) {
                                            if (get_field('stars') == 'one') {
                                                $one += 1;
                                            } elseif (get_field('stars') == 'two') {
                                                $two += 1;
                                            } elseif (get_field('stars') == 'three') {
                                                $three += 1;
                                            } elseif (get_field('stars') == 'four') {
                                                $four += 1;
                                            } else {
                                                $five += 1;
                                            }
                                            $total_submissions += 1;
                                        }
    
                                    endwhile;
                                    wp_reset_postdata();
    
                                    $sum_one = $one;
                                    $sum_two = $two * 2;
                                    $sum_three = $three * 3;
                                    $sum_four = $four * 4;
                                    $sum_five = $five * 5;
                                    $total_vote = $sum_one + $sum_two + $sum_three + $sum_four + $sum_five;
                                ?>
                                <header>
                                    <h2>Write Your Review</h2>
                                </header>
                                <div id="review-form">
                                    <form action="" method="POST">
                                        <input type="text" name="name" required placeholder="Your Name" value="<?php if ( isset( $_POST['name'] ) ) echo $_POST['name']; ?>" />
                                        <input type="text" name="company_name" placeholder="Company Name" />
                                        <textarea name="testimonial" required placeholder="Write your review"><?php if ( isset( $_POST['testimonial'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['testimonial'] ); } else { echo $_POST['testimonial']; } } ?></textarea>
                                        <div class="choose-rating">
                                            <label class="rating-label">Choose Rating</label>
                                            <div class="radio-inputs">
                                                <input id="review1" type="radio" name="stars" value="one">
                                                <label for="review1"></label>
                                                <input id="review2" type="radio" name="stars" value="two">
                                                <label for="review2"></label>
                                                <input id="review3" type="radio" name="stars" value="three">
                                                <label for="review3"></label>
                                                <input id="review4" type="radio" name="stars" value="four">
                                                <label for="review4"></label>
                                                <input id="review5" type="radio" name="stars" value="five">
                                                <label for="review5"></label>
                                            </div>
                                        </div>  
                                        <input type="hidden" name="submitted" id="submitted" value="true" />
                                        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
                                        <button type="submit">Submit</button>
                                    </form>
                                    <?php if ( $postTitleError != '' ) { ?>
                                        <span class="error"><?php echo $postTitleError; ?></span>
                                    <?php } ?>
                                    <?php if ( $post_id ) { ?>
                                        <span class="success">Thanks for review</span>
                                    <?php } ?>
                                </div>
                                <div class="review-stats">
                                    <h2>Customer Reviews</h2>
                                    <div class="stats">
                                        <div class="total-rating"><?php echo number_format(($total_vote / $total_submissions), 1); ?></div>
                                        <?php if ($total_submissions > 0) {?>
                                            <div class="stars stars<?php echo round($total_vote / $total_submissions); ?>"><i></i><i></i><i></i><i></i><i></i></div>
                                        <?php } else { ?>
                                            <div class="stars stars0"><i></i><i></i><i></i><i></i><i></i></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
    
                            <div class="review-content">
                                <?php
                                    $queryObject = new WP_Query( 'post_type=location-review' );
                                    // The Loop!
                                    if ($queryObject->have_posts()) {
                                        while ($queryObject->have_posts()) {
                                            $queryObject->the_post();
                                            if ($this_location == get_field('location_name')) { ?>
                                                <div class="single-review">
                                                    <div class="testimonial minimize"><?php the_field('testimonial'); ?></div>
                                                    <span class="author"><?php the_field('name'); ?></span>
                                                    <span class="date"><?php echo get_the_date(); ?></span>
                                                    <?php if ($total_submissions > 0) {?>
                                                        <span class="stars stars<?php the_field('stars'); ?>"><i></i><i></i><i></i><i></i><i></i></span>
                                                    <?php } else { ?>
                                                        <span class="stars starszero"><i></i><i></i><i></i><i></i><i></i></span>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        <?php
                                        }
                                    }
                                    wp_reset_postdata();
                                ?>
                            </div>
                         </div>
                    </div>
                    <div class="location-featured-products">
                        <div class="container">
                            <h2>Featured Products</h2>
                            <div class="products-container">
                                <?php
                                    $args = array('post_type' => 'products', 'posts_per_page' => -1);
                                    $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();  
                                        if ($this_location == get_field('shop')) {
                                ?>
                                    <div class="product-single">
                                        <div class="image-container">
                                            <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <h1><?php the_title(); ?></h1>
                                        <div class="brand">By: <span class="brand-name"><?php the_field('brand'); ?></span> </div>
                                        <a href="#" class="learn-more">learn more</a>
                                    </div>
                                <?php 
                                        }
                                    endwhile;
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="location-brands">
                        <div class="container">
                            <h2>Brands</h2>
                            <div class="brands-container">
                                <?php the_field('brands'); ?>    
                            </div>
                        </div>
                    </div>
                    <div class="location-map">
                        <?php the_field('google_map_shortcode'); ?>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
