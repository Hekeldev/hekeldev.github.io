<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>My Toko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Dimas Wahyu Saputra" name="author" /> <!-- App favicon -->
    <link rel="shortcut icon" href="image/website/website1688263737.png">
    <meta name="csrf-token" content="uZRjgfvfSlGBTiY8Xohn5My4W4vbrRQuFR4E9Xlj"> <!-- App css -->
    <link href="hy_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="hy_assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card"> <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary"> <a href="/"> <span><img src="image/website/website1688263737.png" alt="" height="80px"></span> </a> </div>
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <div id="msgbox" style="font-size: 1rem; width: 100%">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Masuk Akun</h4>
                                    <p class="text-muted mb-4">Masukkan Email dan Password untuk masuk ke Dashboard.</p>
                                </div>
                                <form id="loginForm">
                                    <div class="mb-3"> <label for="username" class="form-label">Username</label> <input class="form-control " name="username" type="text" id="username" required autocomplete="username" autofocus> </div>
                                    <div class="mb-3"> <a href="https://wa.me/6283823348229" class="text-muted float-end"><small>Kontak Develop</small></a> <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge"> <input id="password" name="password" type="password" class="form-control " name="password" required autocomplete="username">
                                            <div class="input-group-text" data-password="false"> <span class="password-eye"></span> </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center"> <button class="btn btn-primary" type="submit"> Masuk </button> <!-- <a href="/auth/google"> <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;"> </a> --> </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div> <!-- end card --> <!-- end row -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end page -->
        <footer class="footer footer-alt"> 2023 © My Toko </footer>
        <script src="hy_assets/js/vendor.min.js"></script>
        <script src="hy_assets/js/app.min.js"></script>
        <script src="js/script.js"></script>
</body>

</html>