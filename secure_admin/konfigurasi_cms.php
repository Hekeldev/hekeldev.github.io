<div class="content-page">
    <div class="content">

        <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Pengaturan Website</h4>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs nav-bordered mb-3">
            <li class="nav-item">
                <a href="#website" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">CMS Website</span>
                </a>
            </li>

            <script>
                function levelsFunction() {
                    alert("Hanya akses level SuperAdmin yang dapat melakukan ini.");
                    window.location.href = 'index.php?PAY4D=konfigurasi_cms';
                }
            </script>

            <div class="tab-content">
                <div class="tab-pane show active" id="website">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="websiteName" class="control-label">Nama Website <span style="color: red;">*</span></label>
                                            <form method="post" action="" style="display: flex; align-items: center;">

                                                <input type="text" class="form-control" id="websiteName" name="websiteName" value="<?php echo WEBSITE_NAME; ?>" required="">
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateWebsiteName" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <?php
                                        if (isset($_POST['updateWebsiteName'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan
                                            echo '<script>alert("Nama website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>

                                        <div class="mb-2">
                                            <label class="" style="margin-right: 10px;">MarQuee Teks website: <span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                <input type="text" class="form-control" id="marqName" name="marqName" value="<?php echo MARQ; ?>" required="">
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateMARQName" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <?php
                                        if (isset($_POST['updateMARQName'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan
                                            echo '<script>alert("Marquee text berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>

                                        <div class="mb-2">
                                            <label class="" style="margin-right: 10px;">Website Link: <span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                <input type="text" class="form-control" id="websitelinkName" name="websitelinkName" value="<?php echo WEBSITE_LINK; ?>" required="">
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateWebsitelinkName" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <?php
                                        if (isset($_POST['updateWebsitelinkName'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan
                                            echo '<script>alert("Website link berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>


                                        <div class="mb-2">
                                            <label class="" style="margin-right: 10px;">Warna Template Website: <span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                <select class="custom-select form-control kecamatan-tujuan select2-accessible" name="warnaCSS" id="cssOption">
                                                    <option value="light" <?php echo (WARNA_CSS == 'light') ? 'selected' : ''; ?>>(DEFAULT) WHITE</option>
                                                </select>
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateWarnaCSS" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <?php
                                        if (isset($_POST['updateWarnaCSS'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan
                                            echo '<script>alert("Warna CSS berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>


                                        <div class="mb-2">
                                            <label for="jenisCSS" class="" style="margin-right: 10px;">Jenis Template Not LoggedIn: <span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                <select class="custom-select form-control kecamatan-tujuan select2-accessible" name="jenisCSS" id="cssOption">
                                                    <option value="BW" <?php echo (JENIS_CSS == 'BW') ? 'selected' : ''; ?>>BLUE LIGHT</option>
                                                    <option value="BY" <?php echo (JENIS_CSS == 'BY') ? 'selected' : ''; ?>>YELLOW LIGHT</option>
                                                </select>
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateJenisCSS" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <?php
                                        if (isset($_POST['updateJenisCSS'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                            echo '<script>alert("Jenis CSS berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>

                                        <div class="mb-2">
                                            <label for="mobileCss" class="" style="margin-right: 10px;">Template LoggedIn Mobile: <span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                <select class="custom-select form-control kecamatan-tujuan select2-accessible" name="mobileCss" id="cssOption">
                                                    <option value="YELLOW-LIGHT" <?php echo (MOBILE_CSS == 'YELLOW-LIGHT') ? 'selected' : ''; ?>>YELLOW LIGHT</option>
                                                    <option value="BLUE-LIGHT" <?php echo (MOBILE_CSS == 'BLUE-LIGHT') ? 'selected' : ''; ?>>BLUE LIGHT</option>

                                                </select>
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="mobilecssName" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                        <?php
                                        if (isset($_POST['mobilecssName'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                            echo '<script>alert("Template LoggedIn Mobile berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>

                                        <div class="mb-2">
                                            <label for="websiteFavicon" class="control-label">Banner Mobile Home<span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;" enctype="multipart/form-data">
                                                <input type="file" id="websiteFavicon" name="updateBannerMobileHome" class="form-control">
                                                <div class="mb-2">

                                                </div>
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?> 
                                                    <button class="btn btn-primary" type="submit" name="updateBannerMobileHome" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                            <img id="preview-image-before-upload-kop" alt="Preview Image" style="max-height: 200px; max-width:100%" src="<?php echo BANNER_MOBILE_HOME ?>">
                                        </div>
                                        <?php
                                        if (isset($_POST['updateBannerMobileHome'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                            echo '<script>alert("Banner Mobile Home berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>


                                        <div class="mb-2">
                                            <label for="websiteFavicon" class="control-label">Favicon Website<span style="color: red;">*</span></label>
                                            <form action="" method="post" style="display: flex; align-items: center;" enctype="multipart/form-data">
                                                <input type="file" id="websiteFavicon" name="updateWebsiteFavicon" class="form-control">
                                                <div class="mb-2">

                                                </div>
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateFavicon" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                            <img id="preview-image-before-upload-kop" alt="Preview Image" style="max-height: 200px; max-width:100%" src="<?php echo WEBSITE_FAVICON ?>">
                                        </div>
                                        <?php
                                        if (isset($_POST['updateFavicon'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                            echo '<script>alert("Favicon website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>

                                        <div class="mb-2">
                                            <label for="websiteLogo" class="control-label">Logo Website</label>
                                            <form action="" method="post" style="display: flex; align-items: center;" enctype="multipart/form-data">
                                                <input type="file" id="websiteLogo" name="updateWebsiteLogo" class="form-control">
                                                <div class="mb-2">

                                                </div>
                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button class="btn btn-primary" type="submit" name="updateLogo" style="margin-left: 10px;">Update</button>
                                                <?php else : ?>
                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                <?php endif; ?>
                                            </form>
                                            <img id="preview-image-before-upload-kop" alt="Preview Image" style="max-height: 200px; max-width:100%" src="<?php echo WEBSITE_LOGO ?>">
                                        </div>
                                        <?php
                                        if (isset($_POST['updateLogo'])) {
                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                            echo '<script>alert("Logo website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="prefix">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Social Media Admin</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">


                                                        <div class="mb-2">
                                                            <label for="walinkName">Link WhatsApp</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="walinkName" id="walinkName" required="" value="<?php echo WA_LINK_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateWaLinkName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateWaLinkName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("Link WhatsApp website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="waName">WhatsApp</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="waName" id="waName" required="" value="<?php echo WA_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateWaName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>

                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateWaName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("WhatsApp website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="lineName">Line</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="lineName" id="lineName" required="" value="<?php echo LINE_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateLineName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>

                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateLineName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("Line website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="wechatName">WeChat</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="wechatName" id="wechatName" required="" value="<?php echo WECHAT_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateWechatName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateWechatName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("WeChat website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="telegramName">Telegram</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="telegramName" id="telegramName" required="" value="<?php echo TELEGRAM_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateTelegrameName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateTelegrameName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("Telegram website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="telegramlinkName">Link Telegram</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="telegramlinkName" id="telegramlinkName" required="" value="<?php echo TELEGRAMLINK_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateTelegramLinkName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateTelegramLinkName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("Link Telegram website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="fbName">Facebook</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="fbName" id="fbName" required="" value="<?php echo FB_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateFbName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateFbName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("Facebook website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="livechatName">LiveChat Link</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="livechatName" id="livechatName" required="" value="<?php echo LIVECHAT_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateLivechatName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateLivechatName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("LiveChat Link website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>
                                                        <div class="mb-2">
                                                            <label for="livechatlinkName">LiveChat Script Desktop</label>
                                                            <form action="" method="post" style="display: flex; align-items: center;">
                                                                <input type="text" name="livechatlinkName" id="livechatlinkName" required="" value="<?php echo LIVECHATLINK_ADMIN ?>" class="form-control">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <button class="btn btn-primary" type="submit" name="updateLivechatlinkName" style="margin-left: 10px;">Update</button>
                                                                <?php else : ?>
                                                                    <a class="btn btn-primary" onclick="levelsFunction()" style="margin-left: 10px;">Update</a>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if (isset($_POST['updateLivechatName'])) {
                                                            // Lakukan pemrosesan atau validasi lainnya jika diperlukan

                                                            echo '<script>alert("LiveChat Script Desktop website berhasil diperbarui!"); window.location.href = "?PAY4D=konfigurasi_cms";</script>';
                                                        }
                                                        ?>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="default">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Admin Settings Page</h3>
                                        </div>
                                        <div class="card-body">


                                            <div class="modal-body">


                                                <div class="row">

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(e) {

                            var id = "30";

                            provinsi(id);

                            function provinsi(id = '') {
                                $.ajax({
                                    url: "/ongkir/provinsi/select",
                                    type: "post",
                                    dataType: 'json',
                                    success: function(params) {
                                        $("#provinsi").select2({
                                            allowClear: true,
                                            // dropdownParent: $('#newPelanggan .modal-body'),
                                            //    _token: CSRF_TOKEN,
                                            data: params // search term
                                        });
                                        $("#provinsi").select2("trigger", "select", {
                                            data: {
                                                id: "30"
                                            }
                                        });
                                    },
                                });
                            }
                            id = "30";
                            kabupaten(id);

                            function kabupaten(id = '') {
                                $.ajax({
                                    url: "/ongkir/kabupaten/select",
                                    type: "post",
                                    data: {
                                        provinsi_id: id
                                    },
                                    dataType: 'json',
                                    success: function(params) {
                                        $('#kabupaten').empty();
                                        $("#kabupaten").select2({
                                            allowClear: true,
                                            // dropdownParent: $('#newPelanggan .modal-body'),
                                            //    _token: CSRF_TOKEN,
                                            data: params // search term
                                        });

                                        $("#kabupaten").select2("trigger", "select", {
                                            data: {
                                                id: "494"
                                            }
                                        });
                                    },
                                });
                            }
                            id = "";
                            kecamatan(id);

                            function kecamatan(id = '') {
                                $.ajax({
                                    url: "/ongkir/kecamatan/select",
                                    type: "post",
                                    data: {
                                        kabupaten_id: id
                                    },
                                    dataType: 'json',
                                    success: function(params) {
                                        $('#kecamatan').empty();
                                        $("#kecamatan").select2({
                                            allowClear: true,
                                            // dropdownParent: $('#newPelanggan .modal-body'),
                                            //    _token: CSRF_TOKEN,
                                            data: params // search term
                                        });

                                        $("#kecamatan").select2("trigger", "select", {
                                            data: {
                                                id: "6859"
                                            }
                                        });
                                    },
                                });
                            }

                            // ajax select kota tujuan
                            $('#provinsi').on('change', function() {
                                let id = $(this).val();
                                if (id) {
                                    kabupaten(id);
                                }
                            });

                            // //ajax select kecamatan tujuan
                            $('#kabupaten').on('change', function() {
                                let id = $(this).val();
                                if (id) {
                                    kecamatan(id);
                                }
                            });



                            CKEDITOR.replace('deskripsi');
                            CKEDITOR.replace('alamat');

                            CKEDITOR.instances['deskripsi'].setData('');
                            CKEDITOR.instances['alamat'].setData('<p>Jl Abcd</p>');


                            $('#preview-image-before-upload').attr('src', '/image/website/website1688263737.png');
                            $('#file').change(function() {

                                let reader = new FileReader();

                                reader.onload = (e) => {

                                    $('#preview-image-before-upload').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(this.files[0]);


                            });
                            $('#kop_surat').change(function() {

                                let reader = new FileReader();

                                reader.onload = (e) => {

                                    $('#preview-image-before-upload-kop').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(this.files[0]);


                            });

                            //         //     var $radios = $('input:radio[name=verifikasi]');
                            //     if ($radios.is(':checked') === false) {
                            //         $radios.filter('[value=0]').prop('checked', true);
                            //     }
                            // 
                            $("#produk-data").select2({
                                placeholder: 'Cari Produk',
                                allowClear: true,
                                // dropdownParent: $('#modalStock .modal-body'),
                                ajax: {
                                    url: "/produk/select",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            //    _token: CSRF_TOKEN,
                                            search: params.term // search term
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }

                            });

                            $("#gudang-data").select2({
                                placeholder: 'Pilih Gudang',
                                allowClear: true,
                                // dropdownParent: $('#modalStock .modal-body'),
                                ajax: {
                                    url: "/gudang/select",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            //    _token: CSRF_TOKEN,
                                            search: params.term // search term
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }

                            });

                            $("#supplier-data").select2({
                                placeholder: 'Pilih Supplier',
                                allowClear: true,
                                // dropdownParent: $('#modalStock .modal-body'),
                                ajax: {
                                    url: "/supplier/select",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            //    _token: CSRF_TOKEN,
                                            search: params.term // search term
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }

                            });

                            $("#customer-data").select2({
                                placeholder: 'Pilih Customer',
                                allowClear: true,
                                // dropdownParent: $('#modalStock .modal-body'),
                                ajax: {
                                    url: "/pelanggan/select",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            //    _token: CSRF_TOKEN,
                                            search: params.term // search term
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }

                            });

                            $("#sales-data").select2({
                                placeholder: 'Pilih Sales',
                                allowClear: true,
                                // dropdownParent: $('#modalStock .modal-body'),
                                ajax: {
                                    url: "/sales/select",
                                    type: "post",
                                    dataType: 'json',
                                    delay: 250,
                                    data: function(params) {
                                        return {
                                            //    _token: CSRF_TOKEN,
                                            search: params.term // search term
                                        };
                                    },
                                    processResults: function(response) {
                                        return {
                                            results: response
                                        };
                                    },
                                    cache: true
                                }

                            });

                            $("#sales-data").select2("trigger", "select", {
                                data: {
                                    id: '1',
                                    text: 'Sales Super Admin'
                                }
                            });
                            $("#customer-data").select2("trigger", "select", {
                                data: {
                                    id: '1',
                                    text: 'Customer Umum'
                                }
                            });
                            $("#supplier-data").select2("trigger", "select", {
                                data: {
                                    id: '1',
                                    text: 'Supplier Umum'
                                }
                            });
                            $("#gudang-data").select2("trigger", "select", {
                                data: {
                                    id: '1',
                                    text: 'Gudang Utama Toko'
                                }
                            });

                        });
                    </script>

                </div> <!-- End Content -->

            </div>