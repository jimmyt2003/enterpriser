<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
<h1>Login</h1>
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
    	<?php echo form_open('login/check_user'); ?>
    		<div class="col-lg-4 col-xs-10 col-sm-8 col-lg-offset-4 col-sm-offset-2 col-xs-offset-1">
				<div class="form-group">
					<label for="exampleInputEmail1">Email Address</label>
				    <?php
					    $data = array(
			              'name'        => 'email',
			              'id'          => 'email',
			              'value'       => set_value('email'),
			              'maxlength'   => '100',
			              'class'        => 'form-control',
			              'required'	=> 'required',
			              'placeholder' => 'Email'
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

				<button type="submit" class="btn btn-default">Login</button>
				</form>
			</div>
	</div>

</div>