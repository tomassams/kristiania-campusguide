
        </main>         
        <footer class="footer"> 
            <div class="container"> 
                <p><?php _e( 'Takk for besøket', 'kristianiacampusguide' ); ?>  
            </div>             
        </footer>         
        <!-- scripts -->                                    
        <?php wp_footer(); ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function(){
  $('.slide-container').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows: false,
  infinite: true,
  fade: true,
});
});
</script>
    </body>     
</html>