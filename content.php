<?php
/**
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-image">
        <?php the_post_thumbnail(array(215, 215)); ?>
    </div>

    <div class="post-content">
        <header class="entry-header">
            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <div class="post-meta">
                <div class="post-author">
                    <i class="user-icon"></i>
                    <span class="author"><?php the_author(); ?></span>
                </div>
                <div class="post-date">
                    <i class="clock-icon"></i>
                    <span class="date"><?php echo get_the_date('F jS'); ?></span>
                </div>
            </div>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
            <a class="read-more" href="<?php the_permalink(); ?>">... read more</a>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( '', '_mbbasetheme' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
