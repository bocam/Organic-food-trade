<?php 

include 'connection.php';
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');
	session_start();

	if (isset($_POST['submit-btn'])) {
		

		$filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        //izbjeci specijalne karaktere u stringu
		$email = mysqli_real_escape_string($conn, $filter_email);

		$filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$password = mysqli_real_escape_string($conn, $filter_password);


		$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'AND password='$password'") or die('query failed');


		if (mysqli_num_rows($select_user)>0) {
            $row = mysqli_fetch_assoc($select_user);
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:admin_pannel.php');
            } else if ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('location:index.php');
            }
        }else{

				$message[] = 'POGREŠAN EMAIL ILI ŠIFRA ';
			}


	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--uvodjenje ikonice -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">

    <link rel="icon" href="icons8-honey-spoon-48.png" type="image/x-icon">

	<title>Prijava-Online sistem za trgovinu organskom hranom</title>

</head>
<body>
	
	
	<section class="form-container">
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
		<form method="post">
			<h1>PRIJAVA</h1>
			<div class="input-field">
				<label>Email</label><br>
				<input type="email" name="email" placeholder="Unesite email" required>
			</div>
			<div class="input-field">
				<label>Šifra</label><br>
				<input type="password" name="password" placeholder="Unesite šifru" required>
			</div>
			<input type="submit" name="submit-btn" value="Prijavi se " class="btn">
			<p>Nemate korisnički nalog ? <a href="register.php">REGISTRUJ SE</a></p>
		</form>
	</section>
</body>
</html>