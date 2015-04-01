<div class="col-sm-3 col-md-4 col-lg-3 hidden-xs sidebar">

<?php if($this->uri->segment(1)=="user"){ ?>
	<h4><?php echo $this->session->userdata('name'); ?></h4>
	<ul class="nav nav-sidebar">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Control Panel <span class="sr-only">(current)</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages <span class="badge">42</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Your Businesses <span class="badge">2</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-transfer"></span> Services</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-print"></span> Office Space</a></li>
    </ul>
	<br>
<?php } ?>

<?php if($this->uri->segment(2)=="thankyou"){ ?>
	<h4>Check Your Spam</h4>
	<p>If you do not receive your validation email within a few minutes, please check your spam folder.</p>
	<br>
<?php } ?>

<?php if($this->uri->segment(1)=="login"){ ?>
	<h4>Privacy</h4>
	<p>We take privacy seriously and will never pass on your details to any 3rd party</p>
<?php } ?>

<?php if($this->uri->segment(2)=="update_profilepic"){ ?>
	<h4>Image Upload</h4>
	<p>Please upload your profile picture. Images must be jpg, png or gif format.</p>
<?php } ?>

</div>