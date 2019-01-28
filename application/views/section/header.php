<?php $_SESSION["user_id"] || beefSecurity(); ?>

<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>"> 
<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>"> 
<link rel="stylesheet" href="<?=base_url('assets/select2/select2.min.css'); ?>">

<link href="<?=base_url('assets/images/favicon.png')?>" rel="icon" type="image/png">
<link href="<?=base_url('assets/images/favicon.png')?>" rel="shortcut icon">

<script src='<?=base_url('assets/js/jquery-3.3.1.min.js')?>' ></script>
<script src="<?=base_url("assets/js/popper.min.js")?>" ></script>
<script src="<?=base_url("assets/js/bootstrap.min.js")?>" ></script>

<title>Bomba Flow</title>
<div class="clearfix">

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainheader">
  <a class="navbar-brand" href="<?=base_url('/')?>">
  <img src="<?=base_url('assets/images/logo-2-mob.png')?>" alt="" height="50px">
  
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav"><li class="nav-item">
        <a class="nav-link" href="<?=base_url('about')?>">About Us</a>
      </li>    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('priceplans')?>">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin')?>">Admin</a>
      </li>
    </ul>
  </div>
  <li class="d-inline-block">
			<a class="p-1 nav-link alert-info rounded" href="<?=base_url('topup')?>"><i class="fa fa-dollar"></i> Wallet : KES.<?=bal()?></a>
		</li>
  <li class="d-inline-block">
			<a class="nav-link text-light" href="<?=base_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
		</li>
</nav>


</div>

<body class="clearfix">


<div class="m-3">


<style>
  .nav-link {
    color:#000 !important;
  }
  #mainheader {
    background: linear-gradient(217deg, var(--warning), rgba(255,0,0,0) 70.71%), linear-gradient(127deg, var(--cyan), rgba(0,255,0,0) 70.71%), linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);
  }
</style>