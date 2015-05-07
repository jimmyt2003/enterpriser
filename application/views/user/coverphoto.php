<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
<?php foreach($business_info as $business){ ?>      
        <h1>Company Cover Photo</h1>
        <p>Please only use jpg, png or gif images.</p>

        <?php echo form_open_multipart('user/upload_coverphoto/'.$business['business_id']); ?>
	        <div class="form-group">
			    <label for="exampleInputFile">Select photo</label>
			    <input type="file" id="userfile" name="userfile">
			</div>
			
			<?php
			$upload = array(
              'name'        => 'upload',
              'class' 		=> 'btn btn-primary',
              'id'          => 'uploadbtn',
              'accept'		=>	'image/gif, image/png, image/jpeg, image/jpg'
            );
			echo form_submit($upload, 'Upload Image');
			?>
		</form>
	

<?php } ?>
</div>
