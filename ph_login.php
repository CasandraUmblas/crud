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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<form action="ph_login.php" method="post">
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
		<div class="container">
            <div class="box form-box">
				<div class="text-center mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
					<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
					<path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
				</svg>
                	<header>Login</header>
				</div>
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
					<a href="#.php" class="btn btn-danger">Cancel</a>
                </div>
			</div>	
		</div>
	</form>		 
</body>
</html>