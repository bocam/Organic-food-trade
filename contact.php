<?php 
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
        header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: login.php");
    }
    if (isset($_POST['submit-btn'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name= '$name' AND email='$email' AND $number = '$number' AND message= '$message'") or die('query failed');
        if (mysqli_num_rows($select_message)>0) {
            echo 'Poruka već poslata';
        }else{
            mysqli_query($conn, "INSERT INTO `message`(`user_id`,`name`,`email`,`number`,`message`) VALUES('$user_id','$name','$email','$number','$message')") or die('query failed');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------------------------bootstrap icon link------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="novi.css">
    <link rel="icon" href="icons8-honey-spoon-48.png" type="image/x-icon">
    <title>Kontakt-online sistem za trgovinu organskom hranom</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Kontakt</h1>
            <p>Ovdje imate mogućnost ostavljanja poruke </p>
            <a href="index.php">Početna </a><span>/ Kontakt</span>
        </div>
    </div>
    <div class="line"></div>
    <!-----------------------about us------------------------>
    <div class="services">
        <div class="row">
            <div class="box">
                <img src="img/0.png">
                <div>
                    <h1>Besplatna brza isporuka</h1>
                    <p>Uživajte u besplatnoj i brzoj isporuci vaše omiljene robe u udobnosti svog doma!</p>
                </div>
            </div>
            <div class="box">
                <img src="img/1.png">
                <div>
                    <h1>Garancija povrata novca</h1>
                    <p>Sva kupovina je bez rizika zahvaljujući našoj garanciji povrata novca,
                        pružajući vam potpunu sigurnost i zadovoljstvo.</p>
                </div>
            </div>
            <div class="box">
                <img src="img/2.png">
                <div>
                    <h1>Online podrška 24/7</h1>
                    <p>Naša online podrška pruža vam neprekidnu pomoć i stručne savjete kako
                        biste uživali u bezbrižnoj kupovini.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line4"></div>
    <div class="form-container">
        <h1 class="title">ostavite poruku</h1>
        <form method="post">
            <div class="input-field">
                <label>Ime</label><br>
                <input type="text" name="name">
            </div>
            <div class="input-field">
                <label>Email</label><br>
                <input type="text" name="email">
            </div>
            <div class="input-field">
                <label>Broj</label><br>
                <input type="tel" name="number">
            </div>
            <div class="input-field">
                <label>Poruka</label><br>
                <textarea name="message"></textarea>
            </div>
            <button type="submit" name="submit-btn">POŠALJI PORUKU</button>
        </form>
    </div>
    <div class="line"></div>
    <div class="line2"></div>
    <div class="address">
        <h1 class="title">NAŠ KONTAKT</h1>
        <div class="row">
            <div class="box">
                <i class="bi bi-map-fill"></i>
                <div>
                        <h4>adresa</h4>
                    <p>srpskih ratnika 22,Istočno Sarajevo,BiH  <br></p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-telephone-fill"></i>
                <div>
                    <h4>Broj telefona</h4>
                    <p>057/227-022</p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h4>email</h4>
                    <p>organskahrana@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>