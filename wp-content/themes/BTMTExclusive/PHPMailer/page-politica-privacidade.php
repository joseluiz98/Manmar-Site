<?php get_header(); the_post();
/*
Template Name: Politíca de Privacidade
*/
?>
<section id="internas">
	<div class="row">
		<div class="col-md-12">
			<div class="mask">
				<div class="imgEventGalerie">
					<img class="sgallerie" src="<?php echo get_template_directory_uri() ?>/dist/imgs/banner1920x260.png" alt="">
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

	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<img class="sgallerie" src="http://rodrigo15.com.br/wp-content/uploads/2016/08/politicasderelacionamento.png" alt="Politíca de Privacidade" style="margin-left:auto;margin-right:auto;display:block;">
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>