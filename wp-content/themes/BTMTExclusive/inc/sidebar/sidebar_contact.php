<?php  
$codLang = ICL_LANGUAGE_CODE;
switch ($codLang) {
	case 'pt-br':
		$stringTitleSection = 'ONDE VOCÊ PODE NOS ENCONTRAR';
		$stringAddress = 'Endereço';
		$stringPhone = 'Telefone';
		$stringEmail = 'E-mail';
		$stringLabel = 'Localização de nossas lojas';
	    $address = get_field('endereco_pt','option');
		$phone = get_field('telefone_pt','option');
		$email = get_field('email_pt','option');
	break;
	case 'fr':
		$stringTitleSection = 'OÙ PEUX-TU NOUS TROUVER';
		$stringAddress = 'Adresse';
		$stringPhone = 'Appelez-nous';
		$stringEmail = 'Email';
		$stringLabel = 'LOCALISER DES SUCCURSAUX SUR UNE CARTE';
		$address = get_field('endereco_fr','option');
		$phone = get_field('telefone_fr','option');
		$email = get_field('email_fr','option');

	break;
	default:
		$stringTitleSection = 'WHERE YOU CAN FIND US';
		$stringAddress = 'Address';
		$stringPhone = 'Call Us';
		$stringEmail = 'Email';
		$stringLabel = 'LOCATE BRANCHES ON A MAP';
	    $address = get_field('endereco','option');
		$phone = get_field('telefone','option');
		$email = get_field('email','option');

	break;
}
?>

<h3><?php echo $stringAddress; ?></h3>
<p><?php echo $address; ?></p>

<h3><?php echo $stringPhone; ?></h3>
<p><?php echo $phone; ?></p>

<h3><?php echo $stringEmail; ?></h3>
<p><?php echo $email; ?></p>

<hr class="divider">

<a href="<?php bloginfo('url'); ?>/branches" class="LocateUs">
	<?php echo $stringLabel; ?> 
</a>