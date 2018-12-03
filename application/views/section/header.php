<?php $_SESSION["user_id"] || beefSecurity(); ?>

<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>"> 
<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>"> 

	
	<script src='<?=base_url('assets/js/jquery-3.3.1.min.js')?>' ></script>
	<script src="<?=base_url("assets/js/popper.min.js")?>" ></script>
	<script src="<?=base_url("assets/js/bootstrap.min.js")?>" ></script>

<title>Tripper</title>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <!-- <a class="navbar-brand text-light" href="#">TRIPPER</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      
	
    </ul>
  </div>
		<li class="d-inline-block">
			<a class="nav-link text-light" href="<?=base_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
		</li>
	
</nav>

<body class="mt-5">


