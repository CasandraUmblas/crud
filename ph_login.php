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
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" contents="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="style.css">

</head>
<body>
	<form action="ph_login.php" method="post">
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
		<div class="container">
            <div class="box form-box">
                <header>Login</header>
                <form action="" method="post"> 
				<div class="field input mb-3">
					<label class="form-label">Email:</label>
					<input type="text" class="form-control" name="Email" placeholder="Enter email" id="Email" required>
            	</div>
				</form>

				<div class="field input mb-3">
					<label class="form-label">Password:</label>
					<input type="Password" class="form-control" name="Password" placeholder="Enter password" id="Password" required>
            	</div>

				<div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
			</div>	
		</div>
	</form>		 
</body>
</html>