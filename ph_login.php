<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['Email']) && isset($_POST['Password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$Email = validate($_POST['Email']);
	$Password = validate($_POST['Password']);
		
	if (empty($Email)) {
		header("Location: ph_index.php?error=Email is required");
	    exit();
	} else if(empty($Password)) {
        header("Location: ph_index.php?error=Password is required");
	    exit();
	} else {
		$sql = "SELECT * FROM ph_users WHERE Email='$Email' AND Password='$Password'";
		$result = mysqli_query($conn, $sql);
	}

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if ($row['Email'] === $Email && $row['Password'] === $Password) {
			$_SESSION['Email'] = $row['Email'];
			$_SESSION['ID'] = $row['ID'];
			header("Location: ph_menu.php");
			exit();
		}else{
			header("Location: ph_index.php?error=Incorrect email or password");
			exit();
		}
	}else{
		header("Location: ph_index.php?error=Incorrect email or password");
		exit();
	}
}else{
	header("Location: ph_index.php");
	exit();
}