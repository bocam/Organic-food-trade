<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--box icon link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="novi.css">
    <link rel="stylesheet" href="main.css">
	<title>Document</title>
</head>
<body>
	<header class="header">
		<div class="flex">
            <a href="login.php" class="logo"><img src="img/hrana.png" height="170px" ></a>
			<nav class="navbar">
				<a href="admin_pannel.php">Početna</a>
				<a href="admin_product.php">Proizvodi</a>
				<a href="admin_order.php">Narudžbe</a>
				<a href="admin_user.php">Korisnici</a>
				<a href="admin_message.php">Poruke</a>
			</nav>
			<div class="icons">
				<i class="bi bi-person" id="user-btn"></i>
				<i class="bi bi-list" id="menu-btn"></i>
			</div>
			<div class="user-box">
				<p>Korisničko ime: <span><?php echo $_SESSION['admin_name']; ?></span></p>
				<p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
				<form method="post">
					<button type="submit" name="logout" class="logout-btn">ODJAVI SE</button>
				</form>
			</div>
		</div>
	</header>
	<div class="banner">
		<div class="detail">
			<h1>Admin</h1>
			<p>Kao admin imate uvid u veliki broj podešavanja</p>
		</div>
	</div>
	<div class="line"></div>
</body>
</html>