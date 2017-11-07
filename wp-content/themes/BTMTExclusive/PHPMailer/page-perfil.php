<?php get_header(); the_post();
/*
Template Name: Perfil
*/
$title_highlight = get_field('frase_de_destaque',$post_id);

$video = get_field('video', $post_id);
$url = str_replace('watch?v=', 'embed/', $video);
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
	<div class="row">
		<div class="container">
			<div class="col-md-8 col-md-offset-2  col-sm-6 col-sm-offset-3 text-center">
				<div class="content">
					<?php the_content(); ?>
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
<?php get_footer(); ?>