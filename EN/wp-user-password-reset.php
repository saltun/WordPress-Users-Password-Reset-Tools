<?php
/*
* Author : Savaş Can Altun
* Web : http://savascanaltun.com.tr
* Mail : savascanaltun@gmail.com
* GİT : http://github.com/saltun
* Date :  29.10.2014
* Update : 29.10.2014
*/
require_once('wp-includes/wp-db.php');
require "wp-load.php";

global $wpdb;


$users=$wpdb->get_results("SELECT * FROM $wpdb->users");


if ($_POST) {
	$pass=md5($_POST['password']);
	$user=mysql_real_escape_string($_POST['user']);
	$x=$wpdb->query("UPDATE $wpdb->users SET user_pass = '$pass' WHERE user_login = '$user' ");

	if ($x) {
		echo "<script>alert('Completed')</script>";
	}else{
		echo "<script>alert('Error')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WordPress Password Restart</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">


 <div class="jumbotron">
	
<h1>WP Password Reset</h1>

		<form action="" method="POST">

			<h3>Select User : 
			<select name="user">

				<?php foreach ($users as $key => $user): ?>
				<option value="<?php echo $user->user_login;?>"><?php echo $user->user_login."( ".$user->user_email." )"; ?></option>
			<?php	endforeach; ?>
			</select>
			</h3>
			<h3>Enter new password  : 	<input type="text" name="password"></h3>
		

			<hr/>
			<button class="btn btn-success" style="width:100%;">User Password Reset </button>
		</form>

		<i>After completing the process you delete a file</i>

<br/>
		<div class="text-right"><i>Developer <a href="http://savascanaltun.com.tr/" title="Savaş Can ALTUN">Savaş Can ALTUN</a> ->  <a href="http://github.com/saltun">Github</a></i></div>
</div>
</div>
</body>
</html>