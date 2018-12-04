<html lang="en">

<script src="/js/jquery.min.js"></script>
<link href="/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet" type="text/css">
<script src="/js/bootstrap.min.js"></script>
<link href="/css/index.css" id="index-css" rel="stylesheet" type="text/css">
<script src="/js/index.js"></script>

<script>
  	function resetPassword() {
		var password = document.forms["resetPassword-form"]["password"].value;
		var confirmed_Password = document.forms["resetPassword-form"]["confirm_password"].value;
		if(password == confirmed_Password)
		{
			alert("Password has been reset!");
		}
		else
		{
			alert("Passwords don't match!");
		}
	}

	function saveEditChanges()
	{
		alert("Your changes have been saved!");
	}
</script>

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-edit">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							<form id="logOut-form" action="/logout" method="post" role="form" style="display: block;">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-3 col-sm-offset-10">
												<input type="submit" name="logOut-submit" id="logOut-submit" tabindex="13" class="form-control btn btn-logOut" value="Log Out">
											</div>
										</div>
									</div>
								</form>
								<form id="edit-form" action="/user/save" method="post" role="form" style="display: block;">
                                    <label for="username">Username</label>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=<?php echo $_SESSION["username"];?>>
									</div>
                                    <label for="email">Email</label>
                                    <div class="form-group">
										<input type="text" name="email" id="email" tabindex="2" class="form-control" placeholder="Email" value=<?php echo $_SESSION["email"];?>>
									</div>
                                    <label for="birth_date">Birth Date</label>
                                    <div class="form-group">
										<input type="date" name="birth_date" id="birth_date" tabindex="3" class="form-control" placeholder="Birth Date"  value=<?php echo $_SESSION["birth_date"];?> >
									</div>
                                    <label for="first_name">First Name</label>
                                    <div class="form-group">
										<input type="text" name="first_name" id="first_name" tabindex="4" class="form-control" placeholder="First Name"  value=<?php echo $_SESSION["first_name"];?>>
									</div>
                                    <label for="last_name">Last Name</label>
                                    <div class="form-group">
										<input type="text" name="last_name" id="last_name" tabindex="5" class="form-control" placeholder="Last Name"  value=<?php echo $_SESSION["last_name"];?>>
									</div>
                                    <label for="gender">Gender</label>
                                    <div class="form-group">
									<?php if($_SESSION["gender"]=="male") :?>
                                        <input type="radio" name="gender" id="genderMale" value="male" tabindex="6" checked> Male<br>
									<?php else :?>
                                        <input type="radio" name="gender" id="genderMale" value="male" tabindex="6"> Male<br>
                                    <?php endif; ?>

									<?php if($_SESSION["gender"]=="female") :?>
											<input type="radio" name="gender" id="genderFemale" value="female" tabindex="7" checked> Female<br>
										<?php else :?>
                                            <input type="radio" name="gender" id="genderFemale" value="female" tabindex="7"> Female<br>
                                    <?php endif; ?>

									<?php if($_SESSION["gender"]=="other" || $_SESSION["gender"]==NULL) :?>
										<input type="radio" name="gender" id="genderOther" value="other" tabindex="8" checked> Other
									<?php else :?>
										<input type="radio" name="gender" id="genderOther" value="other" tabindex="8"> Other
									<?php endif; ?>
											
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" onclick="saveEditChanges()" name="edit-submit" id="edit-submit" tabindex="9" class="form-control btn btn-edit" value="Save Profile">
											</div>
										</div>
									</div>
								</form>
                                <form id="resetPassword-form" action="/user/resetpassword" method="post" role="form" style="display: block;">
                                    <label for="password">Password</label>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="10" minlength="5" class="form-control" placeholder="Password">
									</div>
                                    <label for="confirm_password">Confirm Password</label>
                                    <div class="form-group">
										<input type="password" name="confirm_password" id="confirm_password" tabindex="11" minlength="5" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" onclick="resetPassword()" name="resetPassword-submit" id="resetPassword-submit" tabindex="12" class="form-control btn btn-resetPassword" value="Reset Password">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</html>