<?php get_header(); the_post();
/*
Template Name: Antwerpen
*/
$units = Units::getUnits();
$exchanges = Courses::getCourses();
?>
<div class="owl-carousel owl-theme">
    <?php
        while ($exchanges->have_posts()): $exchanges->the_post();
            $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $taxa = get_the_title(get_post_meta(get_the_ID(),'area_course',true));
            $moeda_1 = get_the_title(get_post_meta(get_the_ID(),'level_course',true));
            $moeda_2 = get_the_title(get_post_meta(get_the_ID(),'level_course_two',true));
            $store = get_the_title(get_post_meta(get_the_ID(),'unit_course',true));
            $type = get_post_meta(get_the_ID(),'coordinator_course',true);
            $location = get_the_title(get_post_meta(get_the_ID(),'location_course',true));
            if($store == 'Antwerpen'):
	        		if($type == 220):
	                ?>
	                <div class="itens">
	                    <div class="contentData">
	                        <div class="flag">
	                            <img src="<?php echo $img; ?>" alt="" style="background-size: cover;height:80vh;">
	                        </div>
	                    </div>
	                    <div class="contentExchange">
	                        <div class="exchange">
								<div>
									<p><?php 
										if($moeda_1 != ''):
											echo '<span>1'.$moeda_1.'</span>=
										<span>'.$moeda_2.'</span>'.$taxa;
										else:
											echo $taxa;
										endif;
										?>
									</p>
								</div>
							</div>
	                        <div class="country">
	                             <h2><?php echo $location; ?></h2>
	                        </div>
	                        <div class="logo">
	                            <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/logo-bt.png" alt="">
	                        </div>
	                    </div>
	                </div>
	                <?php 
	            else: 
	                ?>
	                <div class="itens">
	                    <div class="content-partners" style="">
	                        <div>
	                            <img src="<?php echo $img; ?>" alt="">
	                        </div>
	                    </div>
	                </div>
	                <?php
	            endif;
        	endif;
        endwhile;
    wp_reset_postdata(); 
    ?>
</div>
<?php get_footer(); ?>