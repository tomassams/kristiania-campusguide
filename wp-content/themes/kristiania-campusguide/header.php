<?php
/***
**** This theme file contains the templating for the general site's header part
***/
?>
<!doctype html> 
<html <?php language_attributes(); ?>> 
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">                       
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>     
    <body id="body-top" class="<?php echo implode(' ', get_body_class()); ?>"> 

        <!-- Hidden Modal which will be populated with the floorplan info -->
            <div class="modal fade floorplan-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tittel</h5> <!-- todo: Bytt ut med en beskrivende tittel (scr.readers bruker denne som label for hva som er her) -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Lukk">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                <form>
                    <p style="margin:auto; text-align:center; font-family:'Graphik Bold';">Velg dato</p>
                    <div class="input-group">
                        <input type="date" class="form-control"id="date-input" min="2017-01-01" max="2025-01-01" style="text-align:center; padding-left: 50px;">
                        <button type="button" class="btn btn-outline-success form-control" onclick="previousRoom()">Oppdater</button>
                    </div>
                </form>
                
                    <div id="content" class="table-responsive">
                        <table id="content-table" class="table table-striped">

                        </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
                  </div>
              </div>
              </div>
            </div>
        <!-- ./ Hidden Modal -->

        <header>
            <!-- Logo branding and navigation section -->
            <nav class="navbar navbar-light navbar-expand-md fixed-top" id="main-nav">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo esc_url( get_home_url() ); ?>" title="Kristiania Campusguide">
                        <img src="<?php echo get_template_directory_uri() . '/assets/hk_logo_black.svg' ?>" style="height:auto;" alt="logo" class="mr-3 ml-3 d-block"> Campusguide
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Vis navigasjonsmeny</span>
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
            <!-- ./ Logo branding and navigation section -->

            <!-- Jumbotron / Slideshow section -->
            <div class="jumbotron jumbo-image"> </div>
            <!-- ./ Jumbotron / Slideshow section  -->

        </header>
        <main>