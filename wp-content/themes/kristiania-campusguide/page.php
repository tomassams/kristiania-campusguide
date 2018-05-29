<?php
/***
**** This theme file contains the templating for the single pages
***/
?>
<?php
get_header(); ?>

<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'full' );
                        }
                     ?> 
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'kristianiacampusguide' ); ?></p>
        <?php endif; ?>

<?php get_footer(); ?>