<?php
session_start();
function generate_csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
// Periksa apakah ada pesan alert dari pengalihan header sebelumnya
if (isset($_GET['alert'])) {
    // Ambil pesan alert dari parameter URL dan tampilkan sebagai pesan alert
    $alertMessage = $_GET['alert'];
    echo '<script>alert("' . $alertMessage . '");</script>';
}
include_once "m/miminMASTER/modul/koneksi.php";
include_once "m/miminMASTER/modul/fungsi_umum.php";
include_once "m/miminMASTER/modul/query_pengaturan.php";
if (!isset($_GET['halaman'])) {
    echo '
      <script>
        window.location.replace(' . $alamat_website . ');
      </script>
    ';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $isi1_judul_website; ?> | Slot Online Terpercaya | Bandar Togel Terbesar</title>
    <meta name="description" content="<?php echo $isi1_judul_website; ?> adalah situs judi slot online terpercaya. daftar judi online slot disini untuk main game slot terbaru, bandar slot 4d terlengkap & web 4d slot terbaik" />
    <meta name="keywords" content="<?php echo $isi1_judul_website; ?>, <?php echo $isi1_judul_website; ?> daftar, <?php echo $isi1_judul_website; ?> link, <?php echo $isi1_judul_website; ?> login, situs <?php echo $isi1_judul_website; ?>, link alternatif <?php echo $isi1_judul_website; ?>, slot <?php echo $isi1_judul_website; ?>, situs judi <?php echo $isi1_judul_website; ?>, agen <?php echo $isi1_judul_website; ?>, bandar <?php echo $isi1_judul_website; ?>" />
    <meta property="og:title" content="<?php echo $isi1_judul_website; ?> | Slot Online Terpercaya | Bandar Togel Terbesar" />
    <meta name="google-site-verification" content="QE1NdyO_3C15qPK5EhTUwURBa6QhXxi1PXsUHtq6I8g" />
    <meta name="google-site-verification" content="c7qBspdxUa3_uwoxMHismCHHcf3s2tbI5t4LiOO4FIk" />
    <meta name="google-site-verification" content="LzA_gMMTg3EWWC4GDoMv4JMqqIDv3uMD3ecGQ3nFVgk" />
    <meta name="google-site-verification" content="9oJWxxisQRSb2ChtF3TTse5E2HlYwrU-7MGAirgW9-Y" />
    <meta name="google-site-verification" content="q1ceXmbzZk0hSLMIaaS0uVH_03TT0lhfUgImwq78oo0" />
    <meta name="google-site-verification" content="NK19qRAWkPlBhVQapENmELhTcD93VsF1_tIM-6DeE58" />
    <meta name="google-site-verification" content="XvQ_TE_23hEgnFDhaRFJ0WOrVMhkWlDEm0tmNCXaD74" />
    <meta name="google-site-verification" content="HfYf75AOmfEQjlwn9dOV4FrqdpMSsEHCFzxJLc2YgwQ" />
    <meta name="google-site-verification" content="ic93ne2ujM9YA-5Fgc1ORwGhiumTK06fsObLEiLAygQ" />
    <meta name="google-site-verification" content="p5c8Wq9jOnqU_FwqGzMhkSxttT404DZVbHWfcLENeLQ" />
    <meta name="google-site-verification" content="RNf1e8gTd7PxHPwebgDmCciSRo3-ogVZ9xDOOvhgmGI" />
    <meta name="google-site-verification" content="fvSphR_EPIJlflETqhTK1qD0Uu7tCTfXhjBsjRwzTi8" />
    <meta property="og:image" content="https://i1.wp.com/159.223.53.159/assets/images/slider/minimal-deposit-<?php echo $isi1_judul_website; ?>.webp" />
    <meta property="og:url" content="https://<?php echo $isi1_judul_website; ?>imba.com/" />
    <meta property="og:description" content="<?php echo $isi1_judul_website; ?> adalah situs judi slot online terpercaya. daftar judi online slot disini untuk main game slot terbaru, bandar slot 4d terlengkap & web 4d slot terbaik" />
    <link rel="canonical" href="https://<?php echo $isi1_judul_website; ?>imba.com/" />
    <meta property="og:type" content="website" />
    <meta content="utf-8" http-equiv="encoding" />
    <meta name="robots" content="INDEX, FOLLOW" />
    <meta name="googlebot" content="index,follow">
    <meta content="1 days" name="revisit-after">
    <meta content="general" name="rating">
    <meta content="id" name="geo.country">
    <meta content="Indonesia" name="geo.placename">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2HCLK6BZFZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2HCLK6BZFZ');
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--<link rel="stylesheet" href="<?php echo $alamat_website; ?>css/template/BW.css">-->
    <link rel="stylesheet" href="css/template/BW.css">

    <link rel="stylesheet" href="css/variable.css">

    <link rel="stylesheet" href="css/light.css?35644">

    <link rel="stylesheet" href="css/style.css?345435">


    <link rel="icon" type="image/png" href="favicon.png">


    <script src="js/jquery-3.6.4.min.js"></script>

    <style>
        .login-input-field {
            font-size: 1rem;
        }


        @media only screen and (max-width: 1000px) {
            .login-input-field {
                font-size: 1.2rem;
            }
        }
    </style>






</head>

<body id="desktop">


    <div id="hover" class="hover desktop-only">

        <div id="hover-togel" class="hover-menu">
            <a href="content-register.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/togel-pay4d.png" alt="PAY4D"></figure>
                <figcaption>PAY4D</figcaption>
            </a>
        </div>

        <div id="hover-slot" class="hover-menu">
            <a href="content-pp.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-prag.png" alt="PRAGMATIC PLAY"></figure>
                <figcaption>PRAGMATIC PLAY</figcaption>
            </a>

            <a href="content-pg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-pg.png" alt="PG SOFT"></figure>
                <figcaption>PG SOFT</figcaption>
            </a>

            <a href="content-hb.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-hab.png" alt="HABANERO"></figure>
                <figcaption>HABANERO</figcaption>
            </a>

            <a href="content-jg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-jok.png" alt="JOKER"></figure>
                <figcaption>JOKER</figcaption>
            </a>

            <a href="content-sg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-spad.png" alt="SPADEGAMING"></figure>
                <figcaption>SPADEGAMING</figcaption>
            </a>

            <a href="content-jl.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-jl.png" alt="JILI"></figure>
                <figcaption>JILI</figcaption>
            </a>

            <a href="content-fs.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-fs.png" alt="FASTSPIN"></figure>
                <figcaption>FASTSPIN</figcaption>
            </a>

            <a href="content-ps.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-ps.png" alt="PLAYSTAR"></figure>
                <figcaption>PLAYSTAR</figcaption>
            </a>

            <a href="content-cq9.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-cq9.png" alt="CQ9"></figure>
                <figcaption>CQ9</figcaption>
            </a>

            <a href="content-mg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-mg.png" alt="MICROGAMING"></figure>
                <figcaption>MICRO GAMING</figcaption>
            </a>

            <a href="content-ttg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-ttg.png" alt="TOPTREND GAMING"></figure>
                <figcaption>TOPTREND GAMING</figcaption>
            </a>
        </div>

        <div id="hover-live" class="hover-menu">
            <a href="content-pplc.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-pp.png" alt="PRAGMATIC PLAY"></figure>
                <figcaption>PRAGMATIC PLAY</figcaption>
            </a>
            <a href="content-ion.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-ion.png" alt="ION CASINO"></figure>
                <figcaption>ION CASINO</figcaption>
            </a>
            <a href="content-evo.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-evo.png" alt="EVOLUTION"></figure>
                <figcaption>EVOLUTION</figcaption>
            </a>
            <a href="content-sx.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-sg.png" alt="SEXY GAMING"></figure>
                <figcaption>SEXY GAMING</figcaption>
            </a>
            <a href="content-ab.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-all.png" alt="ALLBET"></figure>
                <figcaption>ALLBET</figcaption>
            </a>
            <a href="content-jl.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-sagaming.png" alt="SA GAMING"></figure>
                <figcaption>SA GAMING</figcaption>
            </a>
            <a href="content-mg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-mg.png" alt="MICRO GAMING"></figure>
                <figcaption>MICRO GAMING</figcaption>
            </a>
            <a href="content-og.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-opus.png" alt="OPUS PLUS"></figure>
                <figcaption>OPUS PLUS</figcaption>
            </a>
            <a href="content-sbol.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-sbo.png" alt="SBOBET CASINO"></figure>
                <figcaption>SBOBET CASINO</figcaption>
            </a>
        </div>

        <div id="hover-sport" class="hover-menu">
            <a href="content-register.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/sport-saba.png" alt="SABA"></figure>
                <figcaption>SABA</figcaption>
            </a>

            <a href="content-register.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/sport-sbo.png" alt="SBOBET"></figure>
                <figcaption>SBOBET</figcaption>
            </a>

            <a href="content-register.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/sport-tf.png" alt="TFGAMING"></figure>
                <figcaption>TFGAMING</figcaption>
            </a>
        </div>

        <div id="hover-fishing" class="hover-menu">
            <a href="content-sg.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-sg.png" alt="SPADE GAMING"></figure>
                <figcaption>SPADE GAMING</figcaption>
            </a>

            <a href="content-jl.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-jl.png" alt="JILI"></figure>
                <figcaption>JILI</figcaption>
            </a>

            <a href="content-fs.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-fs.png" alt="FASTSPIN"></figure>
                <figcaption>FASTSPIN</figcaption>
            </a>

            <a href="content-ps.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-ps.png" alt="PLAYSTAR"></figure>
                <figcaption>PLAYSTAR</figcaption>
            </a>

        </div>

        <div id="hover-sabung" class="hover-menu">
            <a href="content-register.php" class="hover-item">
                <figure><img src="https://img.pay4d.info/sabung-ws.png" alt="WS168"></figure>
                <figcaption>WS168</figcaption>
            </a>
        </div>



    </div>
    <style>
        .my-navbar {
            height: 52px;
            padding: 0px;
            width: 100%;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.6) 100%), var(--primary-color);
            position: fixed;
            bottom: 0;
            color: white;
            z-index: 1100;
            display: flex;
            box-shadow: 0px -4px 3px rgba(0, 0, 0, 0.75);
        }

        .navbar-item {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .navbar-item-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: -16px
        }

        .navbar-item-content>i {
            font-size: 20px;
            line-height: 22px;
            color: white;
            padding-bottom: 4px;
        }

        .navbar-item-content>img {
            height: 36px;
            width: 36px;
        }

        .navbar-item-content>label {
            white-space: nowrap;
            margin-top: 4px;
            font-weight: bold;
            font-size: var(--text-size-default);
            color: white
        }
    </style>


    <div class="mobile-only">
        <div class="my-navbar">
            <a href="./" class="navbar-item" style="position: relative">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/beranda.png" />
                    <label>BERANDA</label>
                </div>
            </a>
            <div style="height: 36px; width: 3px; background: black; margin: auto"></div>
            <a href="m/promosi.php" class="navbar-item">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/promosi.png" />
                    <label>PROMOSI</label>
                </div>
            </a>
            <div style="height: 36px; width: 3px; background: black; margin: auto"></div>
            <a href="m/event.php" class="navbar-item">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/events.png" />
                    <label>EVENT</label>
                </div>
            </a>

            <div style="height: 36px; width: 3px; background: black; margin: auto"></div>
            <a href="https://wa.me/<?php echo $isi2_whatsapp; ?>" target="_blank" class="navbar-item">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/whatsapp.png" />
                    <label>WHATSAPP</label>
                </div>
            </a>

            <div style="height: 36px; width: 3px; background: black; margin: auto"></div>
            <a href="https://direct.lc.chat/8618684/" target="_blank" class="navbar-item">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/livechat.png" />
                    <label>LIVECHAT</label>
                </div>
            </a>

        </div>
    </div>
    <div id="top" class="wrapper">



        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 50%; background: var(--primary-background); color: white;">
            <div class="offcanvas-header py-3">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color: var(--menu-item-color); font-size: 1.2rem; font-weight: bold">Kontak Kami</h5>
                <button type="button" class="text-reset" style="background: transparent; border: none" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x" style="color: var(--text-color); font-size: 20px"></i></button>
            </div>
            <div class="offcanvas-body p-0">
                <div class="d-flex flex-column w-100 gap-1">

                    <div class="d-flex p-3 w-100 gap-3" style="background: linear-gradient(0deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.05) 100%), var(--secondary-background)">
                        <div class="fw-bold"><img src="https://img.pay4d.info/kontak/wa.png" width='20px'></div>
                        <div style="color: var(--text-color); font-size: 1.1rem">+<?php echo $isi2_whatsapp; ?></div>
                    </div>
                    <div class="d-flex p-3 w-100 gap-3" style="background: linear-gradient(0deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.05) 100%), var(--secondary-background)">
                        <div class="fw-bold"><img src="https://img.pay4d.info/kontak/line.png" width='20px'></div>
                        <div style="color: var(--text-color); font-size: 1.1rem"><?php echo $isi1_judul_website; ?></div>
                    </div>
                    <div class="d-flex p-3 w-100 gap-3" style="background: linear-gradient(0deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.05) 100%), var(--secondary-background)">
                        <div class="fw-bold"><img src="https://img.pay4d.info/kontak/wechat.png" width='20px'></div>
                        <div style="color: var(--text-color); font-size: 1.1rem"><?php echo $isi1_judul_website; ?></div>
                    </div>
                    <div class="d-flex p-3 w-100 gap-3" style="background: linear-gradient(0deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.05) 100%), var(--secondary-background)">
                        <div class="fw-bold"><img src="https://img.pay4d.info/kontak/telegram.png" width='20px'></div>
                        <div style="color: var(--text-color); font-size: 1.1rem"><?php echo $isi1_judul_website; ?>ofc</div>
                    </div>
                    <div class="d-flex p-3 w-100 gap-3" style="background: linear-gradient(0deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.05) 100%), var(--secondary-background)">
                        <div class="fw-bold"><img src="https://img.pay4d.info/kontak/fb.png" width='20px'></div>
                        <div style="color: var(--text-color); font-size: 1.1rem"><?php echo $isi1_judul_website; ?> Official</div>
                    </div>


                </div>

            </div>
        </div>

        <div class="mobile-only" style="position: relative; background: var(--primary-background);">
            <div class="appbar">
                <a href="./" style="width: auto"><img class="logoimg" src="images/logoweb.png" alt=""></a>

                <button style="position: absolute; right: 16px; background: transparent; border: none; width: auto; padding: 0px; height: 100%; margin: auto" class="mobile-only" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-person-lines-fill" style="color: var(--menu-item-color); font-size: 26px"></i>
                </button>
            </div>
        </div>
        <header class="header">
            <div class="header-content">
                <div class="logo" href="./">
                    <a href="./"><img src="images/logoweb.png?34537" class="logoimg" alt=""></a>
                </div>

                <div id="marquee-mobile" class="marquee mobile-only">
                    <div class="marquee-content">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-volume-down" style="padding: 0 4px; font-size: 24px"></i>
                        </div>
                        <div class="running">
                            <div class="marquee-shadow"></div>
                            <marquee behavior="scroll" direction="" id="broadcast" style="width: 100%">Hubungi Whatsapp / WA kami yang baru ya bossku untuk kendala <?php echo $isi2_whatsapp; ?></marquee>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                        </div>
                    </div>
                </div>

                <div class="mslider mobile-only">

                    <div id="mobile-slider" class="carousel slide pointer-event" data-bs-ride="carousel" style="height: 100%">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#mobile-slider" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#mobile-slider" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                            <button type="button" data-bs-target="#mobile-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner" style="height: 100%">
                            <div class="carousel-item" style="height: 100%">
                                <img src="images/upload-MobileSlides-20230424165334.jpg" class="d-block w-100 banner" alt="SELAMAT HARI RAYA" style="height: 100%">
                            </div>
                            <div class="carousel-item active" style="height: 100%">
                                <img src="images/upload-MobileSlides-20230424165409.gif" class="d-block w-100 banner" alt="" style="height: 100%">
                            </div>
                            <div class="carousel-item " style="height: 100%">
                                <img src="images/upload-MobileSlides-20230424165423.jpg" class="d-block w-100 banner" alt="" style="height: 100%">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="login">


                <div id="desktoplogin" class="desktop-only">

<form method="post" class="login-form form" role="form">
    <div id="msgbox" style="margin-right: 8px; color: #b29459; font-size: 1rem" class=""></div>
    <div class="input-group login-field">
        <span class="input-group-text prepend mobile-only ">
            <div class="h-100 center"><i class="bi bi-person-circle prepend-icon"></i></div>
        </span>
        <input type="text" name="user" class="form-control login-input-field username" placeholder="Nama Akun" aria-label="Username">
    </div>

    <div id="marquee" class="marquee mobile-only">
        <div class="marquee-content">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-megaphone-fill desktop-only"></i>
            </div>
            <div class="running">
                <div class="marquee-shadow"></div>
                <marquee behavior="" direction="" id="broadcast">Hubungi Whatsapp / WA kami yang baru ya bossku untuk kendala †<?php echo $isi2_whatsapp; ?></marquee>
            </div>
        </div>
    </div>


    <div class="input-group login-field">
        <span class="input-group-text mobile-only prepend">
            <div class="h-100 center"><i class="bi bi-shield-lock-fill prepend-icon"></i></div>
        </span>
        <input type="password" name="password" class="form-control login-input-field password" placeholder="Kata Sandi" aria-label="Password">
    </div>

    <div class="verifikasiform" style="display: flex; gap: 2px;">
        <span id="verifikasi"><img src="capimg.php?" width="40" height="30" style="border:1px #999 solid;"></span>
        <input type="text" class="form-control login-field" name="verifikasi" id="verform" style="width:40px;height: 30px !important" autocomplete="off">
    </div>
    <input type="hidden" name="verif" id="verifval" class="verifval" value="1">


    <button type="submit" name="submit" value="Masuk" class="btn btn-masuk fw-bold p-0 px-2 submit">Masuk</button>
    <button type="button" class="btn btn-daftar btn-daftar-desktop fw-bold p-0 px-2 desktop-only" onclick="window.location.href='content-register.php'">Daftar</button>



    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
