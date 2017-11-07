<?php  
add_action('wp_ajax_nopriv_select_tipo_arquivo_download', 'select_tipo_arquivo_download');
add_action('wp_ajax_select_tipo_arquivo_download', 'select_tipo_arquivo_download');

function select_tipo_arquivo_download(){

	$tipo = $_POST['tipo'];

	if($tipo != ''):
	   	$args = array(
			'post_type' => 'materials',
			'tax_query' => array(
				array(
					'taxonomy' => 'Type',
					'field'    => 'term_id',
					'terms'    => $tipo,
				),
			),
		);

		$query = new WP_Query($args);

	    while ($query->have_posts()): $query->the_post();
	    	$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$size_file = get_post_meta(get_the_ID(),'size_file',true);
            	$file = get_field('arquivo');
	        	?>
	        	<div class="col-md-3">
	        		<div class="col-md-12 col-sm-12 col-xs-12">
		        		<h2><?php the_title(); ?></h2>
		        	</div>
	        		<div class="col-md-12 col-sm-12 col-xs-12 image">
		          		<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
		          	</div>
		          	<div class="col-md-6 col-sm-6 col-xs-6 icons">
		          		<span class="rp-phone"><label for="size"><?php echo $size_file; ?></label></span>
		          	</div>
		          	<div class="col-md-6 col-sm-6 col-xs-6 icons">
		          		<span class="rp-notebook"><label for="size"><?php echo $size_file; ?></label></span>
		          	</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
		          		<a class="btn btn-default btn-sm btn-block whatts" data-id-link="<?php the_ID(); ?>"  role="button">Receber pelo whatsapp</a>
		          		<a class="btn btn-default btn-sm btn-block file" href="<?php the_permalink(); ?>" download rel="nofollow" role="button">Baixar</a>
		          	</div>

	          		<div class="col-md-12 col-sm-12 col-xs-12 contentForm" id="contentForm<?php echo the_ID(); ?>">

						<!-- <form id="formApoie" data-id-form="<?php the_ID(); ?>" method="post" action="<?php bloginfo('template_url') ?>/registerNumber.php"> -->

						<form id="formApoie" data-id-form="<?php the_ID(); ?>">

							<span id="fc_number">
								<input type="hidden" class="form-control" id="txtNameFile" name="txtNameFile" value="<?php the_title(); ?>">
								<input type="hidden" class="form-control" id="txtUrlFile" name="txtUrlFile" value="<?php echo $file; ?>">
								<input type="text" class="phone" id="txtNumber<?php echo the_ID(); ?>" name="txtNumber" placeholder="Número Whatsapp" required>
								<span class="textfieldRequiredMsg">Campo Obrigátorio !</span> 
							</span>

							<input type="submit" data-id-button="<?php the_ID(); ?>" class="sendContatoDownload" value="Enviar">	
							
							<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/loading.gif" class="loading">
						    
						    <br/>
						    
						    <p id="retornoHTML"></p>
						</form>
					</div>
	        	</div>
			 <?php
	    endwhile;
	    wp_reset_postdata(); 
	else:

		$query = Materials::getAllMaterials();

		    while ($query->have_posts()): $query->the_post();
	    		$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            	$size_file = get_post_meta(get_the_ID(),'size_file',true);
            	$file = get_field('arquivo');
	        	?>
	        	<div class="col-md-3">
	        		<div class="col-md-12 col-sm-12 col-xs-12">
		        		<h2><?php the_title(); ?></h2>
		        	</div>
	        		<div class="col-md-12 col-sm-12 col-xs-12 image">
		          		<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
		          	</div>
		          	<div class="col-md-6 col-sm-6 col-xs-6 icons">
		          		<span class="rp-phone"><label for="size"><?php echo $size_file; ?></label></span>
		          	</div>
		          	<div class="col-md-6 col-sm-6 col-xs-6 icons">
		          		<span class="rp-notebook"><label for="size"><?php echo $size_file; ?></label></span>
		          	</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
		          		<a class="btn btn-default btn-sm btn-block whatts" data-id-link="<?php the_ID(); ?>"  role="button">Receber pelo whatsapp</a>
		          		<a class="btn btn-default btn-sm btn-block file" href="<?php the_permalink(); ?>" download rel="nofollow" role="button">Baixar</a>
		          	</div>

	          		<div class="col-md-12 col-sm-12 col-xs-12 contentForm" id="contentForm<?php echo the_ID(); ?>">

						<!-- <form id="formApoie" data-id-form="<?php the_ID(); ?>" method="post" action="<?php bloginfo('template_url') ?>/registerNumber.php"> -->

						<form id="formApoie" data-id-form="<?php the_ID(); ?>">

							<span id="fc_number">
								<input type="hidden" class="form-control" id="txtNameFile" name="txtNameFile" value="<?php the_title(); ?>">
								<input type="hidden" class="form-control" id="txtUrlFile" name="txtUrlFile" value="<?php echo $file; ?>">
								<input type="text" class="phone" id="txtNumber<?php echo the_ID(); ?>" name="txtNumber" placeholder="Número Whatsapp" required>
								<span class="textfieldRequiredMsg">Campo Obrigátorio !</span> 
							</span>

							<input type="submit" data-id-button="<?php the_ID(); ?>" class="sendContatoDownload" value="Enviar">	
							
							<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/loading.gif" class="loading">
						    
						    <br/>
						    
						    <p id="retornoHTML"></p>
						</form>
					</div>
	        	</div>
			 <?php
	    endwhile;
	    wp_reset_postdata(); 
	endif;
die();
}
?>