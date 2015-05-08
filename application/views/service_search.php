<div class="col-xs-12 col-sm-9 col-md-8 col-lg-9 content-area">
	<h1>Swap Services</h1>
	<?php echo form_open('search'); 
	if(!isset($query)){ $query = ""; } ?>
		<div class="form-group col-xs-12">
		<label for="exampleInputEmail1">Find a service</label>
	    <?php
		    $data = array(
              'name'        => 'search',
              'id'          => 'search',
              'value'       => $query,
              'maxlength'   => '100',
              'class'       => 'form-control',
              'required'	=> 'required',
              'placeholder' => 'Search'
            );

			echo form_input($data);
		?>
		</div>
	</form>
</div>