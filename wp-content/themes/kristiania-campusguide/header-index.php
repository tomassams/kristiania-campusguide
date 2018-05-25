<!doctype html> 
<html <?php language_attributes(); ?>> 
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <!-- styles -->                           
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    </head>     
    <body class="<?php echo implode(' ', get_body_class()); ?>"> 
        <header> 
            <!-- navigation menu & logo -->             
            <nav class="navbar navbar-light navbar-expand-md fixed-top" id="main-nav"> 
                <div class="container">
                    <a class="navbar-brand" href="<?php echo esc_url( get_home_url() ); ?>">
                        <img src="<?php echo get_template_directory_uri() . '/assets/hk_logo_black.svg' ?>" style="height:auto;" class="mr-3 ml-3 d-block"> Campusguide
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"> 
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>                     
                    <div class="collapse navbar-collapse" id="navcol-1"> 
                        <?php wp_nav_menu( array(
                                'menu' => 'primary',
                                'menu_class' => 'nav navbar-nav ml-auto',
                                'container' => '',
                                'theme_location' => 'primary',
                                'fallback_cb' => 'wp_bootstrap4_navwalker::fallback',
                                'walker' => new wp_bootstrap4_navwalker()
                        ) ); ?> 
                    </div>                     
                </div>                 
            </nav>             
            <!-- jumbotron / slider -->             
            

                <?php if ( is_active_sidebar( 'frontpage_slider_area' ) ) : ?>
                    <div class="jumbotron no-padding slide-container" style="background-image:none">
                        <?php dynamic_sidebar( 'frontpage_slider_area' ); ?>
                    </div>
                <?php endif; ?>     

            <!-- ./ jumbotron / slider -->             
        </header>         
        <main>