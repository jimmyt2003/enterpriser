<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">

	<div class="row">
    	<div class="col-xs-12 col-md-6">
			<h2>Control Panel</h2>
    		<div class="row">
    			<div class="col-xs-12">
                    <?php foreach($profile as $profile_item){ ?> 
    				    <img src="<?php echo base_url(); ?>uploads/thumbs/<?php if($profile_item['filename']==""){ echo "noimg.jpg";}else{echo $profile_item['filename']; } ?>"/>
                    <?php } ?>
    			</div>
    			<div class="col-xs-12">
    				<a href="<?php echo base_url(); ?>index.php/user/update_profilepic" class="btn btn-primary btn-xs profile-pic-btn"><span class="glyphicon glyphicon-picture"></span> Edit Profile Picture</a>
    			</div>
    		</div>
    	</div>

    	<div class="col-xs-12 col-md-6">
            <div class="row">
                <?php $numofbus = count($businesses); ?>
    		  <h3 class="pull-left">Your Businesses (<?php echo $numofbus; ?>)</h3>
    		  <a href="<?php echo base_url(); ?>index.php/user/add_business" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Add Business</a>
    		</div>
            <div class="row">
                <?php
                if($numofbus == 0){?>
                    <p>You have not added a business yet... <strong><a href="<?php echo base_url(); ?>index.php/user/add_business">Add one here</a></strong></p>
                <?php }else{ ?>
                <div class="list-group">
                <?php foreach($businesses as $business){ ?>	
                      <a href="<?php echo base_url(); ?>index.php/user/edit_business/<?php echo $business['business_id']; ?>" class="list-group-item"><?php echo $business['business_name']; ?></a>
        		<?php }} ?>
                </div>
            </div>
    	</div>
    		
	</div>

</div>