</form>
</div>



                    <div id="mobilelogin" class="mobile-only" style="width: 100%">
                        <form method="post" class="login-form form" style="padding: 0px; padding-top: 32px" role="form">
                            <div id="msgbox" style="font-size: 1rem; width: 100%"></div>
                            <div class="input-group login-field">
                                <span class="input-group-text prepend mobile-only ">
                                    <div class="h-100 center"><i class="bi bi-person-circle prepend-icon"></i></div>
                                </span>
                                <input type="text" name="user" class="form-control login-input-field username" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="input-group login-field">
                                <span class="input-group-text mobile-only prepend">
                                    <div class="h-100 center"><i class="bi bi-shield-lock-fill prepend-icon"></i></div>
                                </span>
                                <input type="password" name="password" class="form-control login-input-field password" placeholder="Password" aria-label="Password">
                            </div>

                            <div class="verifikasiform w-100" style="display: flex; gap: 2px">


                                <span id="verifikasi"><img src="m/capimg.php?7460" width="40" height="40" style="border:1px #999 solid;"></span>

                                <input type="text" class="form-control login-field" name="verifikasi" id="verform" autocomplete="off">
                            </div>

                            <input type="hidden" name="verif" id="verifval" class="verifval" value="1">


                            <button type="submit" name="submit" value="Masuk" class="btn btn-masuk fw-bold p-0 px-2 submit">Masuk</button>
                            <button type="button" class="btn btn-daftar btn-info btn-daftar-mobile fw-bold p-0 px-2 mobile-only" onclick="openDaftar()">Daftar Sekarang</button>


                            <input type="hidden" name="task" value="login">
                            <input type="hidden" name="loginmobile" value="1GcZUteBMZHLRF9f4UOXuXs1UeWcApxXSjAjzRDC2fU=">
                        </form>
                    </div>


                    <div id="mobile-daftar-form" style="width: 100%; display: none">
                        <div id="mobileregister">
                            <form id="formRegister" class="login-form  p-0 pt-4">
                                <div id="statusRegister" style="margin-bottom: 5px; width: 100%"></div>
                                <div class="prepend" style="width: 100%; height: 36px; display: grid; place-items: center; border-radius: 3px; font-size: 1.2rem; font-weight: bold">REGISTER</div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-person-circle prepend-icon"></i></div>
                                    </span>
                                    <input type="text" class="form-control login-input-field" name="username" id="reg_username" placeholder="Username 6-16 karakter standar (A~Z, a~z, 0~9) dan tanpa spasi">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-shield-lock-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="password" class="form-control login-input-field" id="reg_pass" name="sandi1" placeholder="Password (6 karakter atau lebih)">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-shield-lock-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="password" class="form-control login-input-field" id="reg_passcon" name="sandi2" placeholder="Password sekali lagi">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-envelope-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="text" class="form-control login-input-field" id="reg_email" name="email" placeholder="Email">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-telephone-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="text" inputmode="numeric" class="form-control login-input-field" id="reg_telpon" name="hp" class="form-control" placeholder="Telpon">
                                </div>

                                <div class="input-group login-field">
                                    <select class="form-select login-input-field" name="bank" id="reg_bank">
                                        <option value="">Pilih Bank</option>
                                        <option value='BCA'>BCA</option>
                                        <option value='Mandiri'>Mandiri</option>
                                        <option value='BNI'>BNI</option>
                                        <option value='BRI'>BRI</option>
                                        <option value='CIMB'>CIMB</option>
                                        <option value='Danamon'>Danamon</option>
                                        <option value='Permata'>Permata</option>
                                        <option value='BJB'>BJB</option>
                                        <option value='PANIN'>PANIN</option>
                                        <option value='OCBC'>OCBC</option>
                                        <option value='SUMUT'>SUMUT</option>
                                        <option value='BSI'>BSI</option>
                                        <option value='NEO'>NEO</option>
                                        <option value='JAGO'>JAGO</option>
                                        <option value='Jenius'>Jenius</option>
                                        <option value='DANA'>DANA</option>
                                        <option value='OVO'>OVO</option>
                                        <option value='ShopeePay'>ShopeePay</option>
                                        <option value='GOPAY'>GOPAY</option>
                                        <option value='LinkAja'>LinkAja</option>
                                        <option value='Lain-lain'>Lain-lain</option>
                                    </select>
                                </div>

                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend" style="">
                                        <div class="h-100 center"><i class="bi bi-piggy-bank-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="text" class="form-control login-input-field" name="rek" id="reg_rek" placeholder="No Rekening">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-person-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="text" class="form-control login-input-field" name="name" id="reg_nama" placeholder="Nama Rekening">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-file-earmark-person-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="text" class="form-control login-input-field" name="ref" type="text" id="reg_ref" placeholder="Username Referal bila ada">
                                </div>
                                <!-- <input type="text" class="form-control" placeholder="Nama Akun" aria-label="Nama Akun">
                                            <input type="password" class="form-control" placeholder="Kata Sandi" aria-label="Kata Sandi"> -->


                                <button type="submit" class="btn btn-masuk fw-bold p-0 px-2" value="Register" id="buttonRegister">Register</button>
                                <input type="hidden" name="task" value="register">
                                <input type="hidden" name="regmobile" value="eZvmNgMtcgMBqzdBYJ/gUkCwGE6YV+W3s9dbM9MprZc=">
                                <button type="button" class="btn btn-secondary fw-bold p-0 px-2" value="Close" onClick="closeDaftar()" id="buttonClose">Close</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class="menu-item desktop-only">
                        <label><a href="./"><i class="bi bi-house-door-fill"></i></a></label>
                    </div>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="content-register.php" class="menu-item" onmouseover="showProducts('hover-togel')" onmouseout="hideProducts('hover-togel')">
                        <img class="mobile-only" src="assets/togel.png" alt="">
                        <label>TOGEL</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="content-slot.php" class="menu-item" onmouseover="showProducts('hover-slot')" onmouseout="hideProducts('hover-slot')">
                        <img class="mobile-only" src="assets/slot.png" alt="">
                        <label>SLOT</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="content-casino.php" class="menu-item" onmouseover="showProducts('hover-live')" onmouseout="hideProducts('hover-live')">
                        <img class="mobile-only" src="assets/live.png" alt="">
                        <label>LIVE CASINO</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="content-sport.php" class="menu-item" onmouseover="showProducts('hover-sport')" onmouseout="hideProducts('hover-sport')">
                        <img class="mobile-only" src="assets/sport.png" alt="">
                        <label>SPORT</label>
                    </a>
                    <!--<span class="desktop-only" style="color: var(--menu-item-color)">|</span>-->
                    <!--<a href="content-register.php" class="menu-item" onmouseover="showProducts('hover-esport')" onmouseout="hideProducts('hover-esport')">-->
                    <!--    <img class="mobile-only" src="assets/esport.png" alt="">-->
                    <!--    <label>E-SPORT</label>-->
                    <!--</a>-->
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="content-fish.php" class="menu-item" onmouseover="showProducts('hover-fishing')" onmouseout="hideProducts('hover-fishing')">
                        <img class="mobile-only" src="assets/fishing.png" alt="">
                        <label>ARCADE</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="content-sabung.php" class="menu-item" onmouseover="showProducts('hover-sabung')" onmouseout="hideProducts('hover-sabung')">
                        <img class="mobile-only" src="assets/sabung.png" alt="">
                        <label>SABUNG</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                </div>


                <div class="menu-mobile mobile-only" style="width: 100%; overflow-x: hidden; position: relative; border-top: 3px solid var(--primary-color); border-bottom: 3px solid var(--theme-color)">


                    <div style="position: absolute; height: 100%; background: var(--primary-color); display: grid; place-items: center; left: 0; padding: 0px 6px" onclick="document.getElementById('menu-mobile').scrollBy(-40, 0)">
                        <i class="bi bi-caret-left-fill" style="font-size: 16px; color: var(--marquee-color)"></i>
                    </div>

                    <div style="position: absolute; height: 100%; background:  var(--primary-color); display: grid; place-items: center; right: 0; padding: 0px 6px;" onclick="document.getElementById('menu-mobile').scrollBy(40, 0)">
                        <i class="bi bi-caret-right-fill" style="font-size: 16px; color: var(--marquee-color)"></i>
                    </div>


                    <div id="menu-mobile" style="height:68px; overflow-x: scroll; overflow-y: hidden; max-width: 100%; display: block; margin-left: 28px; margin-right: 28px; background: linear-gradient(90deg, rgba(26,26,26,0.3) 0%, rgba(0,0,0,0.3) 10%, rgba(0,0,0,0.3) 100%), var(--primary-color)">


                        <div style="white-space: nowrap; height: 100%; font-size: 0px">
                            <a href="#togel-mobile" style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-togel.png" alt="">
                                        <label>TOGEL</label>
                                    </div>
                                </div>
                            </a>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProviderSlot('slot')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-slot.png" alt="">
                                        <label>SLOT</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProviderLiveCasino('casino')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-live.png" alt="">
                                        <label>LIVE CASINO</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProvidersport('sport')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-sport.png" alt="">
                                        <label>SPORT</label>
                                    </div>
                                </div>
                            </div>
                            <!--<div style="height: 100%; width: 92px; display: inline-block;">-->
                            <!--    <div style="display: grid; place-items: center; height: 100%">-->
                            <!--        <div class="menu-item" onclick="showProvider('esport')">-->
                            <!--            <img class="mobile-only" src="https://img.pay4d.info/icon-esport.png" alt="">-->
                            <!--            <label>E-SPORT</label>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProviderarcade('fish')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-fishing.png" alt="">
                                        <label>ARCADE</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProvidersabung('sabung')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-sabung.png" alt="">
                                        <label>SABUNG</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-content mobile-only">
                    <div id="main-content" style="background: var(--content-box-background)">
                    </div>
                </div>

                <div class="promosi">

                    <!-- Desktop -->

                    <button class="btn-promosi fw-bold desktop-only" onclick="window.location.href='content-promosi.php'" style="border: none; font-size: 1.1rem; padding: 0px 8px;">PROMOSI</button>
                    <div class="btn-informasi desktop-only" onclick="document.getElementById('modal-wrapper').style.display='block'"><a class="pointer" href="javascript:page('tentang');" style="text-decoration: none;" data-toggle="tooltip" data-placement="bottom" title="Informasi"><i class="bi bi-info-circle-fill" style="font-size: 16px"></i></a></div>

                    <!-- Mobile -->

                    <div class="mobile-only" style="padding-top: 32px">

                        <div class="d-flex gap-3 justify-content-center align-items-center">
                            <a href="<?php echo $alamat_website; ?>?desktop" style="display: grid; place-items: center; font-size: 1.2rem; cursor: pointer; color: var(--menu-item-color)">Desktop</a>
                            <div style="height: 1.1rem; width: 1.5px; background: var(--menu-item-color)"></div>

                            <a href="<?php echo $alamat_website; ?>wap" style="display: grid; place-items: center; font-size: 1.2rem; cursor: pointer; color: var(--menu-item-color)">Wap</a>
                        </div>
                        <div class="login-form mobile-only" style="padding: 0px; padding-top: 32px">
                            <a href="<?php echo $alamat_website; ?>/<?php echo $isi1_judul_website; ?>imba.com/m/downloads/<?php echo $isi1_judul_website; ?>.apk" style="width: 60%"><img src="https://img.pay4d.info/download-apk.png" style="max-width: 100%" /></a>
                        </div>
                    </div>
                </div>

            </div>
        </header>



        <div id="marquee" class="marquee desktop-only">
            <div class="marquee-content">
                <div class="d-flex align-items-center gap-2">
                    <div id="waktu_sekarang" class="desktop-only" style="white-space: nowrap;"><?php echo jamTanggalIndonesia(date("Y-m-d H:i:s"), true); ?></div>
                    <i class="bi bi-megaphone-fill desktop-only"></i>
                </div>
                <div class="running" style="padding-left: 8px; padding-right: 32px">
                    <marquee behavior="" direction="" id="broadcast" onmouseover="this.stop();" onmouseout="this.start();" style="width: 100%">Hubungi Whatsapp / WA kami yang baru ya bossku untuk kendala <?php echo $isi2_whatsapp; ?></marquee>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="<?php echo $alamat_website; ?>content-event.php">
                        <img src="https://img.pay4d.info/btnevent.png" alt="EVENT" height="24px">
                    </a>
                </div>
            </div>
        </div>





        <div class="contentdata">
            <div id="content-primary" class="p-0">

                <div class="desktop-only">


                    <!-- KONTEN DESKTOP -->



                    <div class="content-body" style="position: relative">
                        <div class="content-area">
                            <div id="content" class="content-box">


                                <style>
                                    .panelbg h2 {
                                        color: #000;
                                    }
                                </style>
                                <div class="panel panelbg">
                                    <div class="desktop-only">
                                        <h3 class="pb-4">Slot</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div style="margin-top: 10px">

                                            <style>
                                                .slotarea {
                                                    height: 800px;
                                                    overflow: auto;
                                                    width: 100%;
                                                    display: grid;
                                                    grid-template-columns: repeat(5, 1fr);
                                                    gap-y: 25px;
                                                    margin-bottom: 40px;
                                                }

                                                .casinoarea {
                                                    overflow: auto;
                                                    width: 100%;
                                                    display: grid;
                                                    grid-template-columns: repeat(4, 1fr);
                                                    gap-y: 25px;
                                                    margin-bottom: 24px;
                                                }

                                                .five {
                                                    grid-template-columns: repeat(5, 1fr);
                                                }

                                                .gameitem {
                                                    padding: 20px;
                                                    padding-top: 0px;
                                                }

                                                .gameitem>img {
                                                    width: 100%;
                                                    max-width: 100%;
                                                    object-fit: contain;
                                                }

                                                .gameitem>figcaption {
                                                    overflow-wrap: break-word;
                                                }

                                                .casinoimg {
                                                    border-radius: 10px;
                                                    border: 1px solid #000;
                                                    box-shadow: rgba(0, 0, 0, .1) 0px 2px 5px 5px;
                                                }

                                                @media only screen and (max-width: 768px) {

                                                    .slotarea,
                                                    .casinoarea {
                                                        height: 100%;
                                                        grid-template-columns: repeat(3, 1fr) !important;
                                                    }

                                                    .gameitem {
                                                        padding: 6px;
                                                    }


                                                }
                                            </style>


                                            <h2 style="margin-bottom:30px"><img src="https://img.pay4d.info/pp.png" alt="" style="margin-top:-20px">Pragmatic Play</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bbextreme.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Bass Amazon Xtreme™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20hstgldngt.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Heist for the Golden Nuggets™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20procount.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wisdom of Athena™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20beefed.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fat Panda™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs9outlaw.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pirates Pub™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20jewelparty.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jewel Rush™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20lampinf.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lamp Of Infinity™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysfrbugs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Frogs &amp; Bugs™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs4096robber.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Robber Strike™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10fdrasbf.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Floating Dragon - Boat Festival™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20clustwild.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sticky Bees™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25spotz.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Knight Hot Spotz™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs15godsofwar.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Zeus vs Hades - Gods of War™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20excalibur.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Excalibur Unleashed™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20stickywild.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Bison Charge™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayseternity.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Diamonds of Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25holiday.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Holiday Ride</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20mvwild.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jasmine Dreams</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10kingofdth.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Kingdom of the Dead</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysultrcoin.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cowboy Coins</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20olympgate.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gates of Olympus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20starlight.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Starlight Princess</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20fruitsw.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sweet Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20sbxmas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sweet Bonanza Xmas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20gatotgates.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gates of Gatot Kaca</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20pbonanza.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pyramid Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20sugarrush.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sugar Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5aztecgems.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aztec Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20bonzgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bonanza Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayslions.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 Lions Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40wildwest.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild West Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20schristmas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Starlight Christmas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20candvil.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Candy Village</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysrhino.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Great Rhino Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayshammthor.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Power of Thor Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5joker.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Joker's Jewels</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20aztecgates.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gates of Aztec</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20porbs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Santa's Great Gifts</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20mochimon.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mochimon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs9aztecgemsdx.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aztec Gems Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243lions.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 Lions</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs7776aztec.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aztec Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20xmascarol.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Christmas Carol Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysmadame.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Madame Destiny Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20trsbox.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasure Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysbankbonz.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cash Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs9piggybank.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Piggy Bank Bills</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20tweethouse.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Tweety House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20daydead.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Day of Dead</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayswest.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mystic Chief</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10starpirate.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Star Pirates Code</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20bermuda.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">John Hunter and the Quest for Bermuda Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40bigjuan.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Juan</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20santawonder.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Santa's Wonderland</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bblpop.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bubble Pop</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bookfallen.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Book of Fallen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25btygold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bounty Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs88hockattack.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hockey Attack</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20amuleteg.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune of Giza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysbbb.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Bass Bonanza Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20superx.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Super X</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25tigeryear.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky New Year Tiger Treasures</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243empcaishen.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Emperor Caishen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayscryscav.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Crystal Caverns Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20smugcove.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Smugglers Cove</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs4096magician.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Magicians Secrets</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10runes.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gates of Valhalla</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysxjuicy.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Extra Juicy Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40wanderw.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Depths</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bxmasbnza.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Christmas Big Bass Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25goldparty.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gold Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayselements.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Elemental Gems Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20rockvegas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rock Vegas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20colcashzone.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Colossal Cash Zone</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25copsrobbers.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cash Patrol</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20ultim5.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Ultimate 5</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bookazteck.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Book of Aztec King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20bchprty.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Beach Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50mightra.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Might of Ra</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25bullfiesta.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bull Fiesta</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20rainbowg.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rainbow Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10snakeladd.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Snakes and Ladders Megadice</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20farmfest.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Barn Festival</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243discolady.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Disco Lady</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10tictac.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Tic Tac Take</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243queenie.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Queenie</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10chkchase.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Chicken Chase</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayswildwest.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild West Gold Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20mustanggld2.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Clover Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20drtgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Drill that Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10firestrike2.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Strike 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10spiritadv.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Spirit of Adventure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40cleoeye.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Eye of Cleopatra</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20gobnudge.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Goblin Heist Powernudge</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20stickysymbol.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Great Stick-Up</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayszombcarn.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Zombie Carnival</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40samurai3.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rise of Samurai III</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50northgard.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">North Guardians</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243koipond.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Koi Pond</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20cleocatra.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cleocatra</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40cosmiccash.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cosmic Cash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5littlegem.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Little Gem</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10egrich.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Queen of Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024mahjpanda.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mahjong Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25bomb.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bomb Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10txbigbass.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Bass Splash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5sh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shining Hot 5</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20sh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shining Hot 20</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40sh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shining Hot 40</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs100sh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shining Hot 100</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10coffee.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Coffee Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysjkrdrop.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Tropical Tiki</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243ckemp.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cheeky Emperor</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40hotburnx.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot to Burn Extreme</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10mmm.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Magic Money Maze</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20octobeer.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Octobeer Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024gmayhem.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gorilla Mayhem</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5firehot.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Hot 5</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20fh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Hot 20</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40firehot.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Hot 40</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs100firehot.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Hot 100</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20wolfie.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Greedy Wolf</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20underground.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Down The Rails</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysfltdrg.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Floating Dragon Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20wildman.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wildman Super Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysstrwild.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Candy Stars</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20trswild2.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Black Bull</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysbook.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Book of Golden Sands</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20muertos.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Muertos Multiplier Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10crownfire.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Crown of Fire</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10snakeeyes.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Snakes &amp; Ladders - Snake Eyes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayslofhero.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Legend of Heroes Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5strh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Striking Hot 5</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20mparty.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Hop &amp; Drop</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20swordofares.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sword of Ares</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysoldminer.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Old Gold Miner Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10tut.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">John Hunter &amp; the Book of Tut Respin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysfrywld.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Spin &amp; Score Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs12bbbxmas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bigger Bass Blizzard - Christmas Catch</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20asgard.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Kingdom of Asgard</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20kraken2.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Release the Kraken 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25kfruit.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aztec Blaze</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20theights.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Towering Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysconcoll.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Firebird Spirit - Connect &amp; Collect</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bbkir.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Bass Bonanza - Keeping it Reel</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20lcount.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gems of Serengeti</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20mtreasure.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pirate Golden Age</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20sparta.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shield Of Sparta</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysluckyfish.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Fishing Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysrabbits.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 Rabbits Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20drgbless.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Hero</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayspizza.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">PIZZA! PIZZA? PIZZA!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25rlbank.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Reel Banks</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20clspwrndg.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sweet Powernudge</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20ltng.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pinup Girls</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20dugems.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot Pepper</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysfuryodin.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fury of Odin Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayswwhex.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Wild Bananas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20mammoth.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mammoth Gold Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25spgldways.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Secret City Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10fisheye.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fish Eye</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20superlanche.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Monster Superlanche</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20gatotfury.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gatot Kaca's Fury</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25archer.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Archer</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs12tropicana.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Club Tropicana</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20doghousemh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Dog House Multihold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20pistols.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild West Duels</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysmorient.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mystery Of The Orient</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20goldclust.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rabbit Garden</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20framazon.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruits of the Amazon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20sknights.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Knight King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024moonsh.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Moonshot</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bbhas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Bass - Hold &amp; Spinner</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysredqueen.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Red Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysrsm.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Celebrity Bus Megaways™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysmonkey.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">3 Dancing Monkeys™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20hotzone.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">African Elephant™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10gizagods.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gods of Giza™</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10jnmntzma.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jane Hunter and the Mask of Montezuma</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10firestrike.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Strike</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs12bbb.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bigger Bass Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243chargebull.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Raging Bull</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10nudgeit.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rise of Giza PowerNudge</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25scarabqueen.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">John Hunter: Scarab Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayschilheat.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Chilli Heat Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10luckcharm.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Grace And Charm</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysaztecking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aztec King Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20chickdrop.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Chicken Drop</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20phoenixf.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Phoenix Forge</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20fparty2.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruit Party 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20emptybank.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Empty the Bank!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayslight.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Lightning</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25rio.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Heart of Rio</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5drhs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Hot Hold and Spin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20terrorv.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cash Elevator</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs576hokkwolf.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hokkaido Wolf</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayssamurai.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rise of Samurai Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20magicpot.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Magic Cauldron Enchanted Brew</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysyumyum.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Yum Yum Powerways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10amm.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Amazing Money Machine</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20fruitparty.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruit Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs15diamond.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Diamond Strike</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20vegasmagic.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Vegas Magic</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs7fire88.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire 88</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20doghouse.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Dog House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024temuj.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Temujin Treasures</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20rhino.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Great Rhino</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40pirgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pirate Gold Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25gldox.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Golden Ox</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25hotfiesta.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot Fiesta</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20wildboost.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Booster</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50juicyfr.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Juicy Fruits</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10madame.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Madame Destiny</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25pandatemple.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Panda Fortune 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10floatdrg.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Floating Dragon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysbufking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Buffalo King Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs9madmonkey.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Monkey Madness</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1dragon8.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">888 Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40pirate.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pirate Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25goldpig.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Golden Pig</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs18mashang.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasure Horse</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25wolfgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wolf Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/bjmb.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">American Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25newyear.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky New Year</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/bjma.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Multihand Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1tigers.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Triple Tigers</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25journey.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Journey to the West</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/cs5triple8gold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">888 Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25mustang.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mustang Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20eightdragons.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">8 Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25dragonkingdom.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Kingdom</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25chilli.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Chilli Heat</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25wildspells.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Spells</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25kingdoms.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">3 Kingdoms - Battle of Red Cliffs</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50pixie.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pixie Wings</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25asgard.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Asgard</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5trdragons.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Triple Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25peking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Peking Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/bca.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Baccarat</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25goldrush.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gold Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50kingkong.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mighty Kong</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs7pigs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">7 Piggies</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20leprexmas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Leprechaun Carol</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50aladdin.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">3 Genie Wishes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25dwarves_new.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dwarven Gold Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25vegas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Vegas Nights</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25safari.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot Safari</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/rla.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Roulette</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024butterfly.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jade Butterfly</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20godiva.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lady Godiva</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20santa.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Santa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10egyptcls.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ancient Egypt Classic</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50chinesecharms.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs15fairytale.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fairytale Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20bl.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Busy Bees</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/cs3w.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Diamonds are Forever 3 Lines</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50safariking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Safari King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs3train.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gold Train</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/cs3irishcharms.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Irish Charms</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs7monkeys.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">7 Monkeys</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs50hercules.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hercules Son of Zeus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25gladiator.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Gladiator</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10egypt.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ancient Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25queenofgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Queen of Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10fruity2.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Extra Juicy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20leprechaun.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Leprechaun Song</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25sea.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Great Reef</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/bnadvanced.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Bonus Baccarat</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20egypttrs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Egyptian Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/kna.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Keno</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243caishien.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Caishen Cash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20wildpix.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Pixie</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243lionsgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 Lions Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243mwarrior.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Monkey Warrior</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs7776secrets.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">John Hunter Aztec Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs9hotroll.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot Chilli</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20chicken.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Great Chicken Escape</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10vampwolf.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Vampires vs Wolves</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1fortunetree.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Tree of Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5spjoker.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Super Joker</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25davinci.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Da Vinci Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs9chen.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Master Chen Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25pandagold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Panda Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20honey.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Honey Honey Honey</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20hercpeg.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hercules and Pegasus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243fortseren.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Greek Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25mmouse.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Money Mouse</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20aladdinsorc.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aladdin and the Sorcerer</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs8magicjourn.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Magic Journey</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs4096bufking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Buffalo King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20kraken.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Release the Kraken</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5super7.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Super 7s</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1masterjoker.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Master Joker</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs75empress.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Golden Beauty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs4096mystery.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mysterious</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40madwheel.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Wild Machine</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40frrainbow.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruit Rainbow</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1ball.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Ball</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5hotburn.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot to Burn</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs243dancingpar.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dance Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10threestar.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Three Star Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bookoftut.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">John Hunter Book of Tut</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs117649starz.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Starz Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1money.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Money Money Money</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5ultrab.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ultra Burn</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25pyramid.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pyramid King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1600drago.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Drago Jewels of Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40streetracer.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Street Racer</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1fufufu.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fu Fu Fu</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25tigerwar.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Tiger Warrior</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswaysdogs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Dog House Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20gorilla.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jungle Gorilla</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayswerewolf.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Curse of the Werewolf Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5ultra.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ultra Hold and Spin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20rhinoluxe.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Great Rhino Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vswayshive.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Star Bounty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024lionsd.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 Lions Dance</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25samurai.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rise of Samurai</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25walker.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Walker</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20goldfever.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gems Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10returndead.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Return of the Dead</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25bkofkngdm.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Book Of Kingdoms</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs1024dtiger.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20eking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Emerald King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10cowgold.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cowboys Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40spartaking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Spartan King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10mayangods.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">John Hunter and the Mayan Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs576treasures.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Wild Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10bbbonanza.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Bass Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs40voodoo.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Voodoo Magic</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10wildtut.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mysterious Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20ekingrr.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Emerald King Rainbow Road</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/pp3fish.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fishing King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/pp4fortune.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Fishing</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs432congocash.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Congo Cash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs5drmystery.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Kingdom Eyes of Fire</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10eyestorm.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Eye of the Storm</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20midas.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Hand of Midas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs25jokerking.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Joker King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs20hburnhs.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot to Burn Hold and Spin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pp/images/vs10goldfish.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fishin Reels</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px; "><img src="https://img.pay4d.info/pg.png" alt="" style="margin-top:-20px; height: 40px">PGSoft</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/lucky-clover-lady.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Clover Lady</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/super-golf-drive.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Super Golf Drive</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/mystical-spirits.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mystical Spirits</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/bakery-bonanza.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bakery Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/hawaiian-tiki.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hawaiian Tiki</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/rave-party-fever.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rave Party Fever</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/diner-delights.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Diner Delights</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/alchemy-gold.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Alchemy Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/totem-wonders.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Totem Wonders</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/wild-coaster.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Coaster</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/legend-of-perseus.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Legend of Perseus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/lucky-piggy.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Piggy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/mahjong-ways2.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mahjong Ways 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/mahjong-ways.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mahjong Ways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/lucky-neko.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Neko</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/wild-bandito.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Bandito</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/wild-bounty-showdown.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Bounty Showdown</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/treasures-aztec.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasures of Aztec</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/ways-of-qilin.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ways of the Qilin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/cai-shen-wins.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cai Shen Wins</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/cocktail-nite.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cocktail Nights</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/the-great-icescape.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Great Icescape</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/dreams-of-macau.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dreams of Macau</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/speed-winner.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Speed Winner</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/dragon-hatch.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Hatch</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/jurassic-kdm.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jurassic Kingdom</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/ganesha-fortune.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ganesha Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/asgardian-rising.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Asgardian Rising</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/songkran-splash.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Songkran Splash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/prosperity-fortune-tree.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Prosperity Fortune Tree</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/midas-fortune.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Midas Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fortune-rabbit.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Rabbit</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/lgd-monkey-kg.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Legendary Monkey King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/gem-saviour-sword.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gem Saviour Sword</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/dragon-legend.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Legend</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fortune-gods.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/prosperity-lion.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Prosperity Lion</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fish-prawn-crab.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fish Prawn Crab</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/battleground-royale.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Battleground Royale</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/the-queens-banquet.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Queen's Banquet</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/rooster-rumble.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rooster Rumble</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/butterfly-blossom.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Butterfly Blossom</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/destiny-sun-moon.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Destiny of Sun &amp; Moon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/garuda-gems.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Garuda Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fortune-tiger.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/oriental-pros.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Oriental Prosperity</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/mask-carnival.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mask Carnival</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/emoji-riches.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Emoji Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/spirit-wonder.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Spirited Wonders</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/buffalo-win.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Buffalo Win</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/sprmkt-spree.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Supermarket Spree</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/crypt-fortune.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Raider Jane Crypt of Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/mermaid-riches.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mermaid Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/rise-of-apollo.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rise of Apollo</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/heist-stakes.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Heist Stakes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/candy-bonanza.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Candy Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/majestic-ts.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Majestic Treasures</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/crypto-gold.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Crypto Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fortune-ox.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Ox</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/jack-frosts.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jack Frosts Winter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/bali-vacation.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bali Vacation</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/opera-dynasty.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Opera Dynasty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/thai-river.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Thai River Wonders</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/gdn-ice-fire.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Guardians of Ice &amp; Fire</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/sct-cleopatra.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Secrets of Cleopatra</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/jewels-prosper.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jewels of Prosperity</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/galactic-gems.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Galactic Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/genies-wishes.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Genies 3 Wishes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/queen-bounty.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Queen of Bounty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/wild-fireworks.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Fireworks</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/phoenix-rises.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Phoenix Rises</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/circus-delight.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Circus Delight</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/egypts-book-mystery.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Egypts Book of Mystery</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/candy-burst.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Candy Burst</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/bikini-paradise.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Bikini Paradise</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fortune-mouse.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Mouse</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/shaolin-soccer.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shaolin Soccer</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/muay-thai-champion.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Muay Thai Champion</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/dragon-tiger-luck.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Tiger Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/gem-saviour-conquest.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gem Saviour Conquest</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/flirting-scholar.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Flirting Scholar</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/leprechaun-riches.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Leprechaun Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/ninja-vs-samurai.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ninja vs Samurai</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/vampires-charm.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Vampires Charm</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/captains-bounty.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Captains Bounty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/journey-to-the-wealth.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Journey to the Wealth</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/double-fortune.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Double Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/emperors-favour.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Emperors Favour</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/ganesha-gold.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ganesha Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/symbols-of-egypt.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Symbols Of Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/jungle-delight.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jungle Delight</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/piggy-gold.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Piggy Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/santas-gift-rush.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Santas Gift Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/mr-hallow-win.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mr. Hallow-Win!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/legend-of-hou-yi.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Legend of Hou Yi</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/hip-hop-panda.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hip Hop Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/hotpot.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hotpot</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/fortune-tree.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Tree of Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/plushie-frenzy.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Plushie Frenzy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/win-win-won.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Win Win Won</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/reel-love.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Reel Love</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/hood-wolf.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hood vs Wolf</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/medusa.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Medusa 1: the Curse of Athena</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/medusa2.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Medusa 2: the Quest of Perseus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/gem-saviour.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gem Saviour</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/pg/images/diaochan.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Honey Trap of Diao Chan</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px; "><img src="https://img.pay4d.info/hb.png" alt="" style="margin-top:-20px">Habanero</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGNaughtyWukong.png" style="width:150px">
                                                    <figcaption style="text-align:center">Naughty Wukong</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGRainbowmania.png" style="width:150px">
                                                    <figcaption style="text-align:center">Rainbowmania</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGDragonTigerGate.png" style="width:150px">
                                                    <figcaption style="text-align:center">Dragon Tiger Gate</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTaikoBeats.png" style="width:150px">
                                                    <figcaption style="text-align:center">Taiko Beats</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSpaceGoonz.png" style="width:150px">
                                                    <figcaption style="text-align:center">Space Goonz</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGoldenUnicornDeluxe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Golden Unicorn Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBombRunner.png" style="width:150px">
                                                    <figcaption style="text-align:center">Bomb Runner</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMightyMedusa.png" style="width:150px">
                                                    <figcaption style="text-align:center">Mighty Medusa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLuckyDurian.png" style="width:150px">
                                                    <figcaption style="text-align:center">Lucky Durian</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGNewYearsBash.png" style="width:150px">
                                                    <figcaption style="text-align:center">New Years Bash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGProst.png" style="width:150px">
                                                    <figcaption style="text-align:center">Prost!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGNineTails.png" style="width:150px">
                                                    <figcaption style="text-align:center">Nine Tails</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFly.png" style="width:150px">
                                                    <figcaption style="text-align:center">Fly!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCalaverasExplosivas.png" style="width:150px">
                                                    <figcaption style="text-align:center">Calaveras Explosivas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMarvelousFurlongs.png" style="width:150px">
                                                    <figcaption style="text-align:center">Marvelous Furlongs</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCandyTower.png" style="width:150px">
                                                    <figcaption style="text-align:center">Candy Tower</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGReturnToTheFeature.png" style="width:150px">
                                                    <figcaption style="text-align:center">Return To The Feature</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBeforeTimeRunsOut.png" style="width:150px">
                                                    <figcaption style="text-align:center">Before Time Runs Out</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGHotHotFruit.png" style="width:150px">
                                                    <figcaption style="text-align:center">Hot Hot Fruit</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTheKoiGate.png" style="width:150px">
                                                    <figcaption style="text-align:center">Koi Gate</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGWealthInn.png" style="width:150px">
                                                    <figcaption style="text-align:center">Wealth Inn</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMysticFortuneDeluxe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Mystic Fortune Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGWildTrucks.png" style="width:150px">
                                                    <figcaption style="text-align:center">Wild Trucks</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCrystopia.png" style="width:150px">
                                                    <figcaption style="text-align:center">Crystopia</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SG5LuckyLions.png" style="width:150px">
                                                    <figcaption style="text-align:center">5 Lucky Lions</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLaughingBuddha.png" style="width:150px">
                                                    <figcaption style="text-align:center">Laughing Buddha</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSirensSpell.png" style="width:150px">
                                                    <figcaption style="text-align:center">Siren's Spell</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGHappiestChristmasTree.png" style="width:150px">
                                                    <figcaption style="text-align:center">Happiest Christmas Tree</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLegendaryBeasts.png" style="width:150px">
                                                    <figcaption style="text-align:center">Legendary Beasts</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLanternLuck.png" style="width:150px">
                                                    <figcaption style="text-align:center">Lantern Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFaCaiShen.png" style="width:150px">
                                                    <figcaption style="text-align:center">Fa Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFaCaiShenDeluxe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Fa Cai Shen Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGHotHotHalloween.png" style="width:150px">
                                                    <figcaption style="text-align:center">Hot Hot Halloween</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTheBigDealDeluxe.png" style="width:150px">
                                                    <figcaption style="text-align:center">The Big Deal Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFourDivineBeasts.png" style="width:150px">
                                                    <figcaption style="text-align:center">Four Divine Beasts</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSojuBomb.png" style="width:150px">
                                                    <figcaption style="text-align:center">Soju Bomb</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTukTukThailand.png" style="width:150px">
                                                    <figcaption style="text-align:center">Tuk Tuk Thailand</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGDiscoBeats.png" style="width:150px">
                                                    <figcaption style="text-align:center">Disco Beats</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMountMazuma.png" style="width:150px">
                                                    <figcaption style="text-align:center">Mount Mazuma</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFortuneDogs.png" style="width:150px">
                                                    <figcaption style="text-align:center">Fortune Dogs</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGJump.png" style="width:150px">
                                                    <figcaption style="text-align:center">Jump!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGPumpkinPatch.png" style="width:150px">
                                                    <figcaption style="text-align:center">Pumpkin Patch</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGEgyptianDreams.png" style="width:150px">
                                                    <figcaption style="text-align:center">Egyptian Dreams</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGZeus.png" style="width:150px">
                                                    <figcaption style="text-align:center">Zeus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLondonHunter.png" style="width:150px">
                                                    <figcaption style="text-align:center">London Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTreasureTomb.png" style="width:150px">
                                                    <figcaption style="text-align:center">Treasure Tomb</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGQueenOfQueens1024.png" style="width:150px">
                                                    <figcaption style="text-align:center">Queen of Queens II</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTheBigDeal.png" style="width:150px">
                                                    <figcaption style="text-align:center">The Big Deal</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGPresto.png" style="width:150px">
                                                    <figcaption style="text-align:center">Presto!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGKnockoutFootball.png" style="width:150px">
                                                    <figcaption style="text-align:center">Knockout Football</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGEgyptianDreamsDeluxe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Egyptian Dreams Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGZeus2.png" style="width:150px">
                                                    <figcaption style="text-align:center">Zeus 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGPandaPanda.png" style="width:150px">
                                                    <figcaption style="text-align:center">Panda Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGlamRock.png" style="width:150px">
                                                    <figcaption style="text-align:center">Glam Rock</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBombsAway.png" style="width:150px">
                                                    <figcaption style="text-align:center">Bombs Away</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGRollingRoger.png" style="width:150px">
                                                    <figcaption style="text-align:center">Rolling Roger</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFireRooster.png" style="width:150px">
                                                    <figcaption style="text-align:center">Fire Rooster</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SG12Zodiacs.png" style="width:150px">
                                                    <figcaption style="text-align:center">12 Zodiacs</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGWaysOfFortune.png" style="width:150px">
                                                    <figcaption style="text-align:center">Ways Of Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGScruffyScallywags.png" style="width:150px">
                                                    <figcaption style="text-align:center">Scruffy Scallywags</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SG5Mariachis.png" style="width:150px">
                                                    <figcaption style="text-align:center">5 Mariachis</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCakeValley.png" style="width:150px">
                                                    <figcaption style="text-align:center">Cake Valley</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFenghuang.png" style="width:150px">
                                                    <figcaption style="text-align:center">Fenghuang</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBirdOfThunder.png" style="width:150px">
                                                    <figcaption style="text-align:center">Bird of Thunder</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTheDeadEscape.png" style="width:150px">
                                                    <figcaption style="text-align:center">The Dead Escape</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGoldRush.png" style="width:150px">
                                                    <figcaption style="text-align:center">Gold Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSparta.png" style="width:150px">
                                                    <figcaption style="text-align:center">Sparta</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGangsters.png" style="width:150px">
                                                    <figcaption style="text-align:center">Gangsters</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGRuffledUp.png" style="width:150px">
                                                    <figcaption style="text-align:center">Ruffled Up</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSuperTwister.png" style="width:150px">
                                                    <figcaption style="text-align:center">Super Twister</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCoyoteCrash.png" style="width:150px">
                                                    <figcaption style="text-align:center">Coyote Crash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGWickedWitch.png" style="width:150px">
                                                    <figcaption style="text-align:center">Wicked Witch</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGArcaneElements.png" style="width:150px">
                                                    <figcaption style="text-align:center">Arcane Elements</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGJugglenaut.png" style="width:150px">
                                                    <figcaption style="text-align:center">Jugglenaut</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGalacticCash.png" style="width:150px">
                                                    <figcaption style="text-align:center">Galactic Cash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBuggyBonus.png" style="width:150px">
                                                    <figcaption style="text-align:center">Buggy Bonus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTheDragonCastle.png" style="width:150px">
                                                    <figcaption style="text-align:center">Dragon Castle</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCarnivalCash.png" style="width:150px">
                                                    <figcaption style="text-align:center">Carnival Cash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTreasureDiver.png" style="width:150px">
                                                    <figcaption style="text-align:center">Treasure Diver</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGDrFeelgood.png" style="width:150px">
                                                    <figcaption style="text-align:center">Dr Feelgood</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGDoubleODollars.png" style="width:150px">
                                                    <figcaption style="text-align:center">Double O Dollars</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLittleGreenMoney.png" style="width:150px">
                                                    <figcaption style="text-align:center">Little Green Money</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMonsterMashCash.png" style="width:150px">
                                                    <figcaption style="text-align:center">Monster Mash Cash</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGShaolinFortunes100.png" style="width:150px">
                                                    <figcaption style="text-align:center">Shaolin Fortunes 100</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGShaolinFortunes243.png" style="width:150px">
                                                    <figcaption style="text-align:center">Shaolin Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGPamperMe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Pamper Me</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSOS.png" style="width:150px">
                                                    <figcaption style="text-align:center">S.O.S!</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGPoolShark.png" style="width:150px">
                                                    <figcaption style="text-align:center">Pool Shark</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGWeirdScience.png" style="width:150px">
                                                    <figcaption style="text-align:center">Weird Science</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBikiniIsland.png" style="width:150px">
                                                    <figcaption style="text-align:center">Bikini Island</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGBarnstormerBucks.png" style="width:150px">
                                                    <figcaption style="text-align:center">Barnstormer Bucks</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSuperStrike.png" style="width:150px">
                                                    <figcaption style="text-align:center">Super Strike</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGJungleRumble.png" style="width:150px">
                                                    <figcaption style="text-align:center">Jungle Rumble</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSpaceFortune.png" style="width:150px">
                                                    <figcaption style="text-align:center">Space Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFlyingHigh.png" style="width:150px">
                                                    <figcaption style="text-align:center">Flying High</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMrBling.png" style="width:150px">
                                                    <figcaption style="text-align:center">Mr Bling</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMysticFortune.png" style="width:150px">
                                                    <figcaption style="text-align:center">Mystic Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGArcticWonders.png" style="width:150px">
                                                    <figcaption style="text-align:center">Arctic Wonders</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTowerOfPizza.png" style="width:150px">
                                                    <figcaption style="text-align:center">Tower Of Pizza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMummyMoney.png" style="width:150px">
                                                    <figcaption style="text-align:center">Mummy Money</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGPuckerUpPrince.png" style="width:150px">
                                                    <figcaption style="text-align:center">Pucker Up Prince</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGSirBlingalot.png" style="width:150px">
                                                    <figcaption style="text-align:center">Sir Blingalot</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCashReef.png" style="width:150px">
                                                    <figcaption style="text-align:center">Cash Reef</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGQueenOfQueens243.png" style="width:150px">
                                                    <figcaption style="text-align:center">Queen of Queens</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGAllForOne.png" style="width:150px">
                                                    <figcaption style="text-align:center">All For One</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGIndianCashCatcher.png" style="width:150px">
                                                    <figcaption style="text-align:center">Indian Cash Catcher</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGrapeEscape.png" style="width:150px">
                                                    <figcaption style="text-align:center">Grape Escape</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGGoldenUnicorn.png" style="width:150px">
                                                    <figcaption style="text-align:center">Golden Unicorn</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGFrontierFortunes.png" style="width:150px">
                                                    <figcaption style="text-align:center">Frontier Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGRodeoDrive.png" style="width:150px">
                                                    <figcaption style="text-align:center">Rodeo Drive</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGCashosaurus.png" style="width:150px">
                                                    <figcaption style="text-align:center">Cashosaurus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGDiscoFunk.png" style="width:150px">
                                                    <figcaption style="text-align:center">Disco Funk</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGHauntedHouse.png" style="width:150px">
                                                    <figcaption style="text-align:center">Haunted House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/EURoulette.png" style="width:150px">
                                                    <figcaption style="text-align:center">Roulette</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SicBo.png" style="width:150px">
                                                    <figcaption style="text-align:center">Sic Bo</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/AmericanBaccarat.png" style="width:150px">
                                                    <figcaption style="text-align:center">Baccarat</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/Baccarat3HZC.png" style="width:150px">
                                                    <figcaption style="text-align:center">Baccarat Zero Commission</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/CaribbeanStud.png" style="width:150px">
                                                    <figcaption style="text-align:center">Caribbean Stud</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/TGThreeCardPoker.png" style="width:150px">
                                                    <figcaption style="text-align:center">Three Card Poker</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/TGThreeCardPokerDeluxe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Three Card Poker Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/TGWar.png" style="width:150px">
                                                    <figcaption style="text-align:center">War</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/TGDragonTiger.png" style="width:150px">
                                                    <figcaption style="text-align:center">Dragon Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/TGBlackjackAmerican.png" style="width:150px">
                                                    <figcaption style="text-align:center">American Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/BlackJack3H.png" style="width:150px">
                                                    <figcaption style="text-align:center">Blackjack (3 Hand)</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/BlackJack3HDoubleExposure.png" style="width:150px">
                                                    <figcaption style="text-align:center">Double Exposure (3 Hand)</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/JokerPoker.png" style="width:150px">
                                                    <figcaption style="text-align:center">Joker Poker </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/TensorBetter.png" style="width:150px">
                                                    <figcaption style="text-align:center">Tens or Better </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/DoubleDoubleBonusPoker.png" style="width:150px">
                                                    <figcaption style="text-align:center">Double Double Bonus Poker </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/DoubleBonusPoker.png" style="width:150px">
                                                    <figcaption style="text-align:center">Double Bonus Poker </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/BonusPoker.png" style="width:150px">
                                                    <figcaption style="text-align:center">Bonus Poker </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/AllAmericanPoker.png" style="width:150px">
                                                    <figcaption style="text-align:center">All American Poker </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/BonusDuecesWild.png" style="width:150px">
                                                    <figcaption style="text-align:center">Bonus Deuces Wild </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/AcesandEights.png" style="width:150px">
                                                    <figcaption style="text-align:center">Aces and Eights </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/DuecesWild.png" style="width:150px">
                                                    <figcaption style="text-align:center">Deuces Wild </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/JacksorBetter.png" style="width:150px">
                                                    <figcaption style="text-align:center">Jacks or Better </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGMagicOak.png" style="width:150px">
                                                    <figcaption style="text-align:center">Magic Oak</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLuckyLucky.png" style="width:150px">
                                                    <figcaption style="text-align:center">Lucky Lucky</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGNuwa.png" style="width:150px">
                                                    <figcaption style="text-align:center">Nuwa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGColossalGems.png" style="width:150px">
                                                    <figcaption style="text-align:center">Colossal Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGWizardsWantWar.png" style="width:150px">
                                                    <figcaption style="text-align:center">Wizards Want War</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGNaughtySanta.png" style="width:150px">
                                                    <figcaption style="text-align:center">Naughty Santa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLoonyBlox.png" style="width:150px">
                                                    <figcaption style="text-align:center">Loony Blox</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGKnockoutFootballRush.png" style="width:150px">
                                                    <figcaption style="text-align:center">Knockout Football Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGLuckyFortuneCat.png" style="width:150px">
                                                    <figcaption style="text-align:center">Lucky Fortune Cat</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTechnoTumble.png" style="width:150px">
                                                    <figcaption style="text-align:center">Techno Tumble</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGScopa.png" style="width:150px">
                                                    <figcaption style="text-align:center">Scopa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGHeySushi.png" style="width:150px">
                                                    <figcaption style="text-align:center">Hey Sushi</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGJellyFishFlow.png" style="width:150px">
                                                    <figcaption style="text-align:center">JellyFish Flow</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGJellyFishFlowUltra.png" style="width:150px">
                                                    <figcaption style="text-align:center">JellyFish Flow Ultra</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGHappyApe.png" style="width:150px">
                                                    <figcaption style="text-align:center">Happy Ape</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGTabernaDeLosMuertos.png" style="width:150px">
                                                    <figcaption style="text-align:center">Taberna De Los Muertos</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGChristmasGiftRush.png" style="width:150px">
                                                    <figcaption style="text-align:center">Christmas Gift Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/hb/images/circle/SGOrbsOfAtlantis.png" style="width:150px">
                                                    <figcaption style="text-align:center">Orbs Of Atlantis</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px;"><img src="https://img.pay4d.info/jg.png" alt="" style="margin-top:-20px">Joker Gaming</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/zezjtt6ras7ms.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Leprechaun</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/4py9dmfpwkt4y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Date With Miyo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ooekf9x16xaxn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Kraken Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/uh4amsg355x7a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fruit Paradise</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/67s75yrbo4dae.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Majapahit</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ape6dxf7sk35y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Roma Legacy</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/3jxqtp7wssiks.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">The Legend of White Snake</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/c53raraonrmbq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Pan Jian Lian 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/e9qs4cbtga5ue.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Wealth God</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/orm4x9z99u69r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">League of Legends</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/texkt79w6ziqs.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Wukong</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/b4pde45epfzg6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Genie 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/y4jnah5oqf58q.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Yakuza</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/h33c3rho1gmjq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Street of Chicago</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/rg5oqz19mtqir.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Bali</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ww3a8wsu4de7c.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Sizzling Hot</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/soojfuqnaxycn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Hot Fruits</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/3yfmucpss64mk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dragon Power Flame</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/tocki7xk7xwq1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Burning Pearl Bingo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/86burqb38a9ua.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Bushido Blade</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/z7k6mqf3z495a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Crypto Mania Bingo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/mur8wje4dccb1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Scheherazade</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/cz3wgrounyetc.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Neptune Treasure Bingo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/5m6k9j7rwspjs.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Roma</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/j9nzkkbjfaz1a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Horus Eye</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/wcaadzg74mj7y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lady Hawk</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/zygj7oqga9nck.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Caishen Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/satj3o6ya8dcq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Just Jewels Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/byz81hmsq748k.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Supreme Caishen</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/3fx69pizs144w.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky Streak</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ur8593z8hu17w.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Burning Pearl</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ezjsgctugyauc.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Caishen Riches Bingo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/b1cnw7mkppwg1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Thug Life</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/96k1k6d3x39za.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Big Game Safari</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/qd1fcneqbhgy4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Immortals</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/6po7ddrpokbay.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Alice In Wonderland</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/yqe1n9d7qj3zy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Three Kingdoms 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/5bgx7epgw61kk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Queen 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/4jdxbm7cistkg.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Talisman</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/abkqpqp6z66m4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Santa Workshop</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/y6q14hdtq35ze.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Beach Life</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ggutqu1xjtgwr.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Oasis</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/e5jgac3ogr5dq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ranchers Wealth</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/kxyznmbpret1y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Enchanted Forest</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/d4fyes4amfxf6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Feng Huang</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/a7q65cfts455e.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ong Bak 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/cuarr8e1ncebn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Tropical Crush</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/x5ikj69a989x6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Gold Trail</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/hb4cpgc6u6qj4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Mythological</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/wr5axzs95uq7r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Forest Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/exesnxb7ge3uy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Haunted House</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/pd6rhresnhkbk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Shaolin</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/fn6yhwksk7kfk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Chilli Hunter Bingo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/nqyun5dpcjtsy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Cyber Race</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/uafejs6a58xp6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Bounty Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/7b6c7rcs16kjk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ocean Spray</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/6o5emdcnoqyen.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Aztec Temple</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/5cx47jffukp3o.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fabulous Eights</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/gqotnunpejbwy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fortune Festival</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ipz77igi3mfho.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Winter Sweets</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/b5ggg45epfzg6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Super Stars</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/r8oiyz19mtqir.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky Joker</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ha1jzrho1gmjq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Mayan Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/3erm9p7wssiks.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Flames Of Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ofy9b9z99u69r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fire Reign</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/swt38osdadyhc.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Black Beard Legacy</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/gkubyu4cjibrg.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Joker Madness</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/rqaonzn7kjjiy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">The Four Invention</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/m94wkgy3daxta.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Mythical Sand</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/fqho1inijjfwo.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dragon Of The Eastern Sea</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/8kzbot4rew7ds.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Journey To The West</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/gsttgo1debywc.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Octagon Gem 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/quofrdenycyyn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Bagua 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/1wt58azdhdo6c.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Wild Fairies</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/n1ydr5mncpogn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Chilli Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/gn1bc1kqj7gr4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Bagua</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/dxxsh3dfmjpio.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Tai Shang Lao Jun</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/9ii7s6u5xbhzh.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Yggdrasil</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/s77hiogba5dhe.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Peach Banquet</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/oajk3h9o685xq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Money Vault</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/1ru5x5zx7us6r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lightning God</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/5ii9zgw5unc3h.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Neptune Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/wykepsq659qp4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Four Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/q9gi4yybyadoe.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Wild Giant Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/dkzdo35rcipfs.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">China</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ie9eti6w4zfcs.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ancient Artifact</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/7cz37fritkfao.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky Rooster</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/84igeq3a8r9d6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Nugget Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/4tyxfmpnwqokn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Octagon Gem</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/rsjogw1ukbeic.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Four Tigers</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/o7f9ih8t6559e.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Empress Regnant</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/wtupmzq14xepn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lions Dance</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/d8cso3u8ct1iw.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Phoenix 888</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/7tccifcktqre1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Chinese Boss</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/4akkze7ywgukq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Crypto Mania</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/8u9r4tj48chd1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dynamite Reels</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/srd3xusx3ughr.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Enter The KTV</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/5ypkuepgw61kk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Water Reel</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/yxdzc9d7qj3zy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fire Reel</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/d5qfgs4amfxf6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Respin Mania</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ahf5icfts455e.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Jin Fu Xing Yun</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/c41bsraonrmbq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Xuan Pu Lian Huan</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/99bzr6d3x39za.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ni Shu Shen Me</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/x46x869a989x6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fat Choy Choy Sun</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/856dgq3a8r9d6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Tangkas</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/hcu3p8r71kj3y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Power Stars</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/hf5hx8w9u1q3r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Book Of Ra Deluxe</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ateqfxp1sqamn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dolphin Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/fk9yoi4wkifrs.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fifty Lions</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/8nsbhokge7nrk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Queen Of The Nile</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/qxoindypyeboy.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Geisha</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/xmzfobaryz7xs.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lord Of The Ocean</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/7f9h9fwz11kaw.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky Lady Charm</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ioheiiqk3xrc1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Book Of Ra</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/k9gz4ebbrau1e.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fifty Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/aij68ciusna5c.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Columbus</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/igg7tisz4ukhw.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Egypt Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/w4ypzw6o48mpq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dragon Phoenix</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/xbxy1yegyhnyk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Jungle Island</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/foff4ikkjprr1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Water Margin</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ef1uyxt98o6ur.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky God Progressive</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/naagsa5ycfugq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ancient Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/i4rc816e388c6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Robin Hood</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/nh9swadbc3use.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">HighwayKings JP</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/tqi9778i7mi6o.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Miami</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ruufkzk1kpefn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">SilverBullet Progressive</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/awn5jciusna5c.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Captains Treasure Progressive</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/3hj4fkfji4z4a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky God Progressive 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/u17q53q45xcp1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">White Snake</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/kia1eetdryo1c.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Alice</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/9xpa7brfxj7zo.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Mammamia</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/pirtanombyroh.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Huga</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ne4gq55cpitgg.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Beanstalk</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/k3anse3yrrunq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">MoneyBangBang</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/79mafnrjt48aa.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Pan Jin Lian</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/fwria11mjbrwh.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Three Kingdoms Quest</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/dc7sh3dfmjpio.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dragon Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/3uim5ppkiqwk1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Belangkai</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/j3wngk3efrzn6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Baccarat</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/yr1zy9u9xt6zr.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">HuLu</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/hxb3p8r71kj3y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Sicbo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/8rqwot18etnuw.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Thunder God</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/9upe5bm4xph81.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Monkey King</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/113qm5xnhxoqn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Aladdin</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ywozehuuqbazc.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Golden Island</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/bcizh7dipjiso.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Mulan</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/55hj8ghaugxj6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Happy Buddha</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/jpiuhpbifei1o.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Golden Rooster</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/itzp5iqk3xrc1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Wild Spirit</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/7rw3tfwz11kaw.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Arctic Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/aodmmxp1sqamn.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Zhao Cai Jin Bao</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/o3nxzh9o685xq.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Fei Long Zai Tian</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ufc6t3z8hu17w.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Santa Surprise</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/j6j1rkbjfaz1a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Five Tiger Generals</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/9w6aa6u5xbhzh.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Golden Dragon</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/wpu7pzg74mj7y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky Drum</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/tbfxuhxs694xk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/gd3rn1kqj7gr4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/wfo7bzs95uq7r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Archer</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/jsguaktmfyw1h.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Hercules</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/dhdirsn3m3xia.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Lucky God</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/kf41ymtxfos1r.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Ocean Paradise</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/ebudnqj68h6d4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Happy Party</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/9mqe9bhroi78s.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Golden Monkey King</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/4d5kdkpqi6sk4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Safari Heat</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/u6d7fsg355x7a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Panther Moon</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/5864tji8w113w.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Thai Paradise</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/1q36p58phmt6y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Genie</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/xtpy4bx49xhx1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Safari Life</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/69xaiyrbo4dae.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">A Night Out</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/z1pc5tp4zqhm1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Silver Bullet</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/bwwza4umpbwsh.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Bonus Bear</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/rh8iwwntk3mie.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Dolphin Reef</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/axt5pxf7sk35y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Highway Kings</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/jbzd1cjsgh4dk.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Sparta</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/oqt9p9876m39y.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Azteca</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/t656f48j75z6a.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Great Blue</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/jg/images/s6xhiogba5dhe.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">Football Rules</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px;"><img src="https://img.pay4d.info/sg.png" alt="" style="margin-top:-20px">Spadegaming</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LK03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Legacy of Kong Maxways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RH02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Royale House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RK02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Royal Katt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GK01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Brothers Kingdom</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PW03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Poker Ways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-HT02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Hammer of Thunder</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WW02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Wild Wet Win</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CS03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Caishen Deluxe Megaways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-BA01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">888</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CS02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Caishen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GP03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Gold Panther Maxways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FD01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">5 Fortune Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FM03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Fruits Mania</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CP03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Candy Pop 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RM01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Roma</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DF02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Dancing Fever</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GL02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Lotus SE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-SP04.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Sugar Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-ZE01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">ZEUS</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FF01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Farmland Frenzy Maxways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CG01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Captain Golds Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PO02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Panda Opera</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CM02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Christmas Miracles</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RR01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Rabbit Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-JW01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Journey to the Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FS01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Fiery Sevens</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-SC01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Space Conquest</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LK01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Koi</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-TD01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Tiger Dance</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-MT01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Muay Thai Fighter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LK02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Koi Exclusive</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LB01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Legendary Beasts Saga</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FS02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Fiery Sevens Exclusive</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RC01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Rich Caishen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GR01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Gold Rush Cowboy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CB02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Sugar Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-VB01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Sexy Vegas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PW02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Princess Wang</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DE01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Dragon Empire</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GP01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Gold Panther</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FL02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">First Love</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-JT02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Jokers Treasure </figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CS01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Cai Shen 888</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-MG02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Mayan Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-JT03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Joker's Treasure Exclusive</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-MG01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Mega 7</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-BM01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Book of Myth</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CP02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Candy Candy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-MK01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Magic Kitty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PH02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">King Pharaoh</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FM02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Monkey</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-HQ01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Hugon Quest</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DX01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Da Fu Xiao Fu</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-ML01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Magical Lamp</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-HE01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Heroes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LS02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Three Lucky Stars</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-MM01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Money Mouse</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DF03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Double Flame</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CB01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Crazy Bomber</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RW01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Rise of Werewolves</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-KF01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Kungfu Dragon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LI03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Love Idol</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-RH01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Ruby Hood</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-TP02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Triple Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CH01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Mr Chu Tycoon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PG01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Prosperity Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LY01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">FaFaFa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-HY01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Ho Yeah Monkey</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LY02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">FaFaFa2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FO01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">168 Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-BC01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Baby Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PO01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Pocket Mon Go</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-TZ01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Jungle King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LC01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CY01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Cai Yuan Guang Jin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-HF01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Highway Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GC03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Chicken</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GF01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Fist</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-CP01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Candy Pop</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WP02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Wow Prosperity</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FG01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Fist of Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-TW01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Tiger Warrior</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-NT01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Sea Emperor</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-SG02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Santa Gifts</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-PK01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Pirate King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-MR01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Mermaid</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LM01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Meow</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-LF01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Feng Shui</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WC02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Wong Choy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WC03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Wong Choy SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WM02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">5 Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WM03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">5 Fortune SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-WP01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Wong Po</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-EG02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Emperor Gate</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-EG03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Emperor Gate SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FC02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Big Prosperity</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-FC03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Big Prosperity SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GS03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Great Stars</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GS04.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Great Stars SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-GW01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Whale</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-IL02.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Adventure Iceland</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-IL03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Iceland SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DF01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Double Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DG03.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Dragon Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-DG04.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Dragon Gold SA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/sg/images/S-BB01.jpg" style="width:160px; border-radius: 10px;">
                                                    <figcaption style="text-align:center; margin-top:5px">Festive Lion</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px;"><img src="https://img.pay4d.info/jili.png" alt="" style="margin-top:-20px">JILI</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/223.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fortune Gems 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/176.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Master Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/181.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Wild Ace</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/183.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Joker</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/145.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Neko Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/164.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Pirate Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/30.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Bubble Beauty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/103.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Empire</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/109.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fortune Gems</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/49.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Super Ace</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/35.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Crazy 777</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/102.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Roma X</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/134.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Mega Ace</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/92.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Crazy Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/16.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Jungle King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/77.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Boxing King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/47.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Charge Buffalo</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/110.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Ali Baba</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/78.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Secret Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/144.png">
                                                    <figcaption style="text-align:center; margin-top:5px">JILI Caishen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/137.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Gold Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/85.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Pharaoh Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/27.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Seven Seven Seven</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/38.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fengshen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/45.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Bank</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/130.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Thor X</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/21.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fa Fa Fa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/166.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Wild Racer</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/153.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Crazy Pusher</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/146.png">
                                                    <figcaption style="text-align:center; margin-top:5px">World Cup</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/142.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Bonus Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/136.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Samba</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/135.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Mayan Empire</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/126.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Bones Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/116.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Happy Taxi</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/115.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Agent Ace</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/108.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Magic Lamp</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/106.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Twin Wins</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/101.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Medusa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/100.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Super Rich</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/91.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Coming</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/89.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Lady</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/87.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Book of Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/76.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Party Night</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/69.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Jump Sheep</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/67.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Monkey Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/66.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Number</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/64.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fairness Games</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/63.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Seven Up Down</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/62.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Dice</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/61.png">
                                                    <figcaption style="text-align:center; margin-top:5px">DragonTiger</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/58.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Golden Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/48.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Goldbricks</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/46.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Dragon Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/44.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Diamond Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/43.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Xi Yang Yang</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/40.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Crazy FaFaFa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/37.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Night City</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/36.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Bao boon chin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/33.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fortune Pig</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/26.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Hawaii Beauty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/23.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Candy Baby</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/18.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Rock Beauty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/17.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Shanghai Beauty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/14.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Hyper Burst</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/13.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Lucky Ball</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/10.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Gem Party</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/9.png">
                                                    <figcaption style="text-align:center; margin-top:5px">War Of Dragons</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/6.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Fortune Tree</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/5.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Hot Chilli</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/4.png">
                                                    <figcaption style="text-align:center; margin-top:5px">God Of Martial</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/jl/images/2.png">
                                                    <figcaption style="text-align:center; margin-top:5px">Chin Shi Huang</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px; display: flex; align-items: center"><img src="https://img.pay4d.info/fs.png" alt="" style="height: 24px; margin-right: 8px">
                                                <div>FastSpin</div>
                                            </h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-CJ01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">City of Jewels</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-RH02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Royale House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-GS05.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Great Safari</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-RK02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Royal Katt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-TR01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Tiki Rush</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-TN01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Nutcrackers</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-PW03.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Poker Ways</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-MM02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Maya Myth</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-NR01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Neko Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-WW02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Wet Win</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-FM03.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruits Mania</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-MT01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Muay Thai Fighter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-RC01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rich Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-RM01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Roma</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-SC01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Space Conquest</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-VB01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sexy Vegas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-LN01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Legend of Nian</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-GR01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gold Rush Cowboys</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-NF01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Neon Fantasy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-LE04.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Legend of Eagle</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-SB02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Safari Blitz</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-TH01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Triple Happiness</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-SW01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Spin and Win</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-OM01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Oceanic Melodies</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-MS01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mighty Sevens</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-MB03.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mushroom Bandit</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-MB02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mining Bonanza</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-LO01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Loki</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-LF02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-HT01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Honey Trap</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-HF03.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Heavenly Fortunes 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-HF02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Heavenly Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-GW02.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">God of Wealth</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-GL03.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ganesha Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-GE01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Goddess of Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-FL04.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Lions</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/S-FL03.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fiery Lava</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fishing Treasure</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px; display: flex; align-items: center"><img src="https://img.pay4d.info/ps.png" alt="" style="height: 24px; margin-right: 8px">
                                                <div>PlayStar</div>
                                            </h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00146.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MAHJONG WAYS 3+</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00141.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MAHJONG WAYS 3</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00025.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">777</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00112.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">SUPER WIN</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00091.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">SUPER POWERFUL</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00107.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">SUPER BOOM</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00044.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FORTUNE TELLER</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00115.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">WHAT THE FA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00083.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MY LORD</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00127.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">SUPER AWESOME</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00095.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">HAND OF GOD</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00009.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MADAME CAROLINE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00019.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">THE EMPIRE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00137.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FEATURE BUY・SUPER POWERFUL</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00135.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FEATURE BUY・GOLDEN PIG</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00054.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">RICH &amp; HAPPY</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00119.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">LUCKY POKER 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00111.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">DA FU GUI</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00132.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">CRAZY 777</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00105.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">CHALLENGE・GOLDEN PIG</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00026.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">DOUBLE HAPPINESS</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00131.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FANTASY SOUTHEAST ASIA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00116.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">BURLESQUE 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00110.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MASTER HAHA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00015.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">WHOS THE BOSS</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00133.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">COIN MANIAC</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00028.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">ATHENA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00108.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">RAT OF WEALTH</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00099.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">CHALLENGE・MAYAN CALENDAR</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00114.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FISH PRAWN CRAB</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00124.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">DIAO CHAN FA DA CAI</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSTM-ON-00003.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">LUCKY CRUSH</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSTM-ON-00001.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">LUCKY KOIN</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00139.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">CHEF HUSKY</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00136.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FEATURE BUY・CHRISTMAS EXPRESS</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00129.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">GOLDEN JADE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00123.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">GOLDEN ZONGZI</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00106.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">WU XIA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00104.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">KUNGFU</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00102.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">GOLDEN WEEK</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00101.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">CHALLENGE・FU LU SHOU XI</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00100.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">ZUMA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00096.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FORTUNE BULL</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00094.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">PS CLUB</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00093.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">LOVE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00092.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">TOMB TREASURE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00086.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">SANTA CLAUS</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00085.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">AURORA WOLF</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00079.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MONEY MEOW</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00073.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">MOON FESTIVAL</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00070.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">ALCHEMY</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00067.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">DRAGON BOAT FESTIVAL</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00065.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">SUPER RICH</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00059.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">VAMPIRE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00051.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">HALLOWEEN</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00047.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">ELEPHANT</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00038.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FACE OFF</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00035.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">WEREWOLF</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00033.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FORTUNE GOD</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00029.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">GLORIOUS KINGDOM</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00024.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">FA FA MONKEY</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00016.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">KUNG HEI</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00014.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">LUCKY PANDA</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00005.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">INDIA TREASURE</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/ps/images/PSS-ON-00001.png">
                                                    <figcaption style="text-align:center; margin-top:5px;">CHINA EMPRESS</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px; "><img src="https://img.pay4d.info/cq9.png" alt="CQ9" style="margin-top:-20px; height: 40px"></h2>
                                            <div class="slotarea">
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/243.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mafia</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB15.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hero of the 3 Kingdoms - Cao Cao</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/241.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Chicken House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/230.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Baseball Fever</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB13.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Football Fever M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/BU28.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hong Kong Flavor</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB12.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Myeong Ryang</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/229.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Night City</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/228.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mirror Mirror</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/227.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">888 Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB9.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Football Fever</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/BU26.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Diamond Fruit</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/BU27.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Songkran</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/225.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mr. Miser</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/226.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Tigers</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/223.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Acrobatics</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/CC09.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Frozen World</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB8.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Koi</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB5.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot DJ</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/171.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Greek Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB3.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Coin Spinner</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/222.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Loy Krathong</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/219.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">King Kong Shake</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/218.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dollar Bomb</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB6.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ganesha Jr.</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/177.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Aladdins lamp</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/GB2.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Monster Hunter</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/211.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">King of Atlantis</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/215.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot Pinatas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/214.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ninja Raccoon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/212.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Burning Xi-You</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/210.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Oo Ga Cha Ka</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/209.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Cupids</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/208.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Money Tree</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/206.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sweet POP</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/5009.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Uproar in Heaven</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/5008.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Da Hong Zhong</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/5007.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Da Fa Cai</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/195.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lord Ganesha</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/197.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragons Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/199.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Songkran Festival</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/187.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wing Chun</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/194.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Dragon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/185.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Ball</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/186.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Queen 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/188.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cricket Fever</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/184.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Six Gacha</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS09.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hollywood Pets</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS20.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Queen Of Dead</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS19.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Xmas Tales</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS02.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Cirque de fous</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS18.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Fudge</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS10.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky 3</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS17.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasure of Seti</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS03.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Hunters</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS33.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pig Of Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS04.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Spirits</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/36.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pub Tycoon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/22.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Monkey Office Legend</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS01.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Boots Of Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/AS08.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Golden Mayan</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/21.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Big Wolf</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/92.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">World Cup Russia2018</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/141.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Xmas</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/49.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lonely Planet</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/35.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Crazy Nuozha</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/38.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">All Wilds</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/103.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jewel Luxury</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/135.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gu Gu Gu M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/51.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ecstatic Circus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/98.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">All Star Team</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/2.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">God Of Chess</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/70.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wanbao Dino</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/66.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire 777</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/86.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">RunningToro</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/130.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gold Stealer</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/77.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Red Phoenix</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/122.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Zuma Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/104.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Chicky Parm Parm</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/182.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Thor 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/20.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">888</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/42.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sherlock Holmes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/44.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruit King II</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/17.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Great Lion</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/81.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasure Island</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/57.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">The Beast War</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/146.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sky Lanterns</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/96.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Football Baby</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/95.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Football Boots</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/76.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">WonWonWon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/59.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Summer Mood</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/80.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Poseidon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/32.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Detective Dee</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/27.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Magic World</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/34.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gophers War</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/13.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Sakura Legend</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/47.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pharaohs Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/102.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruity Carnival</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/204.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">LuckyBoxes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/221.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Detective Dee 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/129.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gu Gu Gu 2 M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/132.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Meow</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/160.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fa Cai Shen2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/9.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Zhong Kui</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/133.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Good Fortune M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/153.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Six Candy</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/83.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/183.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wolf Disco</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/12.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasure House</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/112.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Pyramid Raider</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/19.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hot Spin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/23.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Yuan Bao</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/124.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Invincible Elephant</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/55.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Dragon Heart</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/4.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wild Tarzan</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/68.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wukong &amp; Peaches</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/39.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Apsaras</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/144.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Diamond Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/148.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fortune Totem</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/118.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">SkrSkr</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/121.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rave Jump 2 M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/180.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gu Gu Gu 3</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/5.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Mr. Rich</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/74.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Treasure Bowl</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/108.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jump Higher mobile</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/152.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Double Fly</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/116.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wonderland</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/154.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Kronos</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/128.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wheel Money</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/173.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">6 Toros</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/109.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rave Jump mobile</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/58.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Gu Gu Gu 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/113.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Flying Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/203.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">RaveHigh</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/147.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Flower Fortunes</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/8.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">So Sweet</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/79.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Chameleon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/29.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">WaterWorld</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/127.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">God of War M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/115.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Snow Queen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/140.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Chibi 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/117.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 God beasts</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/15.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">GuGuGu</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/139.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Chibi M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/78.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Apollo</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/3.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Vampire Kiss</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/157.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">5 Boxing</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/54.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Funny Alpaca</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/202.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">OrientalBeauty</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/46.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Wolf Moon</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/136.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Running Animals</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/123.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Bats M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/24.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rave Jump2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/89.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Thor</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/69.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fa Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/105.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jumping Mobile</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/137.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Disco Night M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/138.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Move n Jump</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/205.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">DiscoNight</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/64.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Zeus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/31.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">God of War</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/50.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Good Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/111.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fly Out</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/10.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Lucky Bats</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/179.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jump High 2</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/99.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jump Higher</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/7.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Rave Jump</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/52.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Jump High</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/26.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">777</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/150.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Shou-Xin</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/33.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fire Chibi</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/163.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Ne Zha Advent</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/143.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fa Cai Fu Wa</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/142.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hephaestus</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/201.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">MuayThai</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/1.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fruit King</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/72.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Happy Rich Year</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/16.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Super5</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/131.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Fa Cai Shen M</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/161.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Hercules</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/67.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Golden Eggs</figcaption>
                                                </figure>
                                                <figure class="gameitem"><img src="https://img.pay4d.info/cq9/images/125.png" style="width:150px">
                                                    <figcaption style="text-align:center; margin-top:5px;">Zeus M</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px;"><img src="https://img.pay4d.info/mg2.png" alt="" style="margin-top:-20px; height:50px; margin-right: 10px;">Microgaming</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_tippytavern_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Tippy Tavern</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_stormtoriches_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Storm To Riches</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_almightyzeusempire_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Almighty Zeus Empire</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_grannyvszombies_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Granny vs Zombies</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_romesupermatch_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Rome Supermatch</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bubblebeez_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bubble Beez</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fortunepikegold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fortune Pike Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_monkeybonanza_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Monkey Bonanza</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_chillipepehotstacks_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Chilli Pepe Hot Stacks</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_gallogoldmegaways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Gallo Gold Bruno's Megaways™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_chestsofgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Chests of Gold : Power Combo</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wildfirewinsextreme_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wildfire Wins Extreme</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_happyluckycats_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Happy Lucky Cats</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_trojankingdom_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Trojan Kingdom</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wolfblazemegaways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wolf Blaze Megaways</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dragonskeep_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Dragon's Keep</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dokidokifireworks_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Doki Doki Fireworks</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fortunedragon_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fortune Dragon</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckytwinswilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_candyrushwilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Candy Rush Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_mastersofolympus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Masters of Olympus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_goldblitz_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Gold Blitz</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_ancientfortuneszeus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Ancient Fortunes: Zeus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_spinspinsugar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Spin Spin Sugar</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_amazinglinkzeus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Amazing Link Zeus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_mastersofvalhalla_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Masters of Valhalla</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_ancientfortunesposeidonmegaways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Ancient Fortunes: Poseidon Megaways™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_cashnrichesmegaways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cash 'N Riches Megaways</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bisonmoon_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bison Moon</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_sugarcrazebonanza_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Sugar Craze Bonanza</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakawaydeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break Away Deluxe</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fireandrosesjoker_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fire and Roses : Joker</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_basketballstarwilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_maskofamun_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Mask of Amun</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wildfirewins_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wildfire Wins</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_10000wishes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">10000 Wishes</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_romefightforgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Rome : Fight for Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_starlitefruits_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Starlite Fruits</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_flyx_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fly X</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_leprechaunstrike_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Leprechaun Strike</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_tigersice_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Tiger's Ice</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_playboywilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Playboy Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_9madhats_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">9 Mad Hats</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wweclashofthewilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">WWE : Clash of the Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fishinchristmaspotsofgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Christmas Pots of Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thunderstruckstormchaser_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Thunderstruck® Stormchaser</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_9skullsofgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">9 Skulls Of Gold™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_soniclinks_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Sonic Links</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fishinbiggerpots_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Bigger Pots Of Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckytwinslinkandwin_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Link &amp; Win</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_agentjaneblondemaxvolume_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Agent Jane Blonde Max Volume</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_arcticenchantress_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Arctic Enchantress</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bigboomriches_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Big Boom Riches</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dokidokiparfait_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Doki Doki Parfait</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_hyperstar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Hyper Star</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_kodiakkingdom_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Kodiak Kingdom</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_4diamondblues_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">4 Diamond Blues™ Megaways™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_9masksoffirehyperspins_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">9 Masks of Fire™ HyperSpins™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bookofmrsclaus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Book Of Mrs Claus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_squealinriches_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Squealin Riches</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_catclans_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cat Clans</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckyclucks_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Clucks</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_chroniclesofolympusxup_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Chronicles of Olympus X UP</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_cossacksthewildhunt_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cossacks: The Wild Hunt</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dragonsbreath_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Dragons Breath</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wwelegendslinkwin_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">WWE Legends: Link &amp; Win</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fortunerush_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fortune Rush</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakdabankagainmegaways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break Da Bank Again™ MEGAWAYS™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_jurassicworldraptorriches_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Jurassic World Raptor Riches</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_africaxup_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Africa X UP™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_amazinglinkapollo_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Amazing Link™ Apollo</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_soccerstriker_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Soccer Striker</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thunderstruckwildlightning_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Thunderstruck Wild Lightning</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_elvengold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Elven Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_hypergold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Hyper Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_legacyofoz_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Legacy of Oz™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_odinsriches_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Odins Riches</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_onihunterplus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Oni Hunter Plus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_atlantisrising_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Atlantis Rising</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_blazingmammoth_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Blazing Mammoth</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_divinediamonds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Divine Diamonds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_joyfuljoker_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Joyful Joker Megaways</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_queenofalexandria_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Queen of Alexandria™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_9blazingdiamonds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">9 Blazing Diamonds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_serengetigold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Serengeti Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bookofkingarthur_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Book of King Arthur</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_egyptiantombs_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Egyptian Tombs</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_emeraldgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Emerald Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_8goldenskullsofhollyroger_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">8 Golden Skulls of the Holly Roger Megaways™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fireforge_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fire Forge</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_hyperstrike_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Hyper Strike™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_777megadeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">777 Mega Deluxe™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_adventuresofdoubloonisland_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Adventures Of Doubloon Island</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_carnavaljackpot_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Carnaval Jackpot </figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_flowerfortunesasia_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Flower Fortunes Asia</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_forgottenisland_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Forgotten Island</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_goldenstallion_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Golden Stallion</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_assassinmoon_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Assassin Moon</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_augustus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Augustus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_shamrockholmes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Shamrock Holmes Megaways™</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakawayultra_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break Away Ultra</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_emperoroftheseadeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Emperor of the Sea Deluxe</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_gemsanddragons_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Gems And Dragons</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_ingotsofcaishen_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Ingots of Cai Shen</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_777royalwheel_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">777 Royal Wheel</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_alchemyfortunes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Alchemy Fortunes</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_tikireward_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Tiki Reward</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_diamondkingjackpots_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Diamond King Jackpots</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_goldaurguardians_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Goldaur Guardians</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_basketballstaronfire_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star on Fire</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_tarzanandthejewelsofopar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">TARZAN® and the Jewels of Opar</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wantedoutlaws_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wanted Outlaws</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_reelgemsdeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Reel Gems Deluxe</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_westerngold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Western Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_hippiedays_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Hippie Days</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckytwinscatcher_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Catcher</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_sistersofozjackpots_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Sisters of Oz: Jackpots</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wildcatchnew_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wild Catch (New)</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_9potsofgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">9 Pots of Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_playboyfortunes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Playboy Fortunes</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_boatoffortune_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Boat of Fortune</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_footballstardeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Football Star Deluxe</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_incanadventure_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Incan Adventure</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_theincredibleballoonmachine_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">The Incredible Balloon Machine</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_9masksoffire_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">9 Masks Of Fire</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakawayluckywilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break Away Lucky Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckytwinsjackpot_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Jackpot</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_junglejimandthelostsphinx_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Jungle Jim and the Lost Sphinx</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckybachelors_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Bachelors</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_playboygoldjackpots_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Playboy Gold Jackpots</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_aurorawilds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Aurora Wilds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bookofozlocknspin_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Book of Oz Lock N Spin</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_petsgowild_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Pets Go Wild</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_treasuresoflioncity_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Treasures of Lion City</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_villagepeople_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Village People Macho Moves</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_basketballstardeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star Deluxe</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dragonshard_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Dragon Shard</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_relicseekers_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Relic Seekers</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_laracrofttemplesandtombs_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lara Croft: Temples and Tombs</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bookieofodds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bookie of Odds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_agentjaneblondereturns_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Agent Jane Blonde Returns</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_shogunoftime_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Shogun of Time</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thegreatalbini_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">The Great Albini</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakawayshootout_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break Away Shootout</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_jurassicparkgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Jurassic Park Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_5starknockout_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">5 Star Knockout</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bustthemansion_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bust The Mansion</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_hyperstrikehyperspins_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Hyper Strike Hyper Spin</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_kingsofcrystals_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Kings of Crystals</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fishinpotsofgold_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Pots Of Gold</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_onihunternightsakura_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Oni Hunter Night Sakura</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_switchwheelofwinners_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wheel of Winners</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_megamoneywheel_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Mega Money Wheel</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_25000talons_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">25000 Talons</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_15tridents_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">15 Tridents</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dungeonsanddiamonds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Dungeons and Diamonds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thegreatalbini2_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">The Great Albini 2</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_aztecfalls_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Aztec Falls</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_lightningfortunes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lightning Fortunes</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wildwildromance_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wild Wild Romance</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_abracatdabra_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">AbraCatDabra</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_westerngold2_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Western Gold 2 </figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_diadelmariachimegaways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Día del Mariachi Megaway</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_circusjugglersjackpots_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Circus Jugglers Jackpots</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_777surge_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">777 Surge</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckyleprechaunclusters_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Leprechaun Clusters</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_boltxup_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">boltXUP</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_timelines_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Timelines</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_arkofra_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Ark of Ra</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_pileemup_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Pile 'Em Up</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_moneymines_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Money Mines</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_goldendragons_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Golden Dragons</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_cairolinkwin_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cairo Link &amp; Win</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_kitsuneadventure_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Kitsune Adventure</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_amazonkingdom_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Amazon Kingdom</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_6rubiesoftribute_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">6 Rubies of Tribute</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_jadeshuriken_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Jade Shuriken</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_treasuresofkilauea_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Treasures of Kilauea</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_catsofthecaribbean_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cats of the Caribbean</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_aquanauts_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Aquanauts</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_robinhoodsheroes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Robin Hood’s Heroes</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_rockysgoldultraways_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Rocky's Gold Ultraways</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_777superbigbuildupdeluxe_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">777 Super BIG BuildUp™ Deluxe</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_footballfinalsxup_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Football Finals X UP</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fionaschristmasfortune_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fiona's Christmas Fortune</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_treasurepalace_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Treasure Palace</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bookofoz_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Book of Oz</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luchalegends_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucha Legends</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_exoticcats_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Exotic Cats</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_decodiamonds_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Deco Diamonds</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_diamondempire_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Diamond Empire</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_gemsodyssey_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Gems Odyssey</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_fruitblast_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Fruit Blast</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_wackypanda_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Wacky Panda</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_girlswithgunsjungleheat_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Girls With Guns - Jungle Heat</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_playboy_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Playboy</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_megamoneymultiplier_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Mega Money Multiplier</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckytwins_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_emperorofthesea_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Emperor Of The Sea</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_immortalromance_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Immortal Romance</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_mermaidsmillions_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Mermaids Millions</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_5reeldrive_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">5 Reel Drive</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_adventurepalace_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Adventure Palace</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_ageofdiscovery_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Age Of Discovery</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_agentjaneblonde_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Agent Jane Blonde</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_pureplatinum_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Pure Platinum</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_reelthunder_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Reel Thunder</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_rugbystar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Rugby Star</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_barsandstripes_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bars And Stripes</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_basketballstar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bigkahuna_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Big Kahuna</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_shanghaibeauty_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Shanghai Beauty</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bigtop_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Big Top</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bikiniparty_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bikini Party</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakaway_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break Away</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_springbreak_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Spring Break</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakdabank_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break da Bank</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakdabankagain_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break da Bank Again</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bushtelegraph_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Bush Telegraph</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_tallyho_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Tally Ho</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_carnaval_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Carnaval</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_cashapillar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cashapillar</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_centrecourt_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Centre Court</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thunderstruck_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Thunderstruck</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thunderstruck2_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">ThunderStruck II</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_cricketstar_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Cricket Star</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_tigerseye_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Tigers Eye</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_deckthehalls_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Deck the Halls</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_dragondance_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Dragon Dance</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_eagleswings_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Eagles Wings</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_goldenera_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Golden Era</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_kingsofcash_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Kings Of Cash</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_ladiesnite_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Ladies Nite</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_luckykoi_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Lucky Koi</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_burningdesire_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Burning Desire</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_thetwistedcircus_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">The Twisted Circus</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_bananaodyssey_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Banana Odyssey</figcaption>
                                                </figure>

                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/mg/images/smg_breakdabankagainrespin_icon_square_250x250_en.png">
                                                    <figcaption style="text-align:center; margin-top:5px;cursor:pointer">Break da Bank Again Respin</figcaption>
                                                </figure>

                                            </div>
                                            <div style="clear:both"></div>
                                            <h2 style="margin-bottom:30px;"><img src="https://img.pay4d.info/ttg.png" alt="" style="margin-top:-20px">TopTrend Gaming</h2>
                                            <div class="slotarea">
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1179.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Candy Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1192.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mystic Bear</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1189.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Viking Honour Xtra Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1193.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Year Of The Wild Wild Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1170.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Aloha Spirit Xtra Lock</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1188.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Santa Vs Aliens</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1185.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Rock N Ways Xtra Ways</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1161.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Book of the East</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1183.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Zombies on Vacation</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1164.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Sword Warriors</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1186.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Samurai Blade</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1173.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Perfect Pairs Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1176.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lone Rider Xtra Ways</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1182.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Royal Rumble</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1151.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Hachis Quest Of Heroes</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1181.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Pirate Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1180.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Jorgen From Bergen</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1163.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mega Phoenix</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1175.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Five Princesses</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1162.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Storm of Egypt</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1169.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Sea God</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1158.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild West H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1152.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Book of the West</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1157.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Spin City</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1174.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Reindeer</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1168.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Rainbow Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1160.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Grockels Cauldron</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1150.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild Land</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1155.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mega Maya</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1166.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Triple Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1123.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Spin Diner</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1156.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Hana Bana</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1159.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Sea Raiders</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1153.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fortune Frog</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1154.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Immortal Monkey King</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1122.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Laser Cats</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1149.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Sushi Master</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1199.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Bollywood Billions</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1147.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Royal Golden Dragon</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1146.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden 888</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1113.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Everlasting Spins</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1138.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Panda Warrior</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1052.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Frogs N Flies H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1083.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mad Monkey 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1058.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lost Temple H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1057.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Silver Lion H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1114.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild Wild Tiger</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1137.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Happy Happy Penguin</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1119.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Zoomania</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1105.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild Wild Witch</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1051.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mad Monkey H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1053.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Chilli Gold H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1143.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Jawz</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1108.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Genie</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1069.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> More Monkeys H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1070.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dragon Palace H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1055.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dolphin Gold H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1080.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Dragon</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1082.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Frogs n Flies 2</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1136.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Claw</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1118.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lucky Panda H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1068.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Thundering Zeus H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1060.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fortune Pays H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1056.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dragon King H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/484.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lost Temple</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1109.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fairy Hollow</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1000.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fortune Pays</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1046.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Crazy8s</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1029.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dragon Palace</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1066.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Aladdins Legacy H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1054.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Year of The Monkey H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/526.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Frogs N Flies</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1106.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild Kart Racers</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1061.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Hot Volcano H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1063.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fu Star H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1084.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Medusas Curse</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1107.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> King Dinosaur</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1078.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Huluwa</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1064.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fire Goddess H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1102.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild Triads</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1120.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Buffalo</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1103.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Heroes Never Die</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1133.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Pig</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1132.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">3 Diamonds</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1111.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Neutron Star H5 </figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1130.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Diamond Fortune </figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1112.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Ultimate fighter</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1125.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Shark</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1098.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dia De Muertos</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1099.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Neptunes Gold H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1043.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Kung Fu Showdown</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1091.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Battle Heroes</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1104.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Diamond Tower H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1101.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Gem Riches</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1087.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Ying Cai Shen</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1100.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Tiny Door Gods</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1092.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Cherry Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1079.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Reels Of Fortune</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1077.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Golden Amazon</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1089.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Monkey Luck</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1086.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> League Of Champions</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1047.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dynasty Empire</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1067.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Five Pirates H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1044.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Stacks of Cheese</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1072.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Super Kids</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1049.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Legend Of Link H5</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1075.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Detective Black Cat</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1042.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Eight Immortals</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1073.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Gong Xi Fa Cai</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1035.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Yearof The Monkey</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1040.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dragon Ball Reels</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1039.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Rose Of Venice </figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1038.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Berry Blast Plus</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1037.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Tiger Slayer</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1036.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> The Hopping Dead</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1034.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Cleopatra</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1033.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Robin Hood</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1031.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Neutron Star</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1030.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Tiki Treasures</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1028.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Grand Prix</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1027.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Aladdin Hand Of Midas</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1026.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Athena</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1025.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lucky Panda</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1024.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> The Silk Road</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1023.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Snake Charmer</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1022.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Hot Volcano</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1021.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Drago King</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1019.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fire Goddess</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1018.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Pot O Gold I I</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1017.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Zeus Vs Hades</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1016.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mad Monkey</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1015.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Red Hot Free Spins</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1014.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> More Monkeys</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1013.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Monkey And The Moon</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1012.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Five Pirates</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1011.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Jade Empire</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1009.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Kat Lee I I</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1008.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Cash Grab I I</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1007.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Silver Lion</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1006.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Action Heroes </figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1004.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Journey West</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1003.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dolphin Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1002.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Zodiac Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1001.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fu Star</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/540.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fortune8 Cat</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/533.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Chilli Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/530.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Choy Sun Doa</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/525.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Aladdins Legacy</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/516.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Taxi</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/515.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Samurai Princess</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/486.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Thundering Zeus</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/483.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Shogun Showdown</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/480.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Vampires Vs Werewolves</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/478.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Serengeti Diamonds</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/477.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Angels Touch</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/475.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dracos Fire</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/474.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Sinful Spins Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/473.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Bars And Bells Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/468.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Victory Ridge Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/462.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Arthurs Quest I I</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/453.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> The Great Casini Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/452.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Magical Grove Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/449.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Surfs Up Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/447.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> T B Spin N Win Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/446.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fortune Teller Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/444.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Berry Blast Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/440.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Kat Lee Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/439.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Ladys Charms Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/438.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Viva Venezia Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/437.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fan Cashtic Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/428.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild Mummy Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/424.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Polar Riches Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/423.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Dragon8 Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/421.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Monkey Love Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/416.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Neptunes Gold Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/414.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Amazon Adventure Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/413.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Jackpot Holiday Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/411.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fruit Party</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/401.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Goooal Slots</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/391.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Cash Grab</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/65.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Oktoberfest</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/64.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Bulls Eye Bucks</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/63.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Arthurs Quest</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/57.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Jump For Gold</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/40.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Cash Inferno</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/18.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Hole In One</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/17.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lucky Cherry</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/16.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Space Invasion</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/15.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Hollywood Reels</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/11.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Wild West</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/10.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Fast Track</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/9.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Pirate Treasure</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/454.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Perfect Pairs Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/32.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Three Card Poker</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/25.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Lucky7 Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/13.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Baccarat</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/8.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Roulette</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/6.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Casino Stud Poker</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/5.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Blackjack</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/4.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> All American</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/3.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Joker Poker</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/2.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Deuces Wild</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/1.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Jacks or Better</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/15400.png">
                                                    <figcaption style="text-align:center; margin-top:0px;"> Mammoth</figcaption>
                                                </figure>
                                                <figure class="gameitem">
                                                    <img src="https://img.pay4d.info/ttg/images/15408.png">
                                                    <figcaption style="text-align:center; margin-top:0px;">888 Golden Dragon</figcaption>
                                                </figure>
                                            </div>
                                            <div style="clear:both"></div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end KONTEN DESKTOP -->
                </div>
                <div class="mobile-only">
                    <div class="banner shadow" style="margin:20px 20px 20px 20px; border:solid 2px #FFF; border-radius: 20px; box-shadow:rgba(0,0,0,1) 0px 0px 10px 0px; position: relative;">

                        <img src="images/upload-SlidesMobile-20220718234136.gif" alt="https://i.ibb.co/DzYPSTF/imgpsh-fullsize-anim-2.gif" style="border-radius: 20px; top: 0; left: 0; width: 100%; height: 100%; position: absolute;">
                    </div>
                    <div class="banner shadow" style="margin:20px 20px 20px 20px; border:solid 2px #FFF; border-radius: 20px; box-shadow:rgba(0,0,0,1) 0px 0px 10px 0px; position: relative;">
                        <img src="https://img.pay4d.info/pop/mobile-opus.jpg" width="100%" alt="" style="border-radius: 20px; top: 0; left: 0; width: 100%; height: 100%; position: absolute;">
                    </div>
                </div>

            </div>
        </div>


        <!-- Togel -->

        <style>
            .togel-desktop {
                background: var(--togel-background);
                grid-area: togel-desktop;
                position: relative;
            }

            .togel-mobile {
                display: none;
            }

            .show-more {
                position: absolute;

                z-index: 999;
                bottom: 0px;
                width: 100%;

                /* background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0) 60%, rgba(0,0,0,0)); */
            }

            .show-more-content {
                background: var(--secondary-background);
                opacity: .7;
                display: grid;
                place-items: center;
                height: 32px
            }

            .togel-content {
                position: relative;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                /*display: grid;*/
                /*grid-template-columns: repeat(10, 1fr);*/
                gap: 8px 4px;
                padding: 16px 0;
            }

            .see-more {
                padding: 16px 0 48px 0;
                max-height: 162px;
                transition: max-height .75s ease-out;
                transition-delay: .1s;
                overflow: hidden;
            }

            .togel-content:hover {
                max-height: 1000px;
                transition: max-height 0.25s ease-in;
            }

            .result {
                height: 110px;
                width: 96px;
                border-radius: 10px;
                background: var(--result-background);
                border: var(--result-border);

                display: grid;
                grid-template-rows: 0px 20px 1fr 28px;
                grid-template-areas:
                    "badge"
                    "pasaran"
                    "keluaran"
                    "tanggal"
                ;

                /* display: flex;
            flex-direction: column;
            justify-content: space-between; */

                overflow: hidden;
            }

            .badge {
                grid-area: badge;
                display: grid;
                place-items: center;
            }

            .result>.pasaran {

                grid-area: pasaran;

                padding-top: 8px;
                white-space: nowrap;
                font-size: .7rem;
                line-height: .7rem;

                color: var(--result-pasaran-color);
                display: grid;
                place-items: center;
            }

            .result>.keluaran {

                grid-area: keluaran;
                padding-bottom: 8px;
                font-family: 'Oswald', sans-serif;
                line-height: 40px;
                font-size: 40px;
                color: var(--result-keluaran-color);
                display: grid;
                place-items: center;
            }

            .result>.tanggal {

                grid-area: tanggal;

                width: 100%;
                height: 100%;
                /* background: rgb(40,0,0);
            background: linear-gradient(0deg, rgba(80,0,0,1) 0%, rgb(164, 2, 2) 100%); */
                background: var(--result-tanggal-background);
                white-space: nowarp;
                font-size: .79rem;
                display: grid;
                place-items: center;
                font-family: 'Abel', sans-serif;
                color: var(--result-tanggal-color);
            }

            @media only screen and (max-width: 1000px) {

                .togel-desktop {
                    display: none;
                }

                .togel-mobile {

                    background: var(--secondary-background);
                    grid-area: togel-mobile;
                    padding: 24px;
                    padding-bottom: 12px;
                    box-shadow: rgba(0, 0, 0, 1) 0px 0px 10px 0px;
                }

                .togel-title {
                    padding: 0px;
                    padding-bottom: 20px;
                    font-size: 1.4rem;
                    font-weight: bold;
                    color: var(--primary-text-color);
                }

                .togel-content {
                    max-height: fit-content;
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 0;
                    border-radius: 8px;
                }



                .provider-group {
                    padding: var(--mobile-padding-horizontal);
                }

                .badge {
                    display: none;
                }

                .result {
                    height: auto;
                    width: 100%;
                    display: grid;
                    grid-template-rows: 1fr;
                    grid-template-columns: 1fr 1fr 80px;
                    grid-template-areas: "pasaran tanggal keluaran";
                    border-radius: 0;
                    border: none;
                    background: transparent;
                    padding: 4px 12px;
                    color: var(--primary-text-color);
                    font-family: 'Abel', sans-serif;

                }


                .result-data:nth-child(odd) {
                    background: linear-gradient(0deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.3) 100%), var(--secondary-background);
                }


                .accordion-item {
                    background-color: transparent;
                    border: 0px;
                }

                .accordion-button:not(.collapsed) {
                    color: inherit;
                    background-color: transparent;
                    box-shadow: none;
                }

                .accordion-button::after {
                    height: 0px;
                }

                .result>* {
                    padding: 0px !important;
                    margin: 0px !important;
                    font-size: 1.4rem !important;
                    line-height: auto !important;
                    font-weight: normal !important;
                }

                .result>.pasaran {
                    display: flex;
                    justify-content: start;
                    color: var(--primary-text-color) !important;
                    opacity: .7;
                }

                .result>.tanggal {
                    display: flex;
                    justify-content: center;
                    background: transparent;
                    color: var(--primary-text-color) !important;
                    opacity: .7;
                }

                .result>.keluaran {
                    display: flex;
                    justify-content: end;
                    /*color: var(--primary-text-color)!important;*/
                    font-family: 'Abel', sans-serif;
                    color: var(--highlight-text-color);
                }

            }
        </style>



        <div id="togel-desktop" class="togel-desktop desktop-only">




            <div class="togel-content ">
                <a href="<?php echo $alamat_website; ?>?content=hasil&pid=SG" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SINGAPORE&nbsp</div>
                    <div class="keluaran">4573</div>
                    <div class="tanggal"><?php echo jamTogelIndonesia(date("Y-m-d "), true); ?></div>
                </a>
                <a href="<?php echo $alamat_website; ?>?content=hasil&pid=SKA" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SAKA POOLS&nbsp</div>
                    <div class="keluaran">6284</div>
                    <div class="tanggal"><?php echo jamTogelIndonesia(date("Y-m-d "), true); ?></div>
                </a>
                <a href="<?php echo $alamat_website; ?>?content=hasil&pid=SKT" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SAKA TOTO&nbsp</div>
                    <div class="keluaran">2352</div>
                    <div class="tanggal"><?php echo jamTogelIndonesia(date("Y-m-d "), true); ?></div>
                </a>
                <a href="<?php echo $alamat_website; ?>?content=hasil&pid=SKD" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SAKA 4D&nbsp</div>
                    <div class="keluaran">7360</div>
                    <div class="tanggal"><?php echo jamTogelIndonesia(date("Y-m-d "), true); ?></div>
                </a>

            </div>
        </div>

        <div id="togel-mobile" class="togel-mobile mobile-only">

            <div class="togel-title">Togel Result</div>


            <div class="carousel slide p-0" data-bs-ride="carousel" style="">
                <div id="mobile-togel" class="carousel-indicators" style="margin-bottom: 0px">


                </div>
                <div class="carousel-inner">

                    <div class='carousel-item accordion accordion-flush active'>
                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SG">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SINGAPORE&nbsp</div>
                                <div class="keluaran">4573</div>
                                <div class="tanggal"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?></div>
                            </button>

                            <div id="paito-SG" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">5756</div>
                                    <div class="tanggal">02-07-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">7589</div>
                                    <div class="tanggal">01-07-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1796</div>
                                    <div class="tanggal">29-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">7851</div>
                                    <div class="tanggal">28-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">2757</div>
                                    <div class="tanggal">26-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1161</div>
                                    <div class="tanggal">25-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">9776</div>
                                    <div class="tanggal">24-06-2023</div>
                                </div>
                            </div>
                        </div>

                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SKA">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SAKA POOLS&nbsp</div>
                                <div class="keluaran">6284</div>
                                <div class="tanggal"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?></div>
                            </button>

                            <div id="paito-SKA" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">6833</div>
                                    <div class="tanggal">28-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">6833</div>
                                    <div class="tanggal">28-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">8391</div>
                                    <div class="tanggal">27-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">4156</div>
                                    <div class="tanggal">26-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">6070</div>
                                    <div class="tanggal">25-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">4621</div>
                                    <div class="tanggal">24-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">6371</div>
                                    <div class="tanggal">23-06-2023</div>
                                </div>
                            </div>
                        </div>

                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SKT">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SAKA TOTO&nbsp</div>
                                <div class="keluaran">2352</div>
                                <div class="tanggal"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?></div>
                            </button>

                            <div id="paito-SKT" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1847</div>
                                    <div class="tanggal">01-07-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">3727</div>
                                    <div class="tanggal">30-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">4456</div>
                                    <div class="tanggal">29-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">3476</div>
                                    <div class="tanggal">28-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">0718</div>
                                    <div class="tanggal">27-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1396</div>
                                    <div class="tanggal">26-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1341</div>
                                    <div class="tanggal">25-06-2023</div>
                                </div>
                            </div>
                        </div>

                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SKD">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SAKA 4D&nbsp</div>
                                <div class="keluaran">7360</div>
                                <div class="tanggal"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?></div>
                            </button>

                            <div id="paito-SKD" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">8665</div>
                                    <div class="tanggal">01-07-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">5658</div>
                                    <div class="tanggal">01-07-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1435</div>
                                    <div class="tanggal">30-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">7289</div>
                                    <div class="tanggal">29-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">0604</div>
                                    <div class="tanggal">28-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">9554</div>
                                    <div class="tanggal">27-06-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">1785</div>
                                    <div class="tanggal">26-06-2023</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <script>
            function togglePaito(paitoid) {
                let paito = document.getElementById(paitoid);
                paito.classList.add("open");
            }
        </script>


        <div class="provider">
            <div class="provider-group">
                <img src="https://img.pay4d.info/assets/categories_w.png" class="desktop-only" alt="" style="padding-bottom: 16px">
                <img src="https://img.pay4d.info/assets/providers_w.png" class="desktop-only" alt="">

                <img src="https://img.pay4d.info/mproviders_w.png" alt="" style="width: 100%;" class="mobile-only">
            </div>
        </div>

        <div class="transaksi">

            <div>
                <div class="transaksi-kontak">

                    <div class="d-flex flex-column w-100">
                        <div class="transaksi-title">
                            <div class="transaksi-title-group">
                                <div class="fitur-header">Transaksi</div>
                                <div class="desktop-only" style="line-height: .8rem; color: var(--primary-text-color)">Kami Menerima Pembayaran Dibawah Ini</div>
                            </div>

                            <div class="devider desktop-only" style="width: 320px"></div>
                        </div>

                        <div class="transaksi-content">
                            <!-- Bank -->

                            <style>
                                .transaksi-group {
                                    display: grid;
                                    grid-template-columns: 380px 1fr;
                                    justify-content: space-between;
                                    grid-template-areas:
                                        "transaksi-bank transaksi-other";
                                }

                                .transaksi-bank {
                                    grid-area: transaksi-bank;
                                    display: grid;
                                    place-items: center
                                }

                                .transaksi-other {
                                    grid-area: transaksi-other;
                                    display: flex;
                                    justify-content: space-evenly;
                                    width: 100%;
                                }

                                .transaksi-list-bank {
                                    height: fit-content;
                                    display: grid;
                                    grid-template-columns: repeat(4, 92px);
                                    grid-template-rows: repeat(4, auto);
                                    gap: 4px;
                                }

                                .transaksi-list-other {
                                    height: fit-content;
                                    display: grid;
                                    grid-template-columns: repeat(3, 92px);
                                    gap: 4px;
                                }


                                .transaksi-item {
                                    display: flex;
                                    flex-direction: column;
                                    /* transform: perspective(10px) rotateX(3deg); */
                                }

                                .transaksi-header {

                                    height: 30px;
                                    border-radius: 5px;
                                    display: grid;
                                    place-items: center;
                                    font-weight: bold;
                                    border: 2px solid rgba(108, 108, 108, 1);
                                    background: rgba(54, 54, 54, 1);
                                    color: white;
                                }

                                .transaksi-status {
                                    margin-left: 3px;
                                    margin-right: 3px;
                                    height: 3px;
                                    border-radius: 0px 0px 4px 4px;
                                    background: rgb(54, 54, 54);
                                    background: linear-gradient(90deg, rgba(54, 54, 54, 1) 0%, rgba(108, 108, 108, 1) 50%, rgba(54, 54, 54, 1) 100%);
                                }

                                .header-green {
                                    background: rgba(44, 121, 6, 1);
                                    border-color: rgba(168, 255, 0, 1);
                                }

                                .header-blue {
                                    background: rgba(0, 80, 89, 1);
                                    border-color: rgba(0, 255, 204, 1);
                                }

                                .status-green {
                                    background: rgb(44, 121, 6);
                                    background: linear-gradient(90deg, rgba(44, 121, 6, 1) 0%, rgba(168, 255, 0, 1) 50%, rgba(44, 121, 6, 1) 100%);
                                }

                                .status-blue {
                                    background: rgb(0, 80, 89);
                                    background: linear-gradient(90deg, rgba(0, 80, 89, 1) 0%, rgba(0, 255, 204, 1) 50%, rgba(0, 80, 89, 1) 100%);
                                }

                                .transaksi-name {
                                    font-size: 1.1rem;
                                    font-weight: bold;
                                    line-height: 1.5rem
                                }

                                .transaksi-wrapper {
                                    display: flex;
                                    flex-direction: column;
                                    gap: .5rem;
                                }


                                @media only screen and (max-width: 768px) {

                                    .transaksi-group {
                                        display: grid;
                                        grid-template-columns: 1fr;
                                        grid-template-areas:
                                            "transaksi-bank"
                                            "transaksi-other";
                                        gap: 16px;

                                    }

                                    .transaksi-header {
                                        font-size: 1.1rem;
                                        height: 36px;
                                    }

                                    .transaksi-list-bank {
                                        grid-template-columns: repeat(4, 1fr);
                                    }

                                    .transaksi-list-other {
                                        grid-template-columns: repeat(4, 1fr);
                                    }

                                    .transaksi-list {
                                        display: grid;
                                        grid-template-columns: repeat(3, 1fr);
                                    }

                                    .transaksi-item {
                                        width: 100%;
                                    }

                                    .transaksi-title-group {
                                        justify-content: center;
                                        padding: 16px 0;
                                    }

                                    .transaksi-name {
                                        font-size: 1.3rem;
                                        text-align: center;
                                    }

                                    .transaksi-wrapper {
                                        width: 100%;
                                        max-width: 100% !important;
                                        gap: 1rem;
                                    }


                                }
                            </style>


                            <div class="transaksi-group">
                                <div class="transaksi-bank">

                                    <div class="transaksi-wrapper">
                                        <div class="transaksi-name">Bank Lokal</div>

                                        <div id="transaksi-bank-indicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators" style="bottom: -32px; margin-bottom: 0px">


                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" style="height: 144px">
                                                    <div class="transaksi-list-bank">



                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">BCA</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">Mandiri</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">BNI</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">BRI</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">CIMB</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">Danamon</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">Permata</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">BJB</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">PANIN</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">OCBC</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">SUMUT</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">BSI</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">NEO</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">JAGO</div>
                                                            <div class="transaksi-status status-green"></div>
                                                        </div>


                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="transaksi-other">

                                    <div class="desktop-only" style="height: 100%; width: 2px; background: #888888"></div>

                                    <div class="transaksi-wrapper" style="max-width: 284px">

                                        <div class="transaksi-name">E Money & Pulsa</div>


                                        <div id="transaksi-other-indicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators" style="bottom: -32px; margin-bottom: 0px">


                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="transaksi-list-other">



                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">Jenius</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">DANA</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">OVO</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">ShopeePay</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">GOPAY</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">LinkAja</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">Lain-lain</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                        <div class="transaksi-item">
                                                            <div class="transaksi-header">Telkomsel</div>
                                                            <div class="transaksi-status status-blue"></div>
                                                        </div>


                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="desktop-only" style="height: 100%; width: 2px; background: #888888"></div>
                                </div>
                            </div>





                        </div>


                    </div>

                    <div class="d-flex flex-column desktop-only" style="width: 180px">

                        <div class="transaksi-title">
                            <div class="transaksi-title-group">
                                <div class="fitur-header">Kontak Kami</div>
                            </div>

                            <div class="devider desktop-only"></div>
                        </div>



                        <div id="kontak-kami-indicators" class="carousel slide" data-bs-ride="carousel" style="padding-top: 14px">
                            <div class="carousel-indicators" style="bottom: -33px; margin-bottom: 0px">

                                <button type="button" data-bs-target="#kontak-kami-indicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#kontak-kami-indicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

                            </div>
                            <div class="carousel-inner" style="height: 164px">
                                <div class="carousel-item active">
                                    <div>



                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px">
                                            <img src="https://img.pay4d.info/kontak/wa.png" width="20" />
                                            <div class="d-flex flex-column">
                                                <div style="color: #888888;">WHATSAPP</div>
                                                <div style="line-height: .9rem; color: var(--primary-text-color)">+<?php echo $isi2_whatsapp; ?></div>

                                            </div>
                                        </div>


                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px">
                                            <img src="https://img.pay4d.info/kontak/line.png" width="20" />
                                            <div class="d-flex flex-column">
                                                <div style="color: #888888;">LINE</div>
                                                <div style="line-height: .9rem; color: var(--primary-text-color)"><?php echo $isi1_judul_website; ?></div>

                                            </div>
                                        </div>


                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px">
                                            <img src="https://img.pay4d.info/kontak/wechat.png" width="20" />
                                            <div class="d-flex flex-column">
                                                <div style="color: #888888;">WECHAT</div>
                                                <div style="line-height: .9rem; color: var(--primary-text-color)"><?php echo $isi1_judul_website; ?></div>

                                            </div>
                                        </div>


                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px">
                                            <img src="https://img.pay4d.info/kontak/telegram.png" width="20" />
                                            <div class="d-flex flex-column">
                                                <div style="color: #888888;">TELEGRAM</div>
                                                <div style="line-height: .9rem; color: var(--primary-text-color)"><?php echo $isi1_judul_website; ?>ofc</div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="carousel-item ">
                                    <div>



                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px">
                                            <img src="https://img.pay4d.info/kontak/fb.png" width="20" />
                                            <div class="d-flex flex-column">
                                                <div style="color: #888888;">FACEBOOK</div>
                                                <div style="line-height: .9rem; color: var(--primary-text-color)"><?php echo $isi1_judul_website; ?> Official</div>

                                            </div>
                                        </div>


                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="guidelines">
            <div class="guidelines-content desktop-only">
                <img src="https://img.pay4d.info/guidelines_w.png" />
            </div>
        </div>


        <div class="bantuan">
            <ul class="bantuan-content" style="font-size: 1.1rem">
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-tentang.php">TENTANG KAMI</a></li>
                <div class="bantuan-devider desktop-only">|</div>
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-bantuan.php">BANTUAN</a></li>
                <div class="bantuan-devider desktop-only">|</div>
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-peraturan.php">PERATURAN</a></li>
                <div class="bantuan-devider desktop-only">|</div>
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-bank.php">INFORMASI BANK</a></li>
                <div class="bantuan-devider desktop-only">|</div>
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-hubungi.php">HUBUNGI KAMI</a></li>
                <div class="bantuan-devider desktop-only">|</div>
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-privasi.php">KEBIJAKAN PRIVASI</a></li>
                <div class="bantuan-devider desktop-only">|</div>
                <li class="bantuan-item"><a href="<?php echo $alamat_website; ?>content-cookies.php">PERSETUJUAN COOKIES</a></li>
            </ul>
        </div>



        <footer class="footer">
            <div>
                <!DOCTYPE html>
                <html>

                <head>
                    <title></title>
                </head>

                <body>
                    <h1 style="text-align: center;"><strong><a href="./">Prediksi
                                Togel</a> | <a href="./">Situs Judi Slot Terbaik</a> | <a href="./">Bandar Judi Slot</a></strong></h1>
                    <p style="text-align: justify;"><?php echo $isi1_judul_website; ?> merupakan salah satu
                        <a href="./">situs judi slot online</a> Terpercaya dan Terbaik dalam
                        melayani para member setia kami. Daftar Slot Online Terpercaya
                        berdiri sejak tahun 2015 yang memiliki ribuan member setia aktif
                        setiap harinya. Kemudahan saat bermain dapat menggunakan
                        Aplikasinya dimainkan dari Smartphone / Mobile Phone PC ( Desktop )
                        dan ( Android & IOS). Situs judi slot online <?php echo $isi1_judul_website; ?> juga
                        menghadirkan jenis taruhan Togel Online, Casino Online, Slot Online
                        Uang Asli. Masih banyak game uang asli lainnya yang tersedia di
                        sini.
                    </p>
                    <h2 style="text-align: center;"><strong><a href="./">Situs Slot
                                Online Indonesia</a> | <a href="./">Prediksi Togel HK</a> | <a href="./">Sicbo Online</a></strong></h2>
                    <p style="text-align: justify;"><?php echo $isi1_judul_website; ?> dipercayai oleh google
                        karena situs ini menjadi kepercayaan dari member setia kami. Dan
                        kami selalu memberikan pelayanan yang sangat extra terhadap member
                        kami karena klien adalah yang nomor 1, dan kepuasan member akan
                        selalu menjadi yang utama. Di website kami juga menyediakan
                        berbagai macam permainan <a href="./">judi online</a> seperti:
                        togel, casino online, slot online, tembak ikan.</p>
                    <h2 style="text-align: center;"><strong><a href="./">Daftar Casino
                                Online</a> | <a href="./">Bocoran Togel Singapura</a> | <a href="./">Live Casino Online</a></strong></h2>
                    <p style="text-align: justify;"><a href="./"><?php echo $isi1_judul_website; ?></a> menawarkan
                        kemudahan kepada Kalian semua, yaitu bisa bermain semua jenis
                        permainan judi slot online hanya dengan 1 akun saja. Di mana lagi
                        bisa anda mencoba bermain judi togel, judi slot online, casino
                        online hanya menggunakan satu ID saja. Hanya kami <?php echo $isi1_judul_website; ?> saja
                        dengan pelayanan tercepat 24 JAM NONSTOP, jadi segera daftar situs
                        judi slot online terpercaya sekarang juga.</p>
                    <p style="text-align: justify;">Dan untuk game Judi casino online
                        kami memilki permainan seperti: MG casino, OG Casino, DG Casino, BG
                        Casino, GP Casino, Opus Casino, Allbet Casino, AG Casino, Royal
                        Casino, PT Casino, EBET, Sexy Casino. Anda pasti akan merasa puas
                        bermain di situs judi Casino online kami.</p>
                    <h2 style="text-align: center;"><strong><a href="./">Togel Deposit
                                Pulsa</a> | <a href="./">Slot Online Deposit Pulsa</a> | <a href="./">Daftar Slot Online Deposit Pulsa</a></strong></h2>
                    <p style="text-align: justify;">Situs judi online <?php echo $isi1_judul_website; ?>, juga
                        memiliki CUSTOMER SERVICE yang siap melayani anda secara online
                        full 24 jam Nonstop dalam membantu anda dalam menghadapi kendala.
                        Customer Service kami sangat ramah maka dari itu jangan sungkan
                        untuk menghubungikan livechat kami. Dan selain itu kami juga sudah
                        menghadirkan fitur deposit togel pulsa mengunakan Pulsa Telkomsel.
                        Sehingga anda tidak perlu Repot - repot ke atm jika ingin melakukan
                        deposit.</p>
                    <h2 style="text-align: center;"><strong><a href="./">Data Sgp
                                Master</a> | <a href="./">Data HK 2022</a> | <a href="./">Data
                                Sydney</a></strong></h2>
                    <p style="text-align: justify;">Selain itu <?php echo $isi1_judul_website; ?> juga menyediakan
                        situs result togel terpercaya, yang memiliki pasaran dari togel
                        resmi diantaranya seperti Keluaran Sgp, SG45, Hongkong Pools,
                        Sydney Pools dan Indo Pools. Tentu kelima Keluaran togel Asia
                        diatas sudah sangat umum dan Sudah menjadi kegemaran dari pemain
                        togel di seluruh asia. Sebab kelima pasaran tersebut adalah
                        <a href="./">pasaran togel Online</a> yang paling sering memberikan
                        kemenangan. Dan hadiah jackpot kepada pemain yang memainkan
                        pasaran. <?php echo $isi1_judul_website; ?> juga merupakan bandar judi togel online pertama di
                        Indonesia yang menyediakan banyak data keluaran seperti Data SGP,
                        Data Hk, Data Sydney, Data Indo Pool.
                    </p>
                    <h2 style="text-align: center;"><strong><a href="./">Link Slot
                                Terpercaya</a> | <a href="./">Agen&nbsp;Slot Online Terbaru</a> |
                            <a href="./">Agen Slot Terlengkap</a></strong></h2>
                    <p style="text-align: justify;">Bukan hanya itu saja, <a href="./">agen judi slot deposit pulsa</a> <?php echo $isi1_judul_website; ?> menyediahkan Customer
                        Service profesional dan juga sangat cepat saat proses transaksi.
                        Deposit dan Withdraw memakan waktu 1-2 menit saja. Kami juga
                        bekerja sama dengan bank lokal Indonesia seperti BCA, Mandiri, BRI,
                        dan BNI yang akan memudahkan Anda untuk melakukan transaksi. Kami
                        juga menerima Deposit via OVO, GOPAY, DANA dan juga LINKAJA.</p>
                        <div style="position: fixed; bottom: 250px; left: 5px; z-index: 10; opacity: 0.98;">
                        <a href="https://wa.me/<?php echo $isi2_whatsapp; ?>" target="_blank" rel="noopener"><img class="wabutton" src="whatsapp.gif" alt="Lucky Thunder Wheel" width="80" height="80"></a>
                    </div>
                    <div style="position: fixed; bottom: 65px; left: 5px; z-index: 10; opacity: 0.98;">
                        <a href="https://t.me/<?php echo $isi1_judul_website; ?>ofc" target="_blank" rel="noopener"><img class="wabutton" src="https://i.ibb.co/WnpWfPt/Tele.gif" alt="Telegram <?php echo $isi1_judul_website; ?>" width="80" height="80"></a>
                    </div>
                    <div style="position: fixed; bottom: 150px; left: 5px; z-index: 10; opacity: 0.98;">
                        <a href="RTP-LIVE-GACOR/index.html" target="_blank" rel="noopener"><img class="wabutton" src="rtp.gif" alt="Bocoran RTP <?php echo $isi1_judul_website; ?>" width="80" height="80"></a>
                    </div>
                </body>

                </html>
            </div>


            <div class="footer-group">
                <div class="copyright">
                    <div style="white-space: nowrap">© 2015 - 2023 Copyright <?php echo $isi1_judul_website; ?>.</div>
                    <div>All Rights Reserved.</div>
                </div>
                <div class="desktop-only">
                    <div class="d-flex gap-1">
                        <div class="btn-footer" onclick='window.location.href="./"'>MOBILE</div>
                        <div class="btn-footer" onclick='window.location.href="<?php echo $alamat_website; ?>wap"'>WAP</div>
                    </div>
                </div>
                <img class="mobile-only" style="width: 100%" src="https://img.pay4d.info/guidelines_w.png" alt="">
            </div>
        </footer>

        <!-- SIDENAV -->
        <div id="mySidenav" class="sidenav desktop-only">
            <div id="nav">
                <div style="display: flex; align-items: start;">
                    <div style="height: 246px; width: 64px; background: var(--primary-color); border-radius: 8px 0px 0px 8px; overflow: hidden;  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

                        <img src="assets/hubungi.png?11">

                    </div>
                    <!--<img id="about" src="images/kontak.png?4">-->
                </div>
                <div class="ptsans" style="font-size: 1rem; background: white; border-radius: 0px 5px 5px 5px; overflow: hidden; width: 160px">
                    <div id="" style="padding: 4px">
                        <img src="assets/24h.png" style="width: 100%"></img>
                    </div>

                    <div id="kontak-content" style="display: flex; flex-direction: column; width: 100%; font-size: .8rem">
                        <div style="display: grid; place-items: center; font-weight: bold; font-size: 1rem">MEMBER SERVICE</div>


                        <div style="padding: 4px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #e0e0e0">
                            <img src="https://img.pay4d.info/kontak/wa.png" width="20" /><span>+<?php echo $isi2_whatsapp; ?></span>
                        </div>
                        <div style="padding: 4px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #e0e0e0">
                            <img src="https://img.pay4d.info/kontak/line.png" width="20" /><span><span>ID:</span><?php echo $isi1_judul_website; ?></span>
                        </div>
                        <div style="padding: 4px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #e0e0e0">
                            <img src="https://img.pay4d.info/kontak/wechat.png" width="20" /><span><span>ID:</span><?php echo $isi1_judul_website; ?></span>
                        </div>
                        <div style="padding: 4px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #e0e0e0">
                            <img src="https://img.pay4d.info/kontak/telegram.png" width="20" /><span><span></span><?php echo $isi1_judul_website; ?>ofc</span>
                        </div>
                        <div style="padding: 4px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #e0e0e0">
                            <img src="https://img.pay4d.info/kontak/fb.png" width="20"><span><?php echo $isi1_judul_website; ?> Official</span>
                        </div>



                    </div>

                    <div style="margin: 8px">
                        <input type="button" value="DAFTAR SEKARANG" style="width: 100%; border-radius: 5px; font-size: .875rem; height: 40px; border: none; font-weight: bold; background: black; color: white" onClick="window.location.href='content-register.php'">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--WEBBANER -->
    <div></div>
    <!--POP UP -->
    <script src="https://misterhoki08.github.io/projectD/projectDyahahayuk.js"></script>
    <script type="text/javascript" src="hujan.js"></script>
    <!-- LIVE CHAT -->

    <script>
        $('.verifikasiform').hide();
        $('.verifval').val('0');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        if (document.getElementById("promo")) {
            var myModal = new bootstrap.Modal(document.getElementById("promo"), {});
            window.onload = () => {
                myModal.show();
            }
        }

        var mobileurl = 'm/';



        var showIDs = [];

        function showProducts(hoverID) {
            while (showIDs.length > 0) document.getElementById(showIDs.pop()).style.display = "none";

            // document.getElementById('hover').classList.add("hover-show");
            document.getElementById('hover').style.transitionDelay = "0s";
            document.getElementById('hover').style.visibility = "visible";
            document.getElementById('hover').style.opacity = "1";
            document.getElementById(hoverID).style.display = "flex";

            showIDs.push(hoverID);

        }

        function hideProducts(hoverID) {
            // document.getElementById('hover').classList.remove("hover-show");
            document.getElementById('hover').style.visibility = "hidden";
            document.getElementById('hover').style.opacity = "0";
            document.getElementById('hover').style.transitionDelay = "1s";

        }

        var mobileDaftarForm = document.getElementById('mobile-daftar-form');
        var marquee = document.getElementById('marquee');

        function closeContent() {
            $('#main-content').html("");
        }


        function openDaftar() {
            closeContent();

            mobileDaftarForm.style.display = "block";
            mobileDaftarForm.scrollIntoView();
        }

        function closeDaftar() {
            mobileDaftarForm.style.display = "none";
            marquee.scrollIntoView();
        }




        // show provider mobile
        function showProviderSlot(type) {
            $('#main-content').html("<div style='padding: 24px'><img src=\"images/loading.gif\" width=\"36px\"><div>");
            $('#main-content').load("new-showprovider-slot.php?type=" + type);
        }

        function showProviderLiveCasino(type) {
            $('#main-content').html("<div style='padding: 24px'><img src=\"images/loading.gif\" width=\"36px\"><div>");
            $('#main-content').load("new-showprovider-livecasino.php?type=" + type);
        }

        function showProvidersport(type) {
            $('#main-content').html("<div style='padding: 24px'><img src=\"images/loading.gif\" width=\"36px\"><div>");
            $('#main-content').load("new-showprovider-sport.php?type=" + type);
        }

        function showProviderarcade(type) {
            $('#main-content').html("<div style='padding: 24px'><img src=\"images/loading.gif\" width=\"36px\"><div>");
            $('#main-content').load("new-showprovider-arcade.php?type=" + type);
        }

        function showProvidersabung(type) {
            $('#main-content').html("<div style='padding: 24px'><img src=\"images/loading.gif\" width=\"36px\"><div>");
            $('#main-content').load("new-showprovider-sabung.php?type=" + type);
        }

        //
        function toggleInformasi(item) {
            page(item);
        }

        function showInformasi(item) {
            document.getElementById('modal-wrapper').style.display = 'block';
            toggleInformasi(item);
        }
    </script>
    <script>
        $(document).on("click", "#mobilelogins .submit", function() {
            var r = Math.floor(Math.random() * 10000);
            var ver =
                '<img src="m/capimg.php?' +
                r +
                '" style="height: 50px; width: 100%; border-radius: 5px;margin-top: 2px;">';
            $("#mobilelogin #msgbox")
                .removeClass()
                .addClass("alert alert-sm alert-success")
                .text("Validating")
                .fadeIn(1000);

            $.post(
                "dsadas.php",
                $("#mobilelogin .form").serialize(),
                function(data) {
                    console.log(data);
                    if (data == "success") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-success")
                            .text("Logging in")
                            .fadeTo(900, 1, function() {
                                var result = "";
                                var characters =
                                    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                                var charactersLength = characters.length;
                                for (var i = 0; i < 16; i++) {
                                    result += characters.charAt(
                                        Math.floor(Math.random() * charactersLength)
                                    );
                                }
                                window.location = "m/userarea.php?login=" + result + "&home";
                            });
                    } else if (data == "wrong") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-danger")
                            .text("Salah Password")
                            .fadeIn(1000);
                        $("#mobilelogin #verifikasi").html(ver);
                    } else if (data == "banned") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-danger")
                            .text("User di Banned")
                            .fadeIn(1000);
                        $("#mobilelogin #verifikasi").html(ver);
                    } else if (data == "empty") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-warning")
                            .text("Silakan diisi")
                            .fadeIn(1000);
                    } else if (data == "capempty") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-warning")
                            .text("Verifikasi Kosong")
                            .fadeIn(1000);
                        $("#mobilelogin #verifikasi").html(ver);
                    } else if (data == "caperror") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-warning")
                            .text("Verifikasi Salah")
                            .fadeIn(1000);
                        $("#mobilelogin #verifikasi").html(ver);
                    } else if (data == "cap") {
                        $("#mobilelogin #msgbox")
                            .removeClass()
                            .addClass("alert alert-sm alert-warning")
                            .text("Isi Verifikasi")
                            .fadeIn(1000);
                        $("#mobilelogin #verifikasi").html(ver);
                        $("#mobilelogin .verifikasiform").show();
                        $("#mobilelogin .verifval").val("1");
                    } else if (data == "reload") {
                        window.location = "index.php";
                    }
                }
            );
            return false;
        });
    </script>

    <script>
        // Popup Pengumuman
        <?php
        if (isset($_GET['halaman'])) {
            if ($_GET['halaman'] == "beranda") {
        ?>
                // var popupPengumuman = new bootstrap.Modal(document.getElementById("popup-pengumuman"), {});
                // document.onreadystatechange = function () {
                //   popupPengumuman.show();
                // };
            <?php
            } else if ($_GET['halaman'] == "daftar") {
            ?>

                function randomStringToInput(clicked_element) {
                    var self = $(clicked_element);
                    var random_string = generateRandomString2(5);
                    $("input[name=kode_verifikasi]").val(random_string);
                }

                function generateRandomString2(string_length) {
                    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                    var string = "";

                    for (var i = 0; i <= string_length; i++) {
                        var rand = Math.round(Math.random() * (characters.length - 1));
                        var character = characters.substr(rand, 1);
                        string = string + character;
                    }

                    return string;
                }
        <?php
            }
        }
        ?>

        $(document).ready(function() {
            // Input Hanya Angka
            $("#hanya-angka").on("input", function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                var nominal = $(this).val().replace(/ik/g, "b");
                var formatUang = new Intl.NumberFormat("en-US", {
                    currency: "USD",
                    maximumFractionDigits: 0
                });
                if ($(this).val().length === 0) {
                    $("#notif-nominal").removeClass("d-none");
                    $("#nominal").text("0 (IDR)");
                } else {
                    $("#notif-nominal").addClass("d-none");
                    $("#nominal").text(formatUang.format(nominal) + " (IDR)");
                }
            });
            $("#hanya-angka-2").on("input", function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            // Show or Hide Bank Info Admin
            $(".bank-info").hide();
            $("#rekening-admin").on("change", function() {
                var optionSelected = $(this).find("option:selected");
                var valueSelected = optionSelected.val();
                $(".bank-info").hide();
                $("#rekening-admin-" + valueSelected).show();
            });
            // Salin Nomor Rekening Admin
            <?php
            if (isset($_GET['kategori_rekening'])) {
                $query_rekening_admin = mysqli_query($koneksi, "SELECT * FROM rekening_admin WHERE kategori_rekening_admin = '$kategori_rekening_aktif'");
                while ($data_rekening_admin = mysqli_fetch_array($query_rekening_admin)) {
                    $id_rekening_admin = $data_rekening_admin['id_rekening_admin'];
                    $id_rekening_rekening_admin = $data_rekening_admin['id_rekening_rekening_admin'];
                    $nama_rekening_admin = $data_rekening_admin['nama_rekening_admin'];
                    $nomor_rekening_admin = $data_rekening_admin['nomor_rekening_admin'];

                    $query_rekening = mysqli_query($koneksi, "SELECT * FROM rekening WHERE id_rekening = '$id_rekening_rekening_admin'");
                    $data_rekening = mysqli_fetch_array($query_rekening);
                    $kategori_rekening = $data_rekening['kategori_rekening'];
                    $jenis_rekening = $data_rekening['jenis_rekening'];
            ?>
                    $("#tombol-salin-<?php echo $id_rekening_admin; ?>").click(function() {
                        // Menyimpan teks yang akan disalin ke variabel
                        var textToCopy<?php echo $id_rekening_admin; ?> = $("#target-salin-<?php echo $id_rekening_admin; ?>").text();

                        // Membuat elemen input untuk menyimpan teks
                        var tempInput<?php echo $id_rekening_admin; ?> = $("<input>");
                        $("body").append(tempInput<?php echo $id_rekening_admin; ?>);
                        tempInput<?php echo $id_rekening_admin; ?>.val(textToCopy<?php echo $id_rekening_admin; ?>).select();

                        // Menjalankan perintah salin
                        document.execCommand("copy");
                        $("#text-tombol-salin-<?php echo $id_rekening_admin; ?>").text("BERHASIL MENYALIN!");
                        $("#ikon-salin-<?php echo $id_rekening_admin; ?>").removeClass("ri-file-fill").addClass("ri-check-fill");

                        setTimeout(function() {
                            $("#text-tombol-salin-<?php echo $id_rekening_admin; ?>").text("SALIN");
                            $("#ikon-salin-<?php echo $id_rekening_admin; ?>").removeClass("ri-check-fill").addClass("ri-file-fill");
                        }, 1500);

                        // Menghapus elemen input
                        tempInput<?php echo $id_rekening_admin; ?>.remove();
                    });
            <?php
                }
            }
            ?>
            // Balik Beranda
            $("#beranda1, #beranda2, #beranda3, #beranda4").on("click", function() {
                window.location.replace("<?php echo $alamat_website; ?>");
            });
            $("#keluar").on("click", function() {
                window.location.replace("keluar.php");
            });
            // Show or Hide Password
            $("#peralihan-kata-sandi, #peralihan-kata-sandi-masuk-daftar").on("click", function() {
                $("#kata-sandi, #kata-sandi-masuk-daftar").toggleClass("ri-eye-line");
                var inputKataSandi = $("#input-kata-sandi, #input-kata-sandi-masuk-daftar");
                if (inputKataSandi.attr("type") === "password") {
                    $("#kata-sandi, #kata-sandi-masuk-daftar").removeClass("ri-eye-off-line").addClass("ri-eye-line");
                    inputKataSandi.attr("type", "text");
                } else {
                    $("#kata-sandi, #kata-sandi-masuk-daftar").removeClass("ri-eye-line").addClass("ri-eye-off-line");
                    inputKataSandi.attr("type", "password");
                }
            });
            $("#peralihan-kata-sandi-daftar").on("click", function() {
                $("#kata-sandi-daftar").toggleClass("ri-eye-line");
                var inputKataSandi = $("#input-kata-sandi-daftar");
                if (inputKataSandi.attr("type") === "password") {
                    $("#kata-sandi-daftar").removeClass("ri-eye-off-line").addClass("ri-eye-line");
                    inputKataSandi.attr("type", "text");
                } else {
                    $("#kata-sandi-daftar").removeClass("ri-eye-line").addClass("ri-eye-off-line");
                    inputKataSandi.attr("type", "password");
                }
            });
            $("#peralihan-kata-sandi-daftar-2").on("click", function() {
                $("#kata-sandi-daftar-2").toggleClass("ri-eye-line");
                var inputKataSandi = $("#input-kata-sandi-daftar-2");
                if (inputKataSandi.attr("type") === "password") {
                    $("#kata-sandi-daftar-2").removeClass("ri-eye-off-line").addClass("ri-eye-line");
                    inputKataSandi.attr("type", "text");
                } else {
                    $("#kata-sandi-daftar-2").removeClass("ri-eye-line").addClass("ri-eye-off-line");
                    inputKataSandi.attr("type", "password");
                }
            });
            // Syarat Nama Pengguna
            $(".syarat-nama-pengguna").on('input', function() {
                this.value = this.value.replace(/[^a-z0-9]/gi, '').toLowerCase();
            });
            // Syarat Kata Sandi
            $(".syarat-kata-sandi").keyup(function() {
                var kataSandi = $(this).val();
                var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/;
                if (!pattern.test(kataSandi)) {
                    $("#notif-syarat-kata-sandi").text("Harus ada huruf besar, kecil dan angka !");
                } else {
                    if (kataSandi.length < 7) {
                        $("#notif-syarat-kata-sandi").text("Minimal 8 karakter !");
                    } else if (kataSandi.length > 7) {
                        $("#notif-syarat-kata-sandi").empty();
                    } else if (kataSandi.length > 19) {
                        $("#notif-syarat-kata-sandi").text("Maksimal 20 karakter !");
                        $(this).val(kataSandi.substring(0, 20));
                    }
                }
            });
            $(".syarat-kata-sandi-2").keyup(function() {
                var kataSandi2 = $(this).val();
                var kataSandi1 = $(".syarat-kata-sandi").val();
                if (kataSandi2 != kataSandi1) {
                    $("#notif-syarat-kata-sandi-2").text("Kata sandi tidak cocok !");
                } else {
                    $("#notif-syarat-kata-sandi-2").empty();
                }
            });
            //Syarat Nama Lengkap & Nama Rekening
            function titleCase(str) {
                return str.toLowerCase().replace(/\b(\w)/g, function(txt) {
                    return txt.toUpperCase();
                });
            }
            $(".syarat-nama-lengkap").keyup(function() {
                $(this).val(titleCase($(this).val()));
            });
            $(".syarat-nama-rekening").keyup(function() {
                $(this).val(titleCase($(this).val()));
            });
            // Kode Verifikasi
            $("#input-kode-verifikasi").keyup(function() {
                var kataSandi2 = $(this).val();
                var kataSandi1 = $("#kode-verifikasi").val();
                if (kataSandi2 != kataSandi1) {
                    $("#notif-kode-verifikasi").text("Kode tidak cocok !");
                } else {
                    $("#notif-kode-verifikasi").empty();
                }
            });
            // Refresh Saldo
            $("#refresh-saldo").click(function() {
                $("#saldo").load(location.href + " #saldo");
            });
            setInterval(function() {
                $("#saldo").load(location.href + " #saldo");
            }, 5000);
            // Counter
            let jackpot = 10000000000;
            let count = 41394775;

            let interval = setInterval(function() {
                count += 1.11;
                if (count >= jackpot) {
                    clearInterval(interval);
                    count = jackpot;
                }
                let formattedJackpot = 'IDR ' + count.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '1,');
                $('#counter').text(formattedJackpot);
            }, 10);
            // Owl Carousel
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true
            });
            // Scroll Kategori
            const scrollKategori = $("#scroll-kategori");
            const scrollKiri = $("#scroll-kiri");
            const scrollKanan = $("#scroll-kanan");

            scrollKiri.click(function() {
                scrollKategori.animate({
                    scrollLeft: "-=100"
                }, "slow");
            });

            scrollKanan.click(function() {
                scrollKategori.animate({
                    scrollLeft: "+=100"
                }, "slow");
            });
            // Promosi
            <?php
            $query_promosi = mysqli_query($koneksi, "SELECT * FROM promosi ORDER BY id_promosi DESC");
            while ($data_promosi = mysqli_fetch_array($query_promosi)) {
                $id_promosi = $data_promosi['id_promosi'];
                $gambar_promosi = $data_promosi['gambar_promosi'];
                $judul_promosi = $data_promosi['judul_promosi'];
                $detail_promosi = $data_promosi['detail_promosi'];
            ?>
                $("#expand_promosi_<?php echo $id_promosi; ?>").addClass("d-none");
                $("#promosi_<?php echo $id_promosi; ?>").on("click", function() {
                    if ($("#expand_promosi_<?php echo $id_promosi; ?>").hasClass("d-none")) {
                        $("#expand_promosi_<?php echo $id_promosi; ?>").removeClass("d-none").addClass("d-block");
                    } else {
                        $("#expand_promosi_<?php echo $id_promosi; ?>").removeClass("d-block").addClass("d-none");
                    }
                });
            <?php
            }
            ?>
            // Dropdown Menu
            $("#expand_menu").addClass("d-none");
            $("#menu").on("click", function() {
                if ($("#expand_menu").hasClass("d-none") && $("#panah").hasClass("ri-arrow-right-s-line")) {
                    $("#expand_menu").removeClass("d-none").addClass("d-block");
                    $("#panah").removeClass("ri-arrow-right-s-line").addClass("ri-arrow-down-s-line");
                } else {
                    $("#expand_menu").removeClass("d-block").addClass("d-none");
                    $("#panah").removeClass("ri-arrow-down-s-line").addClass("ri-arrow-right-s-line");
                }
            });
            <?php
            $query_menu_games = mysqli_query($koneksi, "SELECT * FROM menu_games");
            while ($data_menu_games = mysqli_fetch_array($query_menu_games)) {
                $id_menu_games = $data_menu_games['id_menu_games'];
                $judul_menu_games = $data_menu_games['judul_menu_games'];
                $link_menu_games = $data_menu_games['link_menu_games'];
            ?>
                $("#expand_menu_<?php echo $id_menu_games; ?>").addClass("d-none");
                $("#menu_<?php echo $id_menu_games; ?>").on("click", function() {
                    if ($("#expand_menu_<?php echo $id_menu_games; ?>").hasClass("d-none") && $("#panah_<?php echo $id_menu_games; ?>").hasClass("ri-arrow-right-s-line")) {
                        $("#expand_menu_<?php echo $id_menu_games; ?>").removeClass("d-none").addClass("d-block");
                        $("#panah_<?php echo $id_menu_games; ?>").removeClass("ri-arrow-right-s-line").addClass("ri-arrow-down-s-line");
                    } else {
                        $("#expand_menu_<?php echo $id_menu_games; ?>").removeClass("d-block").addClass("d-none");
                        $("#panah_<?php echo $id_menu_games; ?>").removeClass("ri-arrow-down-s-line").addClass("ri-arrow-right-s-line");
                    }
                });
            <?php
            }
            ?>
            // Flatpickr
            $(".tanggal-awal").flatpickr({
                dateFormat: "Y-m-d",
            });
            $(".tanggal-akhir").flatpickr({
                dateFormat: "Y-m-d",
            });
            // Datatables
            $("#riwayat").DataTable({
                ordering: false
            });
        });
    </script>

    <script>
        // Live Time
        setInterval(function() {
            $("#waktu_sekarang").load(location.href + " #waktu_sekarang");
        }, 1000);
        // Tombol Generate Random String
        $(".tombol-random-string-10").click(function() {
            var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            var randomString = "";
            for (var i = 0; i < 10; i++) {
                randomString += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            $(".hasil-random-string-10").val(randomString);
        });
    </script>

    <script src="js/new-webduo35.js"></script>


    <!-- POP UP COOKIES -->
    <?php echo $isi1_marquee_pengumuman; ?>

</body>

</html>