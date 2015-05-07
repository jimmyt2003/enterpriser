<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enterpriser - Entrepreneur Community</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	
</head>
<body>

	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand brand-blue" href="<?php echo base_url(); ?>">enterpriser</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#serviceswap"><span class="glyphicon glyphicon-transfer"></span> Service Swap</a></li>
            <li><a href="#" data-toggle="tooltip" title="" data-original-title="Default tooltip"><span class="glyphicon glyphicon-print"></span> Office Space</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/directory"><span class="glyphicon glyphicon-list-alt"></span> Company Directory</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if($this->session->userdata('user_id')){?>
            <li><a href="<?php echo base_url(); ?>index.php/user/"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('name'); ?></span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/login/logout">Logout</span></a></li>
            <?php }else{ ?>
            <li><a href="<?php echo base_url(); ?>index.php/login/register">Register</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/login/login">Login</span></a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php if($this->uri->segment(1)!=""){ ?>
    <div class="container">
      <div class="row">
<?php } ?>