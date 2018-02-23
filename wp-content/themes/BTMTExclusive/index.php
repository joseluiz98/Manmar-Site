<?php get_header();
if(!is_single()):
	if (is_page(218)) : 
		?>
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
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p>
									Posted in
									<span class="button">
										<?php
										foreach((get_the_category()) as $category):
											echo $category->cat_name . ' ';
										endforeach;
										?>
									</span>
								</p>
								<?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
								<p><?php the_excerpt(); ?></p>
								<p><a href="<?php the_permalink(); ?>">Read More</a></p>
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
					<h3><?php _e("Recent Articles", "BTMT"); ?></h3>
					<hr />
					<ul class="RecentArticleLinks">
						<?php $the_query = new WP_Query( 'showposts=8' ); ?>
						<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
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
					<h3><?php _e("Browse Category", "BTMT"); ?></h3>
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
					wp_list_categories($defaults);
					?>
				</div>
			</div>
		</div>
		<?php 
	endif; 
	if (!is_page(218)):
		if (is_home()): 
			?>
			<!-- PromoBlock Start -->
			<?php $backgroundPromo = get_field('imagem_background_promo', 'option'); ?>
			<div class="PromoBlock text-center" id="PromoBlock" style="background: url('<?php echo $backgroundPromo['url']; ?>')50% 50% no-repeat;">
				<div class="Contents">
					<div class="container">
						<div class="col-lg-6 col-lg-offset-3">
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
						<div class="ButtonsContainer col-xs-12" style="display: none;">
							<div class="CallToActionButtons">
								<!-- <a href="#branches" class="loginlink TrackYourMoney QuarterSecDelay OneAndHalfSecDuration signuplink" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal"> -->
								<a href="#branches" class="TrackYourMoney QuarterSecDelay OneAndHalfSecDuration signuplink" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal">
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
										height: auto !important;
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
					<!-- <hr class="ShortHR" /> -->
					<div class="PartnersContainer col-xs-12 text-center">
						<div class="Partners col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-1 col-xs-5 col-xs-offset-1">
							<a class="WesternUnion"></a>
						</div>
						<div class="Partners col-md-2 col-sm-2 col-xs-5">
							<a class="Belmoney"></a>
						</div>
						<!-- <div class="Partners col-md-2 col-sm-2 col-sm-offset-0 col-xs-5 col-xs-offset-1">
							<a class="SmallWorld"></a>
						</div> -->
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
							<!-- <img alt="Logo" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/LogoBlue.png" class="Logo img-responsive HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" /> -->
							<?php $the_query = new WP_Query( 'page_id=5' ); ?>
							<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
								<?php the_content(); ?>
							<?php endwhile;?>
						</div>
					</div>
				</div>
			</div>
			<!-- #AboutBlock End -->

			<!-- #StoresBlock Start -->
			<div id="stores" class="row">
				<div class="content-blog grid" id="branches">
					<div class="container">
						<div class="row">
							<?php 
								$codLang = ICL_LANGUAGE_CODE;
								switch ($codLang) {
		                            case 'pt-br':
		                                echo '<h2 class="titleBranche" style="color:#ffffff;">Agências</h2>';
		                                break;
		                            case 'fr':
										echo '<h2 class="titleBranche" style="color:#ffffff;">Magasins</h2>'; 
									break;
		                            default:
		                                echo '<h2 class="titleBranche" style="color:#ffffff;">Branches</h2>';
		                                break;
		                        }
		                    ?>
						</div>
		                <div class="row">
		                	<div class="owl-carousel owl-theme">
		                		<?php
				                $stores = new WP_Query(
								    array(
								    'post_type' => 'stores',  
								    'orderby' => 'meta_value', 
								    'order' => 'DESC',    
								    'posts_per_page' => -1
								    )
								);
			                    while ($stores->have_posts()): $stores->the_post();
				                    $id = get_the_ID();
				                    $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				                    $address = get_post_meta(get_the_ID(),'endereço',true);
				                    $lat = get_post_meta(get_the_ID(),'latitude',true);
				                    $long = get_post_meta(get_the_ID(),'longitude',true);
				                    $content = get_the_content();
			                        ?>
						            <div class="item">
						              	<div class="col-md-12 stores">
										    <div class="columns"> 
										        <div class="post-module"> 
										            <div class="thumbnails">
										                <div class="date">
										                   <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" data-id="<?php echo $id; ?>" data-lat="<?php echo $lat; ?>" data-long="<?php echo $long; ?>" class="viewMap">
										                        <div class="day"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
										                    </a>
										                </div>
														<?php the_post_thumbnail('thumb360x220', array('class' => 'img-responsive')); ?>
										            </div>
										            <div class="post-content">
										                <h1 class="title"><?php the_title(); ?></h1>
										                <span class="small" style="font-size: 73%;"><?php echo $address; ?></span>
										                <div class="hours">
											                <p class="small">
											                	<span class="fa fa-clock-o small" aria-hidden="true"></span>
											                	<?php 
											                		switch ($codLang) {
										                                case 'pt-br':
										                                    echo '<span class="times">Seg - Sex: </span>';
										                                    break;
										                                case 'fr':
																			echo '<span class="times">Lundi - Vendredi: </span>'; 
																		break;
										                                default:
										                                    echo '<span class="times">Monday - Friday: </span>';
										                                    break;
										                            }
											                	?>
											                	<?php echo get_post_meta(get_the_id(),'workingDays', true); ?>
											                </p>
											                <p class="small">
											                	<span class="fa fa-clock-o small" aria-hidden="true"></span>
											                	<?php 
											                		switch ($codLang) {
										                                case 'pt-br':
										                                    echo '<span class="times">Sábado: </span>';
										                                    break;
										                                case 'fr':
																			echo '<span class="times">Samedi: </span>'; 
																		break;
										                                default:
										                                    echo '<span class="times">Saturday: </span>';
										                                    break;
										                            }
											                	?>
											                	<?php echo get_post_meta(get_the_id(),'saturday', true); ?>
											                </p>
											                <p class="small">
											                	<span class="fa fa-clock-o small" aria-hidden="true"></span>
											                	<?php 
											                		switch ($codLang) {
										                                case 'pt-br':
										                                    echo '<span class="times">Domingo: </span>';
										                                    break;
										                                case 'fr':
																			echo '<span class="times">Dimanche: </span>'; 
																		break;
										                                default:
										                                    echo '<span class="times">Sunday: </span>';
										                                    break;
										                            }
											                	?>
											                	<?php echo get_post_meta(get_the_id(),'sunday', true); ?>
											                </p>
										                </div>
										            </div>
										        </div>
										    </div>
										</div>
						            </div>
								    <?php
				                    endwhile;
				                wp_reset_postdata();
				                ?>
			          		</div>
		                </div>
		            </div>
		        </div>
			</div>
			<!-- #StoresBlock End -->

			<!-- TrackingBlock Start -->
			<div class="TrackingBlock">
				<?php $background = get_field('imagem_background', 'option'); ?>
				<div class="content-blog grid services" id="parallaxPhoto" data-speed="6" data-type="background">
					<div class="container">
						<div class="row">
							<?php 
								$codLang = ICL_LANGUAGE_CODE;
								switch ($codLang) {
		                            case 'pt-br':
		                                echo '<h2 class="titleBranche">Serviços</h2>';
		                                break;
		                            case 'fr':
										echo '<h2 class="titleBranche">Les Services</h2>'; 
									break;
		                            default:
		                                echo '<h2 class="titleBranche">Services</h2>';
		                                break;
		                        }
		                    ?>
						</div>
						<div class="row">
							<?php
			                $services = new WP_Query(
							    array(
							    'post_type' => 'service',  
							    'orderby' => 'title', 
							    'order' => 'ASC',    
							    'posts_per_page' => -1
							    )
							);
							?>
							<div class="gridService">
								<?php	
								$i = 0;
			                    while ($services->have_posts()): $services->the_post();
				                    $content = get_the_content();
				                    $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				                    $whatsapp = get_field('whatsapp', 'option');
				                    $callcenter = get_field('call-center', 'option');
				                    $slug = $post->post_name;
				                    	switch ($slug) {
				                    		case 'call-center':
				                    			?>
				                    			<div class="col-md-12 itemService" style="background: url('<?php echo $img;?>') no-repeat #062945;">
													<div class="mask">
														<a href="tel:<?php echo $callcenter; ?>" alt="Call <?php echo $callcenter; ?>" title="Call <?php echo $callcenter; ?>">
														<div class="mask-hover">
															<div class="icon class_<?php echo $i; ?>">
															</div>
															<div class="titleService">
																<h4><?php the_title(); ?></h4>
															</div>
															<div class="descriptionService">
																<p>
																	<?php echo $content; ?>
																</p>
															</div>
														</div>
														</a>
													</div>
												</div>
				                    			<?php
				                    			break;
				                    		case 'whatsapp':
				                    			?>
				                    			<div class="col-md-12 itemService" style="background: url('<?php echo $img;?>') no-repeat #062945;">
													<div class="mask">				
														<?php 
														$codLang = ICL_LANGUAGE_CODE;
														switch ($codLang) {
								                            case 'pt-br':
								                                $string = 'Olá BT Money Transfers !';
								                                break;
								                            case 'fr':
																$string = 'Bonjour BT Money Transfers !'; 
															break;
								                            default:
								                                $string = 'Hello BT Money Transfers !';
								                                break;
								                        }
														$message = rawurlencode($string); 
														?>
														<a href="https://api.whatsapp.com/send?phone=32489744460&text=<?php echo $message; ?> " alt="Whatsapp <?php echo $whatsapp; ?>" title="Whatsapp <?php echo $whatsapp; ?>" target="_blank">
														<div class="mask-hover">
															<div class="icon class_<?php echo $i; ?>">
															</div>
															<div class="titleService">
																<h4><?php the_title(); ?></h4>
															</div>
															<div class="descriptionService">
																<p>
																	<?php echo $content; ?>
																</p>
															</div>
														</div>
														</a>
													</div>
												</div>
				                    			<?php
				                    			break;
				                    		default:
				                    			?>
				                    			<div class="col-md-12 itemService" style="background: url('<?php echo $img;?>') no-repeat #062945;" title="<?php the_title(); ?>">
													<div class="mask">
														<div class="mask-hover">
															<div class="icon class_<?php echo $i; ?>">
															</div>
															<div class="titleService">
																<h4><?php the_title(); ?></h4>
															</div>
															<div class="descriptionService">
																<p>
																	<?php echo $content; ?>
																</p>
															</div>
														</div>
													</div>
												</div>
				                    			<?php
				                    			break;
				                    	}
									$i ++;
			                    endwhile;
				                wp_reset_postdata();
				                ?>
			                </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="GetAlerts">
					<div class="container">
						<div class="Core col-md-12 col-lg-offset-1">
							<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/TrackingBlockEmailNotificationIcon.png" alt="Email Notification" />
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

					<?php 
						$the_query = new WP_Query( 'page_id=25' );
						while ($the_query -> have_posts()) : $the_query -> the_post(); 
						?>
						<h5 class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">
							<?php the_title(); ?>
						</h5>
						<p class="OneSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeIn animated; if: scroll, on: window, do: fadeIn animated, before: scrollReveal">
							<?php the_content(); ?>
						</p>
						<img class="Icon QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInTopRight animated; if: scroll, on: window, do: fadeInTopRight animated, before: scrollReveal" src="http://www.btmt.eu/wp-content/uploads/2016/07/GuranteesBlockSafeTransfersIcon.png" alt="" />
						<?php 
					endwhile;
					?>
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
						<?php 
						$the_query = new WP_Query( 'page_id=27' );
						while ($the_query -> have_posts()) : $the_query -> the_post(); 
							?>
							<img src="http://www.btmt.eu/wp-content/uploads/2016/07/MissionBlockIcon.png" alt="Our Mission" class="HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" />
							<?php 
							the_content();
						endwhile;
						?>
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
						<?php 
						$the_query = new WP_Query('page_id=54'); 
						while ($the_query -> have_posts()) : $the_query -> the_post(); 
							?>
							<h4 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
								<?php the_title(); ?>
							</h4>
							<?php 
						endwhile;
						?>
						<hr class="ShortHR" />
						<div class="col-md-4">
							<?php include 'inc/sidebar/sidebar_contact.php'; ?>
							<?php 
							//$the_query = new WP_Query('page_id=56');
							//while ($the_query -> have_posts()) : $the_query -> the_post(); 
								?>
								<!-- <h5><?php the_title(); ?></h5>
								<p><?php the_content(); ?></p>
								<br /> -->
								<?php 
							//endwhile;

							//$the_query = new WP_Query('page_id=58'); 
							//while ($the_query -> have_posts()) : $the_query -> the_post(); 
								?>
								<!-- <h5><?php the_title(); ?></h5>
								<p><?php the_content(); ?></p>
								<br /> -->
								<?php 
							//endwhile;
							
							//$the_query = new WP_Query('page_id=60'); 
							//while ($the_query -> have_posts()) : $the_query -> the_post(); 
								?>
								<!-- <h5><?php the_title(); ?></h5>
								<p><?php the_content(); ?></p> -->
								<?php 
							//endwhile;

							//$the_query = new WP_Query('page_id=62'); 
							//while ($the_query -> have_posts()) : $the_query -> the_post();
								?>
								<!-- <hr class="LongHR" />
								<a href="#branches" class="LocateUs"><?php the_title(); ?></a> -->
								<?php 
							//endwhile;
							?>
						</div>

						<div class="ContactUsForm col-md-8">
							<?php 
								$codLang = ICL_LANGUAGE_CODE;
								// switch ($codLang) {
								// 	case 'pt-br':
								// 		echo do_shortcode('[contact-form-7 id="1246" title="Contact Form Português"]'); 
								// 		break;
								// 	case 'fr':
								// 		echo do_shortcode('[contact-form-7 id="1245" title="Contact Form French"]'); 
								// 		break;
								// 	default:
								// 		//echo do_shortcode('[contact-form-7 id="1244" title="Contact Form English"]'); 
								// 		include 'inc/form-english.php';
								// 		break;
								// }
								?>
								<?php 
								switch ($codLang) {
								    case 'pt-br':
								        include 'inc/forms/form_contact_pt.php';
								        break;
								    case 'fr':
								        include 'inc/forms/form_contact_fr.php';
								        break;
								    default:
								        include 'inc/forms/form_contact_en.php';
								        break;
								}
							?>
							<div class="loading">
								<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw" alt="loading" title="loading"></i>
								<span class="sr-only">Loading...</span>
							</div>
					        <br/>
					        <div class="col-sm-12 col-xs-12 col-md-12">
						        <div id="retornoHTMLcontact"></div>
					        </div>
					    </div>
				        
							<?php 
								// $the_query = new WP_Query( 'page_id=54' );  
								// while ($the_query -> have_posts()) : $the_query -> the_post();
								// 	the_content(); 
								// endwhile;
								// wp_reset_postdata();
							?>
						
					</div>
				</div>
			</div>
			<!-- #ContactUsBlock End -->

			<!-- BlogBlock Start -->
			<div class="BlogBlock" id="BlogBlock">
				<div class="ContentBlock">
					<div class="container">
						<div class="col-lg-12">
							<?php 
							$the_query = new WP_Query( 'page_id=209' ); 
							while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
								<h4 class="QuarterSecDelay OneAndHalfSecDuration" animation="if: load, on: window, do: fadeInDown animated; if: scroll, on: window, do: fadeInDown animated, before: scrollReveal">
									<?php the_title(); ?>
								</h4>
								<?php 
							endwhile;
							?>
							<hr class="ShortHR"/>
							<div class="PostsContainer">
								<div class="LatestPosts">
									<?php 
									$the_query = new WP_Query( 'showposts=2' ); 
									while ($the_query -> have_posts()) : $the_query -> the_post();
										?>
										<div class="TwoPosts col-sm-6 col-xs-12">
											<a href="<?php the_permalink(); ?>" class="PostsInnerSection Posts">
												<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "FeaturedImage")); ?>
												<div class="Core">
													<h2><?php the_title(); ?></h2>
													<span class="button">
														<?php
														foreach((get_the_category()) as $category):
															echo $category->cat_name . ' ';
														endforeach;
														?>
													</span>
												</div>
											</a>
										</div>
										<?php 
									endwhile;
									?>
								</div>
								<div class="clearfix"></div>
								<div class="OlderPosts">
									<?php 
									$the_query = new WP_Query( 'showposts=5' ); 
									while ($the_query -> have_posts()) : $the_query -> the_post(); 
										?>
										<div class="ThePost col-sm-4">
											<a href="<?php the_permalink(); ?>" class="Posts">
												<div class="Core">
													<h4><?php the_title(); ?></h4>
													<span class="button">
														<?php
														foreach((get_the_category()) as $category):
															echo $category->cat_name . ' ';
														endforeach;
														?>
													</span>
												</div>
											</a>
										</div>
										<?php 
									endwhile;
									?>
								</div>
								<div class="clearfix"></div>
							</div>
							<hr class="LongHR"/>
						</div>
						<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
							<?php 
								$the_query = new WP_Query( 'page_id=209' ); 
								while ($the_query -> have_posts()) : $the_query -> the_post();
									the_content(); 
								endwhile;
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- #BlogBlock End -->
			<?php 
		endif;  
	endif;
