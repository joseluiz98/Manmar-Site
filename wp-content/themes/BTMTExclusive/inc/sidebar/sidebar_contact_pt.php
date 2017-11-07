<h3>Endereço</h3>
<p><?php echo get_field('endereco_pt','option'); ?></p>

<h3>Telefone</h3>
<p><?php echo get_field('telefone_pt','option'); ?></p>

<h3>E-mail</h3>
<p><?php echo get_field('email_pt','option'); ?></p>

<hr class="divider">

<a href="<?php bloginfo('url'); ?>/branches" class="LocateUs">
	<?php echo get_field('texto_link_pt','option'); ?>  
	<i class="fa fa-search" aria-hidden="true"></i>
</a>