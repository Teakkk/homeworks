<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Commerce - Home</title>
</head>
<body>
	<h1>e-Commerce "Mania"</h1>
	<?php
	if (isset($_POST['send'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		if ($username=="user" && $password=="pass") {
			$_SESSION['logged']=true;
			$_SESSION['username']=$username;
			
		}else{
			echo '<div style="color:red;">Wrong username/password!</div>';
		}
	}
	if (!(isset($_SESSION['logged']) && $_SESSION['logged']==true)) {	
		?>
		<form method="post" action="03_index.php">
			Username: <input type="text" name="username" /> <br/>
			Password: <input type="password" name="password" /> <br/>
			<input type="submit" name="send" value="Login"/>
		</form>
		<?php 
	}else{
		echo '<h3>Welcome '.$_SESSION['username'].' -> <a href="03_products.php">Products</a> | <a href="03_logout.php">Logout</a></h3>';
	}
	?>
</body>
</html>
