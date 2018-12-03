<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/index.css" rel="stylesheet" id="bootstrap-css">
<script src="js/index.js"></script>
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
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=<?php session_start(); echo $_SESSION["username"];?>>
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
									<?php
										if($_SESSION["gender"]=="male")
										{
											echo'<input type="radio" name="gender" id="gender" value="male" tabindex="6" checked> Male<br>';
										}
										else
										{
											echo'<input type="radio" name="gender" id="gender" value="male" tabindex="6"> Male<br>';
										}
										if($_SESSION["gender"]=="female")
										{
											echo'<input type="radio" name="gender" id="gender" value="female" tabindex="7" checked> Female<br>';
										}
										else
										{
                                            echo'<input type="radio" name="gender" id="gender" value="female" tabindex="7"> Female<br>';
										}
										if($_SESSION["gender"]=="other")
										{
											
											echo'<input type="radio" name="gender" id="gender" value="other" tabindex="8" checked> Other';
										}
										else
										{
											echo'<input type="radio" name="gender" id="gender" value="other" tabindex="8"> Other';
										}
									?>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="edit-submit" id="edit-submit" tabindex="9" class="form-control btn btn-edit" value="Save Profile">
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
												<input type="submit" name="resetPassword-submit" id="resetPassword-submit" tabindex="12" class="form-control btn btn-resetPassword" value="Reset Password">
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