<?php get_header(); the_post();
/*
Template Name: Imprensa
*/
include 'inc/arguments.php';

$title_highlight = get_field('frase_de_destaque',$post_id);

$args = array('taxonomy' => 'press');
$terms = get_terms('File',$args);
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

<section id="imprensa">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4">
					<p><?php the_content(); ?></p>
					<select name="tipo-arquivo" id="tipo-arquivo" style="width:100%;margin:3rem 0;">
						<option value="">Escolha o tipo de Arquivo</option>
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
            while ($press->have_posts()): $press->the_post();
            	$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$size_file = get_post_meta(get_the_ID(),'size_file',true);
				$file = get_field('arquivo');
				$type = get_field('type');
				if($type != 'Sim'):
				?>
	        	<div class="col-md-3">
	        		<div class="col-md-12 col-sm-12 col-xs-12 image">
		          		<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
		          	</div>
		          	<div class="col-md-12 col-sm-12 col-xs-12 info">
		          		<p><?php the_title(); ?></p>
		          	</diV>
		          	<div class="col-md-12 col-sm-12 col-xs-12 info">
		          		<p><?php echo $size_file; ?></p>
		          	</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
		          		<a class="btn btn-default btn-sm btn-block file" href="<?php echo $file; ?>" download rel="nofollow" role="button">Baixar</a>
		          	</div>
	        	</div>
				<?php
				else:
					?>
					<div class="col-md-3">
		        		<div class="col-md-12 col-sm-12 col-xs-12 image">
			          		<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/flickr.png" alt="Flickr">
			          	</div>
			          	<div class="col-md-12 col-sm-12 col-xs-12 info">
			          		<p>Acesse o nosso flickr e confira as imagens</p>
			          	</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
			          		<a class="btn btn-default btn-sm btn-block file" href="https://www.flickr.com/photos/rodrigopachecobh" target="_blank" role="button">Acesse</a>
			          	</div>
		        	</div>
					<?php
				endif;
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