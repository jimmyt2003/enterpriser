<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
    <h1><?php foreach($categories as $category_item){ echo $category_item['cat_name']; } ?> Businesses</h1>
    <div class="row">
    <?php foreach($businesses as $business_item){ ?> 
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-md-4">
            <a href="<?php echo base_url(); ?>index.php/p/<?php echo $business_item['business_id']; ?>"><?php echo $business_item['business_name']; ?></a>
        </div>
    <?php } ?>
    </div>
</div>