endif;
if(is_single()):
	?>
	<div class="ContentBlock container">
		<div class="col-md-8">
			<?php if (have_posts()) :
			while (have_posts()) : the_post(); 
				global $post;
				$author_id = $post->post_author;
					?>
					<h1><?php the_title(); ?></h1>
					<div class="grid-share-post">
						<div class="author">
							<?php 
							$codLang = ICL_LANGUAGE_CODE;
							switch ($codLang) {
	                            case 'pt-br':
	                                _e("Escrito em ", "BTMT");
	                                the_time('jS F Y');
	                                _e(" por ", "BTMT");
	                                the_author();
	                                break;
	                            case 'fr':
									_e("Écrit sur ", "BTMT");
	                                the_time('jS F Y');
	                                _e(" par ", "BTMT");
	                                the_author();
								break;
	                            default:
	                                _e("Written on ", "BTMT");
	                                the_time('jS F Y');
	                                _e(" by ", "BTMT");
	                                the_author();
                                break;
	                        }
	                    	?>
						</div>
					</div>
					<hr/>
					<?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
					<br />
					<?php
					switch ($codLang) {
                        case 'pt-br':
                            the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
							wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); 
                            break;
                        case 'fr':
							the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
							wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); 
						break;
                        default:
                            the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
							wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); 
                        break;
                   	}

					
				endwhile;
			endif; ?>
			<div class="share">
				<ul>
					<li class=label>
						<?php 
							$codLang = ICL_LANGUAGE_CODE;
							switch ($codLang) {
	                            case 'pt-br':
	                                echo 'Compartilhar:';
	                                break;
	                            case 'fr':
									echo 'Partagez ceci:'; 
								break;
	                            default:
	                                echo 'Share:';
	                                break;
	                        }
	                    ?>
					</li>
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Facebook">
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

		<div class="col-md-4">
			<h3><?php _e("Recent Articles", "BTMT"); ?></h3>
			<hr/>
			<ul class="RecentArticleLinks">
				<?php 
				$the_query = new WP_Query( 'showposts=8' ); 
				while ($the_query -> have_posts()) : $the_query -> the_post(); 
					?>
					<li>
						<a class="truncate" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</li>
					<?php 
				endwhile;
				?>
				<div class="share hidden-xs">
					<ul>
						<li class=label>
							Share:
						</li>
						<li>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Facebook">
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
			</ul>
		</div>
	</div>
	<?php 
endif;
get_footer(); ?>