<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">

	<div class="row">
    	<div class="col-xs-12 col-md-6">
			<h2>Control Panel</h2>
    		<div class="row">
    			<div class="col-xs-12">
    				<img src="<?php echo base_url(); ?>uploads/thumbs/17.jpg"/>
    			</div>
    			<div class="col-xs-12">
    				<a href="<?php echo base_url(); ?>index.php/user/update_profilepic" class="btn btn-primary btn-xs clear-fix"><span class="glyphicon glyphicon-picture"></span> Edit Profile Picture</a>
    			</div>
    		</div>
    	</div>

    	<div class="col-xs-12 col-md-6">
    		<h3>Your Businesses</h3>
    		<a href="<?php echo base_url(); ?>index.php/user/add_business" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add Business</a>
    		<?php foreach($businesses as $business){ ?>	
    			<?php echo $business['business_name']; ?>
    		<?php } ?>
    	</div>
    		
	</div>

</div>