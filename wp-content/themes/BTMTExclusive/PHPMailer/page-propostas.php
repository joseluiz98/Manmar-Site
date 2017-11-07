<?php get_header(); the_post();
/*
Template Name: Propostas
*/
include 'inc/arguments.php';

$title_highlight = get_field('frase_de_destaque',$post_id);

$video = get_field('video', $post_id);
$url = str_replace('watch?v=', 'embed/', $video);

$args = array('taxonomy' => 'proposals');
$terms = get_terms('Area',$args);
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
	<?php if($url): ?>
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<iframe class="embed-responsive-item" src="<?php echo $url; ?>" height="410" width="100%" style="margin:3rem 0;"></iframe>
			</div>
		</div>
	</div>
	<?php endif; ?>
</section>

<section id="propostas">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4">
					<select name="tipo-proposta" id="tipo-proposta" style="width:100%;margin-bottom:3rem;">
						<option value="">Filtre por Área</option>
						<?php
						foreach ($terms as $term):
							?>
							<option value="<?php echo $term->term_id; ?>"><?php echo $term->name ; ?></option>
							<?php 
						endforeach;
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="listData">
			<?php
            while ($proposals->have_posts()): $proposals->the_post();
            	$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$area = get_post_meta(get_the_ID(),'area_proposal',true);
                    ?>
		        	<div class="col-md-4 itens">
			          	<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
			          	<div class="box">
							<h2><?php the_title(); ?></h2>
			          		<p><?php the_content(); ?></p>
			          	</div>
		        	</div>
				 <?php
            endwhile;
            wp_reset_postdata(); 
            ?>
      	</div>
      	<div class="col-md-12" id="load">
			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/ajax-loader.gif" alt="">
			</div>
		</div>
      	<div class="rowResults"><div>
    </div>
</section>
<?php get_footer(); ?>