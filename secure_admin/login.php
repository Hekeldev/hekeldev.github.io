<?php
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin <?php echo WEBSITE_NAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Dimas Wahyu Saputra" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo WEBSITE_FAVICON ?>">
    <meta name="csrf-token" content="uZRjgfvfSlGBTiY8Xohn5My4W4vbrRQuFR4E9Xlj">
    <!-- App css -->
    <link href="hy_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="hy_assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="./">
                                <span><img src="image/website/pay4d.png" alt="" height="50px"></span>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <div id="msgboxAdmin" style="font-size: 1rem; width: 100%">
                                </div>
                                <form id="loginFormAdmin">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control " type="text" id="username" autocomplete="off" >
                                    </div>
                                    <div class="mb-3">
                                        
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" class="form-control " autocomplete="off">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Masuk </button>
                                        <br>
                                        <a href="https://wa.me/6283823148229" class="text-muted float-end"><small>Kontak Develop</small></a>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-alt">
            2023 © Admin <?php echo WEBSITE_NAME ?>
        </footer>

        <script src="hy_assets/js/vendor.min.js"></script>
        <script src="hy_assets/js/app.min.js"></script>
        <script src="script.js"></script>

</body>
</html>