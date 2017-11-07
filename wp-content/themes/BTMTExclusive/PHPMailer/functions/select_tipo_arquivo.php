<?php  
add_action('wp_ajax_nopriv_select_tipo_arquivo', 'select_tipo_arquivo');
add_action('wp_ajax_select_tipo_arquivo', 'select_tipo_arquivo');

function select_tipo_arquivo(){

	$tipo = $_POST['tipo'];

	if($tipo != ''):
	   	$args = array(
			'post_type' => 'press',
			'tax_query' => array(
				array(
					'taxonomy' => 'File',
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
				<div class="col-md-12 col-sm-12 col-xs-12 image">
		      		<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
		      	</div>
		      	<div class="col-md-12 col-sm-12 col-xs-12 info">
		      		<p><?php the_title(); ?></p>
		      		<p><?php echo $size_file; ?></p>
		      	</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
		      		<a class="btn btn-default btn-sm btn-block file" href="<?php echo $file; ?>" download rel="nofollow" role="button">Baixar</a>
		      	</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata(); 
	else:

		$query = Press::getAllPress();

		while ($query->have_posts()): $query->the_post();
			$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			$size_file = get_post_meta(get_the_ID(),'size_file',true);
			$file = get_field('arquivo');
			?>
			<div class="col-md-3">
				<div class="col-md-12 col-sm-12 col-xs-12 image">
		      		<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
		      	</div>
		      	<div class="col-md-12 col-sm-12 col-xs-12 info">
		      		<p><?php the_title(); ?></p>
		      		<p><?php echo $size_file; ?></p>
		      	</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
		      		<a class="btn btn-default btn-sm btn-block file" href="<?php echo $file; ?>" download rel="nofollow" role="button">Baixar</a>
		      	</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata(); 
		
	endif;
	

die();
}
?>