<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _mbbasetheme
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-main">
            <div class="container">
                <div class="footer-col1">
                    <h3>Contact Us</h3>
                    <span><a href="<?php echo get_page_link(7); ?>">About Us</a></span>
                    <span><a href="<?php echo get_page_link(13); ?>">Contact Us</a></span>
                    <span><a href="mailto:customer@allin1smokeshop.com"><span class="icon-mail"><i></i></span>customer@allin1smokeshop.com</a></span>
                    <?php
                        $args = array('post_type' => 'social');
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <span><a href="#"><span class="icon-phone"><i></i></span><?php the_field('phone'); ?></a></span>
                    <h3>Follow Us On</h3>
                    <ul class="social-list">
                        <li><a href="<?php the_field('google_plus'); ?>" class="gplus"><i></i></a></li>
                        <li><a href="<?php the_field('facebook'); ?>" class="fb"><i></i></a></li>
                        <li><a href="<?php the_field('twitter'); ?>" class="twitter"><i></i></a></li>
                        <li><a href="<?php the_field('tumblr'); ?>" class="tumblr"><i></i></a></li>
                        <li><a href="<?php the_field('instagram'); ?>" class="inst"><i></i></a></li>
                        <li><a href="<?php the_field('youtube'); ?>" class="youtube"><i></i></a></li>
                    </ul>
                    <?php endwhile;
                          wp_reset_postdata(); ?>
                </div>
                <div class="footer-col2">
                    <h3>Important Links</h3>
                    <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
                </div>
                <div class="footer-col3">
                    <h3>Helpful Articles</h3>
                    <div class="article-list">
                        <ul>
                            <?php
                                $args = array(
                                    'numberposts' => 7
                                );
                                $recent_posts = wp_get_recent_posts($args);
                                foreach( $recent_posts as $recent ) {
                                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                                }
                            ?>
                        </ul>
                        <?php
                            $count_posts = wp_count_posts();
                            if ($count_posts > 7) { ?>
                                <a href="#" class="view-all">View All &raquo;</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="footer-col4">
                    <h3>Newsletter Signup</h3>
                    <div class="footer-subscribe-module">
                        <?php
                                if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); }
                        ?>
                    </div>
                </div>
                <div class="mobile-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Use</a>
                </div>
            </div>
        </div>
        <div class="site-info">
            <div class="container">
                <p class="copyright">Copyright &copy; AllinOneSmokeShop. All Rights Reserved.</p>
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53597806-2', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
