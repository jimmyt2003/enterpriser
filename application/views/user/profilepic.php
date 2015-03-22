<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
      
        <h1>Upload Profile Image</h1>
        <p>This image will be shown next to your posts</p>

        <?php echo form_open_multipart('user/upload_profilepic'); ?>
	        <div class="form-group">
			    <label for="exampleInputFile">Select Image</label>
			    <input type="file" id="userfile" name="userfile">
			</div>
			
			<?php
			$upload = array(
              'name'        => 'upload',
              'class' 		=> 'btn btn-primary',
              'id'          => 'uploadbtn'
            );
			echo form_submit($upload, 'Submit Image');
			?>
		</form>
	


</div>
