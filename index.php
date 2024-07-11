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
    //adding product in wishlist
    if (isset($_POST['add_to_wishlist'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];

    	$wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	if (mysqli_num_rows($wishlist_number)>0) {
    		$message[]='Proizvod već dodat na listu želja';
    	}else if (mysqli_num_rows($cart_num)>0) {
    		$message[]='Proizvod je već dodat u korpu';
    	}else{
    		mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image')");
    		$message[]='Proizvod je uspješno dodat na listu želja';
    	}
    }

     //adding product in cart
    if (isset($_POST['add_to_cart'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];
    	$product_quantity = $_POST['product_quantity'];

    	$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	if (mysqli_num_rows($cart_num)>0) {
    		$message[]='Proizvod je već dodat u korpu';
    	}else{
    		mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
    		$message[]='Proizvod uspješno dodat u korpu';
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
    <!------------------------bootstrap css link------------------------------->
    <!------------------------slick slider link------------------------------->
    <link rel="stylesheet" type="text/css" href="slick.css" />
    <!------------------------default css link------------------------------->
    <link rel="stylesheet" href="main.css">

    <link rel="icon" href="icons8-honey-spoon-48.png" type="image/x-icon">
    <link rel="stylesheet" href="novi.css">

    <title>Početna stranica-online sistem za trgovinu organskom hranom</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <!------------------------hero img container------------------------------->

    <div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="img/slider.jpg" alt="..." >
                <div class="slider-caption">
                    <span>OKUSI KVALITET</span>
                    <h1>Organska krema <br>sa manuka medom</h1>
                    <p>Aktivno usporava starenje zbog svog sastava od pčelinjeg <br> voska
                     i manuka meda.Vaša koža izgledaće svjetlije,čvršće i vidno mlađe.   </p>
                    <a href="shop.php" class="btn">PORUČI ODMAH</a>
                </div>
            </div>
            <div class="slider-item">
                <img src="img/slider2.png" alt="...">
                <div class="slider-caption">
                    <span>OKUSI KVALITET</span>
                    <h1>Bagremov <br> med</h1>
                    <p>Ono što ga čini posebnim su njegova jedinstvena svojstva -
                         <br> bogat je antioksidansima koji jačaju imunitet i doprinosi opštem osećaju blagostanja.
                      </p>
                    <a href="shop.php" class="btn">PORUČI ODMAH</a>
                </div>
            </div>
        </div>
        <div class="control">
            <i class="bi bi-chevron-left prev"></i>
            <i class="bi bi-chevron-right next"></i>
        </div>
    </div>
    <div class="line"></div>
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
    <div class="line2"></div>
    <div class="story">
    	<div class="row">
    		<div class="box">
    			<span>NAŠA PRIČA</span>
    			<h1>Proizvodi od prirodnog meda i razni drugi organski proizvodi </h1>
    			<p>Naša kolekcija proizvoda od prirodnog meda i organskih sastojaka donosi spoj
                    tradicije i kvalitete. Svaki proizvod je pažljivo izrađen s ciljem da pruži
                    autentičan i zdravstveno koristan doživljaj,
                    podržavajući vašu dobrobit i prirodni način života.
                    Uz raznolike proizvode poput meda, propolisa, i drugih organskih proizvoda,
                    nudimo vam jedinstvenu priliku da se prepustite čarima prirode u svakom
                    gutljaju ili dodiru.</p>
                <a href="shop.php" class="btn">PORUČI ODMAH</a>
    		</div>
    		<div class="box">
    			<img src="img/8.png">
    		</div>
    	</div>
    </div>
    <div class="line3"></div>

    </br></br></br></br> </br></br></br></br>
    <!-- testimonial -->
    <div class="line4"></div>
    <div class="testimonial-fluid">
    	<h1 class="title">Šta kažu naši kupci</h1>
    	<div class="testimonial-slider">
    		<div class="testimonial-item">
    			<img src="img/3.jpg">
    			<div class="testimonial-caption">
    				<span>Testirajte kvalitet</span>
    				<h1>Bagremov med</h1>
    				<p>Mogu reći da imam jako pozitivna iskustva u vezi sa bagremovim medom koji kupujm online<br>
    				preko prodavnice organske hrane.Povoljna cijena,visok kvalitet i brza isporuka</p>

    			</div>
    		</div>
    		<div class="testimonial-item">
    			<img src="img/4.jpg">
    			<div class="testimonial-caption">
    				<span>Testirajte kvalitet</span>
    				<h1>Organska krema sa manuka medom</h1>
    				<p>Već duži vremenski period koristim kremu sa manuka medom.U najmanju ruku <br>
    				moja koža reaguje pozitivno, ali i osjetima razne druge benefite na mojoj koži.</p>
    			</div>
    		</div>
    		<div class="testimonial-item">
    			<img src="img/profile.jpg">
    			<div class="testimonial-caption">
    				<span>Testirajte kvalitet</span>
    				<h1>Livadski med</h1>
    				<p>Probao sam mnogo vrsta medova,ali zauvijek se vraćam livadskom medu kupljenom kod ovih ljudi.
                        <br>Čitava porodica uživa u prelijepom ukusu ovoga meda,kao što moramo reći i da mu je  kvalitet na zavidnom nivou.

    				</p>
    			</div>
    		</div>
    	</div>
    	 <div class="control">
            <i class="bi bi-chevron-left prev1"></i>
            <i class="bi bi-chevron-right next1"></i>
        </div>
    </div>
    <div class="line"></div>
    <!---discover section --->



    <?php include 'homeshop.php'; ?>


    </br></br></br></br> </br></br></br></br>

    <?php include 'footer.php'; ?>
    <script src="jquary.js"></script>
    <script src="slick.js"></script>

    <script type="text/javascript">
        <?php include 'script2.js' ?>
    </script>
</body>

</html>