<?php
get_header(); ?>


<?php if ( is_active_sidebar( 'campus_navigation' ) ) : ?>
            <div>
                <?php dynamic_sidebar( 'campus_navigation' ); ?>
            </div>
        <?php endif; ?>


            <div class="container"> 
                <!-- campus boxes -->                 
                <div class="campus-boxes-container"> 
                    <div class="row justify-content-center"> 
                        <div class="col-12 col-md-3 campus-box box-bg-1"> 
                            <div class="container"> 
                                <div class="row justify-content-center"> 
                                    <div class="col-4 col-md-8 image-frame frame-1"> </div>                                     
                                    <div class="col-8 col-md-7 campus-text text-1"> 
                                        <h3>Vulkan</h3> 
                                        <p class="d-none d-md-block">This is a simple hero unit. This is a simple hero unit. This is a simple hero unit.This is a simple hero unit. This is</p> 
                                    </div>                                     
                                </div>                                 
                            </div>                             
                        </div>                         
                        <div class="col-12 col-md-3 campus-box box-bg-2"> 
                            <div class="container"> 
                                <div class="row justify-content-center"> 
                                    <div class="col-4 col-md-8 image-frame frame-2"></div>                                     
                                    <div class="col-8 col-md-8 campus-text text-2"> 
                                        <h3>Fjerdingen</h3> 
                                        <p class="d-none d-md-block">This is a simple hero unit</p> 
                                    </div>                                     
                                </div>                                 
                            </div>                             
                        </div>                         
                        <div class="col-12 col-md-3 campus-box box-bg-3"> 
                            <div class="container"> 
                                <div class="row justify-content-center"> 
                                    <div class="col-4 col-md-8 image-frame frame-3"></div>                                     
                                    <div class="col-8 col-md-9 campus-text text-3"> 
                                        <h3>Kvadraturen</h3> 
                                        <p class="d-none d-md-block">This is a simple hero unit</p> 
                                    </div>                                     
                                </div>                                 
                            </div>                             
                        </div>                         
                        <div class="col-12 col-md-3 campus-box box-bg-4"> 
                            <div class="container"> 
                                <div class="row justify-content-center"> 
                                    <div class="col-4 col-md-8 image-frame frame-4"></div>                                     
                                    <div class="col-8 col-md-10 campus-text text-4"> 
                                        <h3>Brenneriveien</h3> 
                                        <p class="d-none d-md-block">This is a simple hero unit</p> 
                                    </div>                                     
                                </div>                                 
                            </div>                             
                        </div>                         
                    </div>                     
                </div>                 

                <!-- ./ campus boxes -->                 
            </div>             
            <div class="container"> 
                <div class="row"> 
                </div>                 
            </div>



<style>
        .no-padding { padding: 0; }

        .split-box {
            height: 511px;
        }
        .place-center {
            position:absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        .image-box {
            height: 511px;
            width:50%;
            background-position:center; 
            background-repeat:no-repeat; 
            background-size: cover;
        }
    </style>

    <!-- Finn frem -->
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




            <div class="container"> 
                <!-- 3 floating boxes -->                 
                <div class="floating-boxes-container"> 
                    <div class="row justify-content-center"> 
                        <div class="col-5 m-3 col-md-3 floating-box box-bg-1">
                            <?php _e( '1', 'kristianiacampusguide' ); ?>
                        </div>                         
                        <div class="col-5 m-3 col-md-3 floating-box box-bg-2">
                            <?php _e( '2', 'kristianiacampusguide' ); ?>
                        </div>                         
                        <div class="col-5 m-3 col-md-3 floating-box box-bg-3">
                            <?php _e( '3', 'kristianiacampusguide' ); ?>
                        </div>                         
                    </div>                     
                </div>                 
            </div>             

            <!-- ./ 3 floating boxes -->                         

<?php get_footer(); ?>