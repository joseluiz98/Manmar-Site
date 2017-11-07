<!DOCTYPE html>

<html>

<head>
	<?php if(ICL_LANGUAGE_CODE=='en'){?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
	<?php } elseif (ICL_LANGUAGE_CODE == 'he') { ?>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-8">		
		<link href="http://www.ovdimsite.org.il/wp-content/plugins/dpProEventCalendar/css/rtl.css?ver=2.2.1" rel="stylesheet">
	<?php } ?>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/favicon.png">

	<title>
	<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
	?>
	</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Frameworks/Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Tooltipster -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/Tooltipster/css/tooltipster.css" />

	<!-- Custom styles for this template -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700" rel="stylesheet" type="text/css">
	<link href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Css/Stylesheet.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Frameworks/Bootstrap/assets/js/html5shiv.js"></script>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Frameworks/Bootstrap/assets/js/respond.min.js"></script>
	<![endif]-->
    
	<!-- WP Custom -->
	<?PHP wp_head(); ?>

	<?php if(ICL_LANGUAGE_CODE=='en'){?>
	<?php } elseif (ICL_LANGUAGE_CODE == 'he') { ?>
    		<!-- Custom styles for Hebrew -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Css/Hebrew.css" />
	<?php } ?>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="TopBar">
			<div class="container">
				<div class="ContentRight">
					<a href="#LinkedIn" title="LinkedIn" class="LangFlag">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/TopSocialLinkedIn.png" alt="LinkedIn">
					</a>
					<a href="https://twitter.com/ovdim" target="_blank" title="Twitter" class="LangFlag">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/TopSocialTwitter.png" alt="Twitter">
					</a>
					<a href="https://www.facebook.com/Ovdimsite" target="_blank" title="Facebook" class="LangFlag">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/TopSocialFacebook.png" alt="Facebook">
					</a>
					<span style="font-size: 16px; margin-right: 6px; margin-top: -10px; position: relative; color: #CDD4D9;">|</span>
					<?php do_action('icl_language_selector'); ?>
					<!--
  					<a href="http://www.ovdimsite.org.il/he/" title="Hebrew" class="LangFlag"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageFlags-HB.png" alt="Hebrew"></a>
					<a href="http://www.ovdimsite.org.il/" title="English" class="LangFlag"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageFlags-EN.png" alt="English"></a>
					-->
					<?php 	if ( is_user_logged_in()) { ?>
						<span><?php _e("Logged in as", "Workers Israel"); ?>&nbsp;<strong><?php wp_get_current_user(); echo ' ' . $current_user->display_name ;?></strong></span>
						<?php
						if(ICL_LANGUAGE_CODE=='en'){ ?>
							<a href="http://www.ovdimsite.org.il/en/profile" class="btn btn-red"><?php _e("Dashboard", "Workers Israel"); ?></a>
						<?php }
						if(ICL_LANGUAGE_CODE=='he'){ ?>
							<a href="http://www.ovdimsite.org.il/profile/" class="btn btn-red"><?php _e("Dashboard", "Workers Israel"); ?></a>
						<?php } ?>
						<a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-red"><?php _e("Logout", "Workers Israel"); ?></a>
					<?php } ?>
					<?php if ( !is_user_logged_in()) { ?>
						<?php
						if(ICL_LANGUAGE_CODE=='en'){ ?>
							<a href="http://www.ovdimsite.org.il/en/register" class="btn btn-red"><?php _e("Register", "Workers Israel"); ?></a>
							<a href="http://www.ovdimsite.org.il/en/login" class="btn btn-red"><?php _e("Login", "Workers Israel"); ?></a>
						<?php }
						if(ICL_LANGUAGE_CODE=='he'){ ?>
							<a href="http://www.ovdimsite.org.il/הרשמה/" class="btn btn-red"><?php _e("Register", "Workers Israel"); ?></a>
							<a href="http://www.ovdimsite.org.il/התחבות/" class="btn btn-red"><?php _e("Login", "Workers Israel"); ?></a>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php bloginfo('url');?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Logo.png" alt="Workers"></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<?php
						wp_nav_menu( array(
							'menu'              => 'top-menu',
							'theme_location'    => 'top-menu',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'navbar-collapse',
							'container_id'      => 'bs-example-navbar-collapse-1',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container maincontentcontainer">
		<div class="HugeHomepageSearch">
			<?php
			if(ICL_LANGUAGE_CODE=='en'){ ?>
				<form action="http://www.ovdimsite.org.il/en/" method="GET">
					<input name="s" value="" type="text" placeholder='<?php _e("search the site...", "Workers Israel"); ?>'>
					<input type="submit" value="">
				</form>
			<?php }
			if(ICL_LANGUAGE_CODE=='he'){ ?>
				<form action="http://www.ovdimsite.org.il/" method="GET">
					<input name="s" value="" type="text" placeholder='<?php _e("search the site...", "Workers Israel"); ?>'>
					<input type="submit" value="">
				</form>
			<?php } ?>
		</div>
		<?php
			if (is_front_page())
			{?>

				<div class="row">
					<div class="col-lg-8 HomeBlockLeft">
						<div class="FeaturedArticlesCore">
							<?php
							if(ICL_LANGUAGE_CODE=='en'){ ?>
								<?php query_posts('category_name=featured-premium&showposts=1'); ?>
							<?php }
							if(ICL_LANGUAGE_CODE=='he'){ ?>
								<?php query_posts('category_name=מאמרים-ראשיים-איחודיים&showposts=1'); ?>
							<?php } ?>
							<?php while (have_posts()) : the_post(); ?>
								<!-- Do special_cat stuff... -->
								<div class="FeaturedArticlesInner">
									<!--
									<h1><?php _e("Featured Articles", "Workers Israel"); ?></h1>
									<hr>
									-->
									<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
									<h2><?php the_title(); ?></h2>
									<h3><?php the_subtitle(); ?></h3>
									<p><?php the_excerpt(); ?></p>
		 						</div>
								<div class="FeaturedArticlesBottom">
									<a href="<?php the_permalink(); ?>" title="Read the full story" class="btn btn-default"><?php _e("Read the full story", "Workers Israel"); ?></a>
								</div>
							<?php endwhile;?>
							<?php
							if(ICL_LANGUAGE_CODE=='en'){ ?>
								<?php query_posts('category_name=featured&showposts=2'); ?>
							<?php }
							if(ICL_LANGUAGE_CODE=='he'){ ?>
								<?php query_posts('category_name=מאמרים-מומלצים&showposts=2'); ?>
							<?php } ?>
							<?php while (have_posts()) : the_post(); ?>
								<div class="ListingCore">
									<div class="FeaturedArticlesInner Listing">
										<div class="row">
											<div class="col-lg-4">
												<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
											</div>
											<div class="col-lg-8">
												<h3><?php the_title(); ?></h3>
												<h4><?php the_subtitle(); ?></h4>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									</div>
									<div class="ListingBottom">
										<span><?php _e("Written on", "Workers Israel"); ?> <?php the_time('jS F Y'); ?> <?php _e("by", "Workers Israel"); ?> <a href="http://www.ovdimsite.org.il/profile/<?php the_author() ?>/"><?php the_author_meta('first_name',$user_id); ?> <?php the_author_meta('last_name',$user_id); ?></a></span>
										<a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e("Read more", "Workers Israel"); ?></a>
									</div>
									<!-- Do special_cat stuff... -->
								</div>
							<?php endwhile;?>
						</div>
						<div class="OtherPostsCore">
							<!--
							<h2><?php _e("Other posts from the Blog", "Workers Israel"); ?></h2>
							<hr>
							-->
							<?php
							if(ICL_LANGUAGE_CODE=='en'){ ?>
								<?php query_posts('category_name=uncategorized&showposts=2'); ?>
							<?php }
							if(ICL_LANGUAGE_CODE=='he'){ ?>
								<?php query_posts('category_name=ללא-קטגוריה&showposts=2'); ?>
							<?php } ?>
							<?php while (have_posts()) : the_post(); ?>
								<div class="ListingCore">
									<div class="FeaturedArticlesInner Listing">
										<div class="row">
											<div class="col-lg-4">
												<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
											</div>
											<div class="col-lg-8">
												<h3><?php the_title(); ?></h3>
												<h4><?php the_subtitle(); ?></h4>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									</div>
									<div class="ListingBottom">
										<span><?php _e("Written on", "Workers Israel"); ?> <?php the_time('jS F Y'); ?> <?php _e("by", "Workers Israel"); ?> <a href="http://www.ovdimsite.org.il/profile/<?php the_author() ?>/"><?php the_author_meta('first_name',$user_id); ?> <?php the_author_meta('last_name',$user_id); ?></a></span>
										<a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e("Read more", "Workers Israel"); ?></a>
									</div>
									<!-- Do special_cat stuff... -->
								</div>
							<?php endwhile;?>
						</div>
					</div>
					<div class="col-lg-4 HomeBlockRight">
						<div class="WhiteContentBlock">
							<h3><?php _e("Recent Articles", "Workers Israel"); ?></h3>
							<hr>
							<ul class="ArticleLinks">
								<?php $the_query = new WP_Query( 'showposts=8' ); ?>
								<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
								<?php endwhile;?>
							</ul>
						</div>
						<div class="EventCalendarCore">
							<div class="Heading">
								<h3><?php _e("Events Calendar", "Workers Israel"); ?></h3>
							</div>
							<div class="EventCalendar">
								<?php
								if(ICL_LANGUAGE_CODE=='en'){ ?>
									<?php echo do_shortcode('[dpProEventCalendar id=1]'); ?>
								<?php }
								if(ICL_LANGUAGE_CODE=='he'){ ?>
									<?php echo do_shortcode('[dpProEventCalendar id=2]'); ?>
								<?php } ?>
							</div>
							<div class="clearfix"></div>
							<?php if ( is_user_logged_in()) { ?>
								<?php
								if(ICL_LANGUAGE_CODE=='en'){ ?>
									<div style="margin-bottom:20px;" class="col-lg-12 text-center"><a href="http://www.ovdimsite.org.il/en/add-new/" class="btn btn-red"><?php _e("Submit a New Event", "Workers Israel"); ?></a></div>
								<?php }
								if(ICL_LANGUAGE_CODE=='he'){ ?>
									<div style="margin-bottom:20px;" class="col-lg-12 text-center"><a href="http://www.ovdimsite.org.il/add-new/" class="btn btn-red"><?php _e("Submit a New Event", "Workers Israel"); ?></a></div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<?php if ( is_page()) : ?>
					<div class="WhiteContentBlock">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php endwhile; endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( !is_page()) : ?>
					<div class="row">
						<div class="col-lg-8 HomeBlockLeft">
							<?php if ( !is_single() ) : ?>
								<div class="OtherPostsCore">
									<?php while (have_posts()) : the_post(); ?>
										<div class="ListingCore">
											<div class="FeaturedArticlesInner Listing">
												<div class="row">
													<div class="col-lg-4">
														<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
													</div>
													<div class="col-lg-8">
														<h3><?php the_title(); ?></h3>
														<h4><?php the_subtitle(); ?></h4>
														<p><?php the_excerpt(); ?></p>
													</div>
												</div>
											</div>
											<div class="ListingBottom">
												<span><?php _e("Written on", "Workers Israel"); ?> <?php the_time('jS F Y'); ?> <?php _e("by", "Workers Israel"); ?> <a href="http://www.ovdimsite.org.il/profile/<?php the_author() ?>/"><?php the_author_meta('first_name',$user_id); ?> <?php the_author_meta('last_name',$user_id); ?></a></span>
												<a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e("Read more", "Workers Israel"); ?></a>
											</div>
											<!-- Do special_cat stuff... -->
										</div>
									<?php endwhile;?>
								</div>
							<?php endif; ?>
							<?php if ( is_single() ) : ?>
								<div class="WhiteContentBlock">
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<h1><?php the_title(); ?></h1>
										<h2><?php the_subtitle(); ?></h2>
										<span><?php _e("Written on", "Workers Israel"); ?> <?php the_time('jS F Y'); ?> <?php _e("by", "Workers Israel"); ?> <a href="http://www.ovdimsite.org.il/profile/<?php the_author() ?>/"><?php the_author_meta('first_name',$user_id); ?> <?php the_author_meta('last_name',$user_id); ?></a></span>
										<hr>
										<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
										<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
										<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
									<?php endwhile; endif; ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-lg-4 HomeBlockRight">
							<div class="WhiteContentBlock">
								<h3><?php _e("Recent Articles", "Workers Israel"); ?></h3>
								<hr>
								<ul class="ArticleLinks">
									<?php $the_query = new WP_Query( 'showposts=16' ); ?>
									<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
									<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
									<?php endwhile;?>
								</ul>
							</div>
						</div>
					</div>
				<?php endif; ?>
		<?php } ?>
	</div>
	<footer>
		<ul>
			<?php wp_nav_menu( array( 'container' => '', 'container_class' => false, 'items_wrap' => '%3$s', 'theme_location' => 'footer-menu' ) ); ?>
		</ul>
		<div class="SocialIcons">
			<a href="https://www.facebook.com/Ovdimsite" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/SocialIcons-Facebook.png" alt="Facebook"></a>
			<a href="https://twitter.com/ovdim" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/SocialIcons-Twitter.png" alt="Twitter"></a>
			<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/SocialIcons-LinkedIn.png" alt="LinkedIn"></a>
		</div>
		<a href="<?php bloginfo('url');?>" title="Workers Israel" class="Logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Logo.png" alt="Workers Israel"></a>
		<p>Copyright &copy; 2014, <strong>Workers Israel</strong>.<br>All Rights Reserved.</p>
	</footer>
	
	<div class="EventsList" style="display:none;">[{date:'2014-08-12',title:'CLNDR GitHub Page Finished',url:'http://github.com/kylestetz/CLNDR'}]</div>
		
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- We guess the latest is not needed at teh moment
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	-->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Frameworks/Bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Scroll Reveal JS -->
	<script src='Assets/Js/ScrollReveal/scrollReveal.js'></script>
	<script type="text/javascript">
		(function ($) {
			'use strict';
			window.scrollReveal = new scrollReveal({ reset: true, move: '50px' });
		})();
	</script>
	
	<!-- WP Custom Footer -->
	<?PHP wp_footer(); ?>
</body>
</html>
