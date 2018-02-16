        <?php
            //Register the script
            wp_register_script( 'jqueryjs', get_template_directory_uri().'/dist/js/jquery-bundle.min.js' );    
            wp_register_script( 'bootstrapjs', get_template_directory_uri().'/dist/js/bootstrap-bundle.min.js' );
            wp_register_script( 'owljs', get_template_directory_uri().'/dist/js/owl.carousel.min.js' );
            wp_register_script( 'mainjs', get_template_directory_uri().'/dist/js/all.min.js' );    

            //Enqueued script with localized data.
            wp_enqueue_script( 'jqueryjs' );
            wp_enqueue_script( 'bootstrapjs' );
            wp_enqueue_script( 'owljs' );
            wp_enqueue_script( 'mainjs' );

            wp_footer(); 
        ?>
        <script type="text/javascript">
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
        <script type="text/javascript">
             $('.owl-carousel').owlCarousel({
                    loop:true,
                    dots:false,
                    nav:false,
                    navigation : false,
                    rewindNav : true,
                    margin:0,
                    //animateOut: 'fadeOut',
                    animateOut: 'slideOutDown',
                    animateIn: 'flipInX',
                    // slideSpeed : 200,
                    // paginationSpeed : 800,
                    //rewindSpeed : 1000,
                    responsiveClass:true,
                    autoplay:true,
                    autoplayTimeout:5000,
                    autoplayHoverPause:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });
            $(document).ready(function(){
            });
        </script>
    </body>
</html>