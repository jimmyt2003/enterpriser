<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
    <h1>Business Directory</h1>
    <div class="row">
    <?php foreach($categories as $category_item){ ?> 
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-md-4">
            <a href="<?php echo base_url(); ?>directory/<?php echo $category_item['cat_id']; ?>"><?php echo $category_item['cat_name']; ?></a>
        </div>
    <?php } ?>
    </div>
</div>