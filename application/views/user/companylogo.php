<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
<?php foreach($business_info as $business){ ?>      
        <h1>Company Logo</h1>
        <p>Please only use jpg, png or gif images. Large images will be resized to 200px by 200px</p>

        <?php echo form_open_multipart('user/upload_companylogo/'.$business['business_id']); ?>
	        <div class="form-group">
			    <label for="exampleInputFile">Select Logo</label>
			    <input type="file" id="userfile" name="userfile">
			</div>
			
			<?php
			$upload = array(
              'name'        => 'upload',
              'class' 		=> 'btn btn-primary',
              'id'          => 'uploadbtn'
            );
			echo form_submit($upload, 'Upload Image');
			?>
		</form>
	

<?php } ?>
</div>
