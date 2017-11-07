<form action="<?php bloginfo('url'); ?>/sendContact.php" method="post" class="wpcf7-form">
	<div class="col-xs-12 col-md-6">

    	<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name *">
	</div>
	<div class="col-xs-12 col-md-6">

    	<input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail *">
	</div>
	<div class="col-xs-12 col-md-6">

    	<input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Subject">
	</div>
	<div class="col-xs-12 col-md-6">

    	<input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Phone">
	</div>
	<div class="col-xs-12 col-md-12">
    	<textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea>
	</div>
	<div class="col-xs-12 col-md-12">
	<input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit">
	</div>
</form>