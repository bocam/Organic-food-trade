<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--box icon link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<title>Document</title>
</head>
<body>
	<header class="header">
		<div class="flex">
			<a href="login.php" class="logo"><img src="img/hrana.png" height="170px" ></a>
			<nav class="navbar">
				<a href="index.php">POČETNA</a>
				<a href="about.php">o nama</a>
				<a href="shop.php">PRODAVNICA</a>
				<a href="order.php">NARUDŽBE</a>
				<a href="contact.php">KONTAKT</a>
			</nav>
			<div class="icons">
				<i class="bi bi-person" id="user-btn"></i>
				<?php 
					$select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die ('query failed');
					$wishlist_num_rows = mysqli_num_rows($select_wishlist);
				?>
				<a href="wishlist.php"><i class="bi bi-heart"></i><sup><?php echo $wishlist_num_rows; ?></sup></a>
				<?php 
					$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die ('query failed');
					$cart_num_rows = mysqli_num_rows($select_cart);
				?>
				<a href="cart.php"><i class="bi bi-cart"></i><sup><?php echo $cart_num_rows; ?></sup></a>
				<i class="bi bi-list" id="menu-btn"></i>
			</div>
			<div class="user-box">
				<p>Korisničko ime : <span><?php echo $_SESSION['user_name']; ?></span></p>
				<p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
				<form method="post">
					<button type="submit" name="logout" class="logout-btn">ODJAVI SE</button>
				</form>
			</div>
		</div>
	</header>
	
</body>
</html>