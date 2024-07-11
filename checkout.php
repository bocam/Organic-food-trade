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
    if (isset($_POST['order_btn'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, $_POST['street'].','.$_POST['city'].'  '.$_POST['pin'].','.$_POST['country']);
        $placed_on = date('d-M-Y');
        $cart_total=0;
        $cart_product[]='';
        $cart_query=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

        if (mysqli_num_rows($cart_query)>0) {
            while($cart_item=mysqli_fetch_assoc($cart_query)){
                $cart_product[]=$cart_item['name'].' ('.$cart_item['quantity'].')';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total+=$sub_total;

            }
        }
        $total_product = implode($cart_product);
        mysqli_query($conn, "INSERT INTO `orders`(`user_id`,`name`,`number`,`email`,`method`,`address`,`total_products`,`total_price`,`placed_on`) VALUES('$user_id','$name','$number','$email','$method','$address','$total_product','$cart_total','$placed_on')");
        mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'");
        $message[]='order placed successfully';
        header('location:checkout.php');
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
    <link rel="icon" href="icons8-honey-spoon-48.png" type="image/x-icon">
    <link rel="stylesheet" href="novi.css">
    <title>Narudžba-online sistem za trgovinu organskom hranom</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>Narudžba</h1>
            <p></p>
            <a href="index.php">početna</a><span>/ narudžba</span>
        </div>
    </div>
    <div class="line"></div>
    <div class="checkout-form">
        <h1 class="title">PLAĆANJE</h1>
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
        <div class="display-order">
            <div class="box-container">
            <?php
                $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
                $total=0;
                $grand_total=0;
                if (mysqli_num_rows($select_cart)>0) {
                    while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                        $total_price=($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total=$total+=$total_price;
                    
                ?>
                
                    <div class="box">
                        <img src="image/<?php echo $fetch_cart['image'];?>">
                        <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    </div>
                
                <?php 
                        }
                    }
                ?>
            </div>
            <span class="grand-total">UKUPNO : <?= $grand_total; ?> KM</span>
        </div>
        <form method="post">
            <div class="input-field">
                <label>Ime</label>
                <input type="text" name="name" placeholder="unesite vaše ime">
            </div>

            <div class="input-field">
                <label>Email</label>
                <input type="text" name="email" placeholder="unesite vaš email">
            </div>
            <div class="input-field">
                <label>Telefon</label>
                <input type="tel" name="number" placeholder="unesite vaš telefon">
            </div>


            <div class="input-field">
                <label>Način plaćanja</label>
                <select name="method">
                    <option selected disabled>način plaćanja</option>
                    <option value="gotovina na isporuci">gotovina na isporuci</option>
                    <option value="kreditna kartica">kreditna kartica</option>
                    <option value="paypal">paypal</option>
                </select>
            </div>
            <div class="input-field">
                <label>adresa</label>
                <input type="text" name="street" placeholder="unesite vašu adresu">
            </div>

            <div class="input-field">
                <label>Grad</label>
                <input type="text" name="city" placeholder="unesite vaš grad">
            </div>

            <div class="input-field">
                <label>država</label>
                <input type="text" name="country" placeholder="unesite vašu državu">
            </div>
            <div class="input-field">
                <label>poštanski broj</label>
                <input type="text" name="pin" placeholder="unesite vaš poštanski broj">
            </div>
            <input type="submit" name="order_btn" class="btn" value="poruči">
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>