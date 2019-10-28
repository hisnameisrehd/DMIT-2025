<?php


if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	setcookie("username", $username, time()+3600); // 
}else{
		$username = $_COOKIE["username"];	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Secure Login</title>
</head>

<body>
<h2>Please Login</h2>

<form name="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
username: <input type="text" name="username" value="<?php echo $username; ?>" /><br />
password: <input type="password" name="password"  /><br />
<input type="submit" name="submit" /><br />
</form>
<?php echo $msg; ?>

</body>
</html>











