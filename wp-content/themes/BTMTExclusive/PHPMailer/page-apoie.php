<?php get_header(); the_post();
/*
Template Name: Apoie
*/
include 'inc/arguments.php';

$title_highlight = get_field('frase_de_destaque',$post_id);

$args = array('taxonomy' => 'materials');
$terms = get_terms('Type',$args);
?>
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

<section id="apoie">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4">
					<?php the_content(); ?>
					<select name="tipo-proposta" id="tipo-arquivo-download" style="width:100%;margin:3rem 0;">
						<option value="">Escolha o tipo de arquivo</option>
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
            while ($materials->have_posts()): $materials->the_post();
            	$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$size_file = get_post_meta(get_the_ID(),'size_file',true);
            	$file = get_field('arquivo');
				?>
	        	<div class="col-md-3">
	        		<div class="col-md-12 col-sm-12 col-xs-12">
		        		<h2><?php the_title(); ?></h2>
		        	</div>
	        		<div class="col-md-12 col-sm-12 col-xs-12 image">
		          		<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
		          	</div>
		          	<div class="col-md-6 col-sm-6 col-xs-6 icons">
		          		<span class="rp-phone"><label for="size"><?php echo $size_file; ?></label></span>
		          	</div>
		          	<div class="col-md-6 col-sm-6 col-xs-6 icons">
		          		<span class="rp-notebook"><label for="size"><?php echo $size_file; ?></label></span>
		          	</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
		          		<a class="btn btn-default btn-sm btn-block whatts" data-id-link="<?php the_ID(); ?>"  role="button">Receber pelo whatsapp</a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 contentForm" id="contentForm<?php echo the_ID(); ?>">

						<form id="formApoie" data-id-form="<?php the_ID(); ?>" method="post" action="<?php bloginfo('template_url') ?>/insert-number-whatsapp.php">

						<!-- <form id="formApoie" data-id-form="<?php the_ID(); ?>"> -->

							<!-- <span id="fc_number"> -->

								<input type="hidden" class="form-control" id="txtNameFile" name="txtNameFile" value="<?php the_title(); ?>">

								<input type="hidden" class="form-control" id="txtUrlFile" name="txtUrlFile" value="<?php echo $file; ?>">

								<input type="text" class="phone" id="txtNumberFile" name="txtNumberFile"  required>

								<!-- <span class="textfieldRequiredMsg">Campo Obrigátorio !</span>  -->
							</span>

							<input type="submit" data-id-button="<?php the_ID(); ?>" class="sendContatoDownload" value="Enviar">	
							
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/loading.gif" class="loading"> -->
						    
						    <!-- <br/>
						    
						    <p id="retornoHTMLnews"></p> -->
						</form>
					</div>
		          	<div class="col-md-12 col-sm-12 col-xs-12">
		          		<a class="btn btn-default btn-sm btn-block file" href="<?php echo $file; ?>" download rel="nofollow" role="button">Baixar</a>
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