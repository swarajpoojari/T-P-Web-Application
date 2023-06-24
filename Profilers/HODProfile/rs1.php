<?php
    require_once("PasswordHash.php");
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	
	$connect = mysqli_connect("localhost", "root", "", "placement"); // Establishing Connection with Server
    // mysqli_select_db("placement") or die("Cant Connect to database"); // Selecting Database from Server
	
	if($password == $confirm) {
		$hasher = new PasswordHash(2, false);
		$encrypted_password = $hasher->HashPassword($password);
		if($sql = mysqli_query($connect, "UPDATE `placement`.`hlogin` SET `Password` ='$password' WHERE `hlogin`.`Username` = '$USN1'"));
		echo "<center>Password Reset Complete</center>";
		session_unset();
	} else
	echo "Update Failed";
?>