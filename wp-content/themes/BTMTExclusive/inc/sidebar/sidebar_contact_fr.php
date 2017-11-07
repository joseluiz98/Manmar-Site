<?php  

//French
//$field_address = "field_59b29d7b5299c";
$address = get_field('adresse');  

//$field_phone = "field_59b29d9e25573";
$phone = get_field('appelez-nous');  

//$field_email = "field_59b29db225574";
$email = get_field('envoyez-nous_un_email');  

?>

<h3>La Adresse</h3>
<p><?php echo $address; ?></p>

<h3>Appelez-Nous</h3>
<p><?php echo $phone; ?></p>

<h3>Email</h3>
<p><?php echo $email; ?></p>

<hr class="divider">

<a href="<?php bloginfo('url'); ?>/branches" class="LocateUs">
	<?php echo get_field('texto_link_(fr)'); ?>  
	<i class="fa fa-search" aria-hidden="true"></i>
</a>