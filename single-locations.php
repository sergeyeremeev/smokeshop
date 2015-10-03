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
                                <h1><?php the_title(); ?></h1>
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
                        </div>
                    </div>
                </div>

                <div class="location-main">
                    <div class="container">
                        <div class="left-col">
                            <div class="shop-photos">
                                <h2>Photos</h2>
                                <div class="photo-container">
                                    <?php the_field('shop_photos'); ?>
                                </div>
                            </div>
                            <div class="shop-videos">
                                <h2>Videos</h2>
                                <div class="video-container shop-video-container">
                                    <?php the_field('shop_videos'); ?>
                                </div>
                            </div>
                            <div class="shop-reviews">
                                <div class="review-top">
                                    <?php
                                        $one = 0;
                                        $two = 0;
                                        $three = 0;
                                        $four = 0;
                                        $five = 0;
                                        $total_submissions = 0;

                                        $args = array('post_type' => 'location-review');
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
                                        <h2>Reviews</h2><a class="view-all" href="#">view all</a>
                                    </header>
                                    <div class="review-stats">
                                        <div class="stats-left">
                                            <div class="total-rating"><?php echo number_format(($total_vote / $total_submissions), 1); ?></div>
                                            <?php if ($total_submissions > 0) {?>
                                                <div class="stars stars<?php echo round($total_vote / $total_submissions); ?>"><i></i><i></i><i></i><i></i><i></i></div>
                                            <?php } else { ?>
                                                <div class="stars stars0"><i></i><i></i><i></i><i></i><i></i></div>
                                            <?php } ?>
                                            <span><?php echo $total_submissions; ?> reviews</span>
                                        </div>
                                        <div class="stats-right">
                                            <ul>
                                                <li>5 star</li>
                                                <li>4 star</li>
                                                <li>3 star</li>
                                                <li>2 star</li>
                                                <li>1 star</li>
                                            </ul>
                                            <ul>
                                                <li class="<?php echo ($five == 0) ? 'empty' : 'non-empty'; ?>" style="width: <?php echo ($five / $total_submissions) * 100; ?>%"><span></span></li>
                                                <li class="<?php echo ($four == 0) ? 'empty' : 'non-empty'; ?>" style="width: <?php echo ($four / $total_submissions) * 100; ?>%"><span></span></li>
                                                <li class="<?php echo ($three == 0) ? 'empty' : 'non-empty'; ?>" style="width: <?php echo ($three / $total_submissions) * 100; ?>%"><span></span></li>
                                                <li class="<?php echo ($two == 0) ? 'empty' : 'non-empty'; ?>" style="width: <?php echo ($two / $total_submissions) * 100; ?>%"><span></span></li>
                                                <li class="<?php echo ($one == 0) ? 'empty' : 'non-empty'; ?>" style="width: <?php echo ($one / $total_submissions) * 100; ?>%"><span></span></li>
                                            </ul>
                                        </div>

                                        <a class="toggle-review-form" href="#">Write a Review</a>
                                    </div>
                                </div>

                                <div id="review-form">
                                    <form action="" method="POST">
                                        <input type="text" name="name" required placeholder="Your Name" value="<?php if ( isset( $_POST['name'] ) ) echo $_POST['name']; ?>" />
                                        <input type="text" name="company_name" placeholder="Company Name" />
                                        <div class="">
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
                                        <textarea name="testimonial" required placeholder="Testimonial"><?php if ( isset( $_POST['testimonial'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['testimonial'] ); } else { echo $_POST['testimonial']; } } ?></textarea>
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
                        <div class="right-col">
                            <div class="find-shop">
                                <h3>Find a shop near me</h3>
                                <div class="shop-select">
                                    <select name="shop" id="select-shop">
                                        <option value="all">All States</option>
                                        <option value="florida">Philadelphia, PA</option>
                                        <option value="nj">Pembroke Pines, FL</option>
                                        <option value="pensylvania">Boca Raton, FL</option>
                                        <option value="nj">Chicago, IL</option>
                                        <option value="pensylvania">Glassboro, NJ</option>
                                    </select>
                                </div>
                                <a href="#" class="find-shops-go">Go</a>
                            </div>
                            <div class="directions">
                                <h3>Directions</h3>
                                <?php the_field('google_map_shortcode'); ?>
                                <span class="address"><span class="icon"></span><span class="text"><?php the_field('full_address'); ?></span></span>
                            </div>
                            <div class="about-shop">
                                <h3>About the shop</h3>
                                <div class="minimize"><?php the_content(); ?></div>
                            </div>
                            <div class="badges">
                                <img src="/wp-content/themes/smokeshop/assets/images/best_price.jpg" alt="Best Price">
                                <img src="/wp-content/themes/smokeshop/assets/images/quality.jpg" alt="Quality Guaranteed">
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
