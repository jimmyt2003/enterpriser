<?php 
	function shorten_desc($busines_description, $chars = 25) {
	    $busines_description = $busines_description." ";
	    $busines_description = substr($busines_description,0,$chars);
	    $busines_description = substr($busines_description,0,strrpos($busines_description,' '));
	    $busines_description = $busines_description."...";
	    return $busines_description;
	}
?>
<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">

	<h1>Search Results: <small><?php echo $query; ?></small></h1>
	<?php if(count($businesses)>0){ ?><p><em><?php echo count($businesses); ?> Results found</em></p><?php } ?>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="paginationlinks">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
		<div class="row">
			<?php foreach($businesses as $business_item){
		    	$coverurl = base_url()."uploads/covers/".$business_item['coverphoto'];
				$logourl = base_url()."uploads/logos/".$business_item['logo'];
			?> 
			<div class="col-xs-10 col-xs-offset-1 col-sm-5">
				<div class="media">
				  <div class="media-left media-middle">
				    <a href="<?php echo base_url(); ?>p/<?php echo $business_item['business_id']; ?>">
				      <img class="media-object" src="<?php echo $logourl;?>" alt="...">
				    </a>
				  </div>
				  <div class="media-body">
				  	<a href="<?php echo base_url(); ?>p/<?php echo $business_item['business_id']; ?>">
				    	<h4 class="media-heading"><?php echo $business_item['business_name'];?></h4>
				    </a>
				    	<?php echo shorten_desc($business_item['description'], 150);?><br>
				    	<?php echo $business_item['cat_name'];?>
				  </div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="col-xs-10 col-xs-offset-1">
			<div class="paginationlinks">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>

		<?php if(count($businesses)=='0'){ ?>
			<p>Sorry, at this time there are no businesses that match the keyword <strong>"<?php echo $query; ?>"</strong></p>
		<?php } ?>

</div>