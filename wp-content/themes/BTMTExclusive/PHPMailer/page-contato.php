<?php get_header(); the_post();
/*
Template Name: Contato
*/

$title_highlight = get_field('frase_de_destaque',$post_id);
?>
<section id="internas">
	<div class="row">
		<div class="col-md-12">
			<div class="mask">
				<div class="imgEventGalerie">
					<img class="sgallerie" src="<?php echo get_template_directory_uri() ?>/dist/imgs/banner_pequeno.png" alt="">
				</div>
				<div class="mask-hover">
					<div class="col-md-6 col-md-offset-3 title-page">
						<p><?php the_title(); ?></p>
						<h1><?php echo $title_highlight; ?></h1>
					</div>
					<div class="col-md-4 col-md-offset-4 title-page">
						<nav class="iconsMedia">
				          	<ul class="nav navbar-nav">
					            <li><a id="a_menos" class="diminuir" href="#"><span class="rp-minus"></span></a></li>
                                <li><a id="a_mais" class="aumentar" href="#"><span class="rp-plus"></span></a></li>
                                <li><a id="contraste" href="#" onclick="setActiveStyleSheet('normal'); return false;"><span class="rp-contrast"></span></a></li>
                                <li><a id="contrasteOne" href="#" onclick="setActiveStyleSheet('contraste'); return false;"class=""style="display:none;"><span class="rp-contrast"></span></a></li>
				          	</ul>
				        </nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="contato">
	<div class="row">
		<div class="container">
			<div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3 text-center description">
				<p><?php the_content(); ?></p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container">
			<div class="col-md-8 col-md-offset-2  col-sm-8 col-sm-offset-2 text-center">
				<form id="formContato">
					<div class="form-group">
						<label class="sr-only" for="txtName">Nome</label>
						<span id="fc_name">
							<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nome">
							<span class="textfieldRequiredMsg">Campo Obrigátorio !</span>
						</span>
					</div>
					<div class="form-group">
						<span id="fc_email">
						<label class="sr-only" for="txtEmail">E-mail</label>
							<input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="E-mail">
							<span class="textfieldRequiredMsg">Campo Obrigátorio !</span>
						</span>
					</div>
					<div class="form-group">
						<span id="fc_subject">
							<select name="txtSubject" id="subject">
								<option value="">Fale com:</option>
								<option value="Geral">Geral</option>
								<option value="Imprensa">Imprensa</option>
								<option value="Material de Campanha">Material de Campanha</option>
								<option value="Trabalhe Conosco">Trabalhe Conosco</option>
							</select>
							<span class="selectRequiredMsg">Campo Obrigátorio !</span>
						<span>
					</div>
					<div class="form-group">
						<span id="fc_message">
							<label class="sr-only" for="txtMessage">Mensagem</label>
							<textarea class="form-control" id="txtMessage" name="txtMessage" rows="6" placeholder="Digite aqui a sua mensagem"></textarea>
							<span class="textareaRequiredMsg">Campo Obrigátorio !</span>
						</span>
					</div>							
					<input type="button" id="sendContato" class="btn btn-small" value="Enviar">	
					
					<div class="form-group">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/loading.gif" class="loading">
					</div>
				    
				    <br/>
				    
				    <p class="bg-success" id="retornoHTML"></p>
				</form>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>