<?php get_header();
include 'inc/arguments.php';
?>
<section id="destaques">
	<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
            <?php
            $a = 0;
            while ($highlights->have_posts()): $highlights->the_post();
            $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $link = get_post_meta(get_the_ID(),'link_highlight',true);
            $label = get_post_meta(get_the_ID(),'label_highlight',true);
            $text = get_the_content();
                if($a == 0):
                    ?>
                    <div class="item active">

                        <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />

                        <?php if(!empty($text)): ?>
                        <div class="carousel-caption">
                            <div class="col-md-8 caption">
                    	        <h2><?php echo $text; ?></h2>

                                <?php if(!empty($link)): ?>
                                    <a href="<?php echo $link; ?> " target="_blank"><?php echo $label; ?></a>
                                <?php endif; ?>
                                
                           </div>
                        </div>
                        <?php endif; ?>

                    </div>
                    <?php 
                else:
                    ?>
                    <div class="item">
                        <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />

                        <?php if(!empty($text)): ?>
                        <div class="carousel-caption">
                            <div class="col-md-8 caption">
                                <h2><?php echo $text; ?></h2>
                                <?php if(!empty($link)): ?>
                                    <a href="<?php echo $link; ?> " target="_blank"><?php echo $label; ?></a>
                                <?php endif; ?>
                           </div>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php
                endif;
                $a++;
            endwhile;
            wp_reset_postdata(); 
            ?>
        </div>
        <?php 
            while ($highlights->have_posts()): $highlights->the_post();
                $rows = $highlights->post_count;
            
                if($rows > 1):
                    ?>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
                    <?php 
                endif;
            endwhile;
        wp_reset_postdata();
        ?>
	</div>
</section>

<section id="blog">
	<div class="container">
		<div class="row">

            <?php
            while ($proposalshome->have_posts()): $proposalshome->the_post();
                $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $text = get_the_content();
                ?>
                <div class="col-md-4">
                    <h2>Propostas</h2>
                    <img src="http://localhost:8080/pacheco/wp-content/uploads/2016/08/propostas.png" alt="<?php the_title(); ?>">
                    <!-- <p><?php echo limitarTexto($text,243); ?></p> -->
                    <p class="call">Tenho planos para reinventar Beagá. É disto que a cidade precisa: começar de novo. Vamos fazer isso juntos?</p>
                    <p><a class="btn btn-default" href="<?php bloginfo('url'); ?>/propostas" role="button">Veja Mais</a></p>
                </div>
              <?php
            endwhile;
            wp_reset_postdata(); 
            ?>

            <?php
            while ($materialshome->have_posts()): $materialshome->the_post();
                $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $text = get_the_content();
                ?>
            	<div class="col-md-4 index">
            		<h2 style="color:#9470ae;">Apoie a Campanha</h2>
    	          	<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
                    <!-- <p><?php echo limitarTexto($text,243); ?></p> -->
                    <p class="call">Você apoia o Rodrigo15? Baixe os materiais da campanha e mostre seu apoio ao prefeito que vai ajudar a reinventar Beagá.</p>
    	          	<p><a class="btn btn-default" href="<?php bloginfo('url'); ?>/apoie-a-campanha" role="button" style="color:#9470ae;">Confira</a></p>
            	</div>
                <?php
            endwhile;
            wp_reset_postdata(); 
            ?>
            
            <?php
            while ($newshome->have_posts()): $newshome->the_post();
                $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $text = get_the_content();
                ?>
            	<div class="col-md-4">
    				<h2>Últimas Notícias</h2>
    				<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
                    <!-- <p><?php echo limitarTexto($text,243); ?></p> -->
                    <p class="call">Acompanhe todas as notícias sobre a caminhada do Rodrigo15 rumo à Prefeitura.</p>
    				<p><a class="btn btn-default" href="<?php bloginfo('url'); ?>/noticias" role="button">Leia Mais</a></p>
            	</div>
                <?php
            endwhile;
            wp_reset_postdata(); 
            ?>
      </div>
    </div>
</section>

<section id="media">
	<div class="row">
		<div class="container">
			<div class="flex">
				<div class="col-md-3 col-sm-3 col-xs-12 block-one">
		        	<!-- <p>Lorem <br>ipsum dolor sit amet. </p> -->
                    <p>Vamos discutir <br>ideias novas <br>para Beagá?</p>
		        </div>
		        <div class="col-md-9 col-sm-9 col-xs-12 block-two">
		        	<nav class="iconsMedia">
			          	<ul class="nav navbar-nav">
				            <li><a href="https://www.facebook.com/RodrigoPachecoBH" target="_blank" alt="Facebbok" title="Facebbok"><span class='rp-facebook'></span></a></li>
                            <li><a href="https://www.instagram.com/rodrigopachecobh/" target="_blank" alt="Instagram" title="Instagram"><span class='rp-instagram'></span></a></li>
                            <li><a href="https://twitter.com/rodrigo15bh" target="_blank" alt="Twitter" title="Twitter"><span class='rp-twitter'></span></a></li>
                            <li><a href="https://www.youtube.com/channel/UC8z2NYOucY0W3Fxk_oT2P8Q" target="_blank" alt="Youtube" title="Youtube"><span class='rp-youtube'></span></a></li>
			          	</ul>
			        </nav>
		        </div>
	        </div>
		</div>
	</div>
</section>
<?php get_footer(); ?>