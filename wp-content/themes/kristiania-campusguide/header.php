<!doctype html> 
<html <?php language_attributes(); ?>> 
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <!-- styles -->                           
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <style type="text/css">
        body {
            margin-top: -28px;
            padding-bottom: 28px;
        }
        body.admin-bar #wphead {
            padding-top: 0;
        }
        body.admin-bar #footer {
            padding-bottom: 28px;
        }
        #wpadminbar {
            top: auto !important;
            bottom: 0;
        }
        #wpadminbar .quicklinks .menupop ul {
            bottom: 28px;
        }
    </style>
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
            <div class="jumbotron"> 
</div>             

            <!-- ./ jumbotron / slider -->             
        </header>         
        <main>