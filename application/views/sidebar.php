<div class="col-sm-3 col-md-4 col-lg-3 hidden-xs sidebar">

<?php if($this->uri->segment(1)=="user"){ ?>
	<h4><?php echo $this->session->userdata('name'); ?></h4>
	<ul class="nav nav-sidebar">
        <li class="active"><a href="<?php echo base_url(); ?>user/"><span class="glyphicon glyphicon-home"></span> Control Panel <span class="sr-only">(current)</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages <span class="badge">42</span></a></li>
        <li><a href="<?php echo base_url(); ?>user/"><span class="glyphicon glyphicon-briefcase"></span> Your Businesses <span class="badge">2</span></a></li>
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

<?php if($this->uri->segment(1)=="p"){ ?>
	<h4>Do Business</h4>
	<ul class="nav nav-sidebar">     
        <li><a href="#"><span class="glyphicon glyphicon-transfer"></span> See Services</a></li>
    </ul>
<?php } ?>


	<h4>Find a business</h4>
	<?php echo form_open('search'); 
	if(!isset($query)){ $query = ""; } ?>
		<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Search</label>
	    <?php
		    $data = array(
              'name'        => 'search',
              'id'          => 'search',
              'value'       => $query,
              'maxlength'   => '100',
              'class'       => 'form-control',
              'required'	=> 'required',
              'placeholder' => 'Search'
            );

			echo form_input($data);
		?>
		</div>
	</form>


</div>