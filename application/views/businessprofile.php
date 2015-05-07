<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
    <?php foreach($business as $business_item){

    $coverurl = base_url()."uploads/covers/".$business_item['coverphoto'];
	$logourl = base_url()."uploads/logos/".$business_item['logo'];

	?> 

<style>
html, body{
	background-color: <?php echo $business['bgcolor']; ?> !important;
}

.jumbobg{
	background: url("<?php echo $coverurl ?>");
	background-size: cover;
	background-repeat: no-repeat;
	color:  <?php echo $business['headercolor']; ?> !important;
}
</style>
        
        	<div class="jumbotron jumbobg">
        		<h1><?php echo $business_item['business_name']; ?><h1>
        	</div>
            <a href="<?php echo base_url(); ?>index.php/directory/cat/<?php echo $business_item['business_id']; ?>"><?php echo $business_item['business_name']; ?></a>
        </div>
    <?php } ?>
    
</div>