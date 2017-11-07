<?php get_header(); the_post();
/*
Template Name: Vídeos
*/
include 'inc/arguments.php';

$title_highlight = get_field('frase_de_destaque',$post_id);
// $args = array('taxonomy' => 'proposals');
// $terms = get_terms('Area',$args);
// $thumbnail = getThumbnail();
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
						<h1><?php echo $title_highlight; ?></h1>
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

<section id="videos">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4">
					<?php the_content(); ?>
					<!-- <select name="tipo-proposta" id="" style="width:100%;margin:3rem 0;">
						<option value="">Filtre por Área</option>
						<option value="">Tipo Proposta</option>
						<option value="">Tipo Proposta</option>
						<option value="">Tipo Proposta</option>
					</select> -->

					<div class="form-group">
						<?php include 'searchform.php'; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
            while ($videos->have_posts()): $videos->the_post();
            	$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$argsurl = get_post_meta(get_the_ID(),'linkVideo',true);
				$url = str_replace('watch?v=', 'embed/', $argsurl);
				?>
	        	<div class="col-md-3 itens">
		          	<iframe class="embed-responsive-item" src="<?php echo $url; ?>" height="155" width="100%"></iframe>
		          	<h2><?php the_title(); ?></h2>
	        	</div>
				<?php
            endwhile;
            wp_reset_postdata(); 
            ?>
        	<!-- <div class="col-md-3 itens">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div>

        	<div class="col-md-3 itens">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div>
			
        	<div class="col-md-3 itens">
	          	<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div>

        	<div class="col-md-3 itens">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div>

        	<div class="col-md-3 itens">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div>

        	<div class="col-md-3 itens">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div>

        	<div class="col-md-3 itens">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/lH_ZieFH8U8" height="155" width="100%"></iframe>
        	</div> -->
      </div>
    </div>
</section>
<?php get_footer(); ?>