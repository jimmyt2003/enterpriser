<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
<h1>Add Your Business</h1>
<div class="row">
	<div class="col-xs-12 col-sm-10 col-md-offset-1">
<?php echo validation_errors(); ?>
	</div>
</div>

	<div class="row text-left">
    	<?php echo form_open('user/insert_business'); ?>
    		<div class="col-lg-6 col-xs-10 col-sm-8 col-lg-offset-3 col-sm-offset-2 col-xs-offset-1">

				<div class="form-group">
					<label for="exampleInputEmail1">Business Name</label>
				    <?php
					    $data = array(
			              'name'        => 'businessname',
			              'id'          => 'businessname',
			              'value'       => set_value('businessname'),
			              'maxlength'   => '40',
			              'class'        => 'form-control',
			              'required'	=> 'required',
			              'placeholder' => 'Business Name'
			            );

						echo form_input($data);
					?>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Business Description <small>(1000 Characters Max)</small></label>
				    <?php
					    $data = array(
			              'name'        => 'businessdesc',
			              'id'          => 'businessdesc',
			              'value'       => set_value('businessdesc'),
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
			              'value'       => set_value('businessurl'),
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
			              'value'       => set_value('businessemail'),
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
			              'value'       => set_value('businessaddress'),
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
			              'value'       => set_value('businesstel'),
			              'maxlength'   => '40',
			              'class'        => 'form-control',
			              'required'	=> 'required',
			              'type'	=> 'tel',
			              'placeholder' => 'Telephone Number'
			            );

						echo form_input($data);
					?>
				</div>

				<button type="submit" class="btn btn-default">Add Business</button>
				</form>
			</div>
	</div>

</div>