<?php foreach($business_info as $business){ 
$coverurl = base_url()."uploads/covers/".$business['coverphoto'];
$logourl = base_url()."uploads/logos/".$business['logo'];
$strippedurl = str_replace(' ', '_', $business['business_name']);
$strippedurl = strtolower($strippedurl);
?>
<style>
html, body{
	background-color: <?php echo $business['bgcolor']; ?> !important;
}

.headerbg{
	background: url("<?php echo $coverurl ?>");
	background-size: cover;
	background-repeat: no-repeat;
	color:  <?php echo $business['headercolor']; ?> !important;
}
</style>
<div class="container">
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/b/<?php echo $strippedurl; ?>"><?php echo $business['business_name']; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Services</a></li>
            <li><a href="#contact">Special Offers</a></li>
            <li><a href="#contact">Desk Space</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> <?php echo $business['tel']; ?></a></li>
            <li><a href="#" data-toggle="modal" data-target="#contactModal"><span class="glyphicon glyphicon-envelope"></span> Email Us</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div>
		<div class="jumbotron headerbg">
			<div class="row">
				<div class="col-xs-3">
					<img src="<?php echo $logourl; ?>" class="img-responsive"/>
				</div>
				<div class="col-xs-9">
					<h1><?php echo $business['business_name']; ?></h1>
					<p><?php echo $business['description']; ?></p>
				</div>
			</div>
		</div>

		<div class="jumbotron">
			<h4>Heading 2</h4>
		</div>

		<div class="jumbotron">
			<h4>Heading 3</h4>
		</div>

		<div class="jumbotron">
			<h4>Heading 4</h4>
		</div>
		
		<footer>
			Website by <a href="<?php echo base_url(); ?>">Enterpriser</a>
		</footer>

		<!-- Contact Modal -->
		<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="contactModalLabel">Email <?php echo $business['business_name']; ?></h4>
		      </div>
		      <div class="modal-body">
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Send</button>
		      </div>
		    </div>
		  </div>
		</div>

		<?php } ?>