<?php get_header(); the_post();
$img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$categories = get_the_category($post->ID,array('fields' => 'names'));
?>
<section id="single" class="interns" style="margin-top:100px;">
	<div class="col-lg-12 dataTop">
		<header>
			<div class="container">
				<div class="col-lg-12 dataCat"><?php the_date('d/m/Y', '<p>', '</p>'); ?></div>
				<div class="col-lg-12"><h2><?php the_title(); ?></h2></div>
				<div class="col-lg-12 dataLocation">
					<?php
						foreach($categories as $category):
							echo $category->cat_name; 
						endforeach;
					?>		
				</div>
			</div>
		</header>
	</div>
	<div class="col-lg-12 navigation">
		<div class="container">

			<div class="col-xs-6 col-md-3 back">
				<a href="javascript:history.back()">voltar</a>
			</div>
			<div class="col-xs-12 col-md-6 description">
				<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
				<p><?php the_content(); ?></p>
			</div>
			<div class="col-xs-6 col-md-3 medias">
				<ul>
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Facebook" style="padding: .3rem .1rem;">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="http://twitter.com/share?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=580,height=235');return false;" title="Twitter">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php get_footer();