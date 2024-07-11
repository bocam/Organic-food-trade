<?php
	include 'connection.php';
$conn = mysqli_connect('localhost','root','','shop_db') or die('connection failed');





if (isset($_POST['submit-btn'])) {
		$filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$name = mysqli_real_escape_string($conn, $filter_name);

		$filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$email = mysqli_real_escape_string($conn, $filter_email);

		$filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$password = mysqli_real_escape_string($conn, $filter_password);

		$filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
		$cpassword = mysqli_real_escape_string($conn, $filter_cpassword);








		$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

		if (mysqli_num_rows($select_user)>0) {
			$message[] = 'KORISNIK SA OVAKVIM EMAIL-OM VEĆ POSTOJI';
		}else{
			if ($password != $cpassword) {
				$message[] = 'ŠIFRE SE NE PODUDARAJU,UKUCAJTE PONOVO !!';
			}else{
				mysqli_query($conn, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')") or die('query failed');
				$message[] = 'USPJEŠNA REGISTRACIJA !!!';


                $query = "SELECT * FROM users ORDER BY id";
                $result = mysqli_query($conn, $query);

// Ako ima korisnika u bazi
                if (mysqli_num_rows($result) > 0) {
                    $id = 1; // Početni ID
// Iteriraj kroz svakog korisnika
                    while ($row = mysqli_fetch_assoc($result)) {
                        $userId = $row['id'];
                        // Ažuriraj ID korisnika
                        $updateQuery = "UPDATE users SET id = '$id' WHERE id = '$userId'";
                        mysqli_query($conn, $updateQuery);
                        $id++;
                    }
                }

                echo "<script>
						alert('USPJEŠNO STE SE PRIJAVILI,MOŽETE IĆI NA PRIJAVU !');
						window.location.href = 'login.php';
					  </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--box icon link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icons8-honey-spoon-48.png" type="image/x-icon">
	<title>Registracija-online sistem za trgovinu organskom hranom</title>
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
			<h1>Registracija</h1>
			<input type="text" name="name" placeholder="Unesite korisničko ime" required>
			<input type="email" name="email" placeholder="Unesite email" required>
			<input type="password" name="password" placeholder="Unesite šifru" required>
			<input type="password" name="cpassword" placeholder="Potvrdite šifru" required>
			<input type="submit" name="submit-btn" value="Registruj se" class="btn">
			<p>Imate korisnički nalog ? <a href="login.php">PRIJAVITE SE</a></p>
		</form>
	</section>
</body>
</html>