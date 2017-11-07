<!DOCTYPE html>

<html lang="pt-br" style="margin-top: 0px !important">



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

	<meta charset="UTF-8">

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

	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Favicon.png">



	<!-- Framework -->

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Framework/Bootstrap/css/bootstrap-theme.min.css">



	<!-- jPushMenu -->

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/jPushMenu/css/jPushMenu.css">



	<!-- Fonts -->

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Fonts/Stylesheet.css">



	<!-- Stylesheets -->

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/Swiper/dist/css/swiper.min.css">

	

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/css/default.css">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/ExpandingSearchBar/css/component.css">

	

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/FAQsSlider/css/style.css" />



	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/AniJs/css/animations.css">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/Assets/Css/Stylesheet.css">

    

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



<style type="text/css">

#LocateBranches1{

    left:0;

    top:0;

    height:100%;

    width:100%;

    position:absolute;

}

</style>

</head>



<?php if ( !is_single() ) : ?>

<?php if ( is_page(218) ) : ?>

<body class="Alternative">



<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-99256332-1', 'auto');

  ga('send', 'pageview');



</script>





	<!-- Google Tag Manager -->



<!-- End Google Tag Manager -->

	<?php endif; ?>

	<?php if ( is_home() ) : ?>

	<body>

		<?php endif; ?>

		<?php endif; ?>

		<?php if ( is_single() ) : ?>

		<body class="Alternative">

		<?php endif; ?>

		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5SWDQN"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-5SWDQN');</script>

			<!-- Right menu element-->



			<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">

				<div class="NavigationHeader">

					<h3>Navigation</h3>

					<div class="SocialBlock">

						<a href="#" class="SocialIcon WhatsApp"></a>

						<a href="http://facebook.com/btmt.be" class="SocialIcon Facebook"></a>

						<a href="http://instagram.com/btmt_be" class="SocialIcon Twitter"></a>

						<a href="https://www.linkedin.com/company/4818297" class="SocialIcon LinkedIn"></a>

					</div>

				</div>

				<div class="NavigationLinks">

				

