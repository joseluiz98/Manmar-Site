<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0px !important">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="no-cache" http-equiv="pragma">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
        <?php
        if (!is_home()):
            wp_title('|', true, 'right');
        endif;
        bloginfo('name');
        ?>
    </title>
    <?php if (is_single()){ ?>
    <meta property="og:url" content="<?php echo the_permalink() ?>">
    <meta property="og:title" content="<?php single_post_title(''); ?>">
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>">
    <?php }else{ ?>
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php bloginfo('url'); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/dist/imgs/screenshot.jpg">
    <?php } ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Images/Favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Framework/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Framework/Bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Js/jPushMenu/css/jPushMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Fonts/Stylesheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Js/Swiper/dist/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Js/ExpandingSearchBar/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Js/ExpandingSearchBar/css/component.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Js/FAQsSlider/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Js/AniJs/css/animations.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Css/Stylesheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/Assets/Css/stores.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<style>
       /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
	   /*#map_units {
        height: 100%;
       } */
      /*Optional: Makes the sample page fill the window. */
      /* html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      } */
      #floating-panel {
        position: relative;
        top: 10px;
       /*  left: 25%; */
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #warnings-panel {
      	display: none;
        width: 100%;
        height:10%;
        text-align: center;
      }
    </style>
</head>
	<?php 
	if(!is_single()):
		if(is_page(218)): ?>
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
			<?php 
		endif; 
		if(is_home()): 
			?>
			<body>
			<?php 
		endif; 
	endif; 
	if (is_single()):
		?>
		<body class="Alternative">
		<?php 
	endif; 
	?>
	<noscript>

		<iframe src="//www.googletagmanager.com/ns.html?id=GTM-5SWDQN" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5SWDQN');
	</script>
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
				<?php endwhile;?>
			</a>
			<a href="#AboutBlock"><?php $the_query = new WP_Query( 'page_id=818' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
					<?php the_content(); ?>
				<?php endwhile;?>
			</a>
			<a href="#GuranteesBlock"><?php $the_query = new WP_Query( 'page_id=823' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
					<?php the_content(); ?>
				<?php endwhile;?>
			</a>
			<a href="#BlogBlock"><p>BTMT Blog</p></a>
			<a href="#ContactUsBlock"><?php $the_query = new WP_Query( 'page_id=828' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
					<?php the_content(); ?>
				<?php endwhile;?>
			</a>
			<a href="#TrackingBlock"><?php $the_query = new WP_Query( 'page_id=834' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
					<?php the_content(); ?>
				<?php endwhile;?>
			</a>
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
				<img alt="Logo" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/Logo.png" />
			</a>
			<?php if ( !is_home() ) : ?>
				<?php if ( !is_page() ) : ?>
					<?php if ( !is_search() ) : ?>
						<a href='<?php bloginfo('url'); ?>/blog/' class="HeaderBlogLink HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
							<!-- <h4>The Blog</h4> -->
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( is_page(218) ) : ?>
					<a href='<?php bloginfo('url'); ?>/blog/' class="HeaderBlogLink HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
						<!-- <h4>The Blog</h4> -->
					</a>
				<?php endif; ?>
			<?php endif; ?>
			<ul>
				<li class="NavigationMenu QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
					<a class="toggle-menu menu-right">
						<img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/Menu.png" alt="Menu" />
					</a>
				</li>
				<li class="Language HalfSecDelay OneSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
					<a href="http://www.btmt.eu/pt-br/">
					<!-- <a href="<?php //bloginfo('url'); ?>"> -->
						<span id="English" style="color: #fff; padding-top: 2px;">
							<!-- <img style="width:22px; margin-right: 10px" id="CurrentLanguage" src="http://www.btmt.eu/wp-content/plugins/sitepress-multilingual-cms/res/flags/pt-br.png" alt="Choose Language" /> -->
							BR
						</span>
					</a> &nbsp
					<a href="http://www.btmt.eu/" style="color: #fff; padding-top: 2px;">
					<!-- <a href="<?php //bloginfo('url'); ?>" style="color: #fff; padding-top: 2px;"> -->
						<span id="French">
							<!-- <img style="width:22px;" id="CurrentLanguage" src="http://www.btmt.eu/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png" alt="Choose Language" /> -->
							EN
						</span>
					</a>
					<!-- <a href="#">
					<?php
					if(ICL_LANGUAGE_CODE=='en'){ ?>
					<span id="English">
						<img id="CurrentLanguage" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/LanguageEN.png" alt="Choose Language" />
					</span>
					<?php }
					if(ICL_LANGUAGE_CODE=='fr'){ ?>
					<span id="French">
						<img id="CurrentLanguage" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/LanguageFR.png" alt="Choose Language" />
					</span>
					<?php } ?>
					<div class="LanguageDropDownMenu">
						<?php
						if(ICL_LANGUAGE_CODE=='fr'){ ?>
							<span id="English">
								<a href="http://btmt.eu/en/"><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/LanguageEN.png" alt="English" /></a>
							</span>
						<?php }
						if(ICL_LANGUAGE_CODE=='en'){ ?>
							<span id="French">
								<a href="http://btmt.eu/fr/"><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/LanguageFR.png" alt="French" /></a>
							</span>
						<?php } ?>
						<span id="Dutch" class="">
							<img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/LanguageNL.png" alt="Dutch" />
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
						<img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/Search.png" alt="Search" />
					</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- #Header End -->