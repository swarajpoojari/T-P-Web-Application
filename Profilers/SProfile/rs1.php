<?php
    require_once("PasswordHash.php");
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	$USN2 = ($_SESSION['reset']);
	
	$connect = mysqli_connect("localhost", "root", "", 'placement'); // Establishing Connection with Server
    // mysqli_select_db("placement") or die("Cant Connect to database"); // Selecting Database from Server
	
			if($USN1 && $password && $confirm ){
		
	
	if($password == $confirm) {
		
		$hasher = new PasswordHash(2, false);
		$encrypted_password = $hasher->HashPassword($password);

		if($USN2 == $USN1){
		if($sql = mysqli_query($connect, "UPDATE `placement`.`slogin` SET `PASSWORD` ='$encrypted_password' WHERE `slogin`.`USN` = '$USN1'")){
		echo "<center>Password Reset Complete</center>";
		session_unset();
		}
		} else {
			session_unset();
			die("Enter Your USN only");		
			
			} 
	} else
	{
	echo "Update Failed";
	session_unset();
	}
	}
	else
	{
	echo "Field cannot be left blank";
	session_unset();
	}
?>