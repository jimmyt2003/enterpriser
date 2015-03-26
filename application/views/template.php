

    <!-- Register -->
    <div class="jumbotron splash-register" style="background-image:url('<?php echo base_url(); ?>img/registersplashbg.jpg');">
    	<span class="close-btn glyphicon glyphicon-remove"></span>
    	<h2>Register <small>It's Free!</small></h2>
    	<div class="row text-left">
    		<?php echo form_open('login/add_user'); ?>
    		<div class="col-lg-4 col-xs-10 col-sm-8 col-lg-offset-4 col-sm-offset-2 col-xs-offset-1">
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

				<button type="submit" class="btn btn-default">Register</button> <a href="#" class="login-link">I Have An Account, Login</a>
				</form>
			</div>
		</div>
    </div>
    <div class="jumbotron splash-login" style="background-image:url('<?php echo base_url(); ?>img/loginsplashbg.jpg');">
    	<span class="close-btn glyphicon glyphicon-remove"></span>
    	<h1>Login</h1>
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

				<button type="submit" class="btn btn-default">Login</button> <a href="#" class="register-link">Not Signed Up? Register Here</a>
				</form>
			</div>
		</div>
    </div>
	<div class="jumbotron full-screen-splash" style="background-image:url('<?php echo base_url(); ?>img/splashbg.jpg');">
		<h1 class="strapline">swap services<br>
			trade office space<br>
			advertise your business</h1>
		<a href="#" class="btn btn-default btn-lg register-btn">Sign Up</a> <a href="#" class="btn btn-default btn-lg login-btn">Log In</a>
	</div>
	<div class="splash-info">
		<div class="container">
			<h2 class="text-center margin-top-bottom">How can enterpriser help small businesses</h2>
			<div class="row">
				<div class="col-md-6">
					<h3>Service Swapping</h4>
					<p class="lead">Save money by swapping your services with other companies</p>
					<p>One thing companies don't have when starting up is lots of money. Offer your services to other companies in exchange for products or services of similar value.</p>
				</div>
				<div class="col-md-6">
					<img src="http://placehold.it/500x250" class="img-responsive"/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Office Sharing</h4>
					<p class="lead">Working from home looks unprofessional</p>
					<p>Give a more professional image to your company by working from inside another companies office. Take advantage of their free desk space and facilities.</p>
				</div>
				<div class="col-md-6">
					<img src="http://placehold.it/500x250" class="img-responsive"/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Company Directory</h4>
					<p class="lead">Use your profile as a website</p>
					<p>Many start-ups cannot afford to have a website created for them. Simply point a .com or .co.uk domain at your enterpriser profile and use it as a mini web presence.</p>
				</div>
				<div class="col-md-6">
					<img src="http://placehold.it/500x250" class="img-responsive"/>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/splash.js"></script>
</body>
</html>