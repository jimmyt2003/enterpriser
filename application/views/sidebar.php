<div class="col-sm-3 col-md-4 col-lg-3 hidden-xs sidebar">
<?php if($this->uri->segment(1)=="login"){ ?>
	<h4>Privacy</h4>
	<p>We take privacy seriously and will never pass on your details to any 3rd party</p>
<?php } ?>

<?php if($this->uri->segment(2)=="update_profilepic"){ ?>
	<h4>Image Upload</h4>
	<p>Please upload your profile picture. Images must be jpg, png or gif format.</p>
<?php } ?>

</div>