<?php get_header(); the_post();
/*
Template Name: Notícias
*/
include 'inc/arguments.php';

$title_highlight = get_field('frase_de_destaque',$post_id);
?>
<section id="internas">
	<div class="row">
		<div class="col-md-12">
			<div class="mask">
				<div class="imgEventGalerie">
					<img class="sgallerie" src="<?php echo get_template_directory_uri() ?>/dist/imgs/banner_pequeno.png" alt="">
				</div>
				<div class="mask-hover">
					<div class="col-md-6 col-md-offset-3 title-page">
						<p><?php the_title(); ?></p>
						<h1><?php echo $title_highlight ; ?></h1>
					</div>
					<div class="col-md-4 col-md-offset-4 title-page">
						<nav class="iconsMedia">
				          	<ul class="nav navbar-nav">
					            <li><a id="a_menos" class="diminuir" href="#"><span class="rp-minus"></span></a></li>
                                <li><a id="a_mais" class="aumentar" href="#"><span class="rp-plus"></span></a></li>
                                <li><a id="contraste" href="#" onclick="setActiveStyleSheet('normal'); return false;"><span class="rp-contrast"></span></a></li>
                                <li><a id="contrasteOne" href="#" onclick="setActiveStyleSheet('contraste'); return false;"class=""style="display:none;"><span class="rp-contrast"></span></a></li>
				          	</ul>
				        </nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
            while ($news->have_posts()): $news->the_post();
            	$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$text = get_the_content();
                    ?>
		        	<div class="col-md-4">
			          	<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
			          	<p><?php echo limitarTexto($text,243); ?></p>
			          	<p><a class="btn btn-default" href="<?php the_permalink(); ?>" role="button">Veja Mais</a></p>
		        	</div>
					 <?php
            endwhile;
            wp_reset_postdata(); 
            ?>
      </div>
    </div>
</section>
<?php get_footer(); ?>