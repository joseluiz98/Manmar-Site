	<!-- Footer Start -->
	<footer>
		<div class="Contents">
			<div class="TopSection">
				<div class="ContentBlock container">
					<div class="col-xs-12">
						<div class="SubscribeBlockContainer col-md-6 col-xs-12">
							<?php $the_query = new WP_Query( 'page_id=416' ); ?>
							<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
							<input id="SubscriberEmail" name="SubscriberEmail" type="email" value="" placeholder="<?php the_title(); ?>" required="" class="EmailSubscription" />
							<?php the_content(); ?>
							<?php endwhile;?>
							<a class="SubscribeButton" href="#">
								<!-- <img id="gray" alt="Subscribe" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/Subscribe.png" /> -->
								<i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
							</a>
						</div>
						<div class="SocialBlockContainer col-md-6 col-xs-12">
							<div class="SocialBlock center-block">
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
								<a href="https://api.whatsapp.com/send?phone=32489744460&text=<?php echo $message; ?> "
									class="SocialIcon WhatsApp OneSecDelay OneSecDuration" 
									animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" 
									alt="WhatsApp" 
									title="WhatsApp"
									target="_blank">

								<!-- <a href="#" class="SocialIcon WhatsApp OneSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" alt="WhatsApp" title="WhatsApp"> -->
									<i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
								</a>

								<a href="http://facebook.com/btmt.be" class="SocialIcon Facebook HalfAndQuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" alt="Facebook" title="Facebook">
									<i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
								</a>

								<a href="http://instagram.com/btmt_be" class="SocialIcon Twitter HalfSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" alt="Twitter" title="Twitter">
									<i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
								</a>

								<a href="https://www.linkedin.com/company/4818297" class="SocialIcon LinkedIn QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" alt="LinkedIn" title="LinkedIn">
									<i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
								</a>

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
									<img alt="Logo" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/Logo.png" class="Logo img-responsive QuarterSecDelay OneSecDuration" animation="if: load, on: window, do: bounceIn animated; if: scroll, on: window, do: bounceIn animated, before: scrollReveal" />
								</a>
								<p>
									<!-- The multibrand leader in money tranfers.
									<br />One store, various brands.
 -->
									<?php 
								$codLang = ICL_LANGUAGE_CODE;
								switch ($codLang) {
		                            case 'pt-br':
		                                echo "O líder multi-marca na transferência de dinheiro. <br /> Uma loja, várias marcas.";
		                                break;
		                            case 'fr':
										echo "Le leader multi-marques dans le transfert d'argent. <br/> Un magasin, différentes marques."; 
									break;
		                            default:
		                                echo "The multibrand leader in money tranfers. <br />One store, various brands.";
		                                break;
		                        }
								?>
								</p>
							</div>
						</div>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<div class="SiteNavigationSection col-md-8 col-sm-6 col-xs-12">
								<h3>Website</h3>
								<hr class="LongHR" />
								<div class="NavigationLinks">
									<ul class="col-md-4 col-xs-12">
										<!-- <li>
											<a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=842' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>												
											</a>
										</li> -->
										<li>
											<a href="#AboutBlock"><?php $the_query = new WP_Query( 'page_id=847' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>
											</a>
										</li>												
										<li>
											<a href="#branches" class="loginlink">
												<?php $the_query = new WP_Query( 'page_id=406' ); ?>
												<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
													<?php the_content(); ?>
												<?php endwhile;?>
											</a>
										</li>
										<li>
											<a href="#FAQs" data-toggle="modal" id="faqBottonMenu">
												<?php 
												// $the_query = new WP_Query('page_id=854'); 
												// while ($the_query -> have_posts()) : $the_query -> the_post(); 
												// 	the_content();
												// endwhile;
												?>
											FAQs
											</a>
										</li>
										<li>
											<a href="#ContactUsBlock"><?php $the_query = new WP_Query( 'page_id=859' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>
											</a>
										</li>
									</ul>
									<div class="col-md-8 col-xs-12">
										<div style="width: 100%;" class="row">
				                            <div class="fb-page" data-href="https://www.facebook.com/btmt.be/" data-tabs="timeline" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/btmt.be/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/btmt.be/">BT Money Transfers</a></blockquote></div>
				                        </div>
									</div>
									<!-- <ul class="col-md-7 col-xs-7 PopUp">
										<li>
											<a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=864' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>
											</a>
										</li>
										<li>
											<a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=869' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>
											</a>
										</li>												
										<li>
											<a href="#SendMoney" class="loginlink">
												<?php $the_query = new WP_Query( 'page_id=875' ); ?>
												<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
													<?php the_content(); ?>
												<?php endwhile;?>
											</a>
										</li>
										<li>
											<a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=881' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>
											</a>
										</li>
										<li>
											<a href="#SendMoney"><?php $the_query = new WP_Query( 'page_id=886' ); ?>
											<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
												<?php the_content(); ?>
											<?php endwhile;?>
											</a>
										</li>
									</ul> -->
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="BlogSection col-md-4 col-sm-6 col-xs-12">
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

						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/EmailEnvelope.png" alt="Subscribe" />

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

	<!-- Contact Thanks Modal Start -->
	<div id="ContactThanks" class="modal fade">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-body text-center">

					<button type="button" class="hidden ThanksClose close" data-dismiss="modal" aria-hidden="true">×</button>

					<img alt="ThanksIcon" src="<?php echo get_template_directory_uri(); ?>/Assets/Images/Checkmark.gif" class="ThanksIcon img-responsive" />

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

	<!-- Legal Modal Start -->
	<div id="Legal" class="modal fade">
		<div class="modal-dialog EightyPercentWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<?php $the_query = new WP_Query( 'page_id=141' ); ?>
					<?php while ($the_query -> have_posts()) :
					$the_query -> the_post(); ?>
					<h4 class="modal-projectTitle"><?php the_title(); ?></h4>
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
					<h4 class="modal-projectTitle"><?php the_title(); ?></h4>
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
					<h4 class="modal-projectTitle"><?php the_title(); ?></h4>
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
					<h4 class="modal-projectTitle"><?php the_title(); ?></h4>
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
		if(ICL_LANGUAGE_CODE=='en'):
			?>
			<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

											<option value="GN">Guinea</option>
										</optgroup>
									</select>
								</div>
								<div class="modal-footer">
									<div>
										<button type="submit" class="btn btn-lg btn-block" style="border-radius: 5px; background-color:#aad934; border-color: 0px">Sign</button>
									</div>
								</div>
							</form>
							<!-- End # Login Form -->
						</div>
						<!-- End # DIV Form -->
					</div>
				</div>
			</div>
			<?php 
		else: 
			?>
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

											<option value="GN">Guinea</option>
										</optgroup>
									</select>
								</div>
								<div class="modal-footer">
									<div>
										<button type="submit" class="btn btn-lg btn-block" style="border-radius: 5px; background-color: #aad934; border-color: 0px">Assinar</button>
									</div>
								</div>
							</form>
						</div>
						<!-- End # DIV Form -->
					</div>
				</div>
			</div>
			<?php 
		endif; 
	?>
	<!-- jQuery -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/jQuery/jquery-2.2.4.min.js"></script> 
	<!-- Framework -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Framework/Bootstrap/js/bootstrap.min.js"></script>
	<!-- jPushMenu -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/jPushMenu/js/jPushMenu.js"></script>
	<!-- smoothScroll -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/SmoothScroll/SmoothScroll.min.js"></script>
	<!-- FAQs Slider -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/FAQsSlider/js/script.js"></script>
	<!-- Swiper -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/Swiper/dist/js/swiper.min.js"></script>
	<!-- Search -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/ExpandingSearchBar/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/ExpandingSearchBar/js/classie.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/ExpandingSearchBar/js/uisearch.js"></script>
	<!-- AniJs -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/AniJs/dist/anijs-min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/AniJs/dist/helpers/scrollreveal/anijs-helper-scrollreveal-min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/AniJs/dist/event_systems/jquery/anijs-jquery-event-system-min.js"></script>
	<!-- Validator -->
	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/EasyPaginate/demo/js/jquery.snippet.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/EasyPaginate/lib/jquery.easyPaginate.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/Assets/Js/EasyPaginate/demo/js/scripts.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
	<?php 
	//Register the script
	wp_register_script( 'owlcarousel', get_template_directory_uri().'/Assets/Js/owl.carousel.min.js' );    
	wp_register_script( 'SpryValidationTextarea', get_template_directory_uri().'/Assets/Js/SpryValidationTextarea.js' );    
    wp_register_script( 'SpryValidationTextField', get_template_directory_uri().'/Assets/Js/SpryValidationTextField.js' );
    wp_register_script( 'SpryValidationSelect', get_template_directory_uri().'/Assets/Js/SpryValidationSelect.js' ); 
	wp_register_script( 'customjs', get_template_directory_uri().'/Assets/Js/custom.js' );  
	//Enqueued script with localized data.
	wp_enqueue_script( 'owlcarousel' );
	wp_enqueue_script( 'SpryValidationTextarea' );
    wp_enqueue_script( 'SpryValidationTextField' );
    wp_enqueue_script( 'SpryValidationSelect' );
	wp_enqueue_script( 'customjs' );
	//Localize the script with new data
    wp_localize_script( 'customjs', 'WPURLS', array('themeUrl' => get_template_directory_uri(),'siteurl' => get_option('siteurl')));
    wp_footer();
	?>
	<div id="fb-root"></div>
    <div id="fb-root"></div>
     <!--Start of Facebook Script-->
    <?php 
	$codLang = ICL_LANGUAGE_CODE;
	switch ($codLang) {
        case 'pt-br':
            echo '<script>
		        (function(d, s, id) {
		          var js, fjs = d.getElementsByTagName(s)[0];
		          if (d.getElementById(id)) return;
		          js = d.createElement(s); js.id = id;
		          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=1616897215216043";
		          fjs.parentNode.insertBefore(js, fjs);
		        }(document, "script", "facebook-jssdk"));
		    </script>';
        break;
        case 'fr':
            echo' <script>
		        (function(d, s, id) {
		          var js, fjs = d.getElementsByTagName(s)[0];
		          if (d.getElementById(id)) return;
		          js = d.createElement(s); js.id = id;
		          js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10&appId=1616897215216043";
		          fjs.parentNode.insertBefore(js, fjs);
		        }(document, "script", "facebook-jssdk"));
		    </script>';
		break;
        default:
            echo '<script>
		        (function(d, s, id) {
		          var js, fjs = d.getElementsByTagName(s)[0];
		          if (d.getElementById(id)) return;
		          js = d.createElement(s); js.id = id;
		          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1616897215216043";
		          fjs.parentNode.insertBefore(js, fjs);
		        }(document, "script", "facebook-jssdk"));
		    </script>';
        break;
    }
	?>
	<script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		function initMap() {
	        var objLat = $("#map").attr('data-lat');
	        var objLng = $("#map").attr('data-long');
	        var directionsService = new google.maps.DirectionsService;
	        var directionsDisplay = new google.maps.DirectionsRenderer;
	        var myLatlng = new google.maps.LatLng(parseFloat(objLat), parseFloat(objLng));
	        var mapOptions = {
	            zoom: 16,
	            center: myLatlng,
	            navigationControl: false,
	            scrollwheel: false,
	            streetViewControl: false,
	            panControl : false,
	            //zoomControl : false,
	            mapTypeControl: false,
	            mapTypeControlOptions: {
	                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
	            }
	        };
	        var contentString = $("#map").attr('data-title');
	        var infowindow = new google.maps.InfoWindow({
	            content: contentString,
	            maxWidth: 700
	        });
	        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	        google.maps.event.addDomListener(window, "resize", function() {
	            var center = map.getCenter();
	            google.maps.event.trigger(map, "resize");
	            map.setCenter(center); 
	        });
	        //var image = '<?php echo get_template_directory_uri(); ?>/Assets/Images/MapPin.png';
	        var marcadorPersonalizado = new google.maps.Marker({
	            position: myLatlng,
	            map: map,
	            //icon: image,
	            animation: google.maps.Animation.DROP
	        });      
	        google.maps.event.addListener(marcadorPersonalizado, 'click', function() {
	            infowindow.open(map,marcadorPersonalizado);
	        });
	        directionsDisplay.setMap(map);
	        directionsDisplay.setPanel(document.getElementById("directionsPanel"));
	        document.getElementById('map').style.width ="100%";
	        document.getElementById('submit').addEventListener('click', function() {
	        	marcadorPersonalizado.setMap(null);
	          	calculateAndDisplayRoute(directionsService, directionsDisplay);
	        });
	    }
	    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	        var start = document.getElementById("start").value;
	        var end = document.getElementById("end").value;
	        var request = {
	            origin:start, 
	            destination:end,
	            travelMode: google.maps.DirectionsTravelMode.DRIVING
	        };
	        directionsService.route(request, function(response, status) {
	          if (status == google.maps.DirectionsStatus.OK) {
	            directionsDisplay.setDirections(response);
				document.getElementById('direcao').style.display ="block";
				// document.getElementById('map').style.width ="70%";
				// document.getElementById('direcao').style.width ="30%";
				document.getElementById("start").value = "";


				var onsize = function() {

        		var viewport = $(window).width();

	        		if(viewport < 768) {
						document.getElementById('map').style.width ="100%";
						document.getElementById('direcao').style.width ="100%";
					}else{
						document.getElementById('map').style.width ="70%";
						document.getElementById('direcao').style.width ="30%";
					}
				}

				$(window).resize(onsize);
    			onsize();

	          } else {
	            alert(status);
	            initMap();
	            document.getElementById('direcao').style.display ="none";
				document.getElementById('map').style.width ="100%";
	            document.getElementById("start").value = "";
	            document.getElementById("start").focus();
	          }
	          document.getElementById('mapview').style.visibility = 'visible';
	        });
	    }
	    function loadScriptIntern() {
		    var script = document.createElement("script");
		    script.type = "text/javascript";
		    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDeHb17So0QupSGO_d6b8X-OyvJ32UQehs&callback=initMap";
		    document.body.appendChild(script);
		}
		window.onload = loadScriptIntern;
    </script>
	</body>
</html>