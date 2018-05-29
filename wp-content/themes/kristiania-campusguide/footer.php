<?php
/***
**** This theme file contains the templating for the front page (index)'s header part
***/
?>
        </main>
        <footer class="footer"> 
            <div class="container"> 
                <?php if ( is_active_sidebar( 'footer_area' ) ) : ?>
                  <div>
                      <?php dynamic_sidebar( 'footer_area' ); ?>
                  </div>
              <?php endif; ?> 
            </div>             
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>