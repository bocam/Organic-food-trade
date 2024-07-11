<?php 

	include 'connection.php';
	session_start();
	$admin_id = $_SESSION['admin_name'];

	if (!isset($admin_id)) {
		header('location:login.php');
	}

	if (isset($_POST['logout'])) {
		session_destroy();
		header('location:login.php');	
	}
	

	//delete products from database
	if (isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
		$message[]='Porudžba izbrisana';
		header('location:admin_order.php');
	}

	//updateing payment status

	if (isset($_POST['update_order'])) {
		$order_id = $_POST['order_id'];
		$update_payment = $_POST['update_payment'];

		mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id='$order_id'") or die('query failed');

	}
	
?>
<style type="text/css">
	<?php 
		include 'style.css';

	?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--box icon link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="icons8-honey-spoon-48.png" type="image/x-icon">
    <link rel="stylesheet" href="novi.css">
	<title>Admin(narudžbe)- online sistem za trgovinu organskom hranom</title>
</head>
<body>
	<?php include 'admin_header.php'; ?>
	<?php 
		if (isset($message)) {
			foreach ($message as $message) {
				echo '
					<div class="message">
						<span>'.$message.'</span>
						<i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
					</div>

				';
			}
		}
	?>
	<div class="line4"></div>
	<section class="order-container">
		<h1 class="title">Ukupno poslatih narudžbi</h1>
		<div class="box-container">
			<?php 
				$select_orders = mysqli_query($conn,"SELECT * FROM `orders`") or die('query failed');
				if (mysqli_num_rows($select_orders)>0) {
					while($fetch_orders = mysqli_fetch_assoc($select_orders)){


			?>
			<div class="box">
				<p>Korisničko ime: <span><?php echo $fetch_orders['name']; ?></span></p>
				<p>Id korisnika: <span><?php echo $fetch_orders['user_id']; ?></span></p>
				<p>Datum: <span><?php echo $fetch_orders['placed_on']; ?></span></p>
				<p>Broj telefona : <span><?php echo $fetch_orders['number']; ?></span></p>
				<p>email : <span><?php echo $fetch_orders['email']; ?></span></p>
				<p>Ukupna cijena : <span><?php echo $fetch_orders['total_price']; ?> KM</span></p>
				<p>Način plaćanja : <span><?php echo $fetch_orders['method']; ?></span></p>
				<p>Adresa: <span><?php echo $fetch_orders['address']; ?></span></p>
				<p>Proizvodi i količina: <span><?php echo $fetch_orders['total_products']; ?></span></p>
				<form method="post">
					<input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
					<select name="update_payment">
						<option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
						<option value="na čekanju">na čekanju</option>
						<option value="završeno">završeno</option>
					</select>
					<input type="submit" name="update_order" value="Izmjeni plaćanje" class="btn">
					<a href="admin_order.php?delete=<?php echo $fetch_orders['id']; ?>;" onclick="return confirm('Izbriši narudžbu ?');" class="delete">Izbriši</a>
				</form>
				
			</div>
			<?php 
					}
				}else{
						echo '
							<div class="empty">
								<p>Nema poslatih narudžbi još !</p>
							</div>
						';
				}		
			?>
		</div>
	</section>
	<div class="line"></div>
	<script type="text/javascript" src="script.js"></script>
	
</body>
</html>