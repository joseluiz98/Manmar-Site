<!DOCTYPE html>
<html>

<head>
	<!-- Meta Data -->
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Hash Moody">
	<meta name="description" content="Azoora Incorporated - Official Blog">
	<meta name="keywords" content="Azoora, Azoora Incorporated, Azoora Blog 2015, Official Azoora Inc Blog">
	<meta name="Rating" content="General">
	<meta name="Revisit-after" content="7 Days">

	<!-- Old Browser Supporting Scripts -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Favicon.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Flat/css/flat-ui.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/TextInputEffects/css/set1.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/FullscreenMenu/Assets/css/simplemenu.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/css/animations.css">

	<!-- Preloader -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/Preloader/css/main.css">

	<!-- Fonts -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Fonts/StylesheetModern.css">

	<!-- Title -->
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
	<?PHP wp_head(); ?>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Css/Stylesheet.css">
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5SWDQN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5SWDQN');</script>
<!-- End Google Tag Manager -->
	<!-- Responsive Navigation Menu -->
	<div class="mobilenav">
		<div class="container">
			<div class="col-lg-12">
				<a href="javascript:void(0)" class="icon"> 
					<span class="hamburger"> 
						 <span class="menui top-menu"></span> 
						 <span class="menui mid-menu"></span> 
						 <span class="menui bottom-menu"></span> 
					</span> 
				</a>
			</div>
		</div>
		<div class="Content col-lg-6 col-lg-offset-3 text-center">
			<div class="center-block">
				<div class="col-lg-12">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/FooterLogo.png" alt="Azoora Incorporated Blog" class="Logo center-block img-responsive">
					<hr>
					<h2 class="text-uppercase">Navigate</h2>
				</div>
				<div class="col-lg-6 text-left">
					<h3>Website</h3>
					<ul>
						<li><a href="http://www.azoora.com">Home</a></li> 
						<li><a href="http://www.azoora.com/portfolio">Portfolio Showcase</a></li> 
						<li><a href="http://www.azoora.com/proposal-planner">Proposal Planner</a></li> 
						<li><a href="http://www.azoora.com/about-us">Company</a></li> 
						<li><a href="http://www.azoora.com/services">Services</a></li>
						<li><a href="http://www.azoora.com/legal/privacy-policy">Privacy Policy</a></li>
						<li><a href="http://www.azoora.com/legal/terms-of-service">Terms of Service</a></li>
						<li><a href="http://www.azoora.com/legal/warranties">Warranties</a></li>
						<li><a href="http://www.azoora.com/legal/accepted-payments">Payments</a></li>
					</ul>
				</div>
				<div class="col-lg-6 text-right">
					<h3>The Blog</h3>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>">Blog Home</a></li> 
						<?php 
							$args = array(
							'show_option_all'    => '',
							'orderby'            => 'name',
							'order'              => 'DESC',
							'style'              => 'list',
							'show_count'         => 0,
							'hide_empty'         => 1,
							'use_desc_for_title' => 1,
							'child_of'           => 0,
							'feed'               => '',
							'feed_type'          => '',
							'feed_image'         => '',
							'exclude'            => '',
							'exclude_tree'       => '',
							'include'            => '',
							'hierarchical'       => 1,
							'title_li'           => __( '' ),
							'show_option_none'   => __( '' ),
							'number'             => null,
							'echo'               => 1,
							'depth'              => 0,
							'current_category'   => 0,
							'pad_counts'         => 0,
							'taxonomy'           => 'category',
							'walker'             => null
							);
							wp_list_categories( $args ); 
						?>
					</ul>
				</div>
			</div>
		</div>
	</div> 
	<!-- Responsive Navigation Menu End -->

	<!-- Header -->	
	<header>
		<div class="container">
			<div class="col-lg-12">
				<a href="<?php bloginfo('url'); ?>" class="Logo">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/HeaderLogo.png" alt="Logo" class="QuarterSecDelay OneAndHalfSecDuration img-responsive" animation="if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
				</a>
				<a href="javascript:void(0)" class="icon">
					<span class="hamburger"> 
						 <span class="menui top-menu"></span> 
						 <span class="menui mid-menu"></span> 
						 <span class="menui bottom-menu"></span> 
					</span> 
				</a>
			</div>
		</div>
		<div class="col-lg-12 RedBar">
		</div>
	</header>
	<!-- Header End -->

	<!-- PromoBlock -->
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0];
	?>
	<?php else :
		$image = get_bloginfo( 'stylesheet_directory') . '/Assets/Images/BG.png';
	?>
	<?php endif; ?>
		<?php if (!is_front_page()) : ?>
			<?php if (!is_page()) : ?>
				<?php if (is_single()) : ?>
					<div class="PromoBlock" style="background-image: url('<?php echo $image; ?>')">
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if (!is_single()) : ?>
			<div class="PromoBlock">
		<?php endif; ?>
		<?php if (!is_front_page()) : ?>
			<?php if (!is_page()) : ?>
				<?php if (is_single()) : ?>
					<div class="Overlay"></div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		<div class="PromoBlockInnerContainer container">
			<div class="Content text-center">
				<?php if (is_front_page()) : ?>
					<h1 class="QuarterSecDelay" animation="if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">
						"Creativity is the Greatest Rebellion in Existence."
					</h1>
					<h2 class="HalfSecDelay" animation="if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">
						<strong>Hash Moody</strong>
					</h2>
				<?php endif; ?>
				<?php if (!is_front_page()) : ?>
					<?php if (!is_page()) : ?>
						<?php if (is_single()) : ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<h1 class="QuarterSecDelay" animation="if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">
									<?php the_title(); ?>
								</h1>
								<h2 class="HalfSecDelay" animation="if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">
									By 
									<strong>
										<?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?>
									</strong>
								</h2>
								<hr class="center-block col-xs-1">
								<h3><?php echo get_the_date('D'); ?>, <?php echo get_the_date('d M Y'); ?></h3>
								<hr class="center-block col-xs-1">
								<p class="ReadingTime"><span class="eta"></span> (<span class="words"></span> words)</p>
								<p style="display:none;"><a class="view-demo" href="javascript:(function(){var%20style=document.createElement('style');style.innerHTML='body:before%20{%20content:%22%22;%20position:fixed;%20top:50%25;%20left:50%25;%20z-index:9999;%20width:1px;%20height:%201px;%20outline:2999px%20solid%20invert;%20}';document.body.appendChild(style)})();">Night Mode</a></p>
							<?php endwhile; endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<a data-scroll="" href="#ContentBlock"><span class="ScrollDown"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/ScrollDownIcon.png" alt="Scroll Down" class="OneAndHalfSecDuration" animation="if: mouseover, do: zOOmOut animated"></span></a>
			</div>
		</div>
	</div>
	<!-- PromoBlock End-->
	
	<!-- Blog Content -->
	<div class="ContentBlock" id="ContentBlock">
		<div class="container">
			<div class="col-lg-8">
				<form action="<?php bloginfo('url'); ?>" method="GET">
					<div class="SidebarSearch visible-xs visible-sm visible-md hidden-lg">
						<input name="s" value="" type="search" placeholder='<?php _e("search the site...", "AzooraBlog"); ?>'>
						<input type="submit" value="">
					</div>
				</form>
				<?php if (is_front_page()) : ?>
					<?php if (!is_page()) : ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="PostItem">
								<h1 class="HalfSecDuration" animation="if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h1>
								<div class="PostContent">
									<?php the_excerpt(); ?>
									<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e("Continue reading this article ", "AzooraBlog"); ?></a>
								<hr>
							</div>
						<?php endwhile; endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<?php if (!is_front_page()) : ?>
					<?php if (!is_page()) : ?>
						<?php if (!is_single()) : ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<div class="PostItem">
									<h1 class="HalfSecDuration" animation="if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h1>
									<div class="PostContent">
										<?php the_excerpt(); ?>
										<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>
									</div>
									<a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e("Continue reading this article ", "AzooraBlog"); ?></a>
									<hr>
								</div>
							<?php endwhile; endif; ?>
						<?php endif; ?>
						<?php if (is_single()) : ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<div class="PostItem">
									<h1 class="HalfSecDuration" animation="if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
										<?php the_title(); ?>
									</h1>
									<div class="MetaData">
										<div class="Author" title="<?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?>">
											<?php echo get_avatar( get_the_author_email(), 50 ); ?>
											<span>
												By 
												<?php the_author_meta('first_name'); ?> 
												<?php the_author_meta('last_name'); ?>
											</span>
										</div>
										<div class="PublishedOn">
											<span><?php echo get_the_date('D'); ?>, <?php echo get_the_date('d M Y'); ?></span>
										</div>
										<div class="CommentsCount">
											<span class="spot-im-replies-count" data-post-id="<?php the_id(); ?>"></span> Comments
											<!--span style="display:none;">
												<?php comments_number('No Comments', '1 Comment', '% Comments'); ?>
											</span-->
										</div>
									</div>
									<hr>
									<div class="PostContent">
										<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>
										<?php the_content(); ?>
									</div>
									<div class="AboutTheAuthorBlock">
										<div class="Author">
											<h3>
												<?php echo get_avatar( get_the_author_email(), 50 ); ?>
												About the author 
												<span>
													<?php the_author_meta('first_name'); ?> 
													<?php the_author_meta('last_name'); ?>
												</span>
											</h3>
										</div>
										<p>
											<?php the_author_meta('description'); ?>
										</p>
									</div>
									<div id="spot-im-frame-inpage" data-post-id="<?php the_ID(); ?>" style="margin:0 -7px;"></div>
								</div>
							<?php endwhile; endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="col-lg-4 hidden-xs hidden-sm hidden-md visible-lg">
				<form action="<?php bloginfo('url'); ?>" method="GET">
					<div class="SidebarSearch">
						<input name="s" value="" type="search" placeholder='<?php _e("search the site...", "AzooraBlog"); ?>'>
						<input type="submit" value="">
					</div>
				</form>
				<hr>
				<h3>Browse by category</h3>
				<ul class="CategoryTags">
					<?php 
						$args = array(
						'show_option_all'    => '',
						'orderby'            => 'name',
						'order'              => 'DESC',
						'style'              => 'list',
						'show_count'         => 0,
						'hide_empty'         => 1,
						'use_desc_for_title' => 1,
						'child_of'           => 0,
						'feed'               => '',
						'feed_type'          => '',
						'feed_image'         => '',
						'exclude'            => '',
						'exclude_tree'       => '',
						'include'            => '',
						'hierarchical'       => 1,
						'title_li'           => __( '' ),
						'show_option_none'   => __( '' ),
						'number'             => null,
						'echo'               => 1,
						'depth'              => 0,
						'current_category'   => 0,
						'pad_counts'         => 0,
						'taxonomy'           => 'category',
						'walker'             => null
						);
						wp_list_categories( $args ); 
					?>
				</ul>
				<hr>
				<?php if (is_active_sidebar('right-sidebar')) : ?>
	  				<div>
						<?php dynamic_sidebar('right-sidebar'); ?>
					</div>
				<?php endif; ?>
				
				<!-- Begin MailChimp Signup Form -->
				<div class="SubscribeBlock">
					<form action="//azoora.us12.list-manage.com/subscribe/post?u=cfe08e373ba196bd2e5fabd12&amp;id=6499eb3247" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div>
							<h3>Subscribe via email</h3>
							<p >Get every new post hand-delivered to your inbox. Just enter your email.</p>
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="somename@somesite.com">
						    <input type="submit" value="" name="subscribe" id="mc-embedded-subscribe" class="button">
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none; margin-top:10px;"></div>
								<div class="response" id="mce-success-response" style="display:none; margin-top:10px;"></div>
							</div>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cfe08e373ba196bd2e5fabd12_6499eb3247" tabindex="-1" value=""></div>
					    </div>
					</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
				<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->				

				<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/FollowOnFacebook.png" alt="Follow On Facebook" class="FollowOnFacebook img-responsive TwoSecDuration" animation="if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
				<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/FollowOnBehance.png" alt="Follow On Facebook" class="FollowOnBehance img-responsive TwoSecDuration" animation="if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
			</div>
		</div>
	</div>
	<!-- Blog Content End -->
	
	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="Content ContentBlock col-lg-12">
				<div class="col-lg-2 hidden-xs hidden-sm hidden-md visible-lg">
					<h3>Website</h3>
					<ul>
						<li><a href="http://www.azoora.com">Home</a></li> 
						<li><a href="http://www.azoora.com/portfolio">Portfolio Showcase</a></li> 
						<li><a href="http://www.azoora.com/proposal-planner">Proposal Planner</a></li> 
						<li><a href="http://www.azoora.com/about-us">Company</a></li> 
						<li><a href="http://www.azoora.com/services">Services</a></li>
						<li><a href="http://www.azoora.com/legal/privacy-policy">Privacy Policy</a></li>
						<li><a href="http://www.azoora.com/legal/terms-of-service">Terms of Service</a></li>
						<li><a href="http://www.azoora.com/legal/warranties">Warranties</a></li>
						<li><a href="http://www.azoora.com/legal/accepted-payments">Payments</a></li>
					</ul>
				</div>
				<div class="col-lg-2 hidden-xs hidden-sm hidden-md visible-lg">
					<h3>Blog</h3>
					<ul>
						<li><a href="<?php bloginfo('url'); ?>">Blog Home</a></li>
						<?php 
							$args = array(
							'show_option_all'    => '',
							'orderby'            => 'name',
							'order'              => 'DESC',
							'style'              => 'list',
							'show_count'         => 0,
							'hide_empty'         => 1,
							'use_desc_for_title' => 1,
							'child_of'           => 0,
							'feed'               => '',
							'feed_type'          => '',
							'feed_image'         => '',
							'exclude'            => '',
							'exclude_tree'       => '',
							'include'            => '',
							'hierarchical'       => 1,
							'title_li'           => __( '' ),
							'show_option_none'   => __( '' ),
							'number'             => null,
							'echo'               => 1,
							'depth'              => 0,
							'current_category'   => 0,
							'pad_counts'         => 0,
							'taxonomy'           => 'category',
							'walker'             => null
							);
							wp_list_categories( $args ); 
						?>
					</ul>
				</div>
				<div class="col-lg-4 hidden-xs hidden-sm hidden-md visible-lg">
					<h3>Recent Articles</h3>
					<ul>
						<?php query_posts('showposts=7'); ?>
						<?php while (have_posts()) : the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile;?>
					</ul>
				</div>
				<div class="col-lg-4">
					<p>We're a premium design agency having clients ranging from individuals to fortune companies &amp; 
					catering them all across the globe with personal touch.</p>
					<p>If you're interested in working with us, <a href="">please get in touch.</a></p>
					<hr>
					<a class="Logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/FooterLogo.png" alt="Azoora Incorporated Blog" class="center-block img-responsive QuarterSecDelay OneAndHalfSecDuration" animation="if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
					<hr>
					<p>© 2007-2015 Azoora Incorporated, <br>All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer End -->

	<!-- JavaScripts -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/jQuery/jquery-2.1.4.min.js"></script>
	<!-- Fullscreen Menu -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/FullscreenMenu/Assets/js/simplemenu.js"></script>
	<!-- ScrollReveal -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/dist/anijs-min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/dist/helpers/scrollreveal/anijs-helper-scrollreveal-min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/dist/event_systems/jquery/anijs-jquery-event-system-min.js"></script>
	<!-- Text Input Effects -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/TextInputEffects/js/classie.js"></script>
	<!-- SmoothScroll -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/SmoothScroll/smoothScroll.js"></script>
	<!-- Preloader -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/Preloader/js/main.jsx"></script>
	<!-- Reading Time -->
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ReadingTime/src/readingTime.js"></script>

	<!-- jQuery Scripts -->
	<script type="text/javascript">
		// Dynamic Nav Class Adder
		$("body").addClass("Home");
		
		// PromoBlock AutoHeight Start
		var OffsetHeight = $(window).height() - $('').height();
		$('.PromoBlock').css({ 'height': OffsetHeight + 'px' });
		
		$(document).ready(function () {
			$('.mobilenav .Content').css({ 'margin-top': '-' + $('.mobilenav .Content').height()/2+ 'px' });
		});
		
		$(window).resize(function () {
			var OffsetHeight = $(window).height() - $('').height();
			$('.PromoBlock').css({ 'height': OffsetHeight + 'px' });
		});	
		// PromoBlock AutoHeight End
		
		// Menu Icon Resize On Scroll Start
		$(document).on('scroll', function () {
			// if the scroll distance is greater than 100px
			if ($(window).scrollTop() > 1) {
				// do something
				$("header").addClass("Shrinked");
			}
			else {
				$("header").removeClass("Shrinked");
			}
		});			
		// Menu Icon Resize On Scroll End
		
		// Text Input Effects Start
		(function() {
			// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
			if (!String.prototype.trim) {
				(function() {
					// Make sure we trim BOM and NBSP
					var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
					String.prototype.trim = function() {
						return this.replace(rtrim, '');
					};
				})();
			}

			[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
				// in case the input is already filled..
				if( inputEl.value.trim() !== '' ) {
					classie.add( inputEl.parentNode, 'input--filled' );
				}

				// events:
				inputEl.addEventListener( 'focus', onInputFocus );
				inputEl.addEventListener( 'blur', onInputBlur );
			} );

			function onInputFocus( ev ) {
				classie.add( ev.target.parentNode, 'input--filled' );
			}

			function onInputBlur( ev ) {
				if( ev.target.value.trim() === '' ) {
					classie.remove( ev.target.parentNode, 'input--filled' );
				}
			}
		})();
		// Text Input Effects End
		
		$('div.PostContent').readingTime({
			readingTimeTarget: $('.PromoBlock').find('.eta'),
			wordCountTarget: $('.PromoBlock').find('.words')
		});
		
		$("a[href^='http:'], a[href^='https:']").not("[href*='"+document.domain+"']").attr('target','_blank');
		$("a[href^='http:'], a[href^='https:']").not("[href*='"+document.domain+"']").attr('class','ExtLink');

	</script>
	
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5659836aa0564948" async="async"></script>

	<!-- jQuery Scripts End -->
	
	<!-- Chatra {literal} -->
	<script>
	    ChatraID = 'JivqrSgiJHsaTSSKL';
	    (function(d, w, c) {
	        var n = d.getElementsByTagName('script')[0],
	            s = d.createElement('script');
	        w[c] = w[c] || function() {
	            (w[c].q = w[c].q || []).push(arguments);
	        };
	        s.async = true;
	        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
	            + '//chat.chatra.io/chatra.js';
	        n.parentNode.insertBefore(s, n);
	    })(document, window, 'Chatra');
	</script>
	<!-- /Chatra {/literal} -->

	<?PHP wp_footer(); ?>
</body>

</html>
