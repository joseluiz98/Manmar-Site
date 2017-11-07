<?php get_header();  the_post(); ?>
<section id="internas">
    <div class="row">
        <div class="col-md-12">
            <div class="mask">
                <div class="imgEventGalerie">
                    <img class="sgallerie" src="<?php echo get_template_directory_uri() ?>/dist/imgs/banner_pequeno.png" alt="">
                </div>
                <div class="mask-hover">
                    <div class="col-md-4 col-md-offset-4 title-page">
                        <p><?php the_title(); ?></p>
                        <h1><?php echo $title_highlight; ?></h1>
                    </div>
                    <div class="col-md-4 col-md-offset-4 title-page">
                        <nav class="iconsMedia">
                            <ul class="nav navbar-nav">
                                <li><a id="a_menos" href="#"><span class="rp-minus"></span></a></li>
                                <li><a id="a_mais" href="#"><span class="rp-plus"></span></a></li>
                                <li><a href="#"><span class="rp-contrast"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="busca">
    <div class="container">
        <div class="row">
        <?php 
        if (have_posts()) :   
            while (have_posts()) : the_post(); 
                

                if(isset($_GET['post_type'])):

                    $type = $_GET['post_type'];
                        if($type == 'videos'):
                            ?>
                           <!-- Format for "videos" custom post type */ -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Você buscou por: "<?php echo $_GET['s']; ?>"</h2>
                                </div>
                                <div class="col-md-12">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    p><?php the_excerpt(); ?></p>
                                    </br>
                                </div>
                            </div>
                            <?php 
                        endif;
                         
                else: 
                    ?>
                    <!-- /* Formato a ser exibido quando o parâmetro do tipo post não está definido (isto é, formato padrão) */ -->
                    <h3 class="result-search"><?php _e('Nenhum resultado encontrado!'); ?></h3>
                    <p class="info-search"><?php _e('Sua busca não retornou resultados, <a href="javascript:history.go(-1)">tente novamente</a> com outros termos.'); ?></p>
                <?php
                endif;
            endwhile; 
        else: 
            ?>
            <!-- /* O que para exibir se não há resultados. */ -->
            <h3 class="result-search"><?php _e('Nenhum resultado encontrado!'); ?></h3>
            <p class="info-search"><?php _e('Sua busca não retornou resultados, <a href="javascript:history.go(-1)">tente novamente</a> com outros termos.'); ?></p>
            <?php 
        endif;
        ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>