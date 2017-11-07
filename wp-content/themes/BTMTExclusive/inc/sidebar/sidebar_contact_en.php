<?php  

//English
// $field_address = "field_59b29d7b5299c";
// $address = get_field_object($field_address);  

// $field_phone = "field_59b29d9e25573";
// $phone = get_field_object($field_phone);  

// $field_email = "field_59b29db225574";
// $email = get_field_object($field_email);  


$field_email = "field_59c8f7f6c1b24";
$email = get_field_object($field_email);  

$field_phone = "field_59c8f808c1b25";
$phone = get_field_object($field_phone);  

$field_address = "field_59c8f80fc1b26";
$address = get_field_object($field_address);  

?>

<h3>Address</h3>
<p><?php echo $address['value']; ?></p>

<h3>Call Us</h3>
<p><?php echo $phone['value']; ?></p>

<h3>Email</h3>
<p><?php echo $email['value']; ?></p>

<hr class="divider">

<a href="<?php bloginfo('url'); ?>/branches" class="LocateUs">
	<?php echo get_field('texto_link'); ?>  
	<i class="fa fa-search" aria-hidden="true"></i>
</a>