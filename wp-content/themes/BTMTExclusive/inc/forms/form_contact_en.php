<form id="formContato">
	<div class="form-group col-md-6">
		<span id="fc_name_contact">
			<label class="sr-only" for="txtNameContact">Name</label>
			<input type="text" class="form-control" id="txtNameContact" name="txtNameContact" placeholder="Name *">
			<span class="textfieldRequiredMsg">Required field!</span>
		</span>
	</div>
	<div class="form-group col-md-6">
		<span id="fc_email_contact">
			<label class="sr-only" for="txtEmailContact">E-mail</label>
			<input type="email" class="form-control" id="txtEmailContact" name="txtEmailContact" placeholder="E-mail *">
			<span class="textfieldRequiredMsg">Required field!</span>
		</span>
	</div>
	<div class="form-group col-md-6">
		<span id="fc_subject_contact">
			<label class="sr-only" for="txtSubjectContact">Subject</label>
			<input type="text" class="form-control" id="txtSubjectContact" name="txtSubjectContact" placeholder="Subject *">
			<span class="textfieldRequiredMsg">Required field!</span>
		</span>
	</div>
	<div class="form-group col-md-6">
		<span id="fc_phone_contact">
			<label class="sr-only" for="txtPhoneContact">Phone</label>
			<input type="text" class="form-control" id="txtPhoneContact" name="txtPhoneContact" placeholder="Phone *">
			<span class="textfieldRequiredMsg">Required field!</span>
		</span>
	</div>
	<div class="form-group col-md-12">
		<span id="fc_message_contact">
			<label class="sr-only" for="txtMessageContact">Message</label>
			<textarea class="form-control" id="txtMessageContact" name="txtMessageContact" rows="6" placeholder="Enter your message here *"></textarea>
			<span class="textareaRequiredMsg">Required field!</span>
		</span>
	</div>

	<div class="form-group col-md-12">
		<input type="hidden" id="txtLanguage" name="txtLanguage" value="<?php echo $codLang; ?>">
		<input type="button" id="sendContato" class="btn btn-small" value="Send">	
	</div>
</form>