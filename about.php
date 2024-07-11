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
    <title>O nama-online sistem za trgovinu organskom hranom</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>O nama</h1>
                  <p>
                      Posvećeni smo promovisanju zdravog i održivog načina života kroz ukusne veganske proizvode.
                  </p>
            <a href="index.php">Početna</a><span>/ O nama</span>
        </div>
    </div>
    <div class="line"></div>
    <!-----------------------about us------------------------>
    <div class="line2"></div>
    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                    <span>Naša online priča</span>
                    <h1>10 godina iskustva</h1>
                </div>
                <p>Naša firma već deset godina uspješno posluje na tržištu veganskih proizvoda,
                    nudeći širok asortiman kvalitetnih i ekološki prihvatljivih proizvoda.
                    Kroz naše online poslovanje, omogućavamo ljubiteljima veganske prehrane da lako
                    pronađu i naruče sve što im je potrebno za zdrav i održiv način života.
                    S ponosom ističemo našu predanost inovacijama i izvrsnoj usluzi koja nas izdvaja od konkurencije.</p>
            </div>
            <div class="img-box">
                <img src="img/about3.jpg">
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <!-----------------------features----------------------->
    <div class="line4"></div>
    <div class="features">
        <div class="title">
            <h1>Kompletna usluga za potrošača</h1>
            <span>Najbolje pogodnosti</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="img/icon2.png">
                <h4>24 X 7</h4>
                <p>ONLINE PODRŠKA 24/7</p>
            </div>
            <div class="box">
                <img src="img/icon1.png">
                <h4>Garancija povrata novca</h4>
                <p>100% SIGURNO PLAĆANJE</p>
            </div>
            <div class="box">
                <img src="img/icon0.png">
                <h4>Specijalna poklon kartica</h4>
                <p>UZMITE PERFEKTAN POKLON</p>
            </div>
            <div class="box">
                <img src="img/icon.png">
                <h4>Globalna isporuka</h4>
                <p>NA NARUDŽBE PREKO 99 KM</p>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <!-----------------------team section----------------------->
    <div class="line2"></div>
    <div class="team">
        <div class="title">
            <h1>Naš poslovni tim</h1>
            <span>vrhunski stručnjaci</span>
        </div>
        <div class="row">
            <div class="box">
                <div class="img-box">
                    <img src="img/team.jpg">
                </div>
                <div class="detail">
                    <span>Direktor</span>
                    <h4>Marko Marković</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>

                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="img/te.jpg">
                </div>
                <div class="detail">
                    <span>Šef sektora za finansije </span>
                    <h4>Anđela Anđelović</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>

                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="img/team1.jpg">
                </div>
                <div class="detail">
                    <span>Šef sektora za marketing</span>
                    <h4>Petar Petrović</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>

                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="img/team2.jpg">
                </div>
                <div class="detail">
                    <span>Šef sektora za korisničku podršku</span>
                    <h4>Milica Miličić</h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>

                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="img/team0.jpg">
                </div>
                <div class="detail">
                    <span>Šef  pravnog sektora</span>
                    <h4>Miloš Milošević </h4>
                    <div class="icons">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>

                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <div class="line4"></div>
    <div class="project">
        <div class="title">
            <h1> najbolji proizvodi dolaze u vaše domove</h1>
            <span>zahvaljući ovim ljudima</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="img/about1.jpg">
            </div>
            <div class="box">
                <img src="img/about2.jpg">
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="line2"></div>
    <div class="ideas">
        <div class="title">
            <h1>Mi i naši klijenti smo srećni što radimo sa našom kompanijom</h1>
            <span>Naše prednosti</span>
        </div>
        <div class="row">
            <div class="box">
                <i class="bi bi-stack"></i>
                <div class="detail">
                    <h2>Šta zapravo mi radimo</h2>
                    <p>
                        Bavimo se nabavkom najfinijih veganskih proizvoda,nekada i direktno kod naših  proizvođača i
                        postavljanjem na naš sajt.

                    </p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-grid-1x2-fill"></i>
                <div class="detail">
                    <h2>Istorija početaka</h2>
                    <p>
                        Još davne 2014. godine krenuli smo sa plasiranje proizvoda u malopraji kao i plasiranje
                        proizvoda  na naš veb sajt.
                    </p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-tropical-storm"></i>
                <div class="detail">
                    <h2>Naša vizija</h2>
                    <p>
                        Naša vizija je stalno unapređenje našeg cjelokupnog sistema,poboljšanje interakcije izmedju kupaca
                        i nas.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>