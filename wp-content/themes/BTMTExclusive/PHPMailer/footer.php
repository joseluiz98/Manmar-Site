	    <footer>
			<section id="instagram">
				<div class="row">
				    <div class="col-lg-3 col-md-3 col-sm-6" style="padding:0;">
				        <div class="project add-animation animation-1 animate instagram-photo">
				            <a target="_blank" class="img-class" href="">
				                <img src="" class="img-responsive">
				            </a>
				        </div>
				    </div>
				    <div class="col-lg-3 col-md-3 col-sm-6" style="padding:0;">
				        <div class="project add-animation animation-1 animate instagram-photo">
				            <a target="_blank" class="img-class" href="">
				                <img src="" class="img-responsive" alt="" title="">
				            </a>
				        </div>
				    </div>
				    <div class="col-lg-3 col-md-3 col-sm-6" style="padding:0;">
				        <div class="project add-animation animation-1 animate instagram-photo">
				            <a target="_blank" class="img-class" href="">
				                <img src="" class="img-responsive">
				            </a>
				        </div>
				    </div>
					<div class="col-lg-3 col-md-3 col-sm-6" style="padding:0;">
				        <div class="project add-animation animation-1 animate instagram-photo">
				            <a target="_blank" class="img-class" href="">
				                <img src="" class="img-responsive">
				            </a>
				        </div>
				    </div>
				</div>
			</section>
	    	<div class="row footer-top">
	        	<div class="container">
	        		<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 text-center info-footer">
	        			<p>Cadastre-se</br> para receber </br>nossos e-mails.</p>
	        		</div>
	        	</div>
	        </div>
	        <div class="row signature"></div>
	       	<div class="row footer-middle">
	        	<div class="container">
					<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 text-center">
						<form id="formContatoNews">
							<div class="form-group">
								<label class="sr-only" for="nome">Nome</label>

								<span id="fc_name">
									<!-- <div class="col-lg-12" style="padding:0;"> -->
										<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nome">
									<!-- </div> -->
									<span class="textfieldRequiredMsg">Campo Obrigátorio !</span>
								</span>

							</div>
							<div class="form-group">

								<span id="fc_email">
								
								<label class="sr-only" for="e-mail">E-mail</label>
									<div class="col-md-9 col-sm-9 col-xs-9" style="padding:0;">
										<input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="E-mail">
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2" style="padding:0;">
										<input type="button" id="sendContato" class="btn btn-small" value="Enviar">	
									</div>
									<div class="col-md-12">
										<span class="textfieldRequiredMsg">Campo Obrigátorio !</span>
									</div>
								</span>

							</div>			
							
							<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/loading.gif" class="loading">
						    
						    <br/>
						    
						    <p id="retornoHTMLnews"></p>

						    <nav class="iconsMedia">
					          	<ul class="nav navbar-nav">
						            <li><a href="https://www.facebook.com/RodrigoPachecoBH" target="_blank" alt="Facebbok" title="Facebbok"><span class='rp-facebook'></span></a></li>
				                    <li><a href="https://www.instagram.com/rodrigopachecobh/" target="_blank" alt="Instagram" title="Instagram"><span class='rp-instagram'></span></a></li>
				                    <li><a href="https://twitter.com/rodrigo15bh" target="_blank" alt="Twitter" title="Twitter"><span class='rp-twitter'></span></a></li>
				                    <li><a href="https://www.youtube.com/channel/UC8z2NYOucY0W3Fxk_oT2P8Q" target="_blank" alt="Youtube" title="Youtube"><span class='rp-youtube'></span></a></li>
					          	</ul>
					        </nav>
						</form>
					</div>
				</div>
			</div>
			<div class="row footer-bottom">
				<div class="col-md-4 col-md-offset-4  col-sm-4 col-sm-offset-4 text-center">
					<div class="col-md-6">
						<a href="<?php bloginfo('url'); ?>" alt="Rodrigo 15" title="Rodrigo 15">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/logo.jpg" alt="Rodrigo 15" title="Rodrigo 15">
						</a>
					</div>
					<div class="col-md-6">
						<a href="http://pmdbmg.org.br/" target="_blank" alt="PMDB/MG" title="PMDB/MG">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/logoPmdb.jpg" id="partido" alt="PMDB/MG" title="PMDB/MG">
						</a>
					</div>
				</div>
			</div>
			<div id="toTop" style="display: none;"><img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/arrow-up.svg" alt="Voltar ao topo" title="Voltar ao topo"></div>
	    </footer>
    	<?php
			//Register the script
		    wp_register_script( 'jqueryjs', get_template_directory_uri().'/dist/js/jquery.min.js' );    
		    wp_register_script( 'bootstrapjs', get_template_directory_uri().'/dist/js/bootstrap.min.js' );
		    wp_register_script( 'SpryValidationTextarea', get_template_directory_uri().'/dist/js/SpryValidationTextarea.js' );    
		    wp_register_script( 'SpryValidationTextField', get_template_directory_uri().'/dist/js/SpryValidationTextField.js' );
		    wp_register_script( 'SpryValidationSelect', get_template_directory_uri().'/dist/js/SpryValidationSelect.js' ); 
		    wp_register_script( 'styleswitcher', get_template_directory_uri().'/dist/js/styleswitcher.js' );
		    wp_register_script( 'maskedinput', get_template_directory_uri().'/dist/js/maskedinput.min.js' );
		    wp_register_script( 'mainjs', get_template_directory_uri().'/dist/js/all.min.js' );    

		    //Enqueued script with localized data.
		    wp_enqueue_script( 'jqueryjs' );
		    wp_enqueue_script( 'bootstrapjs' );
		    wp_enqueue_script( 'SpryValidationTextarea' );
		    wp_enqueue_script( 'SpryValidationTextField' );
		    wp_enqueue_script( 'SpryValidationSelect' );
		    wp_enqueue_script( 'styleswitcher' );
		    wp_enqueue_script( 'maskedinput' );
		    wp_enqueue_script( 'mainjs' );

  		    //Localize the script with new data
		    wp_localize_script( 'mainjs', 'WPURLS', array( 
		        'themeUrl' => get_template_directory_uri(), 
		        'siteurl' => get_option('siteurl')  
		        ) 
		    );

		    wp_footer(); 

		?>
		<script type="text/javascript">
	        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	    </script>

        <script>
        	$(document).ready(function(){
                $.ajax({
                url: "https://api.instagram.com/v1/users/search?q=rodrigopachecobh&access_token=1336945876.4e4c777.d8f5e09a159f4ce491d7d882be457809",
                dataType: "jsonp",
                success: function (p_UserData) {
                    if(p_UserData.data.length > 0)
                    {
                        $.ajax({
                            url: "https://api.instagram.com/v1/users/" + p_UserData.data[0].id + "/media/recent?count=12&access_token=1336945876.4e4c777.d8f5e09a159f4ce491d7d882be457809",
                            dataType: "jsonp",
                            success: function (data) {
                                var c_Index = 1;
                                data.data.forEach(function(c_Photo, c_Index){
                                    //c_Photo.images.standard_resolution.url;
                                    //c_Photo.caption.text;
                                    //c_Photo.id;
                                    //c_Photo.link;
                                    $('.instagram-photo').eq(c_Index).find('a').attr('alt',c_Photo.caption.text);
                                    $('.instagram-photo').eq(c_Index).find('a').attr('title',c_Photo.caption.text);
                                    $('.instagram-photo').eq(c_Index).find('a').attr('href',c_Photo.link);
                                    $('.instagram-photo').eq(c_Index).find('img').attr('src',c_Photo.images.standard_resolution.url);
                                });
                            }
                        });
                    }
                }
            });
        });
    	</script>
    </body>
</html>
