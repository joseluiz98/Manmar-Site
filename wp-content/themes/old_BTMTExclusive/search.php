<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>
<!DOCTYPE html>
<html>

<!--------

                                                                                                                                               
               AAA               ZZZZZZZZZZZZZZZZZZZ     OOOOOOOOO          OOOOOOOOO     RRRRRRRRRRRRRRRRR                  AAA               
              A:::A              Z:::::::::::::::::Z   OO:::::::::OO      OO:::::::::OO   R::::::::::::::::R                A:::A              
             A:::::A             Z:::::::::::::::::Z OO:::::::::::::OO  OO:::::::::::::OO R::::::RRRRRR:::::R              A:::::A             
            A:::::::A            Z:::ZZZZZZZZ:::::Z O:::::::OOO:::::::OO:::::::OOO:::::::ORR:::::R     R:::::R            A:::::::A            
           A:::::::::A           ZZZZZ     Z:::::Z  O::::::O   O::::::OO::::::O   O::::::O  R::::R     R:::::R           A:::::::::A           
          A:::::A:::::A                  Z:::::Z    O:::::O     O:::::OO:::::O     O:::::O  R::::R     R:::::R          A:::::A:::::A          
         A:::::A A:::::A                Z:::::Z     O:::::O     O:::::OO:::::O     O:::::O  R::::RRRRRR:::::R          A:::::A A:::::A         
        A:::::A   A:::::A              Z:::::Z      O:::::O     O:::::OO:::::O     O:::::O  R:::::::::::::RR          A:::::A   A:::::A        
       A:::::A     A:::::A            Z:::::Z       O:::::O     O:::::OO:::::O     O:::::O  R::::RRRRRR:::::R        A:::::A     A:::::A       
      A:::::AAAAAAAAA:::::A          Z:::::Z        O:::::O     O:::::OO:::::O     O:::::O  R::::R     R:::::R      A:::::AAAAAAAAA:::::A      
     A:::::::::::::::::::::A        Z:::::Z         O:::::O     O:::::OO:::::O     O:::::O  R::::R     R:::::R     A:::::::::::::::::::::A     
    A:::::AAAAAAAAAAAAA:::::A    ZZZ:::::Z     ZZZZZO::::::O   O::::::OO::::::O   O::::::O  R::::R     R:::::R    A:::::AAAAAAAAAAAAA:::::A    
   A:::::A             A:::::A   Z::::::ZZZZZZZZ:::ZO:::::::OOO:::::::OO:::::::OOO:::::::ORR:::::R     R:::::R   A:::::A             A:::::A   
  A:::::A               A:::::A  Z:::::::::::::::::Z OO:::::::::::::OO  OO:::::::::::::OO R::::::R     R:::::R  A:::::A               A:::::A  
 A:::::A                 A:::::A Z:::::::::::::::::Z   OO:::::::::OO      OO:::::::::OO   R::::::R     R:::::R A:::::A                 A:::::A 
AAAAAAA                   AAAAAAAZZZZZZZZZZZZZZZZZZZ     OOOOOOOOO          OOOOOOOOO     RRRRRRRR     RRRRRRRAAAAAAA                   AAAAAAA


---------->

<head>
	<!-- Meta Data -->
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" lang="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Hash Moody" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="Rating" content="General" />
	<meta name="Revisit-after" content="7 Days" />

	<!-- Old Browser Supporting Scripts -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Favicon.png" />

	<!-- Framework -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Bootstrap/css/bootstrap-theme.min.css" />

	<!-- jPushMenu -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/jPushMenu/css/jPushMenu.css" />

	<!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Fonts/Stylesheet.css" />

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/Swiper/dist/css/swiper.min.css" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/css/component.css" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/FAQsSlider/css/style.css" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/css/animations.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Css/Stylesheet.css" />

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
</head>

