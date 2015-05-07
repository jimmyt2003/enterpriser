<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
    <?php foreach($business as $business_item){

    $coverurl = base_url()."uploads/covers/".$business_item['coverphoto'];
	$logourl = base_url()."uploads/logos/".$business_item['logo'];

	?> 

<style>
html, body{
	background-color: <?php echo $business['bgcolor']; ?> !important;
}

.jumbobg:before{
	background: url("<?php echo $coverurl ?>");
	background-size: cover;
	background-repeat: no-repeat;
	color:  #<?php echo $business_item['headercolor']; ?> !important;
}
.jumboh1 {
	color:  #<?php echo $business_item['headercolor']; ?> !important;
}
</style>
        
        	<div class="jumbotron jumbobg">
        		<div class="row">
					<div class="col-xs-3">
						<img src="<?php echo $logourl; ?>" class="img-responsive"/>
					</div>
					<div class="col-xs-9">
						<h1 class="jumboh1"><?php echo $business_item['business_name']; ?></h1>
					</div>
				</div>
        	</div>
        	<h2>Company Info</h2>
        	<div class="row">
        		<div class="col-md-6">
        			<h4>Description</h4>
        			<p><?php echo $business_item['description']; ?></p>
        		</div>
        		<div class="col-md-6 well well-sm">
        			<h4>Address</h4>
        			<p><?php echo $business_item['address']; ?></p>
        			<h4>Phone Number</h4>
        			<p><?php echo $business_item['tel']; ?></p>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-11">
        			<h4>Services Required</h4>
        			<p>Coming Soon</p>
        		</div>
        		<div class="col-md-11">
        			<h4>Services On Offer</h4>
        			<p>Coming Soon</p>
        			
        		</div>
        	</div>
            <a href="<?php echo base_url(); ?>directory/cat/<?php echo $business_item['business_id']; ?>"><?php echo $business_item['business_name']; ?></a>
        </div>
    <?php } ?>
    
</div>