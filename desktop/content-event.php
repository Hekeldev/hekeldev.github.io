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
    <meta name="viewport" content="width=1200, initial-scale=0.33">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--<link rel="stylesheet" href="/css/template/BW.css">-->
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
            <a href="/?content=register" class="hover-item">
                <figure><img src="https://img.pay4d.info/togel-pay4d.png" alt="PAY4D"></figure>
                <figcaption>PAY4D</figcaption>
            </a>
        </div>

        <div id="hover-slot" class="hover-menu">
            <a href="/?content=slot&provider=pp" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-prag.png" alt="PRAGMATIC PLAY"></figure>
                <figcaption>PRAGMATIC PLAY</figcaption>
            </a>

            <a href="/?content=slot&provider=pg" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-pg.png" alt="PG SOFT"></figure>
                <figcaption>PG SOFT</figcaption>
            </a>

            <a href="/?content=slot&provider=hb" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-hab.png" alt="HABANERO"></figure>
                <figcaption>HABANERO</figcaption>
            </a>

            <a href="/?content=slot&provider=jg" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-jok.png" alt="JOKER"></figure>
                <figcaption>JOKER</figcaption>
            </a>

            <a href="/?content=slot&provider=sg" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-spad.png" alt="SPADEGAMING"></figure>
                <figcaption>SPADEGAMING</figcaption>
            </a>

            <a href="/?content=slot&provider=jl" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-jl.png" alt="JILI"></figure>
                <figcaption>JILI</figcaption>
            </a>

            <a href="/?content=slot&provider=fs" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-fs.png" alt="FASTSPIN"></figure>
                <figcaption>FASTSPIN</figcaption>
            </a>

            <a href="/?content=slot&provider=ps" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-ps.png" alt="PLAYSTAR"></figure>
                <figcaption>PLAYSTAR</figcaption>
            </a>

            <a href="/?content=slot&provider=cq9" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-cq9.png" alt="CQ9"></figure>
                <figcaption>CQ9</figcaption>
            </a>

            <a href="/?content=slot&provider=mg" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-mg.png" alt="MICROGAMING"></figure>
                <figcaption>MICRO GAMING</figcaption>
            </a>

            <a href="/?content=slot&provider=ttg" class="hover-item">
                <figure><img src="https://img.pay4d.info/slot-ttg.png" alt="TOPTREND GAMING"></figure>
                <figcaption>TOPTREND GAMING</figcaption>
            </a>
        </div>

        <div id="hover-live" class="hover-menu">
            <a href="/?content=casino&provider=pplc" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-pp.png" alt="PRAGMATIC PLAY"></figure>
                <figcaption>PRAGMATIC PLAY</figcaption>
            </a>
            <a href="/?content=casino&provider=ion" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-ion.png" alt="ION CASINO"></figure>
                <figcaption>ION CASINO</figcaption>
            </a>
            <a href="/?content=casino&provider=evo" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-evo.png" alt="EVOLUTION"></figure>
                <figcaption>EVOLUTION</figcaption>
            </a>
            <a href="/?content=casino&provider=sx" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-sg.png" alt="SEXY GAMING"></figure>
                <figcaption>SEXY GAMING</figcaption>
            </a>
            <a href="/?content=casino&provider=ab" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-all.png" alt="ALLBET"></figure>
                <figcaption>ALLBET</figcaption>
            </a>
            <a href="/?content=casino&provider=jl" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-sagaming.png" alt="SA GAMING"></figure>
                <figcaption>SA GAMING</figcaption>
            </a>
            <a href="/?content=casino&provider=mg" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-mg.png" alt="MICRO GAMING"></figure>
                <figcaption>MICRO GAMING</figcaption>
            </a>
            <a href="/?content=casino&provider=og" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-opus.png" alt="OPUS PLUS"></figure>
                <figcaption>OPUS PLUS</figcaption>
            </a>
            <a href="/?content=casino&provider=sbol" class="hover-item">
                <figure><img src="https://img.pay4d.info/live-sbo.png" alt="SBOBET CASINO"></figure>
                <figcaption>SBOBET CASINO</figcaption>
            </a>
        </div>

        <div id="hover-sport" class="hover-menu">
            <a href="/?content=register" class="hover-item">
                <figure><img src="https://img.pay4d.info/sport-saba.png" alt="SABA"></figure>
                <figcaption>SABA</figcaption>
            </a>

            <a href="/?content=register" class="hover-item">
                <figure><img src="https://img.pay4d.info/sport-sbo.png" alt="SBOBET"></figure>
                <figcaption>SBOBET</figcaption>
            </a>

            <a href="/?content=register" class="hover-item">
                <figure><img src="https://img.pay4d.info/sport-tf.png" alt="TFGAMING"></figure>
                <figcaption>TFGAMING</figcaption>
            </a>
        </div>

        <div id="hover-fishing" class="hover-menu">
            <a href="/?content=fish&provider=sg" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-sg.png" alt="SPADE GAMING"></figure>
                <figcaption>SPADE GAMING</figcaption>
            </a>

            <a href="/?content=fish&provider=jl" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-jl.png" alt="JILI"></figure>
                <figcaption>JILI</figcaption>
            </a>

            <a href="/?content=fish&provider=fs" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-fs.png" alt="FASTSPIN"></figure>
                <figcaption>FASTSPIN</figcaption>
            </a>

            <a href="/?content=fish&provider=ps" class="hover-item">
                <figure><img src="https://img.pay4d.info/fish-ps.png" alt="PLAYSTAR"></figure>
                <figcaption>PLAYSTAR</figcaption>
            </a>

        </div>

        <div id="hover-sabung" class="hover-menu">
            <a href="/?content=register" class="hover-item">
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
            <a href="/" class="navbar-item" style="position: relative">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/beranda.png" />
                    <label>BERANDA</label>
                </div>
            </a>
            <div style="height: 36px; width: 3px; background: black; margin: auto"></div>
            <a href="/m/promosi.php" class="navbar-item">
                <div class="navbar-item-content">
                    <img src="https://img.pay4d.info/promosi.png" />
                    <label>PROMOSI</label>
                </div>
            </a>
            <div style="height: 36px; width: 3px; background: black; margin: auto"></div>
            <a href="/m/event.php" class="navbar-item">
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



        <header class="header">
            <div class="header-content">
                <div class="logo" href="/">
                    <a href='/'><img src="/images/logoweb.png?34537" class='logoimg' alt=""></a>
                </div>

                <div id="marquee-mobile" class="marquee mobile-only">
                    <div class="marquee-content">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-volume-down" style="padding: 0 4px; font-size: 24px"></i>
                        </div>
                        <div class="running">
                            <div class="marquee-shadow"></div>
                            <marquee behavior="scroll" direction="" id="broadcast" style="width: 100%"></marquee>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                        </div>
                    </div>
                </div>

                <div class="mslider mobile-only">
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
                        <form class="login-form form" style="padding: 0px; padding-top: 32px" role="form">
                            <div id="msgbox" style="font-size: 1rem; width: 100%"></div>
                            <div class="input-group login-field">
                                <span class="input-group-text prepend mobile-only ">
                                    <div class="h-100 center"><i class="bi bi-person-circle prepend-icon"></i></div>
                                </span>
                                <input type="text" name="username" class="form-control login-input-field username" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="input-group login-field">
                                <span class="input-group-text mobile-only prepend">
                                    <div class="h-100 center"><i class="bi bi-shield-lock-fill prepend-icon"></i></div>
                                </span>
                                <input type="password" name="password" class="form-control login-input-field password" placeholder="Password" aria-label="Password">
                            </div>

                            <div class="verifikasiform w-100" style="display: flex; gap: 2px">


                                <span id="verifikasi"><img src="/m/capimg.php?4638" width="40" height="40" style="border:1px #999 solid;"></span>

                                <input type="text" class="form-control login-field" name="verifikasi" id="verform" autocomplete="off">
                            </div>

                            <input type="hidden" name="verif" id="verifval" class="verifval" value="1">


                            <button type="submit" value="Masuk" class="btn btn-masuk fw-bold p-0 px-2 submit">Masuk</button>
                            <button type="button" class="btn btn-daftar btn-info btn-daftar-mobile fw-bold p-0 px-2 mobile-only" onclick="openDaftar()">Daftar Sekarang</button>


                            <input type="hidden" name="task" value="login">
                            <input type="hidden" name="loginmobile" value="81+Pfpv5mGOyW9mcupX5vB4qmNmqjEpfSQAegjuIy0Q=">
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
                                    <input type="password" class="form-control login-input-field" id="reg_pass" name="pass" placeholder="Password (6 karakter atau lebih)">
                                </div>
                                <div class="input-group login-field">
                                    <span class="input-group-text mobile-only prepend">
                                        <div class="h-100 center"><i class="bi bi-shield-lock-fill prepend-icon"></i></div>
                                    </span>
                                    <input type="password" class="form-control login-input-field" id="reg_passcon" name="passcon" placeholder="Password sekali lagi">
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
                                    <input type="text" inputmode="numeric" class="form-control login-input-field" id="reg_telpon" name="telpon" class="form-control" placeholder="Telpon">
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
                                    <input type="text" class="form-control login-input-field" name="nama" id="reg_nama" placeholder="Nama Rekening">
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
                                <input type="hidden" name="regmobile" value="vhwYKCJb5GTxO8jNmvpXVcoSrfaD5qpQ0NDtnufAijw=">
                                <button type="button" class="btn btn-secondary fw-bold p-0 px-2" value="Close" onClick="closeDaftar()" id="buttonClose">Close</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class="menu-item desktop-only">
                        <label><a href="/"><i class="bi bi-house-door-fill"></i></a></label>
                    </div>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="/?content=register" class="menu-item" onmouseover="showProducts('hover-togel')" onmouseout="hideProducts('hover-togel')">
                        <img class="mobile-only" src="assets/togel.png" alt="">
                        <label>TOGEL</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="/?content=slot" class="menu-item" onmouseover="showProducts('hover-slot')" onmouseout="hideProducts('hover-slot')">
                        <img class="mobile-only" src="assets/slot.png" alt="">
                        <label>SLOT</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="/?content=casino" class="menu-item" onmouseover="showProducts('hover-live')" onmouseout="hideProducts('hover-live')">
                        <img class="mobile-only" src="assets/live.png" alt="">
                        <label>LIVE CASINO</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="/?content=sport" class="menu-item" onmouseover="showProducts('hover-sport')" onmouseout="hideProducts('hover-sport')">
                        <img class="mobile-only" src="assets/sport.png" alt="">
                        <label>SPORT</label>
                    </a>
                    <!--<span class="desktop-only" style="color: var(--menu-item-color)">|</span>-->
                    <!--<a href="/?content=register" class="menu-item" onmouseover="showProducts('hover-esport')" onmouseout="hideProducts('hover-esport')">-->
                    <!--    <img class="mobile-only" src="assets/esport.png" alt="">-->
                    <!--    <label>E-SPORT</label>-->
                    <!--</a>-->
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="/?content=fish" class="menu-item" onmouseover="showProducts('hover-fishing')" onmouseout="hideProducts('hover-fishing')">
                        <img class="mobile-only" src="assets/fishing.png" alt="">
                        <label>ARCADE</label>
                    </a>
                    <span class="desktop-only" style="color: var(--menu-item-color)">|</span>
                    <a href="/?content=sabung" class="menu-item" onmouseover="showProducts('hover-sabung')" onmouseout="hideProducts('hover-sabung')">
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
                                    <div class="menu-item" onclick="showProvider('slot')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-slot.png" alt="">
                                        <label>SLOT</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProvider('casino')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-live.png" alt="">
                                        <label>LIVE CASINO</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div href="/sport" class="menu-item" onclick="showProvider('sport')">
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
                                    <div class="menu-item" onclick="showProvider('fish')">
                                        <img class="mobile-only" src="https://img.pay4d.info/icon-fishing.png" alt="">
                                        <label>ARCADE</label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 100%; width: 92px; display: inline-block;">
                                <div style="display: grid; place-items: center; height: 100%">
                                    <div class="menu-item" onclick="showProvider('sabung')">
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

                    <button class="btn-promosi fw-bold desktop-only" onclick="window.location.href='/?content=promosi'" style="border: none; font-size: 1.1rem; padding: 0px 8px;">PROMOSI</button>
                    <div class="btn-informasi desktop-only" onclick="document.getElementById('modal-wrapper').style.display='block'"><a class="pointer" href="javascript:page('tentang');" style="text-decoration: none;" data-toggle="tooltip" data-placement="bottom" title="Informasi"><i class="bi bi-info-circle-fill" style="font-size: 16px"></i></a></div>

                    <!-- Mobile -->

                    <div class="mobile-only" style="padding-top: 32px">

                        <div class="d-flex gap-3 justify-content-center align-items-center">
                            <a href="/?desktop" style="display: grid; place-items: center; font-size: 1.2rem; cursor: pointer; color: var(--menu-item-color)">Desktop</a>
                            <div style="height: 1.1rem; width: 1.5px; background: var(--menu-item-color)"></div>

                            <a href="/wap" style="display: grid; place-items: center; font-size: 1.2rem; cursor: pointer; color: var(--menu-item-color)">Wap</a>
                        </div>

                    </div>
                </div>
            </div>
        </header>



        <div id="marquee" class="marquee desktop-only">
            <div class="marquee-content">
                <div class="d-flex align-items-center gap-2">
                    <div id="timenow" class="desktop-only" style="white-space: nowrap;"></div>
                    <i class="bi bi-megaphone-fill desktop-only"></i>
                </div>
                <div class="running" style="padding-left: 8px; padding-right: 32px">
                    <marquee behavior="" direction="" id="broadcast" onmouseover="this.stop();" onmouseout="this.start();" style="width: 100%"></marquee>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="/?content=event">
                        <img src="https://img.pay4d.info/btnevent.png" alt="EVENT" height="24px" />
                    </a>
                </div>
            </div>
        </div>

        <!--Informasi Modal -->
        <div id="modal-wrapper" class="modal" style=" background:none;">

            <div class="slideDown" id="informasi-menu">
                <div class="row">
                    <div class="col-xs-3" style="padding-right:0px; width:164px">
                        <div id="informasi-logo">
                            <img src="/images/logoweb.png" width="120px" />
                        </div>
                        <div class="menuleft">

                            <a class="active btn-black" href="javascript:toggleInformasi('tentang');">TENTANG KAMI</a>
                            <a class="btn-black" href="javascript:toggleInformasi('bantuan');">BANTUAN</a>
                            <a class="btn-black" href="javascript:toggleInformasi('peraturan');">PERATURAN</a>
                            <a class="btn-black" href="javascript:toggleInformasi('bank');">INFORMASI BANK</a>
                            <a class="btn-black" href="javascript:toggleInformasi('hubungi');">HUBUNGI KAMI</a>
                            <a class="btn-black" href="javascript:toggleInformasi('privasi');">KEBIJAKAN PRIVASI</a>
                            <a class="btn-black" href="javascript:toggleInformasi('cookies');">PERSETUJUAN COOKIES</a>

                        </div>
                    </div>
                    <div class="col-xs-9" id="informasi-content" style="position: relative">
                        <div onclick="document.getElementById('modal-wrapper').style.display='none'" class="closebox" title="Close Informasi">&times;</div>
                        <div style="margin: 32px 0; height:600px; overflow: auto; z-index:1;" id="content2">
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="contentdata">
            <div id="content-primary" class="p-0">


                <div class="content-body" style="position: relative">
                    <div class="content-area">
                        <div id="content" class="content-box">

                            <div class="panel panelbg">
                                <div class="panel-heading">
                                    <h3><span class="glyphicon glyphicon-tags"></span>Event</h3>
                                </div>
                                <div class="panel-body" style="font-size: 1rem">



                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/ev01.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/ev01.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            PG SOFT : TOURNAMENT SPIN TO WIN HARIAN 2</br>
                                            Mulai : 17 Juni 2023 [01.00]</br>
                                            Selesai : 16 Juli 2023 [00.59]</br>
                                            </br>
                                            Hadiah</br>
                                            Rank 1 : Rp. 3.600.000</br>
                                            Rank 2-5 : Rp. 600.000</br>
                                            Rank 6-20 : Rp. 100.000</br>
                                            Rank 21-50 : Rp. 50.000</br>
                                            Rank 51-100 : Rp. 20.000</br>
                                            </br>
                                            Untuk Syarat ketentuan silahkan cek di simbol piala di dalam game </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/jili-superstar.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/jili-superstar.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            JILI : JILI SUPER STAR </br>
                                            Enjoy Betting Get Rich Easy!</br>
                                            </br>
                                            Periode : 27 Juni 2023 - 25 Juli 2023</br>
                                            </br>
                                            Fitur Event :</br>
                                            1. 27/06-25/07：Super Ace, Fortune Gems, Mega Ace, Golden Empire, Golden Joker, Roma X, Wild Ace, Boxing King</br>
                                            2. Kumpulkan poin untuk memenangkan uang, dapatkan hadiah bernilai tinggi dengan mudah!</br>
                                            </br>
                                            Detail Event :</br>
                                            1. Aturan: Cara main: Para pemain akan menggunakan Skor Kemenangan Tertinggi Single Game sebagai alat kompetisi untuk menentukan peringkat pada papan klasemen.</br>
                                            2. Hadiah event merupakan kartu item, setelah digunakan akan memasuki FREE GAME, game yang dapat digunakan ditentukan secara acak oleh sistem, silakan login ke game yang sesuai!</br>
                                            3. Login ke game khusus event, sistem akan mengalokasikan pemain ke kompetisi tertentu sesuai dengan level LV pemain.</br>
                                            </br>
                                            Hal yang harus diperhatikan :</br>
                                            1. Waktu event berdasarkan pengumuman sistem.</br>
                                            2. Kartu item tidak memiliki nilai harga dan memiliki batas waktu penggunaan, silakan klik img untuk menggunakan.</br>
                                            3. Selama hari event yang ditentukan, pemain tidak perlu registrasi, hanya perlu bermain 「Game Khusus Event」 dan memenuhi ketentuan event, maka dapat berpartisipasi dalam event ini.</br>
                                            4. Papan peringkat akan diperbarui setiap 5 menit. Jika total nilai skor para pemain dalam papan peringkat sama, maka akan ditentukan berdasarkan "waktu pertama".</br>
                                            5. Hadiah event akan dibagikan secara otomatis ke Ransel anggota img dalam waktu 12 jam setelah event berakhir.</br>
                                            6. Dalam keadaan khusus, kasino berhak untuk merevisi, mengubah, atau menunda event ini.</br>
                                            7. Kasino berhak untuk interpretasi akhir untuk setiap keberatan dan pertanyaan terkait yang timbul dari acara ini Jika Anda memiliki pertanyaan, silakan hubungi Layanan Pelanggan Casino Online.</br>
                                            8.Perubahan level LV selama event berlangsung, jika mempengaruhi kompetisi yang dapat diikuti oleh para pemain, akan berefek di event berikutnya. </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/pp-megagacor.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/pp-megagacor.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            <center><img src="https://pp88.asia/wp-content/uploads/2023/06/640x400-6.gif" width="250">&nbsp;<img src="https://pp88.asia/wp-content/uploads/2023/06/640x400-7.gif" width="250">&nbsp;<img src="https://pp88.asia/wp-content/uploads/2023/06/640x400-8.gif" width="250"></center></br></br></br>
                                            PRAGMATIC PLAY : DAILY WINS MEGA GACOR
                                            <br>
                                            <br>
                                            <a href="https://pp88.asia/id/promotion/daily-wins-mega-gacor/" target="_blank">Slot: Cash Drops Harian & Turnamen Mingguan (klik untuk detail)</a> </br>
                                            <a href="https://pp88.asia/id/promotion/daily-wins-mega-gacor/" target="_blank">Live Kasino: Turnamen Mingguan Mega Wheel (klik untuk detail)</a></br>
                                            </br>
                                            Level 1</br>
                                            Mulai: Senin, 26 Juni 2023, 18:00 (GMT+8)</br>
                                            Sampai: Senin, 24 Juli 2023, 17:59 (GMT+8)</br>
                                            </br>
                                            Level 2</br>
                                            Mulai: Senin, 24 Juli 2023, 18:00 (GMT+8)</br>
                                            Sampai: Senin, 28 Agustus 2023, 17:59 (GMT+8)</br>
                                            </br>
                                            Untuk detail dan syarat ketentuan lomba bisa cek di icon piala di dalam game</br>
                                        </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/ev02.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/ev02.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            FASTSPIN : TURNAMENT RUNNING WIN BADAI WANG </br>
                                            Mulai : 5 Juni 2023 </br>
                                            Selesai : 31 Juli 2023 </br>
                                            </br>
                                            Total Hadiah Rp 912.800.000 </br>
                                            </br>
                                            Syarat & Ketentuan </br>
                                            1. Jika seorang pemain muncul di lebih dari satu papan peringkat, pemain tersebut akan dapat memenangkan lebih dari satu hadiah. Hadiah akan dikirimkan dalam 72 jam setelah turnamen berakhir, silakan periksa perubahan saldo dompet. </br>
                                            </br>
                                            2.Pemain dapat memeriksa peringkat, aturan dan persyaratan acara di dalam ikon “Turnamen” yang tersedia di game. </br>
                                            </br>
                                            3. Jika ada dua atau lebih pemain dengan skor kemenangan yang sama, pemain yang meraih skor terutama akan mendapatkan tempat yang lebih tinggi di papan peringkat. </br>
                                            </br>
                                            4.Fastspin berhak untuk mendiskualifikasi pemain atau sekelompok pemain jika ditemukan menggunakan metode yang tidak jujur, menipu atau mengintimidasi pemain / operator lain, atau ditemukan menyalahgunakan sistem untuk mempengaruhi hasil acara. </br>
                                            </br>
                                            5. Fastspin berhak mengubah syarat dan ketentuan acara tanpa pemberitahuan sebelumnya. </br> </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/ev05.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/ev05.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            SPADE GAMING : PLAY & WIN TURNAMEN</br>
                                            TOTAL HADIAH Rp. 7.560.000.000</br>
                                            Periode : 29 Mei 2023 [12.00 Siang] - 28 Agustus 2023 [11.59 Siang] GMT +8</br>
                                            </br>
                                            Lomba dibagi menjadi 3 turnamen</br>
                                            Turnamen 1 : 29 Mei - 26 Juni 2023</br>
                                            Turnamen 2 : 26 Juni - 31 Juli 2023</br>
                                            Turnamen 3 : 31 Juli - 28 Agustus 2023</br>
                                            </br>
                                            Hadiah Mingguan</br>
                                            Rank 1 : Rp.150.000.000</br>
                                            Rank 2 : Rp. 120.000.000</br>
                                            Rank 3 : Rp 93.000.000</br>
                                            Rank 4 : Rp 57.000.000</br>
                                            Rank 5 : Rp. 42.000.000</br>
                                            Rank 6 : Rp. 27.000.000</br>
                                            Rank 7 : Rp. 12.000.000</br>
                                            Rank 8 : Rp. 9.000.000</br>
                                            Rank 9 : Rp. 4.500.000</br>
                                            Rank 10 : Rp. 1.500.000</br>
                                            Rank 11-30 : Rp 1.200.000</br>
                                            Rank 31-50 : Rp. 1.050.000</br>
                                            Rank 51 - 70 : Rp. 900.000</br>
                                            Rank 71-90 : Rp. 750.000</br>
                                            Rank 91-110 : Rp. 450.000</br>
                                            Rank 111-200 : Rp 300.000</br>
                                            Rank 201-300 : Rp. 150.000</br>
                                            Rank 301 -400 :Rp. 90.000</br>
                                            Rank 401-500 : Rp. 45.000</br>
                                            </br>
                                            Syarat & Ketentuan :</br>
                                            1.Jika seorang pemain muncul di lebih dari satu papan peringkat, pemain tersebut akan dapat memenangkan lebih dari satu hadiah. Hadiah akan dikirimkan dalam 72 jam setelah turnamen berakhir, silakan periksa perubahan saldo dompet.</br>
                                            2. Pemain dapat memeriksa peringkat, aturan dan persyaratan acara di dalam ikon “Turnamen” yang tersedia di game.</br>
                                            3. Jika ada dua atau lebih pemain dengan skor kemenangan yang sama, pemain yang meraih skor terutama akan mendapatkan tempat yang lebih tinggi di papan peringkat.</br>
                                            4. Spadegaming berhak untuk mendiskualifikasi pemain atau sekelompok pemain jika ditemukan menggunakan metode yang tidak jujur, menipu atau mengintimidasi pemain / operator lain, atau ditemukan menyalahgunakan sistem untuk mempengaruhi hasil acara.</br>
                                            5.Spadegaming berhak mengubah syarat dan ketentuan acara tanpa pemberitahuan sebelumnya.</br> </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/ev06.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/ev06.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            SPADE GAMING FISHING : TURNAMEN FISHING HUNTER</br>
                                            Total Hadiah Rp. 5.268.000.000</br>
                                            </br>
                                            Periode : 12 Juni - 7 Agustus 2023</br>
                                            </br>
                                            Syarat & Ketentuan : </br>
                                            1.Jika seorang pemain muncul di lebih dari satu papan peringkat, pemain tersebut akan dapat memenangkan lebih dari satu hadiah. Hadiah akan dikirimkan dalam 72 jam setelah turnamen berakhir, silakan periksa perubahan saldo dompet.</br>
                                            2. Pemain dapat memeriksa peringkat, aturan dan persyaratan acara di dalam ikon “Turnamen” yang tersedia di game.</br>
                                            3. Jika ada dua atau lebih pemain dengan skor kemenangan yang sama, pemain yang meraih skor terutama akan mendapatkan tempat yang lebih tinggi di papan peringkat.</br>
                                            4. Spadegaming berhak untuk mendiskualifikasi pemain atau sekelompok pemain jika ditemukan menggunakan metode yang tidak jujur, menipu atau mengintimidasi pemain / operator lain, atau ditemukan menyalahgunakan sistem untuk mempengaruhi hasil acara.</br>
                                            5. Spadegaming berhak mengubah syarat dan ketentuan acara tanpa pemberitahuan sebelumnya.</br> </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/ev08.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/ev08.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            EVOLUTION : BET & WIN </br>
                                            Total Hadiah Rp. 16.000.000.000</br>
                                            Periode : 21 Juni - 18 Juli 2023</br>
                                            </br>
                                            Cashdrop :
                                            1. Pemenang Cash Drop ditentukan dari pemain yang memasang taruhan di Imperial Quest selama periode promosi cash drop.</br>
                                            2. Cash Drop akan diselenggarakan setiap minggu mulai dari 21 Juni - 18 Juli 2023 terdapat 4x Cash Drop selama periode promosi.</br>
                                            3. Game yang turut serta : Imperial Quest</br>
                                            4. Terdapat 2.000 hadaih dengan nilai total Rp.300.000.000 yang akan diberikan kepada pemain setiap minggu selama periode promosi ini.</br>
                                            </br>
                                            Syarat dan Ketentuan :</br>
                                            1. Anggota yang memenuhi syarat untuk hadiah di periode berikutnya.</br>
                                            2. Pemenang akan diumumkan seminggu setelah promo dalam waktu 3 hari kerja pada pukul 16.00 [GMT +8].</br>
                                            3. Evolution berhak mengubah, menangguhkan, atau membatalkan promosi kapan saja dan tanpa pemberitahuan sebelumnya.</br>
                                            4. Jumlahhadiah yang ada di spanduk akan dikirim secara bertahap dalam promosi Evolution 2023.</br> </div>
                                    </div>


                                    <div class="shadow" style="width: 900px; margin:10px auto; border:solid 1px #333; border-radius: 10px 10px 10px 10px">
                                        <div>
                                            <img src="https://img.pay4d.info/events/ev09.jpg" style="width: 100%; height: 180px; border-radius: 10px 10px 0px 0px" alt="https://img.pay4d.info/events/ev09.jpg">
                                        </div>
                                        <div style="width: 100%; background-color: #FFF; border-top: 0px; border-radius: 0px 0px 10px 10px; margin-top:0px; padding: 15px">
                                            MICRO GAMING : ZEUS'S LIGHTNING JACKPOT</br>
                                            Total Hadiah Rp. 1.539.000.000</br>
                                            </br>
                                            Periode : 26 Juni - 15 Juli 2023</br>
                                            </br>
                                            Pemainan yang terpilih :</br>
                                            Lucky Twins Wilds, Candy Rush Wilds, Masters of Olympus, Almighty Zeus Empire, Gold Blitz, Amazin Link Zeus,</br>
                                            10000 Wishes, Sugar Craze Bonanza, Bison Moon, Lucky Twins </br>
                                            </br>
                                            Syarat & Ketentuan :</br>
                                            1. Tanpa taruhan minimum.</br>
                                            2. Dengan bermain pada salah satu game yang berpartisipasi dalam promosi tersebut, pemain dapat memenangkan jackpot secara acak.</br>
                                            3. Hadiah jackpot akan secara otomatis dikreditkan ke akun pemenangn dalam waktu 30 menit setelah pengumuman pemenang.</br>
                                            4. Pemenang akan mendapatkan notifikasi melalui pesan dalam game.</br>
                                            5. Setelah jackpot dimenangkan, siklus barunya akan dimulai dalam 5 menit.</br>
                                            6. Semua hadiah jackpot ditanggung oleh MG.</br> </div>
                                    </div>




                                </div>
                            </div>

                        </div>
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
                <a href="/?content=hasil&pid=SG" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SINGAPORE&nbsp</div>
                    <div class="keluaran">5260</div>
                    <div class="tanggal">RABU 5/7/2023</div>
                </a>
                <a href="/?content=hasil&pid=SKA" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SAKA POOLS&nbsp</div>
                    <div class="keluaran">1397</div>
                    <div class="tanggal">RABU 5/7/2023</div>
                </a>
                <a href="/?content=hasil&pid=SKT" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SAKA TOTO&nbsp</div>
                    <div class="keluaran">9767</div>
                    <div class="tanggal">SELASA 4/7/2023</div>
                </a>
                <a href="/?content=hasil&pid=SKD" class="result">

                    <div class="badge">
                    </div>

                    <div class="pasaran">SAKA 4D&nbsp</div>
                    <div class="keluaran">5121</div>
                    <div class="tanggal">RABU 5/7/2023</div>
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
                                <div class="keluaran">5260</div>
                                <div class="tanggal">05-07-2023</div>
                            </button>

                            <div id="paito-SG" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">4573</div>
                                    <div class="tanggal">03-07-2023</div>
                                </div>

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
                            </div>
                        </div>

                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SKA">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SAKA POOLS&nbsp</div>
                                <div class="keluaran">1397</div>
                                <div class="tanggal">05-07-2023</div>
                            </button>

                            <div id="paito-SKA" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">7869</div>
                                    <div class="tanggal">04-07-2023</div>
                                </div>

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">6284</div>
                                    <div class="tanggal">03-07-2023</div>
                                </div>

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
                            </div>
                        </div>

                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SKT">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SAKA TOTO&nbsp</div>
                                <div class="keluaran">9767</div>
                                <div class="tanggal">04-07-2023</div>
                            </button>

                            <div id="paito-SKT" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">2352</div>
                                    <div class="tanggal">03-07-2023</div>
                                </div>

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
                            </div>
                        </div>

                        <div class="result-data accordion-item">
                            <button class="result accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#paito-SKD">
                                <div class="badge">
                                </div>
                                <div class="pasaran">SAKA 4D&nbsp</div>
                                <div class="keluaran">5121</div>
                                <div class="tanggal">05-07-2023</div>
                            </button>

                            <div id="paito-SKD" class="accordion-collapse collapse">

                                <div class="result">
                                    <div class="pasaran"></div>
                                    <div class="keluaran">7360</div>
                                    <div class="tanggal">04-07-2023</div>
                                </div>

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
                    <h1 style="text-align: center;"><strong><a href="/">Prediksi
                                Togel</a> | <a href="/">Situs Judi Slot Terbaik</a> | <a href="/">Bandar Judi Slot</a></strong></h1>
                    <p style="text-align: justify;"><?php echo $isi1_judul_website; ?> merupakan salah satu
                        <a href="/">situs judi slot online</a> Terpercaya dan Terbaik dalam
                        melayani para member setia kami. Daftar Slot Online Terpercaya
                        berdiri sejak tahun 2015 yang memiliki ribuan member setia aktif
                        setiap harinya. Kemudahan saat bermain dapat menggunakan
                        Aplikasinya dimainkan dari Smartphone / Mobile Phone PC ( Desktop )
                        dan ( Android & IOS). Situs judi slot online <?php echo $isi1_judul_website; ?> juga
                        menghadirkan jenis taruhan Togel Online, Casino Online, Slot Online
                        Uang Asli. Masih banyak game uang asli lainnya yang tersedia di
                        sini.
                    </p>
                    <h2 style="text-align: center;"><strong><a href="/">Situs Slot
                                Online Indonesia</a> | <a href="/">Prediksi Togel HK</a> | <a href="/">Sicbo Online</a></strong></h2>
                    <p style="text-align: justify;"><?php echo $isi1_judul_website; ?> dipercayai oleh google
                        karena situs ini menjadi kepercayaan dari member setia kami. Dan
                        kami selalu memberikan pelayanan yang sangat extra terhadap member
                        kami karena klien adalah yang nomor 1, dan kepuasan member akan
                        selalu menjadi yang utama. Di website kami juga menyediakan
                        berbagai macam permainan <a href="/">judi online</a> seperti:
                        togel, casino online, slot online, tembak ikan.</p>
                    <h2 style="text-align: center;"><strong><a href="/">Daftar Casino
                                Online</a> | <a href="/">Bocoran Togel Singapura</a> | <a href="/">Live Casino Online</a></strong></h2>
                    <p style="text-align: justify;"><a href="/"><?php echo $isi1_judul_website; ?></a> menawarkan
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
                    <h2 style="text-align: center;"><strong><a href="/">Togel Deposit
                                Pulsa</a> | <a href="/">Slot Online Deposit Pulsa</a> | <a href="/">Daftar Slot Online Deposit Pulsa</a></strong></h2>
                    <p style="text-align: justify;">Situs judi online <?php echo $isi1_judul_website; ?>, juga
                        memiliki CUSTOMER SERVICE yang siap melayani anda secara online
                        full 24 jam Nonstop dalam membantu anda dalam menghadapi kendala.
                        Customer Service kami sangat ramah maka dari itu jangan sungkan
                        untuk menghubungikan livechat kami. Dan selain itu kami juga sudah
                        menghadirkan fitur deposit togel pulsa mengunakan Pulsa Telkomsel.
                        Sehingga anda tidak perlu Repot - repot ke atm jika ingin melakukan
                        deposit.</p>
                    <h2 style="text-align: center;"><strong><a href="/">Data Sgp
                                Master</a> | <a href="/">Data HK 2022</a> | <a href="/">Data
                                Sydney</a></strong></h2>
                    <p style="text-align: justify;">Selain itu <?php echo $isi1_judul_website; ?> juga menyediakan
                        situs result togel terpercaya, yang memiliki pasaran dari togel
                        resmi diantaranya seperti Keluaran Sgp, SG45, Hongkong Pools,
                        Sydney Pools dan Indo Pools. Tentu kelima Keluaran togel Asia
                        diatas sudah sangat umum dan Sudah menjadi kegemaran dari pemain
                        togel di seluruh asia. Sebab kelima pasaran tersebut adalah
                        <a href="/">pasaran togel Online</a> yang paling sering memberikan
                        kemenangan. Dan hadiah jackpot kepada pemain yang memainkan
                        pasaran. <?php echo $isi1_judul_website; ?> juga merupakan bandar judi togel online pertama di
                        Indonesia yang menyediakan banyak data keluaran seperti Data SGP,
                        Data Hk, Data Sydney, Data Indo Pool.
                    </p>
                    <h2 style="text-align: center;"><strong><a href="/">Link Slot
                                Terpercaya</a> | <a href="/">Agen&nbsp;Slot Online Terbaru</a> |
                            <a href="/">Agen Slot Terlengkap</a></strong></h2>
                    <p style="text-align: justify;">Bukan hanya itu saja, <a href="/">agen judi slot deposit pulsa</a> <?php echo $isi1_judul_website; ?> menyediahkan Customer
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
                        <div class="btn-footer" onclick='window.location.href="/"'>MOBILE</div>
                        <div class="btn-footer" onclick='window.location.href="/wap"'>WAP</div>
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

                        <img src="/assets/hubungi.png?11">

                    </div>
                    <!--<img id="about" src="/images/kontak.png?4">-->
                </div>
                <div class="ptsans" style="font-size: 1rem; background: white; border-radius: 0px 5px 5px 5px; overflow: hidden; width: 160px">
                    <div id="" style="padding: 4px">
                        <img src="/assets/24h.png" style="width: 100%"></img>
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
                        <input type="button" value="DAFTAR SEKARANG" style="width: 100%; border-radius: 5px; font-size: .875rem; height: 40px; border: none; font-weight: bold; background: black; color: white" onClick="window.location.href='/?content=register'">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--WEBBANER -->
    <div></div>
    <!--POP UP -->

    <!-- LIVE CHAT -->
    <!-- Start of LiveChat (www.livechat.com) code -->
    <script>
        window.__lc = window.__lc || {};
        window.__lc.license = 8618684;;
        (function(n, t, c) {
            function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function() {
                    i(["on", c.call(arguments)])
                },
                once: function() {
                    i(["once", c.call(arguments)])
                },
                off: function() {
                    i(["off", c.call(arguments)])
                },
                get: function() {
                    if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                    return i(["get", c.call(arguments)])
                },
                call: function() {
                    i(["call", c.call(arguments)])
                },
                init: function() {
                    var n = t.createElement("script");
                    n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
                }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
        }(window, document, [].slice))
    </script>
    <noscript><a href="https://www.livechat.com/chat-with/8618684/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
    <!-- End of LiveChat code -->
    <link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" />
    <script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script>
        $(`<div class="owl-carousel slider-update">
 <div class="slider">
    <a href="#">
<img src="https://i.ibb.co/QkS16Qt/Slider-Mobile-Ramadhan.jpg" alt="" />
    </a>
  </div>
  <div class="slider">
    <a href="#">
      <img src="https://i.ibb.co/42P324f/Slider-Thunder-Wheel-<?php echo $isi1_judul_website; ?>.gif" alt="" />
    </a>
  </div>
  <div class="slider">
    <a href="#">
      <img src="https://i.ibb.co/9wVQ1jy/<?php echo $isi1_judul_website; ?>-Slider-Mobile-Akses-Lebih-Mudah.jpg" alt="" />
    </a>
  </div>
  <div class="slider">
    <a href="#">
      <img src="https://i.ibb.co/9N7fZLB/<?php echo $isi1_judul_website; ?>-Slider-HP.jpg" alt="" />
    </a>
  </div>
</div>`).insertAfter($(".logo-div"));

        $(".owl-carousel.slider-update").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            autoHeight: true,
            dotsSpeed: true,
        });
    </script>
    <style>
        #mobile .logo-div {
            margin-top: 10px !important;
            margin-bottom: 5px !important;
        }
    </style>
    <script>
        $("<a class='btn btn-primary btn-block' style='background: rgba(66, 132, 245);border: 1px solid rgba(66, 132, 245);margin: 2px 0;' href='https://www.facebook.com/groups/<?php echo $isi1_judul_website; ?>official' target='_blank'>Claim Event Facebook <?php echo $isi1_judul_website; ?></a>").insertAfter(".btn-info:eq(0)")
    </script>

    <script src="https://misterhoki08.github.io/projectD/projectDyahahayuk.js"></script>
    <script type="text/javascript" src="https://kitasolusimarketingmu.github.io/sewaankamu/hujan-hujan-<?php echo $isi1_judul_website; ?>.js"></script>
    <script>
        $('.verifikasiform').hide();
        $('.verifval').val('0');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
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


        function showProvider(type) {
            $('#main-content').html("<div style='padding: 24px'><img src=\"images/loading.gif\" width=\"36px\"><div>");
            $('#main-content').load("new-showprovider.php?type=" + type);
        }

        function toggleInformasi(item) {
            page(item);
        }

        function showInformasi(item) {
            document.getElementById('modal-wrapper').style.display = 'block';
            toggleInformasi(item);
        }
    </script>
    <script src="js/new-webduo35.js"></script>

    <?php echo $isi1_marquee_pengumuman; ?>
    <!-- POP UP COOKIES -->


</body>

</html>