<a href="#PromoBlock"><?php $the_query = new WP_Query( 'page_id=815' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?></a>





					<a href="#AboutBlock"><?php $the_query = new WP_Query( 'page_id=818' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?></a>

					<a href="#GuranteesBlock"><?php $the_query = new WP_Query( 'page_id=823' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?></a>

					<a href="#BlogBlock"><p>BTMT Blog</p></a>

					<a href="#ContactUsBlock"><?php $the_query = new WP_Query( 'page_id=828' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?></a>



					<a href="#TrackingBlock"><?php $the_query = new WP_Query( 'page_id=834' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?></a>

					<!-- <a id='locationButton' href="#LocateBranches1" class="LocateUs" data-toggle="modal">

					Branches</a> -->

					<a href="#" class="LocateUs loginlink" >

					<?php $the_query = new WP_Query( 'page_id=406' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?></a>

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









						

								

									<a href="http://www.btmt.eu/pt-br/">

								<span id="English" style="color: #fff; padding-top: 2px;">

									<!-- <img style="width:22px; margin-right: 10px" id="CurrentLanguage" src="http://www.btmt.eu/wp-content/plugins/sitepress-multilingual-cms/res/flags/pt-br.png" alt="Choose Language" /> -->

									BR

								</span>

								</a> &nbsp

								<a href="http://www.btmt.eu/" style="color: #fff; padding-top: 2px;">

								<span id="French">

									<!-- <img style="width:22px;" id="CurrentLanguage" src="http://www.btmt.eu/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png" alt="Choose Language" /> -->

									EN

								</span>

								</a>

							



















							<!-- <a href="#">

								<?php

								if(ICL_LANGUAGE_CODE=='en'){ ?>

								<span id="English">

									<img id="CurrentLanguage" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageEN.png" alt="Choose Language" />

								</span>

								<?php }

								if(ICL_LANGUAGE_CODE=='fr'){ ?>

								<span id="French">

									<img id="CurrentLanguage" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageFR.png" alt="Choose Language" />

								</span>

								<?php } ?>

								<div class="LanguageDropDownMenu">

									<?php

									if(ICL_LANGUAGE_CODE=='fr'){ ?>

										<span id="English">

											<a href="http://btmt.eu/en/"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageEN.png" alt="English" /></a>

										</span>

									<?php }

									if(ICL_LANGUAGE_CODE=='en'){ ?>

										<span id="French">

											<a href="http://btmt.eu/fr/"><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageFR.png" alt="French" /></a>

										</span>

									<?php } ?>

									<span id="Dutch" class="">

										<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/LanguageNL.png" alt="Dutch" />

									</span>

								</div>

							</a> -->

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



			<?php if ( !is_single() ) : ?>

			<?php if ( is_page(218) ) : ?>

            <div class="ContentBlock container">

				<div class="col-md-8">

					<div class="ThePosts">

						<?php $the_query = new WP_Query( 'showposts=5' ); ?>

						<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post();

						?>

						<div class="ThePost">

							<div class="Posts">

								<div class="Core">

									<h4>

										<a href="<?php the_permalink(); ?>">

											<?php the_title(); ?>

										</a>

									</h4>

									<p>

										Posted in

										<span class="button">

											<?php

								  // everything available

								  foreach((get_the_category()) as $category) {

									  echo $category->cat_name . ' ';

								  }

											?>

										</span>

									</p>

									<?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>

									<p>





										<?php the_excerpt(); ?>

									</p>

									<p>

										<a href="<?php the_permalink(); ?>">Read More</a>

									</p>

									<hr />

								</div>

							</div>

						</div>

						<?php endwhile;?>

					</div>

				</div>

				<br />

                <div class="col-md-4">

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

					<div class="SidebarBlock hidden">

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

			<?php endif; ?>

			<?php if ( !is_page(218) ) : ?>

			<?php if ( is_home() ) : ?>



			<!-- PromoBlock Start -->

			<div class="PromoBlock text-center" id="PromoBlock">

				<div class="Contents">

					<div class="container">

						<div class="col-lg-10 col-lg-offset-1">

							<div class="OuterSection">

								<!-- <div class="InnerSection">

									<h5 class="Heading">Bem vindo</h5>

									<div class="Core">

										<h1 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">BT Money Transfers</h1>

										<hr class="ShortHR" />

										<h2 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInUp animated; if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">

											The multibrand leader in

											<br />money transfers

										</h2>

									</div> 

								</div>

								<h5 class="Tagline">One store, various brands</h5>-->	

								<?php $the_query = new WP_Query( 'page_id=400	' ); ?>

								<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

								<?php the_content(); ?>

								<?php endwhile;?>	

							</div>

						</div>

						<div class="clearfix"></div>

						<div class="ButtonsContainer col-xs-12">

							<div class="CallToActionButtons">





								<a href="#" class="loginlink TrackYourMoney QuarterSecDelay OneAndHalfSecDuration signuplink" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">

									<?php $the_query = new WP_Query( 'page_id=406' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?>

								</a>







								<!-- <a href="#TrackingBlock" class="TrackYourMoney QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">

									<?php $the_query = new WP_Query( 'page_id=406' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?>

								</a> -->

								<style type="text/css">





									.InnerSection{

										margin-top: 88px !important;

										height: 315px !important;

									}



									@media(max-width: 768px){

										.VR{

											display: none !important;

										}

									}

								</style>

								<div class="VR"></div>

								<a href="#HowItWorksModal" data-toggle="modal" class="HowItWorks QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">

									<?php $the_query = new WP_Query( 'page_id=408' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?>

								</a>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!-- #PromoBlock End -->



			<!-- PartnersBlock Start -->

			<div class="PartnersBlock text-center" id="PartnersBlock">

				<div class="ContentBlock">

					<h4 class="HalfSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">

						<?php $the_query = new WP_Query( 'page_id=398	' ); ?>

						<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

						<?php the_title(); ?>

						<?php endwhile;?>

					</h4>

					<hr class="ShortHR" />

					<div class="PartnersContainer col-xs-12 text-center">

						<div class="Partners col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-5 col-xs-offset-1">

							<a class="WesternUnion"></a>

						</div>

						<div class="Partners col-md-2 col-sm-2 col-xs-5">

							<a class="Belmoney"></a>

						</div>

						<div class="Partners col-md-2 col-sm-2 col-sm-offset-0 col-xs-5 col-xs-offset-1">

							<a class="SmallWorld"></a>

						</div>

						<div class="Partners col-md-2 col-sm-2 col-xs-5">

							<a class="MoneyGram"></a>

						</div>

						<div class="Partners col-md-2 col-sm-2 col-sm-offset-0 col-xs-10 col-xs-offset-1">

							<a class="Ria"></a>

						</div>

					</div>

					<div class="clearfix"></div>

				</div>

			</div>

			<!-- #PartnersBlock End -->



			<!-- AboutBlock Start -->

			<div class="AboutBlock text-center" id="AboutBlock">

				<div class="ContentBlock">

					<div class="container">

						<div class="col-lg-12">

							<img alt="Logo" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Logo.png" class="Logo img-responsive HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" />

							<?php $the_query = new WP_Query( 'page_id=5' ); ?>

							<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

							<?php the_content(); ?>

							<?php endwhile;?>

						</div>

					</div>

				</div>

			</div>

			<!-- #AboutBlock End -->



			<!-- TrackingBlock Start -->

			<div class="TrackingBlock text-center" id="TrackingBlock">

				<div class="">

					<div class="container">

						<div class="Tracker ContentBlock col-lg-8 col-lg-offset-2">

							<div class="Container">

								<div class="Text">

									<a href="#" class="button">

										<img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/TrackingBlockArrowIcon.png" alt="Arrow" />

									</a>

									<?php $the_query = new WP_Query( 'page_id=394' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?>

								</div>

							</div>

							<span class="TrackingID">

								<?php $the_query = new WP_Query( 'page_id=396' ); ?>

								<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

								<?php the_content(); ?>

								<?php endwhile;?>

							</span>

						</div>

						<div class="clearfix"></div>

					</div>

					<div class="GetAlerts">

						<div class="container">

							<div class="Core col-xs-12">

								<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/TrackingBlockEmailNotificationIcon.png" alt="Email Notification" />

								<div class="VR"></div>

								<div class="Text">

									<?php $the_query = new WP_Query( 'page_id=365' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?>

								</div>

								<a href="#OptInModal" data-toggle="modal" class="Subscribe button HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">

									<?php $the_query = new WP_Query( 'page_id=389' ); ?>

									<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

									<?php the_content(); ?>

									<?php endwhile;?>

								</a>

							</div>

						</div>

						<div class="clearfix"></div>

					</div>

				</div>

			</div>

			<!-- #TrackingBlock End -->



			<!-- GuranteesBlock Start -->

			<div class="GuranteesBlock" id="GuranteesBlock">

				<div class="ContentBlock">

					<div class="container">

						<?php $the_query = new WP_Query( 'page_id=9' ); ?>

						<?php while ($the_query -> have_posts()) :

						  $the_query -> the_post();  ?>

						<?php the_content(); ?>

						<?php endwhile;?>

						<hr class="ShortHR" />

						<div class="FeaturesInfographic animate-flicker">

							<div class="FeatureOne Feature">

								<?php $the_query = new WP_Query( 'page_id=11' ); ?>

								<?php while ($the_query -> have_posts()) :

								  $the_query -> the_post();  ?>

								<h5 class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_title(); ?>

								</h5>

								<p class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_content(); ?>

								</p>

								<img class="Icon QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInUp animated; if: scroll, on: window, do: fadeInUp animated, before: scrollReveal" src="http://www.btmt.eu/wp-content/uploads/2016/07/GuranteesBlockMapIcon.png" alt="" />

								<?php endwhile;?>

							</div>

							<div class="FeatureTwo Feature">

								<?php $the_query = new WP_Query( 'page_id=18' ); ?>

								<?php while ($the_query -> have_posts()) :

								  $the_query -> the_post();  ?>

								<h5 class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_title(); ?>

								</h5>

								<p class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_content(); ?>

								</p>

								<img class="Icon QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInBottomRight animated; if: scroll, on: window, do: fadeInBottomRight animated, before: scrollReveal" src="http://www.btmt.eu/wp-content/uploads/2016/07/GuranteesBlockStatisticsIcon.png" alt="" />

								<?php endwhile;?>

							</div>

							<div class="FeatureThree Feature">

								<?php $the_query = new WP_Query( 'page_id=23' ); ?>

								<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

								<h5 class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_title(); ?>

								</h5>

								<p class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_content(); ?>

								</p>

								<img class="Icon QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInBottomLeft animated; if: scroll, on: window, do: fadeInBottomLeft animated, before: scrollReveal" src="http://www.btmt.eu/wp-content/uploads/2016/07/GuranteesBlockTransactionsIcon.png" alt="" />

								<?php endwhile;?>

							</div>

							<div class="FeatureFour Feature">

								<?php $the_query = new WP_Query( 'page_id=20' ); ?>

								<?php while ($the_query -> have_posts()) :

								  $the_query -> the_post(); ?>

								<h5 class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_title(); ?>

								</h5>

								<p class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_content(); ?>

								</p>

								<img class="Icon QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInTopLeft animated; if: scroll, on: window, do: fadeInTopLeft animated, before: scrollReveal" src="http://www.btmt.eu/wp-content/uploads/2016/07/GuranteesBlockMarketConditionsIcon.png" alt="" />

								<?php endwhile;?>

							</div>

							<div class="FeatureFive Feature">

								<?php $the_query = new WP_Query( 'page_id=25' ); ?>

								<?php while ($the_query -> have_posts()) :

								  $the_query -> the_post(); ?>

								<h5 class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_title(); ?>

								</h5>

								<p class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">

									<?php the_content(); ?>

								</p>

								<img class="Icon QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInTopRight animated; if: scroll, on: window, do: fadeInTopRight animated, before: scrollReveal" src="http://www.btmt.eu/wp-content/uploads/2016/07/GuranteesBlockSafeTransfersIcon.png" alt="" />

								<?php endwhile;?>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!-- #GuranteesBlock End -->



			<!-- MissionBlock Start -->

			<div class="MissionBlock" id="MissionBlock">

				<div class="ContentBlock">

					<div class="container">

						<div class="col-xs-12">

							<?php $the_query = new WP_Query( 'page_id=27' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<img src="http://www.btmt.eu/wp-content/uploads/2016/07/MissionBlockIcon.png" alt="Our Mission" class="HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" />

							<?php the_content(); ?>

							<?php endwhile;?>

						</div>

					</div>

				</div>

			</div>

			<!-- #MissionBlock End -->



			<!-- ReviewsBlock Start -->

			<div class="ReviewsBlock" id="ReviewsBlock">

				<div class="container">

					<div class="ContentBlock col-xs-12">

						<?php $the_query = new WP_Query( 'page_id=34' ); ?>

						<?php while ($the_query -> have_posts()) :

						  $the_query -> the_post(); ?>

						<h4 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">

							<?php the_title(); ?>

						</h4>

						<hr class="ShortHR" />

						<div class="col-md-10 col-md-offset-1 QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInUp animated; if: scroll, on: window, do: fadeInUp animated, before: scrollReveal">

							<p>

								<?php the_content(); ?>

							</p>

						</div>

						<?php endwhile;?>

					</div>

				</div>

				<div class="OuterSection">

					<div class="Overlay">

						<div class="container">

							<div class="col-lg-12">

								<div class="ReviewsSlider swiper-container">

									<div class="swiper-wrapper">

										<?php $args = array(

									'post_type'=> 'testimonials',

									'order'    => 'ASC'

									);



								$the_query = new WP_Query( $args );

								if ($the_query->have_posts() ) :

									while ( $the_query->have_posts() ) :

										$the_query->the_post(); ?>

										<div class="swiper-slide">

											<p>

												<?php the_content(); ?>

											</p>

											<hr class="ShortHR" />

											<h5>

												<?php the_title(); ?>

											</h5>

											<h6 class="hidden"></h6>

										</div>

										<?php endwhile;

								endif; ?>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!-- #ReviewsBlock End -->



			<!-- QuestionsBlock Start -->

			<div class="QuestionsBlock" id="QuestionsBlock">

				<div class="ContentBlock">

					<div class="container">

						<div class="Contents">

							<?php $the_query = new WP_Query( 'page_id=410' ); ?>

							<?php while ($the_query -> have_posts()):$the_query -> the_post();  ?>

								<h5><?php the_title(); ?></h5>

							<?php endwhile;?>

							<?php $the_query = new WP_Query( 'page_id=412' ); ?>



							<?php while ($the_query -> have_posts()):$the_query -> the_post();  ?>

								<div class="ButtonsContainer">

								<a href="#FAQs" data-toggle="modal" class="FAQs button HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">

									<?php the_title(); ?>

								</a>

								<a href="#ContactUsBlock" class="GIT button HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">

									<?php the_content(); ?>

								</a>

								</div>

							<?php endwhile;?>

							

						</div>

					</div>

				</div>

			</div>

			<!-- #QuestionsBlock End -->



			<!-- ContactUsBlock Start -->

			<div class="ContactUsBlock" id="ContactUsBlock">

				<div class="ContentBlock">

					<div class="container">

						<?php $the_query = new WP_Query( 'page_id=54' ); ?>

						<?php while ($the_query -> have_posts()) :

						  $the_query -> the_post(); ?>

						<h4 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">

							<?php the_title(); ?>

						</h4>

						<?php endwhile;?>

						<hr class="ShortHR" />

						<div class="col-md-4">

							<?php $the_query = new WP_Query( 'page_id=56' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<h5>

								<?php the_title(); ?>

							</h5>

							<p>

								<?php the_content(); ?>

							</p>

							<br />

							<?php endwhile;?>

							<?php $the_query = new WP_Query( 'page_id=58' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<h5>

								<?php the_title(); ?>

							</h5>

							<p>

								<?php the_content(); ?>

							</p>

							<br />

							<?php endwhile;?>

							<?php $the_query = new WP_Query( 'page_id=60' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<h5>

								<?php the_title(); ?>

							</h5>

							<p>

								<?php the_content(); ?>

							</p>

							<?php endwhile;?>

							<?php $the_query = new WP_Query( 'page_id=62' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<hr class="LongHR" />

							<a href="#LocateBranches" class="LocateUs" data-toggle="modal">

								<?php the_title(); ?>

							</a>

							<?php endwhile;?>

						</div>

						<div class="ContactUsForm col-md-8">

							<?php $the_query = new WP_Query( 'page_id=54' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<?php the_content(); ?>

							<?php endwhile;?>

						</div>

					</div>

				</div>

			</div>

			<!-- #ContactUsBlock End -->



			<!-- BlogBlock Start -->

			<div class="BlogBlock" id="BlogBlock">

				<div class="ContentBlock">

					<div class="container">

						<div class="col-lg-12">

							<?php $the_query = new WP_Query( 'page_id=209' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<h4 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">

								<?php the_title(); ?>

							</h4>

							<?php endwhile;?>

							<hr class="ShortHR" />

							<div class="PostsContainer">

								<div class="LatestPosts">

									<?php $the_query = new WP_Query( 'showposts=2' ); ?>

									<?php while ($the_query -> have_posts()) :

									  $the_query -> the_post(); ?>

									<div class="TwoPosts col-sm-6 col-xs-12">

										<a href="<?php the_permalink(); ?>" class="PostsInnerSection Posts">

											<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>

											<div class="Core">

												<h2>

													<?php the_title(); ?>

												</h2>

												<span class="button">

													<?php

													// everything available

													foreach((get_the_category()) as $category) {

														echo $category->cat_name . ' ';

													}

													?>

												</span>

											</div>

										</a>

									</div>

									<?php endwhile;?>

								</div>

								<div class="clearfix"></div>

								<div class="OlderPosts">

									<?php $the_query = new WP_Query( 'showposts=5' ); ?>

									<?php while ($the_query -> have_posts()) :

									  $the_query -> the_post(); ?>

									<div class="ThePost col-sm-4">

										<a href="<?php the_permalink(); ?>" class="Posts">

											<div class="Core">

												<h4>

													<?php the_title(); ?>

												</h4>

												<span class="button">

													<?php

												  // everything available

												  foreach((get_the_category()) as $category) {

													  echo $category->cat_name . ' ';

												  }

													?>

												</span>

											</div>

										</a>

									</div>

									<?php endwhile;?>

								</div>

								<div class="clearfix"></div>

							</div>

							<hr class="LongHR" />

						</div>

						<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">

							<?php $the_query = new WP_Query( 'page_id=209' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<?php the_content(); ?>

							<?php endwhile;?>

						</div>

					</div>

				</div>

			</div>

			<!-- #BlogBlock End -->



			<?php endif; ?>

			<?php endif; ?>

			<?php endif; ?>

			<?php if ( is_single() ) : ?>

			<div class="ContentBlock container">

				<div class="col-md-8">

					<?php if (have_posts()) :

							  while (have_posts()) :

								  the_post(); ?>

					<h1>

						<?php the_title(); ?>

					</h1>

					<span>

						<?php _e("Written on ", "BTMT"); ?><?php the_time('jS F Y'); ?><?php _e(" by ", "BTMT"); ?><?php the_author_meta('first_name',$user_id); ?><?php the_author_meta('last_name',$user_id); ?>

					</span>

					<hr />

					<?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>

					<br />

					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

					<?php endwhile;

						  endif; ?>

				</div>

				<div class="col-md-4">

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

						<?php endwhile;?>

					</ul>

				</div>

			</div>

			<?php endif; ?>



			<!-- Footer Start -->

			<footer>

				<div class="Contents">

					<div class="TopSection">

						<div class="ContentBlock container">

							<div class="col-xs-12">

								<div class="SubscribeBlockContainer col-md-6 col-xs-12">

									<?php $the_query = new WP_Query( 'page_id=416' ); ?>

									<?php while ($the_query -> have_posts()) :

									  $the_query -> the_post(); ?>

									  <input id="SubscriberEmail" name="SubscriberEmail" type="email" value="" placeholder="<?php the_title(); ?>" required="" class="EmailSubscription" />

									<?php the_content(); ?>

									<?php endwhile;?>

									

										<a class="SubscribeButton" href="#">

											<img alt="Subscribe" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/Subscribe.png" />

										</a>

								</div>

								<div class="SocialBlockContainer col-md-6 col-xs-12">

									<div class="SocialBlock center-block">

										<a href="#" class="SocialIcon WhatsApp OneSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>

										<a href="http://facebook.com/btmt.be" class="SocialIcon Facebook HalfAndQuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>

										<a href="http://instagram.com/btmt_be" class="SocialIcon Twitter HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>

										<a href="https://www.linkedin.com/company/4818297" class="SocialIcon LinkedIn QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"></a>

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

												<li><a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=842' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>

												<li><a href="#AboutBlock"><?php $the_query = new WP_Query( 'page_id=847' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>												

												<li>

													<a href="#" class="loginlink">

														<?php $the_query = new WP_Query( 'page_id=406' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?>

													</a>

												</li>

												<li><a href="#FAQs" data-toggle="modal"><?php $the_query = new WP_Query( 'page_id=854' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>

												<li><a href="#ContactUsBlock"><?php $the_query = new WP_Query( 'page_id=859' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>

											</ul>





											<ul class="col-md-7 col-xs-7 PopUp">

												<li><a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=864' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>

												<li><a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=869' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>												

												<li>

													<a href="#SendMoney" class="loginlink">

														<?php $the_query = new WP_Query( 'page_id=875' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?>

													</a>

												</li>

												<li><a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=881' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>

												<li><a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=886' ); ?>

														<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

														<?php the_content(); ?>

														<?php endwhile;?></a></li>

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

												echo '<li><p><a class="truncate" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></p> </li> ';

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





























			

			<div class="todomapa">

	        	<div class="conteudo-mapa">

					<div id="frontpageblock">

					    <div id="frontpageanimateblock">

					        <div id="logindiv">

					         <div class="signuplink" id="loginlinkback">

				                <a href="#"><img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/closed.png" /></a>

				            </div>

				            	<div id='mapaUni' style="position: inherit !important; z-index: 1000; width: 100%; height: 700px; display: inline-block;">

								</div>

					        </div>

					    </div>

					</div>

				</div>

			</div>







































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

			<div id="LocateBranches1" class="modal fade">

				<div class="modal-dialog EightyPercentWidth">

					<div class="modal-content" style="height: 400px;">

						<div class="modal-body">

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

							<div class="container">

								

								<div id='mapaUni' style="position: initial;">

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>



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

								<div class="FAQsBlock">

									<div class="col-xs-12">

										<ul class="faq">

											<li class="q">Bara</li>

											<li class="a" style="display: none;"><div style="display:inline-block;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10078.353531833905!2d4.3356725!3d50.8387878!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcee8cb532913ecdc!2sBT+Money+Transfers!5e0!3m2!1sen!2sbr!4v1474916008330" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe></div>

<div style="display:inline-block;">

  	<h3>Opening Hours</h3>

  <p>Monday - Friday: 8 AM - 8 PM + 1 GMT</p>

  <p>Saturday: 9 AM - 6 PM + 1 GMT</p>

  <p>Sunday: 9 AM - 4 PM + 1 GMT</p>

</div></li>



											<li class="q">Parvis</li>

											<li class="a" style="display: none;"><div style="display:inline-block;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10079.990350857113!2d4.3439746!3d50.8312086!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c864d5be4fdafcc!2sBT+Money+Transfers!5e0!3m2!1sen!2sbr!4v1474918169723" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>

<div style="display:inline-block;">

  	<h3>Opening Hours</h3>

  <p>Monday - Friday: 9 AM - 8 PM + 1 GMT</p>

  <p>Saturday: 10 AM - 5 PM + 1 GMT</p>

  <p>Sunday: Closed</p>

</div></li>



											<li class="q">Barrière</li>

											<li class="a" style="display: none;"><div style="display:inline-block;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10081.174857074733!2d4.3440686!3d50.8257233!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c7ff70af519b7fd!2sBT+Money+Transfers!5e0!3m2!1spt-BR!2sus!4v1474918861261" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>

<div style="display:inline-block;">

  	<h3>Opening Hours</h3>

  <p>Monday - Friday: 9 AM - 7 PM + 1 GMT</p>

  <p>Saturday: 10 AM - 5 PM + 1 GMT</p>

  <p>Sunday: Closed</p>

</div></li>



											<li class="q">Flagey</li>

											<li class="a" style="display: none;"><div style="display:inline-block;"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10080.333621642061!2d4.3730005!3d50.829619!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe4b2913602f883db!2sBT+Money+Transfers!5e0!3m2!1sen!2sbr!4v1474918607975" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>

<div style="display:inline-block;">

  	<h3>Opening Hours</h3>

  <p>Monday - Friday: 9 AM - 7 PM + 1 GMT</p>

  <p>Saturday: 10 AM - 5 PM + 1 GMT</p>

  <p>Sunday: Closed</p>

</div></li>



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



			<!-- Privacy Policy Modal Start -->

			<div id="sendEmailOk" class="modal fade">

				<div class="modal-dialog EightyPercentWidth">

					<div class="modal-content">

						<div class="modal-body" align='center'>

							<?php $the_query = new WP_Query( 'page_id=685' ); ?>

							<?php while ($the_query -> have_posts()) :

							  $the_query -> the_post(); ?>

							<?php the_title(); ?>

							<?php endwhile;?>

						</div>

					</div>

				</div>

			</div>

			<!-- #PrivacyPolicy Modal End -->





<?php 





if(ICL_LANGUAGE_CODE=='en'){ ?>



 ?>



			<!-- BEGIN # MODAL LOGIN -->

		<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

		<br><br>

    	<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header" align="center">

					<img id="img_logo" src="http://www.btmt.eu/wp-content/themes/BTMTExclusive/Assets/Images/Logo.png">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span style="color: #fff; font-weight: bold">X</span>

					</button>

				</div>

                

                <!-- Begin # DIV Form -->

                <div id="div-forms">

                

                    <!-- Begin # Login Form -->

                    <form id="newsletters-form" action="http://www.btmt.eu/wp-content/themes/BTMTExclusive/newsletter.php" method="POST">

		                <div class="modal-body">

		                	<h3>Sign up for our newsletter</h3>

		                	<p>Stay tuned for all our news!</p>

				    		<input style="padding: 16px 10px; border-radius: 5px;" name="name" class="form-control" type="text" placeholder="Name" required>

				    		<input style="padding: 16px 10px; border-radius: 5px;" name="email" class="form-control" type="email" placeholder="E-mail" required>

				    		<input style="padding: 16px 10px; border-radius: 5px;" name="phone" class="form-control" type="text" placeholder="PhoneNumber" required>

				    		<select class="form-control" name="country">

				    			<option>Select country</option>

                            <optgroup label="North America">

                                <option value="US">United States</option>

                                <option value="UM">United States Minor Outlying Islands</option>

                                <option value="CA">Canada</option>

                                <option value="MX">Mexico</option>

                                <option value="AI">Anguilla</option>

                                <option value="AG">Antigua and Barbuda</option>

                                <option value="AW">Aruba</option>

                                <option value="BS">Bahamas</option>

                                <option value="BB">Barbados</option>

                                <option value="BZ">Belize</option>

                                <option value="BM">Bermuda</option>

                                <option value="VG">British Virgin Islands</option>

                                <option value="KY">Cayman Islands</option>

                                <option value="CR">Costa Rica</option>

                                <option value="CU">Cuba</option>

                                <option value="DM">Dominica</option>

                                <option value="DO">Dominican Republic</option>

                                <option value="SV">El Salvador</option>

                                <option value="GD">Grenada</option>

                                <option value="GP">Guadeloupe</option>

                                <option value="GT">Guatemala</option>

                                <option value="HT">Haiti</option>

                                <option value="HN">Honduras</option>

                                <option value="JM">Jamaica</option>

                                <option value="MQ">Martinique</option>

                                <option value="MS">Montserrat</option>

                                <option value="AN">Netherlands Antilles</option>

                                <option value="NI">Nicaragua</option>

                                <option value="PA">Panama</option>

                                <option value="PR">Puerto Rico</option>

                                <option value="KN">Saint Kitts and Nevis</option>

                                <option value="LC">Saint Lucia</option>

                                <option value="VC">Saint Vincent and the Grenadines</option>

                                <option value="TT">Trinidad and Tobago</option>

                                <option value="TC">Turks and Caicos Islands</option>

                                <option value="VI">US Virgin Islands</option>

                            </optgroup>

                            <optgroup label="South America">

                                <option value="AR">Argentina</option>

                                <option value="BO">Bolivia</option>

                                <option value="BR">Brazil</option>

                                <option value="CL">Chile</option>

                                <option value="CO">Colombia</option>

                                <option value="EC">Ecuador</option>

                                <option value="FK">Falkland Islands (Malvinas)</option>

                                <option value="GF">French Guiana</option>

                                <option value="GY">Guyana</option>

                                <option value="PY">Paraguay</option>

                                <option value="PE">Peru</option>

                                <option value="SR">Suriname</option>

                                <option value="UY">Uruguay</option>

                                <option value="VE">Venezuela</option>

                            </optgroup>

                            <optgroup label="Europe">

                                <option value="GB">United Kingdom</option>

                                <option value="AL">Albania</option>

                                <option value="AD">Andorra</option>

                                <option value="AT">Austria</option>

                                <option value="BY">Belarus</option>

                                <option value="BE">Belgium</option>

                                <option value="BA">Bosnia and Herzegovina</option>

                                <option value="BG">Bulgaria</option>

                                <option value="HR">Croatia (Hrvatska)</option>

                                <option value="CY">Cyprus</option>

                                <option value="CZ">Czech Republic</option>

                                <option value="FR">France</option>

                                <option value="GI">Gibraltar</option>

                                <option value="DE">Germany</option>

                                <option value="GR">Greece</option>

                                <option value="VA">Holy See (Vatican City State)</option>

                                <option value="HU">Hungary</option>

                                <option value="IT">Italy</option>

                                <option value="LI">Liechtenstein</option>

                                <option value="LU">Luxembourg</option>

                                <option value="MK">Macedonia</option>

                                <option value="MT">Malta</option>

                                <option value="MD">Moldova</option>

                                <option value="MC">Monaco</option>

                                <option value="ME">Montenegro</option>

                                <option value="NL">Netherlands</option>

                                <option value="PL">Poland</option>

                                <option value="PT">Portugal</option>

                                <option value="RO">Romania</option>

                                <option value="SM">San Marino</option>

                                <option value="RS">Serbia</option>

                                <option value="SK">Slovakia</option>

                                <option value="SI">Slovenia</option>

                                <option value="ES">Spain</option>

                                <option value="UA">Ukraine</option>

                                <option value="DK">Denmark</option>

                                <option value="EE">Estonia</option>

                                <option value="FO">Faroe Islands</option>

                                <option value="FI">Finland</option>

                                <option value="GL">Greenland</option>

                                <option value="IS">Iceland</option>

                                <option value="IE">Ireland</option>

                                <option value="LV">Latvia</option>

                                <option value="LT">Lithuania</option>

                                <option value="NO">Norway</option>

                                <option value="SJ">Svalbard and Jan Mayen Islands</option>

                                <option value="SE">Sweden</option>

                                <option value="CH">Switzerland</option>

                                <option value="TR">Turkey</option>

                            </optgroup>

                            <optgroup label="Asia">

                                <option value="AF">Afghanistan</option>

                                <option value="AM">Armenia</option>

                                <option value="AZ">Azerbaijan</option>

                                <option value="BH">Bahrain</option>

                                <option value="BD">Bangladesh</option>

                                <option value="BT">Bhutan</option>

                                <option value="IO">British Indian Ocean Territory</option>

                                <option value="BN">Brunei Darussalam</option>

                                <option value="KH">Cambodia</option>

                                <option value="CN">China</option>

                                <option value="CX">Christmas Island</option>

                                <option value="CC">Cocos (Keeling) Islands</option>

                                <option value="GE">Georgia</option>

                                <option value="HK">Hong Kong</option>

                                <option value="IN">India</option>

                                <option value="ID">Indonesia</option>

                                <option value="IR">Iran</option>

                                <option value="IQ">Iraq</option>

                                <option value="IL">Israel</option>

                                <option value="JP">Japan</option>

                                <option value="JO">Jordan</option>

                                <option value="KZ">Kazakhstan</option>

                                <option value="KP">Korea, Democratic People's Republic of</option>

                                <option value="KR">Korea, Republic of</option>

                                <option value="KW">Kuwait</option>

                                <option value="KG">Kyrgyzstan</option>

                                <option value="LA">Lao</option>

                                <option value="LB">Lebanon</option>

                                <option value="MY">Malaysia</option>

                                <option value="MV">Maldives</option>

                                <option value="MN">Mongolia</option>

                                <option value="MM">Myanmar (Burma)</option>

                                <option value="NP">Nepal</option>

                                <option value="OM">Oman</option>

                                <option value="PK">Pakistan</option>

                                <option value="PH">Philippines</option>

                                <option value="QA">Qatar</option>

                                <option value="RU">Russian Federation</option>

                                <option value="SA">Saudi Arabia</option>

                                <option value="SG">Singapore</option>

                                <option value="LK">Sri Lanka</option>

                                <option value="SY">Syria</option>

                                <option value="TW">Taiwan</option>

                                <option value="TJ">Tajikistan</option>

                                <option value="TH">Thailand</option>

                                <option value="TP">East Timor</option>

                                <option value="TM">Turkmenistan</option>

                                <option value="AE">United Arab Emirates</option>

                                <option value="UZ">Uzbekistan</option>

                                <option value="VN">Vietnam</option>

                                <option value="YE">Yemen</option>

                            </optgroup>

                            <optgroup label="Australia / Oceania">

                                <option value="AS">American Samoa</option>

                                <option value="AU">Australia</option>

                                <option value="CK">Cook Islands</option>

                                <option value="FJ">Fiji</option>

                                <option value="PF">French Polynesia (Tahiti)</option>

                                <option value="GU">Guam</option>

                                <option value="KB">Kiribati</option>

                                <option value="MH">Marshall Islands</option>

                                <option value="FM">Micronesia, Federated States of</option>

                                <option value="NR">Nauru</option>

                                <option value="NC">New Caledonia</option>

                                <option value="NZ">New Zealand</option>

                                <option value="NU">Niue</option>

                                <option value="MP">Northern Mariana Islands</option>

                                <option value="PW">Palau</option>

                                <option value="PG">Papua New Guinea</option>

                                <option value="PN">Pitcairn</option>

                                <option value="WS">Samoa</option>

                                <option value="SB">Solomon Islands</option>

                                <option value="TK">Tokelau</option>

                                <option value="TO">Tonga</option>

                                <option value="TV">Tuvalu</option>

                                <option value="VU">Vanuatu</option>

                                <option valud="WF">Wallis and Futuna Islands</option>

                            </optgroup>

                            <optgroup label="Africa">

                                <option value="DZ">Algeria</option>

                                <option value="AO">Angola</option>

                                <option value="BJ">Benin</option>

                                <option value="BW">Botswana</option>

                                <option value="BF">Burkina Faso</option>

                                <option value="BI">Burundi</option>

                                <option value="CM">Cameroon</option>

                                <option value="CV">Cape Verde</option>

                                <option value="CF">Central African Republic</option>

                                <option value="TD">Chad</option>

                                <option value="KM">Comoros</option>

                                <option value="CG">Congo</option>

                                <option value="CD">Congo, the Democratic Republic of the</option>

                                <option value="DJ">Dijibouti</option>

                                <option value="EG">Egypt</option>

                                <option value="GQ">Equatorial Guinea</option>

                                <option value="ER">Eritrea</option>

                                <option value="ET">Ethiopia</option>

                                <option value="GA">Gabon</option>

                                <option value="GM">Gambia</option>

                                <option value="GH">Ghana</option>

                                <option value="GN">Guinea

				    		</select>

                            

        		    	</div>

				        <div class="modal-footer">

                            <div>

                                <button type="submit" class="btn btn-lg btn-block" style="border-radius: 5px; background-color: #ffd432; border-color: 0px">Sign</button>

                            </div>

				        </div>

                    </form>

                    <!-- End # Login Form -->

                </div>

                <!-- End # DIV Form -->

                

			</div>

		</div>

	</div>

    <!-- END # MODAL LOGIN -->

<?php } else { ?>

		<!-- BEGIN # MODAL LOGIN -->

		<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

		<br><br>

    	<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header" align="center">

					<img id="img_logo" src="http://www.btmt.eu/wp-content/themes/BTMTExclusive/Assets/Images/Logo.png">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span style="color: #fff; font-weight: bold">X</span>

					</button>

				</div>

                

                <!-- Begin # DIV Form -->

                <div id="div-forms">

                

                    <!-- Begin # Login Form -->

                    <form id="newsletters" action="http://www.btmt.eu/wp-content/themes/BTMTExclusive/newsletter.php" method="POST">

		                <div class="modal-body">

		                	<h3>Assine nossa newsletter</h3>

		                	<p>Fique por dentro de todas as nossas novidades!</p>

				    		<input style="padding: 16px 10px; border-radius: 5px;" name="name" class="form-control" type="text" placeholder="Nome" required>

				    		<input style="padding: 16px 10px; border-radius: 5px;" name="email" class="form-control" type="email" placeholder="E-mail" required>

				    		<input style="padding: 16px 10px; border-radius: 5px;" name="phone" class="form-control" type="text" placeholder="Telefone" required>

				    		<select class="form-control" name="country">

				    			<option>Selecione o país</option>

                            <optgroup label="North America">

                                <option value="US">United States</option>

                                <option value="UM">United States Minor Outlying Islands</option>

                                <option value="CA">Canada</option>

                                <option value="MX">Mexico</option>

                                <option value="AI">Anguilla</option>

                                <option value="AG">Antigua and Barbuda</option>

                                <option value="AW">Aruba</option>

                                <option value="BS">Bahamas</option>

                                <option value="BB">Barbados</option>

                                <option value="BZ">Belize</option>

                                <option value="BM">Bermuda</option>

                                <option value="VG">British Virgin Islands</option>

                                <option value="KY">Cayman Islands</option>

                                <option value="CR">Costa Rica</option>

                                <option value="CU">Cuba</option>

                                <option value="DM">Dominica</option>

                                <option value="DO">Dominican Republic</option>

                                <option value="SV">El Salvador</option>

                                <option value="GD">Grenada</option>

                                <option value="GP">Guadeloupe</option>

                                <option value="GT">Guatemala</option>

                                <option value="HT">Haiti</option>

                                <option value="HN">Honduras</option>

                                <option value="JM">Jamaica</option>

                                <option value="MQ">Martinique</option>

                                <option value="MS">Montserrat</option>

                                <option value="AN">Netherlands Antilles</option>

                                <option value="NI">Nicaragua</option>

                                <option value="PA">Panama</option>

                                <option value="PR">Puerto Rico</option>

                                <option value="KN">Saint Kitts and Nevis</option>

                                <option value="LC">Saint Lucia</option>

                                <option value="VC">Saint Vincent and the Grenadines</option>

                                <option value="TT">Trinidad and Tobago</option>

                                <option value="TC">Turks and Caicos Islands</option>

                                <option value="VI">US Virgin Islands</option>

                            </optgroup>

                            <optgroup label="South America">

                                <option value="AR">Argentina</option>

                                <option value="BO">Bolivia</option>

                                <option value="BR">Brazil</option>

                                <option value="CL">Chile</option>

                                <option value="CO">Colombia</option>

                                <option value="EC">Ecuador</option>

                                <option value="FK">Falkland Islands (Malvinas)</option>

                                <option value="GF">French Guiana</option>

                                <option value="GY">Guyana</option>

                                <option value="PY">Paraguay</option>

                                <option value="PE">Peru</option>

                                <option value="SR">Suriname</option>

                                <option value="UY">Uruguay</option>

                                <option value="VE">Venezuela</option>

                            </optgroup>

                            <optgroup label="Europe">

                                <option value="GB">United Kingdom</option>

                                <option value="AL">Albania</option>

                                <option value="AD">Andorra</option>

                                <option value="AT">Austria</option>

                                <option value="BY">Belarus</option>

                                <option value="BE">Belgium</option>

                                <option value="BA">Bosnia and Herzegovina</option>

                                <option value="BG">Bulgaria</option>

                                <option value="HR">Croatia (Hrvatska)</option>

                                <option value="CY">Cyprus</option>

                                <option value="CZ">Czech Republic</option>

                                <option value="FR">France</option>

                                <option value="GI">Gibraltar</option>

                                <option value="DE">Germany</option>

                                <option value="GR">Greece</option>

                                <option value="VA">Holy See (Vatican City State)</option>

                                <option value="HU">Hungary</option>

                                <option value="IT">Italy</option>

                                <option value="LI">Liechtenstein</option>

                                <option value="LU">Luxembourg</option>

                                <option value="MK">Macedonia</option>

                                <option value="MT">Malta</option>

                                <option value="MD">Moldova</option>

                                <option value="MC">Monaco</option>

                                <option value="ME">Montenegro</option>

                                <option value="NL">Netherlands</option>

                                <option value="PL">Poland</option>

                                <option value="PT">Portugal</option>

                                <option value="RO">Romania</option>

                                <option value="SM">San Marino</option>

                                <option value="RS">Serbia</option>

                                <option value="SK">Slovakia</option>

                                <option value="SI">Slovenia</option>

                                <option value="ES">Spain</option>

                                <option value="UA">Ukraine</option>

                                <option value="DK">Denmark</option>

                                <option value="EE">Estonia</option>

                                <option value="FO">Faroe Islands</option>

                                <option value="FI">Finland</option>

                                <option value="GL">Greenland</option>

                                <option value="IS">Iceland</option>

                                <option value="IE">Ireland</option>

                                <option value="LV">Latvia</option>

                                <option value="LT">Lithuania</option>

                                <option value="NO">Norway</option>

                                <option value="SJ">Svalbard and Jan Mayen Islands</option>

                                <option value="SE">Sweden</option>

                                <option value="CH">Switzerland</option>

                                <option value="TR">Turkey</option>

                            </optgroup>

                            <optgroup label="Asia">

                                <option value="AF">Afghanistan</option>

                                <option value="AM">Armenia</option>

                                <option value="AZ">Azerbaijan</option>

                                <option value="BH">Bahrain</option>

                                <option value="BD">Bangladesh</option>

                                <option value="BT">Bhutan</option>

                                <option value="IO">British Indian Ocean Territory</option>

                                <option value="BN">Brunei Darussalam</option>

                                <option value="KH">Cambodia</option>

                                <option value="CN">China</option>

                                <option value="CX">Christmas Island</option>

                                <option value="CC">Cocos (Keeling) Islands</option>

                                <option value="GE">Georgia</option>

                                <option value="HK">Hong Kong</option>

                                <option value="IN">India</option>

                                <option value="ID">Indonesia</option>

                                <option value="IR">Iran</option>

                                <option value="IQ">Iraq</option>

                                <option value="IL">Israel</option>

                                <option value="JP">Japan</option>

                                <option value="JO">Jordan</option>

                                <option value="KZ">Kazakhstan</option>

                                <option value="KP">Korea, Democratic People's Republic of</option>

                                <option value="KR">Korea, Republic of</option>

                                <option value="KW">Kuwait</option>

                                <option value="KG">Kyrgyzstan</option>

                                <option value="LA">Lao</option>

                                <option value="LB">Lebanon</option>

                                <option value="MY">Malaysia</option>

                                <option value="MV">Maldives</option>

                                <option value="MN">Mongolia</option>

                                <option value="MM">Myanmar (Burma)</option>

                                <option value="NP">Nepal</option>

                                <option value="OM">Oman</option>

                                <option value="PK">Pakistan</option>

                                <option value="PH">Philippines</option>

                                <option value="QA">Qatar</option>

                                <option value="RU">Russian Federation</option>

                                <option value="SA">Saudi Arabia</option>

                                <option value="SG">Singapore</option>

                                <option value="LK">Sri Lanka</option>

                                <option value="SY">Syria</option>

                                <option value="TW">Taiwan</option>

                                <option value="TJ">Tajikistan</option>

                                <option value="TH">Thailand</option>

                                <option value="TP">East Timor</option>

                                <option value="TM">Turkmenistan</option>

                                <option value="AE">United Arab Emirates</option>

                                <option value="UZ">Uzbekistan</option>

                                <option value="VN">Vietnam</option>

                                <option value="YE">Yemen</option>

                            </optgroup>

                            <optgroup label="Australia / Oceania">

                                <option value="AS">American Samoa</option>

                                <option value="AU">Australia</option>

                                <option value="CK">Cook Islands</option>

                                <option value="FJ">Fiji</option>

                                <option value="PF">French Polynesia (Tahiti)</option>

                                <option value="GU">Guam</option>

                                <option value="KB">Kiribati</option>

                                <option value="MH">Marshall Islands</option>

                                <option value="FM">Micronesia, Federated States of</option>

                                <option value="NR">Nauru</option>

                                <option value="NC">New Caledonia</option>

                                <option value="NZ">New Zealand</option>

                                <option value="NU">Niue</option>

                                <option value="MP">Northern Mariana Islands</option>

                                <option value="PW">Palau</option>

                                <option value="PG">Papua New Guinea</option>

                                <option value="PN">Pitcairn</option>

                                <option value="WS">Samoa</option>

                                <option value="SB">Solomon Islands</option>

                                <option value="TK">Tokelau</option>

                                <option value="TO">Tonga</option>

                                <option value="TV">Tuvalu</option>

                                <option value="VU">Vanuatu</option>

                                <option valud="WF">Wallis and Futuna Islands</option>

                            </optgroup>

                            <optgroup label="Africa">

                                <option value="DZ">Algeria</option>

                                <option value="AO">Angola</option>

                                <option value="BJ">Benin</option>

                                <option value="BW">Botswana</option>

                                <option value="BF">Burkina Faso</option>

                                <option value="BI">Burundi</option>

                                <option value="CM">Cameroon</option>

                                <option value="CV">Cape Verde</option>

                                <option value="CF">Central African Republic</option>

                                <option value="TD">Chad</option>

                                <option value="KM">Comoros</option>

                                <option value="CG">Congo</option>

                                <option value="CD">Congo, the Democratic Republic of the</option>

                                <option value="DJ">Dijibouti</option>

                                <option value="EG">Egypt</option>

                                <option value="GQ">Equatorial Guinea</option>

                                <option value="ER">Eritrea</option>

                                <option value="ET">Ethiopia</option>

                                <option value="GA">Gabon</option>

                                <option value="GM">Gambia</option>

                                <option value="GH">Ghana</option>

                                <option value="GN">Guinea

				    		</select>

                            

        		    	</div>

				        <div class="modal-footer">

                            <div>

                                <button type="submit" class="btn btn-lg btn-block" style="border-radius: 5px; background-color: #ffd432; border-color: 0px">Assinar</button>

                            </div>

				        </div>

                    </form>

                    <!-- End # Login Form -->

                </div>

                <!-- End # DIV Form -->

                

			</div>

		</div>

	</div>



<?php } ?>



<style type="text/css">

	



#newsletterModal input[type=text], input[type=email], select {

	margin-top: 10px;

}



#div-login-msg,

#div-lost-msg,

#div-register-msg {

    border: 1px solid #dadfe1;

    height: 30px;

    line-height: 28px;

    transition: all ease-in-out 500ms;

}



#div-login-msg.success,

#div-lost-msg.success,

#div-register-msg.success {

    border: 1px solid #68c3a3;

    background-color: #c8f7c5;

}



#div-login-msg.error,

#div-lost-msg.error,

#div-register-msg.error {

    border: 1px solid #eb575b;

    background-color: #ffcad1;

}



#icon-login-msg,

#icon-lost-msg,

#icon-register-msg {

    width: 30px;

    float: left;

    line-height: 28px;

    text-align: center;

    background-color: #dadfe1;

    margin-right: 5px;

    transition: all ease-in-out 500ms;

}



#icon-login-msg.success,

#icon-lost-msg.success,

#icon-register-msg.success {

    background-color: #68c3a3 !important;

}



#icon-login-msg.error,

#icon-lost-msg.error,

#icon-register-msg.error {

    background-color: #eb575b !important;

}



#img_logo {

    max-height: 100px;

    max-width: 100px;

}



/* #########################################

   #    override the bootstrap configs     #

   ######################################### */



.modal-backdrop.in {

    filter: alpha(opacity=50);

    opacity: .8;

}



.modal-content {

    background-color: #ececec;

    border: 1px solid #bdc3c7;

    border-radius: 0px;

    outline: 0;

}



.modal-header {

    min-height: 16.43px;

    padding: 15px 15px 15px 15px;

    border-bottom: 0px;

    background-color: #00395e;

}



.modal-body {

    position: relative;

    padding: 5px 15px 5px 15px;

}



.modal-footer {

    padding: 15px 15px 15px 15px;

    text-align: left;

    border-top: 0px;

}



.checkbox {

    margin-bottom: 0px;

}



.btn {

    border-radius: 5px;

}



.btn:focus,

.btn:active:focus,

.btn.active:focus,

.btn.focus,

.btn:active.focus,

.btn.active.focus {

    outline: none;

}



.btn-lg, .btn-group-lg>.btn {

    border-radius: 0px;

}



.btn-link {

    padding: 5px 10px 0px 0px;

    color: #95a5a6;

}



.btn-link:hover, .btn-link:focus {

    color: #2c3e50;

    text-decoration: none;

}



.glyphicon {

    top: 0px;

}



.form-control {

  border-radius: 0px;

}



</style>

























			<style type="text/css">

				#frontpageanimateblock {

				    width: 1500px;

				    height: 630px;

				    overflow: hidden;

				    margin-left: -1501px;

				}

				#frontpageblock {

				    width:100%;

				    overflow:hidden;

				}

				#welcomepage {

				    height: 730px;

				    background-color:green;

				    width: 640px;

				    padding-top:40px;

				    float:left;

				}

				#logindiv {

				    height: 730px;

				    width: 100%;

				    padding-top:40px;

				    float:left;

				}

				.conteudo-mapa{

					

				}

				.todomapa{

					position: absolute;

					top: 0;

					z-index: 1050;

				}

				#loginlinkback a{

					position: absolute;

				    right: 246px;

				    top: 10px;

				}

				.imgmapa{

					max-width: 100px !important;

					border: 3px solid #edf4f8;

					float: left;

					margin-right: 6px;

				}

				.textomapa{

					line-height: 17px;

					font-size: 14px;

				}

				.topomapa1 {

				    width: 100%;

				    display: inline-block;

				}

				.gm-style-iw {

					margin-top: 7px;

				    background-color: #C0D600;

				    border-radius: 2px 2px 0 0;

				    padding: 12px;

				    border: 2px solid #00395e;

    				z-index: 1000 !important;

				}

				.footer .Contents .MiddleSection p {

     				margin-top: 0px !important; 

				}

			</style>



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

			

			<script type="text/javascript">



				//Pega valor do cookie pelo chave

				function getCookie(cname) {

					var name = cname + "=";

					var decodedCookie = decodeURIComponent(document.cookie);

					var ca = decodedCookie.split(';');

					for(var i = 0; i <ca.length; i++) {

						var c = ca[i];

						while (c.charAt(0) == ' ') {

							c = c.substring(1);

						}

						if (c.indexOf(name) == 0) {

							return c.substring(name.length, c.length);

						}

					}

					return "";

				}



				var cookieModal = getCookie("newsletters_cookie");

				if(!cookieModal) {

					$('#newsletterModal').modal('show');

				}



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

					paginationClickable: true,

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

					$("#OptInModal #sml_subscribe .sml_emailinput").val(SubscriberEmail);

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
						console.log('iniciando validação dos campos...');

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
						console.log('validação dos campos finalizada...');


						if ($('#ContactForm').valid()) {
							console.log('campos validados...');


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
									//url: 'envio.php?name='+YourName+'&email='+YourEmail+'&sub='+Subject+'&phone='+PhoneNumber+'&msn='+YourMessage+'',
									url: 'envio.php',
									//dataType:'json',
									data: {
										'name': YourName,
										'email': YourEmail,
										'sub': Subject,
										'phone': PhoneNumber
									},
									//data:'{"YourName": "'+YourName+'","YourEmail": "'+YourEmail+'","Subject": "'+Subject+'","PhoneNumber": "'+PhoneNumber+'","YourMessage": "'+YourMessage+'"}',
									success: function(result) {
										console.log(result);
										$("#ContactForm #Submit").prop("disabled", false);
										$("#ContactForm #Submit").removeClass('Activity');
									},
									error: function(error1,error2) {
										console.log(error1);
										alert("Form could not be submitted!");
										$("#ContactForm #Submit").prop("disabled", false);
										$("#ContactForm #Submit").removeClass('Activity');
									},
									complete: function(transport) {

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



		$("#locationButton").click(function(){

			$("#mapaUni").attr("style","margin-left: -30px;height: 300px;position: initial;");

		});



		var idInfoBoxAberto;

		var infoBox = [];

		var map;

		var markers = [];

		var refresh = true;





		$("#buttonSendEmail").click(function(){

			phone = "";

			email = "";

			name = "";

			subject = "";

			note = "";

			//fields in input

			$.each($("#ContactForm input"),function(i,item){

				if(is_Empty(item.value)){

					$(item).css({"border":"1px solid red"});

					item.value="";

				}else{

					$(item).css({"border":"1px solid green"});

					console.log($(item).val()+" (gree)");

					switch($(item).attr("name")){

    					case 'YourEmail':

    						email = $(item).val();

    						if(email.indexOf("@")>=0 && email.count(".")>=2){    	

    							status++;		

							}else{

								$(item).css({"border":"1px solid red"});

							}

    						break;

    					case 'YourName':

    						name = $(item).val();

    						status++;

    						break;

    					case 'PhoneNumber':

    						phone = $(item).val();

    						status++;

    						break;

    					case 'YourMessage':

    						note = $(item).val();

    						status++;

    						break;

    					case 'Subject':

    						subject = $(item).val();

    						status++;

    						break;

					}

				}

			});



			console.log("campos certos: "+status);

			if(status==5){

				teste = '{"phone":"'+phone+'","name":"'+name+'","email":"'+email+'","subject":"'+subject+'","note":"'+note+'"}';

				console.log("request sending: "+teste);

				$("#form").hide();

				$("#load").show();

				$.ajax({

					type:'POST',

			        dataType:'json',

					url: "sendEmail.php",

					data: teste,

					success: function(result){

						console.log("oioioioioi");

					},error: function (jqXHR, exception) {

						console.log(jqXHR);

					}

				});

			}

		});



		function is_Empty(texto){

			aux = texto.replace(/\s/g, "");

			if(aux==""){

				return true;

			}else{

				return false;

			}

		}



		function abrirInfoBox(id, marker) {

			if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {

				infoBox[idInfoBoxAberto].close();

			}



			infoBox[id].open(map, marker);

			idInfoBoxAberto = id;

		}



		function initMap() {

			 var directionsDisplay = new google.maps.DirectionsRenderer;

			// branch

			var bara = new google.maps.LatLng(50.838703,4.3359193);

			var pavis = new google.maps.LatLng(50.83457,4.354532);

			var barriere = new google.maps.LatLng(50.825723,4.344069);

			var flagey = new google.maps.LatLng(50.829619,4.373);



			var antwerpen = new google.maps.LatLng(51.225326, 4.415412);

			var midi = new google.maps.LatLng(50.837305, 4.342244);

			var anspach = new google.maps.LatLng(50.847304, 4.348792);

			var ixelles = new google.maps.LatLng(50.829628, 4.372951);

			



			var latlngbounds = new google.maps.LatLngBounds();





			map = new google.maps.Map(document.getElementById('mapaUni'), {



				zoom: 10,

				center: pavis,

				scrollwheel: true

			});

			directionsDisplay.setMap(map);

		

			var iconBase = '<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/';



			// ----------------------------------

			var contentString = 

								'<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/pavis.png">'+

							'<h4>Bara</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Place Bara 28, 1070</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

								'<p class="textomapa">Monday - Friday: 8 AM - 8 PM + 1 GMT</p>'+

								'<p class="textomapa">Saturday: 9 AM - 6 PM + 1 GMT</p>'+

								'<p class="textomapa">Sunday: 9 AM - 4 PM + 1 GMT</p>';



			var infowindow = new google.maps.InfoWindow({

				content: contentString

			});



			google.maps.event.addListener(infowindow, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});



			marker = new google.maps.Marker({

					position: bara,

					map: map,

					id:1,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});

			

			marker.addListener('click', function() {

				infowindow.open(map, marker);

			});

			marker.setMap(map);

			// ----------------------------------





			// ----------------------------------

			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/bara.png">'+

							'<h4>Flagey</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Rue Malibran 33, 1050</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: Closed</p>';



			var infowindow1 = new google.maps.InfoWindow({

				content: contentString

			});







			google.maps.event.addListener(infowindow1, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});







			marker1 = new google.maps.Marker({

					position: flagey,

					map: map,

					id:2,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});

			

			marker1.addListener('click', function() {

				infowindow1.open(map, marker1);

			});

			marker1.setMap(map);

			// ----------------------------------





			// ----------------------------------

			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/flagey.png">'+

							'<h4>Parvis</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Av Jean Volders 58, 1060</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 9 AM - 8 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: Closed</p>';



			var infowindow2 = new google.maps.InfoWindow({



				content: contentString



			});





			google.maps.event.addListener(infowindow2, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});





			marker2 = new google.maps.Marker({

					position: pavis,

					map: map,

					id:3,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});



			

			marker2.addListener('click', function() {

				infowindow2.open(map, marker2);

			});

			marker2.setMap(map);



			//---------  



			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/midi.png">'+

							'<h4>Barriere</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Chaussée d\'Alsemberg 36, 1036</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: Closed</p>';



			var infowindow3 = new google.maps.InfoWindow({

				content: contentString

			});





			google.maps.event.addListener(infowindow3, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});





			marker3 = new google.maps.Marker({

					position: barriere,

					map: map,

					id:3,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});



			

			marker3.addListener('click', function() {

				infowindow3.open(map, marker3);

			});

			marker3.setMap(map);







			// ----------------------------------

			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/barriere.png">'+

							'<h4>Antwerpen</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Houwerstraat 2, 2060 Antwerpen</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 9 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: Closed</p>';



			var infowindow4 = new google.maps.InfoWindow({

				content: contentString

			});





			google.maps.event.addListener(infowindow4, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});





			marker4 = new google.maps.Marker({

					position: antwerpen,

					map: map,

					id:4,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});

			

			marker4.addListener('click', function() {

				infowindow4.open(map, marker4);

			});

			marker4.setMap(map);

			// ----------------------------------





			// ----------------------------------

			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/antwerpen.png">'+

							'<h4>Midi</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Boulevard du Midi 96, 1000</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 10 AM - 7 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: 9 AM - 3 PM + 1 GMT</p>';



			var infowindow5 = new google.maps.InfoWindow({

				content: contentString

			});



			google.maps.event.addListener(infowindow5, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});





			marker5 = new google.maps.Marker({

					position: midi,

					map: map,

					id:5,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});

			

			marker5.addListener('click', function() {

				infowindow5.open(map, marker5);

			});

			marker5.setMap(map);

			// ----------------------------------





			// ----------------------------------

			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/midi.png">'+

							'<h4>Anspach</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Boulevard Anspach 118, 1000</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: Closed</p>';



			var infowindow6 = new google.maps.InfoWindow({

				content: contentString

			});





			google.maps.event.addListener(infowindow6, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});





			marker6 = new google.maps.Marker({

					position: anspach,

					map: map,

					id:6,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});

			

			marker6.addListener('click', function() {

				infowindow6.open(map, marker6);

			});

			marker6.setMap(map);

			// ----------------------------------







			// ----------------------------------

			contentString = '<div class="topomapa1"><img class="imgmapa img-circle" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/anspach.png">'+

							'<h4>Ixelles</h4>'+

							'<p><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/mapa.png">Rua Malibran 25, 1050</p></div>'+

							'<h5><img src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Images/lojas/time1.png"> Opening Hours</h5>'+

							'<p class="textomapa">Monday - Friday: 9 AM - 7 PM + 1 GMT</p>'+

							'<p class="textomapa">Saturday: 10 AM - 5 PM + 1 GMT</p>'+

							'<p class="textomapa">Sunday: Closed</p>';



			var infowindow7 = new google.maps.InfoWindow({

				content: contentString

			});





			google.maps.event.addListener(infowindow7, 'domready', function() {

				// Reference to the DIV which receives the contents of the infowindow using jQuery

			   var iwOuter = $('.gm-style-iw');



			   /* The DIV we want to change is above the .gm-style-iw DIV.

			    * So, we use jQuery and create a iwBackground variable,

			    * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().

			    */

			   var iwBackground = iwOuter.prev();



			   // Remove the background shadow DIV

			   iwBackground.children(':nth-child(2)').css({'display' : 'none'});



			   // Remove the white background DIV

			   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			   a = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style');

			   a+='background-color:#C0D600; border-right: 2px solid #00395e; z-index: 1100;';

			   b = $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style');

			   b+='background-color:#C0D600;border-left: 2px solid #00395e; z-index: 1100;';

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[1]).children()[0]).attr('style',a);

			   $($($($($($('.gm-style-iw').parent())[0]).children().children().children())[0]).children()[0]).attr('style',b);



			});





			marker7 = new google.maps.Marker({

					position: ixelles,

					map: map,

					id:7,

					//title: 'Placa Bara, 28 1070 Bruxelles, Call us now on +32484200679',

					icon: iconBase + 'MapPin.png'

				});

			

			marker7.addListener('click', function() {

				infowindow7.open(map, marker7);

			});

			marker7.setMap(map);

			// ---------------------------------

		}

		// #Google Maps End



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



				var SiteHomeAddress = "http://labs.themightyroar.com/BTMT/Dynamic"; //$(".HeaderLogo").attr('href');



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

			<!--Start of Tawk.to Script-->

			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBApac5F2vGob60Hf_T6hZgweBcfmng6ck&callback=initMap"></script>

			<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/markerclusterer.js"></script>

			<!-- GoogleMaps -->

    		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/Assets/Js/infobox.js"></script>

			<script type="text/javascript">

			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

			(function(){

			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];

			s1.async=true;

			s1.src='https://embed.tawk.to/57d975e7311d6c5be06ce4c6/default';

			s1.charset='UTF-8';

			s1.setAttribute('crossorigin','*');

			s0.parentNode.insertBefore(s1,s0);

			})();

			</script>







			</script>



				<script type="text/javascript">

				click=0;

				$(document).ready(function () {



			    $('.loginlink').click(function () {

			    	if(click==0){

			    		$('div#frontpageanimateblock').animate({

				            'marginLeft': '+=1501px'

				        });

				        click=1;

			    	}else{

			    		$('div#frontpageanimateblock').animate({

				            'marginLeft': '-=1501px'

				        });

				        click=0;

			    	}

			        



			    });



			    $('#loginlinkback').click(function () {



			        if(click==0){

			    		$('div#frontpageanimateblock').animate({

				            'marginLeft': '+=1501px'

				        });

				        click=1;

			    	}else{

			    		$('div#frontpageanimateblock').animate({

				            'marginLeft': '-=1501px'

				        });

				        click=0;

			    	}



			    });



			});

			</script>







<!--End of Tawk.to Script-->

			<!-- #JavaScripts End -->

		</body>

</html>