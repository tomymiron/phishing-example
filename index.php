<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
	die("Unable to connect");
}
if($_POST) {
	$uname = $_POST["username"];
	$pass = $_POST["password"];

    //$uname = mysqli_real_escape_string($conn, $uname);
    //$pass = mysqli_real_escape_string($conn, $pass);

	$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";

    $result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
        $user = $row['username'];
		header("Location: menu.php?user=".$user);
	} else {
		echo "Incorrect Username/Password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Portal</title>
	<style type="text/css"><?php include("css/main.css"); ?></style>
</head>
<body>
	<form action method="POST" autocomplete="off">
		<input type="text" name="username" placeholder="Username" /><br />
		<input type="password" name="password" placeholder="********" /><br />
		<input type="submit" name="login" value="LOGIN" />
	</form>

</body>
</html>
