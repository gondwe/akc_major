<div class="container">
<h5>Register Driver</h5>
<span class='text-success pull-right'>Already Registered ? <a class="btn btn-info" href="<?=base_url('auth/login')?>" role="button">Login</a> </span>

<?php echo isset($message) ? '<div class="btn alert-danger col-md-6 text-left" >'.$message.'</div>' : null ?>
<div class="clearfix">

</div>
<hr>

<form action="<?=base_url('welcome/sign_up/')?>" enctype="multipart/form-data" class="mx-md-1" method="post">
                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
				<div class="input-group-prepend">
					<div class="p-2">USERNAME</div>
				</div>
				<input class="form-control" required="" type="text" name="username" value="">
                </div>
                
                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
				<div class="input-group-prepend">
					<div class="p-2">EMAIL</div>
				</div>
				<input class="form-control" required="" type="text" name="email" value=""></div>
                <div>
                
                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
				<div class="input-group-prepend">
					<div class="p-2">FIRST NAME</div>
				</div>
				<input class="form-control" required="" type="text" name="first_name" value=""></div>
                
                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
				<div class="input-group-prepend">
					<div class="p-2">LAST NAME</div>
				</div>
				<input class="form-control" required="" type="text" name="last_name" value=""></div>
                
                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
                <div class="input-group-prepend">
					<div class="p-2">PHONE</div>
				</div>
				<input class="form-control" required="" type="text" name="phone" value=""></div>
                
                
                <div class="clearfix">
                
                </div>
                
                <hr>

                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
                <div class="input-group-prepend">
					<div class="p-2">PASSWORD</div>
				</div>
				<input class="form-control" required="" type="password" name="password" value=""></div>
                
                
                <div class="form-group col-lg-4 col-md-6 col-sm-12 pull-left mb-3">
                <div class="input-group-prepend">
					<div class="p-2">VERIFY</div>
				</div>
				<input class="form-control" required="" type="password" name="verify" value=""></div>
                
		<input type="submit" value="SAVE" class="form-control text-light btn btn-primary"></div></div>
        </form>
        
</div>