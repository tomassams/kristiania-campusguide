<!doctype html> 
<html <?php language_attributes(); ?>> 
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <!-- styles -->                           
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <script defer src="http://127.0.0.1:8080/kristiania-campusguide/wp-content/themes/kristiania-campusguide/assets/js/timeedit.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="calendar.css"
    </head>     
    <body id="body-top" class="<?php echo implode(' ', get_body_class()); ?>"> 
        <!--
            Modal placeholder
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</a>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Modal body text goes here.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
              </div>
            </div>

        -->
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
            <div class="jumbotron jumbo-image"> </div>             

            <!-- ./ jumbotron / slider -->             
        </header>         
        <main>