<?php foreach($business_info as $business){ 
	$strippedurl = str_replace(' ', '_', $business['business_name']);
	$strippedurl = strtolower($strippedurl);
?>	
<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
<h1><?php echo $business['business_name']; ?> <small>Edit Business</small></h1>
<div class="well well-sm">
	<p><strong>Website Link:</strong> <a target="_blank" href="<?php echo base_url(); ?>b/<?php echo $strippedurl; ?>"><?php echo base_url(); ?>b/<?php echo $strippedurl; ?></a></p>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-10 col-md-offset-1">
<?php echo validation_errors(); ?>
	</div>
</div>

<hr>

	<div class="row text-left">
		<div class="col-lg-5 col-xs-10 col-sm-3 col-xs-offset-1 col-lg-offset-1 col-sm-offset-0 col-xs-offset-1">
			<div class="row">	
				<div class="col-xs-12">
					<h4>Theme Options</h4>
				</div>
				<hr>
				<div class="col-xs-12">
					<strong>Company Logo</strong>
				</div>
				<div class="col-xs-12">
					<img class="img-responsive" src="<?php echo base_url(); ?>uploads/logos/<?php if($business['logo']==""){ echo "noimg.jpg";}else{ echo $business['logo']; } ?>"/>
		    	</div>
		    	<div class="col-xs-12">
		    		<a href="<?php echo base_url(); ?>user/update_companylogo/<?php echo $business['business_id']; ?>" class="btn btn-primary btn-xs clear-fix profile-pic-btn"><span class="glyphicon glyphicon-picture"></span> Edit Logo</a>
	    		</div>
	    	</div>
	    	<hr>
	    	<div class="row">	
				<div class="col-xs-12">
					<strong>Header Image</strong>
				</div>
				<div class="col-xs-12">
					<img class="img-responsive" src="<?php echo base_url(); ?>uploads/covers/<?php if($business['coverphoto']==""){ echo "noimg.jpg";}else{ echo $business['coverphoto']; } ?>"/>
		    	</div>
		    	<div class="col-xs-12">
		    		<a href="<?php echo base_url(); ?>user/update_coverphoto/<?php echo $business['business_id']; ?>" class="btn btn-primary btn-xs clear-fix profile-pic-btn"><span class="glyphicon glyphicon-picture"></span> Edit Header</a>
	    		</div>
	    	</div>
	    
		</div>

    	<?php echo form_open('user/update_business/'.$business['business_id']); ?>
    		<div class="col-lg-6 col-lg-offset-0 col-xs-10 col-sm-7 form-border-left">
    			<h4>Company Details</h4>
				<div class="form-group">
					<label for="businessname">Business Name</label>
				    <?php
					    $data = array(
			              'name'        => 'businessname',
			              'id'          => 'businessname',
			              'value'       => 	$business['business_name'],
			              'maxlength'   => '40',
			              'class'       => 'form-control ',
			              'required'	=> 'required',
			              'placeholder' => 	$business['business_name'],
			              'disabled'	=>	'disabled'
			            );

						echo form_input($data);
					?>
				</div>

				<div class="form-group">
					<label for="category">Business Category</label>
					<select class="form-control" name="category">
						<?php foreach($cats as $cat_item){ ?>
							<option value="<?php echo $cat_item['cat_id'];?>" <?php if($cat_item['cat_id']==$business['cat_id']){echo "selected";} ?>><?php echo $cat_item['cat_name'];?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<label for="businessdesc">Business Description <small>(1000 Characters Max)</small></label>
				    <?php
					    $data = array(
			              'name'        => 'businessdesc',
			              'id'          => 'businessdesc',
			              'value'       => 	$business['description'],
			              'maxlength'   => '1000',
			              'class'        => 'form-control',
			              'required'	=> 'required',
			              'placeholder' => 'Business Name'
			            );

						echo form_textarea($data);
					?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Website URL</label>
				    <?php
					    $data = array(
			              'name'        => 'businessurl',
			              'id'          => 'businessurl',
			              'value'       => 	$business['website'],
			              'maxlength'   => '50',
			              'class'        => 'form-control',
			              'placeholder' => 'http://www.your-business.com'
			            );

						echo form_input($data);
					?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Business Email</label>
				    <?php
					    $data = array(
			              'name'        => 'businessemail',
			              'id'          => 'businessemail',
			              'value'       => 	$business['company_email'],
			              'maxlength'   => '40',
			              'class'        => 'form-control',
			              'type'	=> 'email',
			              'placeholder' => 'Business Name'
			            );

						echo form_input($data);
					?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Business Address <small>(1000 Characters Max)</small></label>
				    <?php
					    $data = array(
			              'name'        => 'businessaddress',
			              'id'          => 'businessaddress',
			              'value'       =>  $business['address'],
			              'maxlength'   => '250',
			              'class'        => 'form-control',
			              'rows'	=> '5',
			              'placeholder' => 'Business Address'
			            );

						echo form_textarea($data);
					?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Business Telephone</label>
				    <?php
					    $data = array(
			              'name'        => 'businesstel',
			              'id'          => 'businesstel',
			              'value'       => 	$business['tel'],
			              'maxlength'   => '40',
			              'class'        => 'form-control',
			              'required'	=> 'required',
			              'type'	=> 'tel',
			              'placeholder' => 'Telephone Number'
			            );

						echo form_input($data);
					?>
				</div>

				<h4>Profile Colours</h4>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="businessname">Links</label>
						    <?php
							    $data = array(
					              'name'        => 'linkcolor',
					              'id'          => 'linkcolor',
					              'value'       => 	$business['linkcolor'],
					              'maxlength'   => '7',
					              'class'       => 'form-control ',
					              'type'	=> 'color'
					            );

								echo form_input($data);
							?>
						</div>
					</div>
					<div class="col-md-4">	
						<div class="form-group">
							<label for="businessname">Background</label>
						    <?php
							    $data = array(
					              'name'        => 'bgcolor',
					              'id'          => 'bgcolor',
					              'value'       => 	$business['bgcolor'],
					              'maxlength'   => '7',
					              'class'       => 'form-control ',
					              'type'	=> 'color'
					            );

								echo form_input($data);
							?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="businessname">Header Text</label>
						    <?php
							    $data = array(
					              'name'        => 'headercolor',
					              'id'          => 'headercolor',
					              'value'       => 	$business['headercolor'],
					              'maxlength'   => '7',
					              'class'       => 'form-control ',
					              'type'	=> 'color'
					            );

								echo form_input($data);
							?>
						</div>
					</div>
				</div>

				<button type="submit" id="edit_business_btn" class="btn btn-default btn-success">Update</button></form> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete Business</button>
				<br>
			</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Business</h4>
      </div>
      <div class="modal-body">
        Are you sure you would like to delete <strong><?php echo $business['business_name']; ?></strong>? Please not this action can not be reversed!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        <a href="<?php echo base_url(); ?>user/delete_business/<?php echo $business['business_id']; ?>" class="btn btn-danger">Delete Business</a>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url(); ?>css/colorpicker.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/colorpicker.js"></script>

