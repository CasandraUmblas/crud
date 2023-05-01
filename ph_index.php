<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" contents="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text" href="style.css">
</head>
<body>
     <form action="ph_login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="text" name="Email" placeholder="Email"><br>

     	<label>Password</label>
     	<input type="Password" name="Password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>