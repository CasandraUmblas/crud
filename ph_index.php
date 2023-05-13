<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/#.css">
</head>
<body>
     <form action="ph_login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="text" name="Email" placeholder="Enter email"><br>

     	<label>Password</label>
     	<input type="Password" name="Password" placeholder="Enter password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>