<body class="Alternative">
	<!-- Right menu element-->
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
		<div class="NavigationHeader">
			<h3>Navigation</h3>
			<div class="SocialBlock">
				<a href="#" class="SocialIcon WhatsApp"></a>
				<a href="#" class="SocialIcon Facebook"></a>
				<a href="#" class="SocialIcon Twitter"></a>
				<a href="#" class="SocialIcon LinkedIn"></a>
			</div>
		</div>
		<div class="NavigationLinks">
			<a href="#PromoBlock">BTMT Home</a>
			<a href="#AboutBlock">About BTMT Money Transfers</a>
			<a href="#GuranteesBlock">How it Works</a>
			<a href="#BlogBlock">BTMT Blog</a>
			<a href="#ContactUsBlock">Get in Touch</a>
			<a>--</a>
			<a href="#TrackingBlock">Track your Money</a>
		</div>
	</nav>

	<!-- Header -->
	<header class="navbar-fixed-top">
		<div class="Contents container">
			<a href='<?php bloginfo('url'); ?>' class="HeaderLogo HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
				<img alt="Logo" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Logo.png" />
			</a>
			<?php if ( !is_home() ) : ?>
				<?php if ( !is_page() ) : ?>
					<?php if ( !is_search() ) : ?>
						<a href='<?php bloginfo('url'); ?>/blog/' class="HeaderBlogLink HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
							<h4>The Blog</h4>
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( is_page(218) ) : ?>
					<a href='<?php bloginfo('url'); ?>/blog/' class="HeaderBlogLink HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
						<h4>The Blog</h4>
					</a>
				<?php endif; ?>
			<?php endif; ?>
			<ul>
				<li class="NavigationMenu QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
					<a class="toggle-menu menu-right">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Menu.png" alt="Menu" />
					</a>
				</li>
				<li class="Language HalfSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
                    <a href="#">
                        <?php
								if(ICL_LANGUAGE_CODE=='en'){
                        ?>
                        <span id="English">
                            <img id="CurrentLanguage" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageEN.png" alt="Choose Language" />
                        </span>
                        <?php
 }
								if(ICL_LANGUAGE_CODE=='fr'){
                        ?>
                        <span id="French">
                            <img id="CurrentLanguage" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageFR.png" alt="Choose Language" />
                        </span>
                        <?php } ?>
                        <div class="LanguageDropDownMenu">
                            <?php
									if(ICL_LANGUAGE_CODE=='fr'){
                            ?>
                            <span id="English">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageEN.png" alt="English" />
                            </span>
                            <?php
 }
									if(ICL_LANGUAGE_CODE=='en'){
                            ?>
                            <span id="French">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageFR.png" alt="French" />
                            </span>
                            <?php } ?>
                            <span id="Dutch" class="hidden">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageNL.png" alt="Dutch" />
                            </span>
                        </div>
                    </a>
				</li>
				<li class="Search HalfAndQuarterSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
					<div id="sb-search" class="sb-search">
                        <form action="<?php bloginfo('url'); ?>" method="GET">
                            <input class="sb-search-input" placeholder="Enter your search term..." type="search" value="" name="s" id="search" />
                            <input class="sb-search-submit" type="submit" value="" />
                            <span class="sb-icon-search"></span>
                        </form>
					</div>
					<a href="#SearchModal" data-toggle="modal" class="hidden">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Search.png" alt="Search" />
					</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- #Header End -->

	<!-- Blog Content -->
	<div class="ContentBlock SearchPage" id="ContentBlock">
		<div class="container">
			<div class="col-lg-8">
				<?php if (!have_posts()) : ?>
				<h3>
					Sorry. We could'nt find any results for
					<span class="Red">
						<?php the_search_query() ?>
					</span>, maybe try browsing some other categories/pages listed on your right ...
				</h3>
				<?php endif; ?>
				<?php if (have_posts()) : ?>
				<h3>
					Search Result for
					<?php
						  /* Search Count */
						  $allsearch = &new WP_Query("s=$s&showposts=-1");
						  $key = wp_specialchars($s, 1);
						  $count = $allsearch->post_count; _e('');
						  _e('<span class="search-terms Red">');
						  echo $key; _e('</span>.');
                    ?>
				</h3>
				<p>
					<?php
						  _e('Total <span class="Red">');
						  echo $count . '</span> ';
						  _e('results found.'); wp_reset_query();
                    ?>
				</p>
				<?php endif; ?>
				<hr />
				<form action="<?php bloginfo('url'); ?>" method="GET">
					<div class="SidebarSearch visible-xs visible-sm visible-md hidden-lg">
						<input name="s" value="" type="search" placeholder='<?php _e("search the site...", "AzooraBlog"); ?>' />
						<input type="submit" value="" />
					</div>
				</form>
				<?php if (is_front_page()) : ?>
				<?php if (!is_page()) : ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="PostItem">
					<h3 class="HalfSecDuration" animation="if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
						<?php the_title(); ?>
					</h3>
					<div class="PostContent">
						<?php the_excerpt(); ?>
						<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-red">
						<?php _e("Continue reading this article ", "AzooraBlog"); ?>
					</a>
					<hr />
				</div>
				<?php endwhile; endif; ?>
				<?php endif; ?>
				<?php endif; ?>
				<?php if (!is_front_page()) : ?>
				<?php if (!is_page()) : ?>
				<?php if (!is_single()) : ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="PostItem">
					<h3 class="HalfSecDuration" animation="if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
						<?php the_title(); ?>
					</h3>
					<div class="PostContent">
						<?php the_excerpt(); ?>
						<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-red">
						<?php _e("Continue reading this article ", "AzooraBlog"); ?>
					</a>
					<hr />
				</div>
				<?php endwhile; endif; ?>
				<?php if (!have_posts()) : ?>
				<?php if ( function_exists('spell_suggest') ) { spell_suggest(); } ?>
				<?php endif; ?>
				<?php else : ?>
				<p>
					<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
				</p>
				<?php endif; ?>
				<?php if (is_single()) : ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="PostItem">
					<h3 class="HalfSecDuration" animation="if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
						<?php the_title(); ?>
					</h3>
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
							<span>
								<?php echo get_the_date('D'); ?>, <?php echo get_the_date('d M Y'); ?>
							</span>
						</div>
						<div class="CommentsCount">
							<span class="spot-im-replies-count" data-post-id="<?php the_id(); ?>"></span>Comments
							<!--span style="display:none;">
												<?php comments_number('No Comments', '1 Comment', '% Comments'); ?>
											</span-->
						</div>
					</div>
					<hr />
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
				<div class="SubscribeBlock visible-xs visible-sm visible-md hidden-lg">
					<h3>Subscribe via email</h3>
					<p>Get every new post hand-delivered to your inbox. Just enter your email.</p>
					<input type="email" placeholder="name@site.com" />
					<input type="submit" value="" />
				</div>
			</div>
			<div class="col-lg-4 hidden-xs hidden-sm hidden-md visible-lg">
				<div class="SidebarBlock">
					<h3>
						<?php _e("Recent Articles", "BTMT"); ?>
					</h3>
					<hr />
					<ul class="RecentArticleLinks">
						<?php $the_query = new WP_Query( 'showposts=8' ); ?>
						<?php while ($the_query -> have_posts()) :
								  $the_query -> the_post(); ?>
						<li>
							<a class="truncate" href="<?php the_permalink() ?>">
								<?php the_title(); ?>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
                <br />
				<div class="SidebarBlock">
					<h3>
						<?php _e("Browse Category", "BTMT"); ?>
					</h3>
					<hr />
					<?php
					$defaults = array(
					'child_of'            => 0,
					'current_category'    => 0,
					'depth'               => 0,
					'echo'                => 1,
					'exclude'             => '',
					'exclude_tree'        => '',
					'feed'                => '',
					'feed_image'          => '',
					'feed_type'           => '',
					'hide_empty'          => 1,
					'hide_title_if_empty' => false,
					'hierarchical'        => true,
					'order'               => 'ASC',
					'orderby'             => 'name',
					'separator'           => '<br />',
					'show_count'          => 0,
					'show_option_all'     => '',
					'show_option_none'    => __( 'No categories' ),
					'style'               => '',
					'taxonomy'            => 'category',
					'title_li'            => __( '' ),
					'use_desc_for_title'  => 1,
				);
					wp_list_categories( $defaults );
                    ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Blog Content End -->

	<!-- Footer Start -->
	<footer>
		<div class="Contents">
			<div class="TopSection">
				<div class="ContentBlock container">
					<div class="col-xs-12">
						<div class="SubscribeBlockContainer col-md-6 col-xs-12">
							<input id="SubscriberEmail" name="SubscriberEmail" type="email" value="" placeholder="Enter your email to stay connected" required="" class="EmailSubscription" />
							<a class="SubscribeButton" href="#">
								<img alt="Subscribe" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Subscribe.png" />
							</a>
						</div>
						<div class="SocialBlockContainer col-md-6 col-xs-12">
							<div class="SocialBlock center-block">
								<a href="#" class="SocialIcon WhatsApp OneSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
								<a href="#" class="SocialIcon Facebook HalfAndQuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
								<a href="#" class="SocialIcon Twitter HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
								<a href="#" class="SocialIcon LinkedIn QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="MiddleSection">
				<div class="container">
					<div class="ContentBlock col-xs-12">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="CompanySection">
								<a href="index.html">
									<img alt="Logo" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Logo.png" class="Logo img-responsive QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" />
								</a>
								<p>
									The multibrand leader in money tranfers.
									<br />One store, various brands.
								</p>
							</div>
						</div>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<div class="SiteNavigationSection col-md-7 col-sm-6 col-xs-12">
								<h3>Website</h3>
								<hr class="LongHR" />
								<div class="NavigationLinks">
									<ul class="col-md-5 col-xs-5">
										<?php wp_nav_menu( array(
											'container' => '',
											'container_class' => false,
											'items_wrap' => '%3$s',
											'theme_location' => 'footer-menu'
											) ); ?>
									</ul>
									<ul class="col-md-7 col-xs-7 PopUp">
										<?php wp_nav_menu( array( 'container' => '', 'container_class' => false, 'items_wrap' => '%3$s', 'theme_location' => 'footer-menu-send-money' ) ); ?>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="BlogSection col-md-5 col-sm-6 col-xs-12">
								<h3>Blog</h3>
								<hr class="LongHR" />
								<div class="NavigationLinks">
									<ul>
										<?php
										$args = array( 'numberposts' => '5' );
										$recent_posts = wp_get_recent_posts( $args );
										foreach( $recent_posts as $recent ){
											echo '<li><a class="truncate" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
										}
                                        ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="BottomSection">
				<div class="container">
					<div class="Contents col-xs-12">
						<div class="col-md-6 col-xs-12">
							<p>Copyright © 2016 BT Money Transfers. All Rights Reserved.</p>
						</div>
						<div class="col-md-6 col-xs-12">
							<ul>
								<li class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
									<a href="#Legal" data-toggle="modal">Legal</a>
								</li>
								<li class="HalfSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
									<a href="#CodeOfConduct" data-toggle="modal">Code of Conduct</a>
								</li>
								<li class="HalfAndQuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
									<a href="#TermsOfService" data-toggle="modal">Terms Of Services</a>
								</li>
								<li class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
									<a href="#PrivacyPolicy" data-toggle="modal">Privacy Policy</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
	<!-- #Footer End -->

	<!-- How It Works Modal Start -->
	<div id="HowItWorksModal" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<?php $the_query = new WP_Query( 'page_id=159' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<h4 class="modal-projectTitle">
						<?php the_title(); ?>
					</h4>
					<?php endwhile;?>
				</div>
				<div class="modal-body">
					<?php $the_query = new WP_Query( 'page_id=159' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile;?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- #How It Works Modal End -->

	<!-- Opt-in Modal Start -->
	<div id="OptInModal" class="modal fade">
		<div class="modal-dialog SixtyPercentWidth">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="col-lg-5 EmailEnvelope">
						<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/EmailEnvelope.png" alt="Subscribe" />
					</div>
					<div class="col-lg-7">
						<?php $the_query = new WP_Query( 'page_id=118' ); ?>
						<?php while ($the_query -> have_posts()) :
								  $the_query -> the_post(); ?>
						<h3>
							<?php the_title(); ?>
						</h3>
						<?php the_content(); ?>
						<?php endwhile;?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- #Opt-in Modal End -->

	<!-- FAQ's Modal Start -->
	<div id="FAQs" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<?php $the_query = new WP_Query( 'page_id=130' ); ?>
						<?php
						while ($the_query -> have_posts()) :
							$the_query -> the_post();
                        ?>
						<h3>
							<?php the_title(); ?>
						</h3>
						<?php endwhile;?>
					</div>
					<div class="col-lg-12">
						<div class="FAQsBlock">
							<ul class="faq">
								<?php
								$args = array(
								   'post_type'=> 'faqs',
								   'order'    => 'ASC'
								   );
								$the_query = new WP_Query( $args );
								if ($the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post(); ?>
								<li class="q">
									<?php the_title(); ?>
								</li>
								<li class="a">
									<?php the_content(); ?>
								</li>
								<?php
									endwhile;
								endif;
                                ?>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- #FAQ's Modal End -->

	<!-- Locate Branches Modal Start -->
	<div id="LocateBranches" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<?php $the_query = new WP_Query( 'page_id=62' ); ?>
						<?php
						while ($the_query -> have_posts()) :
							$the_query -> the_post();
                        ?>
						<h3>
							<?php the_title(); ?>
						</h3>
						<?php endwhile;?>
					</div>
					<div class="col-lg-12">
						<div class="FAQsBlock ContentBlock container">
							<div class="col-xs-12">
								<ul class="faq">
									<li class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</li>
									<li class="a" style="display: none;">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>

									<li class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</li>
									<li class="a" style="display: none;">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>

									<li class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</li>
									<li class="a" style="display: none;">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>

									<li class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</li>
									<li class="a" style="display: none;">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>

									<li class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</li>
									<li class="a" style="display: none;">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>

									<li class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</li>
									<li class="a" style="display: none;">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
								</ul>
							</div>
						</div>
						<?php $the_query = new WP_Query( 'page_id=62' ); ?>
						<?php while ($the_query -> have_posts()) :
								  $the_query -> the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile;?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- #Locate Branches Modal End -->

	<!-- Search Modal Start -->
	<div id="SearchModal" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-body text-center">
					<form action="#" method="post" class="search-form">
						<div class="col-xs-12">
							<h3>Get rates alerts into your inbox</h3>
							<p>Receive all rate alerts directly by email and be aware of any changes</p>
							<input id="url" name="url" type="text" value="" placeholder="Search" required="" />
							<input name="submit" type="submit" id="submit" value="Submit" class="btn HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" />
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- #Search  Modal End -->

	<!-- Contact Thanks Modal Start -->
	<div id="ContactThanks" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<button type="button" class="hidden ThanksClose close" data-dismiss="modal" aria-hidden="true">×</button>
					<img alt="ThanksIcon" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Checkmark.gif" class="ThanksIcon img-responsive" />
					<h4 class="QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
						Fantastic!
						<span id="ThankYouName"></span>. Your message is sent!
					</h4>
					<hr class="col-xs-1 col-xs-offset-5" />
					<div class="clearfix"></div>
					<p class="QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInUp animated; if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">Thanks for showing interest in BT Money Transfers, your message is successfully received. One of our agents will be in touch with you shortly.</p>
					<a href="<?php bloginfo('url'); ?>" class="btn btn-success">Continue</a>
				</div>
			</div>
		</div>
	</div>
	<!-- #Contact Thanks Modal End -->

	<!-- Locate Branches on Map Modal Start -->
	<div id="LocateBranches" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<?php $the_query = new WP_Query( 'page_id=60' ); ?>
					<?php
					while ($the_query -> have_posts()) :
						$the_query -> the_post();
                    ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
					<div class="col-lg-12">
						<?php the_content(); ?>
					</div>
					<?php endwhile;?>
				</div>
			</div>
		</div>
	</div>
	<!-- #Locate Branches on Map Modal End -->

	<!-- Legal Modal Start -->
	<div id="Legal" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<?php $the_query = new WP_Query( 'page_id=141' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<h4 class="modal-projectTitle">
						<?php the_title(); ?>
					</h4>
					<?php endwhile;?>
				</div>
				<div class="modal-body">
					<?php $the_query = new WP_Query( 'page_id=141' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile;?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- #Legal Modal End -->

	<!-- Code of Conduct Modal Start -->
	<div id="CodeOfConduct" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<?php $the_query = new WP_Query( 'page_id=143' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<h4 class="modal-projectTitle">
						<?php the_title(); ?>
					</h4>
					<?php endwhile;?>
				</div>
				<div class="modal-body">
					<?php $the_query = new WP_Query( 'page_id=143' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile;?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- #Code Of Conduct Modal End -->

	<!-- Terms of Service Modal Start -->
	<div id="TermsOfService" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<?php $the_query = new WP_Query( 'page_id=161' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<h4 class="modal-projectTitle">
						<?php the_title(); ?>
					</h4>
					<?php endwhile;?>
				</div>
				<div class="modal-body">
					<?php $the_query = new WP_Query( 'page_id=161' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile;?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- #Terms of Service Modal End -->

	<!-- Privacy Policy Modal Start -->
	<div id="PrivacyPolicy" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<?php $the_query = new WP_Query( 'page_id=148' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<h4 class="modal-projectTitle">
						<?php the_title(); ?>
					</h4>
					<?php endwhile;?>
				</div>
				<div class="modal-body">
					<?php $the_query = new WP_Query( 'page_id=148' ); ?>
					<?php while ($the_query -> have_posts()) :
							  $the_query -> the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile;?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- #PrivacyPolicy Modal End -->

	<!-- JavaScripts Start -->

	<!-- jQuery -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/jQuery/jquery-2.2.4.min.js"></script>

	<!-- Framework -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Bootstrap/js/bootstrap.min.js"></script>

	<!-- jPushMenu -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/jPushMenu/js/jPushMenu.js"></script>

	<!-- smoothScroll -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/SmoothScroll/SmoothScroll.js"></script>

	<!-- FAQs Slider -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/FAQsSlider/js/script.js"></script>

	<!-- Swiper -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/Swiper/dist/js/swiper.min.js"></script>

	<!-- Search -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/js/classie.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/js/uisearch.js"></script>

	<!-- AniJs -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/dist/anijs-min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/dist/helpers/scrollreveal/anijs-helper-scrollreveal-min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/dist/event_systems/jquery/anijs-jquery-event-system-min.js"></script>

	<!-- Validator -->
	<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/EasyPaginate/demo/js/jquery.snippet.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/EasyPaginate/lib/jquery.easyPaginate.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/EasyPaginate/demo/js/scripts.js"></script>

    <script>
				new UISearch(document.getElementById('sb-search'));

				// Auto Height PromoBlock Start
				var OffsetHeight = $(window).height();
				$('.PromoBlock').css({ 'height': OffsetHeight + 'px' });

				$(window).resize(function () {
					var OffsetHeight = $(window).height();
					$('.PromoBlock').css({ 'height': OffsetHeight + 'px' });
				});
				// #Auto Height PromoBlock End

				// jPushMenu Start
				jQuery(document).ready(function ($) {
					$('.toggle-menu').jPushMenu();
				});
				// #jPushMenu End

				// User Reviews Slider Start
				var swiper = new Swiper('.swiper-container', {
					pagination: '.swiper-pagination',
					paginationClickable: false,
					keyboardControl: true,
					autoplay: 4000
				});
				// #User Reviews Slider End

				// Header Size Change Upon Scroll Start
				$(document).on('scroll', function () {
					// if the scroll distance is greater than 100px
					if ($(window).scrollTop() > 100) {
						// do something
						$("header").addClass("Shrinked");
					}
					else {
						$("header").removeClass("Shrinked");
					}
				});
				// #Header Size Change Upon Scroll End

				// Setting Contents Size Start
				if ($(window).width() < 768) {
					if ($(window).width() > $(window).height()) {
						$("header").addClass("Shrinked");
						$("head").append("<link id='StylesheetMobile' rel='stylesheet' type='text/css' href='Assets/Css/StylesheetMobile.css'>");
					}
					else {
						$("#StylesheetMobile").removeAttr("href");
					};
					$(window).resize(function () {
					});
				};
				// #Setting Contents Size End

				$("footer .SubscribeButton").click(function () {
					var SubscriberEmail = $("footer #SubscriberEmail").val();
					$("#OptInModal #es_txt_email_pg").val(SubscriberEmail);
					$('#OptInModal').modal('show');
				});

				$("footer #menu-item-129 a, footer #menu-item-139 a, .PopUp a").attr('data-toggle', 'modal');

				$("#ContactFormx").submit(function (event) {
					//alert( "Handler for .submit() called." );

					$('#ContactThanks').modal('show');
					event.preventDefault();
				});

				$(function () {
					$('#ContactForm #Submit').on('click', function (e) {
						$.validator.messages.required = '';
						$('#ContactForm').validate({
							rules: {
								YourName: "required",
								YourEmail: "required",
								Subject: "required",
								PhoneNumber: "required",
								YourMessage: "required"
							},
							messages: {
								YourName: "required",
								YourEmail: "required",
								Subject: "required",
								PhoneNumber: "required",
								YourMessage: "required"
							}
						});

						if ($('#ContactForm').valid()) {
							$("#ContactForm #Submit").prop("disabled", true);
							$("#ContactForm #Submit").addClass('Activity');
							$(function () {
								var YourName = $("#ContactForm #YourName").val();
								var YourEmail = $("#ContactForm #YourEmail").val();
								var Subject = $("#ContactForm #Subject").val();
								var PhoneNumber = $("#ContactForm #PhoneNumber").val();
								var YourMessage = $("#ContactForm #YourMessage").val();

								$.ajax({
									type: "POST",
									url: 'http://localhost/BTMT/wp-content/themes/BTMTExclusive/Assets/Linux/SendMail/SendEmail.php',
									data: {
										'Name': YourName,
										'Email': YourEmail,
										'Subject': Subject,
										'Phone': PhoneNumber,
										'Message': YourMessage
									},
									success: function (data) {
										//alert(data);
										$("#ContactForm #Submit").prop("disabled", false);
										$("#ContactForm #Submit").removeClass('Activity');
									},
									error: function (result) {
										alert("Form could not be submitted!");
										$("#ContactForm #Submit").prop("disabled", false);
										$("#ContactForm #Submit").removeClass('Activity');
									},
									complete: function (transport) {
										if (transport.status == 200) {
											$('#ContactThanks').modal('show');
											$("#ThankYouName").html(YourName);
											//$("#lblmsgx").html("Success");
											$("#ContactForm #Submit").prop("disabled", false);
											$("#ContactForm #Submit").removeClass('Activity');
										}
										else {
											//alert("Could not be completed properly.");
											$("#ContactForm #Submit").prop("disabled", false);
											$("#ContactForm #Submit").removeClass('Activity');
										};
									}
								});
							});
						} else {
							//alert("Not Valid");
						};
					});
				});

				$(function () {
					$('.es_shortcode_form #es_txt_button_pgx').on('click', function (e) {
						$.validator.messages.required = '';
						$('.es_shortcode_form').validate({
							rules: {
								es_txt_name_pg: "required",
								es_txt_email_pg: "required"
							},
							messages: {
								es_txt_name_pg: "*",
								es_txt_email_pg: "*"
							}
						});

						if ($('.es_shortcode_form').valid()) {
							alert("Successfully subscribed");
						} else {
							alert("Error: Could not subscribe, please recheck details.");
						};
					});
				});
				$('.ThePosts').easyPaginate({
					paginateElement: '.ThePost',
					elementsPerPage: 2,
					effect: 'slide'
				});
				$(".easyPaginateNav a").click(function () {
					$('html, body').animate({
						scrollTop: $("header").offset().top
					}, 500);
				});

				var SiteHomeAddress = "http://localhost/BTMT"; //$(".HeaderLogo").attr('href');

				$("li.Language #English").click(function () {
					window.location(SiteHomeAddress);
				});
				$("li.Language #French").click(function () {
					window.location(SiteHomeAddress + '/fr/');
				});
				$("li.Language #Dutch").click(function () {
					window.location(SiteHomeAddress + '/nl/');
				});
    </script>
    <!-- #JavaScripts End -->
	</script>
	<!-- #JavaScripts End -->
</body>
</html>