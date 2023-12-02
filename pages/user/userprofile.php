<?php
    include_once './models/UserModel.php';

    $userModel 		= new UserModel();
	$userProfile 	= $userModel->requestDetail();

    if (isset($_POST['update_profile'])) {
        $username   = $_POST['username'];
        $name    	= $_POST['name'];

        $request = $userModel->requestUpdateProfile($username, $name);
		if ($request) {
			$userProfile = $userModel->requestDetail();
			echo '
			<script language="javascript">
				alert("Update Profile Success!!!")
			</script>';
        } else {
			echo '
			<script language="javascript">
				alert("Sorry, Update Profile Failed. Please, try again!")
			</script>';
        }
    }

	if (isset($_POST['update_password'])) {
        $password   	= $_POST['password'];
        $repassword    	= $_POST['repassword'];

		if ($password === $repassword) {
			$request = $userModel->requestUpdatePassword($password, $repassword);
			if ($request) {
				echo '
				<script language="javascript">
					alert("Update Password Success!!!")
				</script>';
			} else {
				echo '
				<script language="javascript">
					alert("Sorry, Update Password Failed. Please, try again!")
				</script>';
			}
		} else {
			echo '
			<script language="javascript">
				alert("Sorry, Password doesnt match. Please, try again!")
			</script>';
		}
        
    }
?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Edward kennedy’s profile</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="images/uploads/user-img.png" alt=""><br></a>
						<a href="#" class="redbtn">Change avatar</a>
					</div>
					<div class="user-fav">
						<p>Account Details</p>
						<ul>
							<li  class="active"><a href="userprofile.html">Profile</a></li>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form method="POST" class="user">
						<h4>01. Profile details</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Username</label>
								<input type="text" name="username" value="<?= $userProfile['username'] ?>" placeholder="edwardkennedy">
							</div>
							<div class="col-md-6 form-it">
								<label>Name</label>
								<input type="text" name="name" value="<?= $userProfile['name'] ?>" placeholder="edward@kennedy.com">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2">
								<input class="submit" name="update_profile" type="submit" value="save">
							</div>
						</div>	
					</form>
					<form method="POST" class="password">
						<h4>02. Change password</h4>
						
						<div class="row">
							<div class="col-md-6 form-it">
								<label>New Password</label>
								<input type="password" name="password" placeholder="***************">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Confirm New Password</label>
								<input type="password" name="repassword" placeholder="*************** ">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" name="update_password" type="submit" value="change">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>