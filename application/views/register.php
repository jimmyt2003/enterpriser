<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
<h1>Register</h1>
<div class="row">
	<div class="col-xs-12 col-sm-10 col-md-offset-1">
<?php echo validation_errors(); ?>
<?php if(!isset($loginerror)){$loginerror="no error";}?>
<?php if($loginerror=="wrong"){ ?>
	<div class="alert alert-danger" role="alert"><strong>Wrong Password:</strong> Please check your details</div>
<?php } ?>
	</div>
</div>

	<div class="row text-left">
    		<?php echo form_open('login/add_user'); ?>
    		<div class="col-lg-6 col-xs-10 col-sm-8 col-lg-offset-3 col-sm-offset-2 col-xs-offset-1">
	    		<div class="form-group">
	    				<div class="row">
			    			<div class="col-xs-6">
			    			<label for="exampleInputEmail1">First Name</label>
						    <?php
							    $data = array(
					              'name'        => 'firstname',
					              'id'          => 'firstname',
					              'value'       => set_value('firstname'),
					              'maxlength'   => '100',
					              'class'       => 'form-control',
					              'required'	=> 'required',
					              'placeholder' => 'First Name'
					            );

								echo form_input($data);
							?>
							</div>
							<div class="col-xs-6">
							<label for="exampleInputEmail1">Surname</label>
						    <?php
							    $data = array(
					              'name'        => 'surname',
					              'id'          => 'surname',
					              'value'       => set_value('surname'),
					              'maxlength'   => '100',
					              'class'        => 'form-control',
					              'required'	=> 'required',
					              'placeholder' => 'Surname'
					            );

								echo form_input($data);
							?>
							</div>
						</div>
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
				    <?php
					    $data = array(
			              'name'        => 'email',
			              'id'          => 'email',
			              'value'       => set_value('email'),
			              'maxlength'   => '100',
			              'class'        => 'form-control',
			              'required'	=> 'required',
			              'placeholder' => 'Email Address'
			            );

						echo form_input($data);
					?>
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <?php
					    $data = array(
			              'name'        => 'password',
			              'id'          => 'password',
			              'value'       => set_value('password'),
			              'type'   		=> 	'password',
			              'class'       => 'form-control',
			              'required'	=> 'required',
			              'placeholder' => 'Password'
			            );

						echo form_input($data);
					?>
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Confirm Password</label>
				    <?php
					    $data = array(
			              'name'        => 'passwordconfirm',
			              'id'          => 'passwordconfirm',
			              'value'       => set_value('passwordconfirm'),
			              'type'   		=> 	'password',
			              'class'       => 'form-control',
			              'required'	=> 'required',
			              'placeholder' => 'Confirm Password'
			            );

						echo form_input($data);
					?>
				</div>

				<button type="submit" class="btn btn-default">Register</button>
				</form>
				<p></p>
			</div>
	</div>

</div>