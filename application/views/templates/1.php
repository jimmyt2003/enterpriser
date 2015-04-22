<?php foreach($business_info as $business){ ?>

<div class="container">
	<div class="">
		<div class="jumbotron">
			<h1 class="white"><?php echo $business['business_name']; ?></h1>
		</div>
		
		<br><?php echo $business['business_id']; ?>

		<?php } ?>