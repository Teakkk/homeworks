<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h1>Register in our forum</h1>
	<?php
	$interestsNames=array('interest1'=>'Music','interest2'=>'Sport','interest3'=>'Education');
	if (!empty($_POST)) {
		$email=$_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo '<font color="red">Invalid email!!!</font>';
		}else{
			$interests=$_POST['interests'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$vInterests='';
			foreach ($interests as $value) {
				$vInterests.=$interestsNames['interest'.$value].',';
			}
			$vInterests=substr($vInterests, 0, -1);
			echo '<div>Username: '.$username.', Password: '.$password.', Email: '.$email.', Interests: '.$vInterests.'</div>';
		}
	}
	?>
	<form method="post" action="02.php">
		<p><strong>Choose your interests:</strong></p>
		Music <input type="checkbox" name="interests[]" value="1" /><br/>
		Sport <input type="checkbox" name="interests[]" value="2" /><br/>
		Education <input type="checkbox" name="interests[]" value="3" /><br/>
		<p><strong>Enter your account information</strong></p>
		Username: <input type="text" name="username" /> <br/>
		Password: <input type="password" name="password" /> <br/>
		Email: <input type="text" name="email" /> <br/>
		<input type="submit" value="Register"/>
	</form>
</body>
</html>
