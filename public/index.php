<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();
if(!isset($_SESSION["username"]))
{
	header("Location: loginPage.php");
}
?>

<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="index.css" rel="stylesheet" id="bootstrap-css">
<script src="index.js"></script>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-edit">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="edit-form" action="editPage.php" method="get" role="form" style="display: block;">
									<?php
									if(isset($_SESSION["username"]))
									{
                                    echo'<label for="username">Username'.$_SESSION["username"].'</label>';
									echo'<label for="email">Email'.$_SESSION["email"].'</label>';
									echo'<label for="birth_date">Birth Date'.$_SESSION["birth_date"].'</label>';
									echo'<label for="first_name">First Name'.$_SESSION["first_name"].'</label>';
									echo'<label for="last_name">Last Name'.$_SESSION["last_name"].'</label>';
									echo'<label for="gender">Gender'.$_SESSION["gender"].'</label>';
									}
									else
									{
										echo'<label for="notLogged">YOU ARE NOT LOGGED IN</label>';	
									}
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="edit-submit" id="edit-submit" tabindex="4" class="form-control btn btn-edit" value="Edit Profile">
											</div>
										</div>
									</div>
								</form>
								<form id="login-form" action="loginPage.php" method="get" role="form" style="display: block;">
								<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login as another user">
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