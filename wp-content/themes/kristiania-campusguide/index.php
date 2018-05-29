<?php
/***
**** This theme file contains the templating for the front page / main page
***/
?>
<?php
get_header('index'); ?>

<?php if ( is_active_sidebar( 'campus_navigation' ) ) : ?>
            <div>
                <?php dynamic_sidebar( 'campus_navigation' ); ?>
            </div>
        <?php endif; ?>

    <!-- Full width box text/image split -->
    <div class="container-fluid box-bg-2 no-padding">
        <div class="row no-gutters">
            <div class="col-12 col-lg-6 order-7 order-lg-7 position-relative split-box">
                <div class="place-center text-white">
                    <h1><?php echo get_theme_mod( 'frontpage_textfield_heading', __( '', 'kristianiacampusguide' ) ); ?></h1>
                    <p><?php echo get_theme_mod( 'frontpage_textfield', __( '', 'kristianiacampusguide' ) ); ?></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 order-1 order-lg-1 image-box" style="background-image:<?php echo 'url('.wp_get_attachment_image_url( get_theme_mod( 'frontpage_textfield_image' ), 'normal' ).')' ?>;">
                
            </div>
        </div>
    </div>

<?php if ( is_active_sidebar( 'shortcut_links_area' ) ) : ?>
            <div class="container mt-5 mb-5">
                <?php dynamic_sidebar( 'shortcut_links_area' ); ?>
            </div>
        <?php endif; ?>

<?php get_footer(); ?>