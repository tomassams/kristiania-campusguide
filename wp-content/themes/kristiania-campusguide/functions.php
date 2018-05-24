<?php
if ( ! function_exists( 'kristianiacampusguide_setup' ) ) :

function kristianiacampusguide_setup() {

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'kristianiacampusguide' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // kristianiacampusguide_setup

add_action( 'after_setup_theme', 'kristianiacampusguide_setup' );

if ( ! function_exists( 'kristianiacampusguide_init' ) ) :

function kristianiacampusguide_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );


}
endif; // kristianiacampusguide_setup

add_action( 'init', 'kristianiacampusguide_init' );


if ( ! function_exists( 'kristianiacampusguide_widgets_init' ) ) :

function kristianiacampusguide_widgets_init() {

    /*
     * Register widget areas.
     */

    register_sidebar( array(
        'name' => __( 'Campus Navigation Area', 'kristianiacampusguide' ),
        'id' => 'campus_navigation',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );
    
}
add_action( 'widgets_init', 'kristianiacampusguide_widgets_init' );
endif;// kristianiacampusguide_widgets_init



if ( ! function_exists( 'kristianiacampusguide_customize_register' ) ) :

function kristianiacampusguide_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.
    $wp_customize->add_section( 'frontpage_settings', array(
        'title' => __( 'Front page settings', 'kristianiacampusguide' )
    ));

    $wp_customize->add_setting( 'frontpage_textfield_heading', array(
        'type' => 'theme_mod',
        'default' => __( 'Lorem ipsum', 'kristianiacampusguide' )
    ));

    $wp_customize->add_control( 'frontpage_textfield_heading', array(
        'label' => __( 'Frontpage Textfield Heading', 'kristianiacampusguide' ),
        'type' => 'text',
        'section' => 'frontpage_settings'
    ));

    $wp_customize->add_setting( 'frontpage_textfield', array(
        'type' => 'theme_mod',
        'default' => __( 'Lorem ipsum', 'kristianiacampusguide' )
    ));

    $wp_customize->add_control( 'frontpage_textfield', array(
        'label' => __( 'Frontpage Textfield', 'kristianiacampusguide' ),
        'type' => 'textarea',
        'section' => 'frontpage_settings'
    ));

    $wp_customize->add_setting( 'frontpage_textfield_image', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'frontpage_textfield_image', array(
        'label' => __( 'Frontpage Textfield Image', 'kristianiacampusguide' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'frontpage_settings'
    ) ) );


}
add_action( 'customize_register', 'kristianiacampusguide_customize_register' );
endif;// kristianiacampusguide_customize_register


if ( ! function_exists( 'kristianiacampusguide_enqueue_scripts' ) ) :
    function kristianiacampusguide_enqueue_scripts() {

    wp_deregister_script( 'jqueryslim' );
    wp_enqueue_script( 'jqueryslim', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', false, null, true);

    wp_deregister_script( 'popper' );
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', false, null, true);

    wp_deregister_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', false, null, 'all');

    wp_deregister_style( 'stylesheet' );
    wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/assets/css/stylesheet.css', false, null, 'all');

    }
    add_action( 'wp_enqueue_scripts', 'kristianiacampusguide_enqueue_scripts' );
endif;



require_once "inc/bootstrap/wp_bootstrap4_navwalker.php";

?>