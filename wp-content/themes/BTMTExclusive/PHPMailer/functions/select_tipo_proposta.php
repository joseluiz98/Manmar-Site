<?php  
add_action('wp_ajax_nopriv_select_tipo_proposta', 'select_tipo_proposta');
add_action('wp_ajax_select_tipo_proposta', 'select_tipo_proposta');

function select_tipo_proposta(){

	$area = $_POST['area'];

	if($area != ''):

	   	$args = array(
			'post_type' => 'proposals',
			'tax_query' => array(
				array(
					'taxonomy' => 'Area',
					'field'    => 'term_id',
					'terms'    => $area,
				),
			),
		);

	   	$query = new WP_Query($args);

	    while ($query->have_posts()): $query->the_post();
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
	else:

	 	$query = Proposals::getAllProposals();

	 	while ($query->have_posts()): $query->the_post();
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
	endif;

die();
}
?>