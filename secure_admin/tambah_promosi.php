<div class="content-page">
    <div class="content">

        <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Tambah Promosi</h4>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs nav-bordered mb-3">
            <li class="nav-item">
                <a href="#website" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Promosi</span>
                </a>
            </li>
        </ul>



        <div class="tab-content">
            <div class="tab-pane show active" id="website">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="../add_accordion.php" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="modal-body">



                                        <div class="mb-2">
                                            <label for="alt_text" class="control-label">JUDUL PROMOSI<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title" required="Judul wajib di isi">
                                        </div>
                                        <div class="mb-2">
                                            <label for="alt_text" class="control-label">ALT TEXT<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="alt_text" name="alt_text" required="">
                                        </div>


                                        <div class="row">

                                            <div class="mb-2">
                                                <label for="file" class="control-label">Gambar Promosi<span style="color: red;">*</span></label>
                                                <input type="file" id="file" name="file" class="form-control" onchange="previewImage(event)">
                                                <div class="mb-2">
                                                    <img id="preview-image-before-upload" alt="Preview Image" style="max-height: 100px; max-width: 350px">
                                                </div>
                                            </div>




                                            <div class="mb-2">
                                                <label for="deskripsi" class="control-label">Deskripsi Promosi <span style="color: red;">*</span></label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" style="visibility: hidden; display: none;"></textarea>
                                                <div id="cke_alamat" class="cke_2 cke cke_reset cke_chrome cke_editor_alamat cke_ltr cke_browser_webkit" dir="ltr" lang="id" role="application" aria-labelledby="cke_alamat_arialbl"><span id="cke_alamat_arialbl" class="cke_voice_label">Rich Text Editor, alamat</span>
                                                    <div class="cke_inner cke_reset" role="presentation">
                                                        <span id="cke_31" class="cke_voice_label">Toolbar Penyunting</span>


                                                    </div>
                                                </div>
                                            </div>




                                            <div class="modal-footer">
                                            <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                <button type="submit" name="submit" class="btn btn-primary" id="saveBtn">Tambah</button>
                                                <?php else : ?>
                                                    <a onclick="levelFunction()" class="btn btn-primary">Tambah</a>
                                                    <?php endif; ?>
                                            </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div> <!-- End Content -->

                <script>
                    function previewImage(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var preview = document.getElementById('preview-image-before-upload');
                            preview.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }
                </script>


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


                        $('#preview-image-before-upload').attr('src', '');
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