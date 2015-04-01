<?php foreach($business_info as $business){ ?>	

                      <a href="<?php echo base_url(); ?>index.php/user/edit_business/<?php echo $business['business_id']; ?>" class="list-group-item"><?php echo $business['business_name']; ?></a>
	<h1>Add Your Business</h1>

	<div class="row text-left">
    		<div class="col-lg-6 col-xs-10 col-sm-8 col-lg-offset-3 col-sm-offset-2 col-xs-offset-1">

				
			</div>
	</div>

</div>

<?php } ?>