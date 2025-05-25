<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Banner Desktop</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">



                <div class="tab-content">
                    <div class="tab-pane show active" id="website">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label for="bannerAltText" class="control-label">ALT TEXT<span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" id="bannerAltText" name="bannerAltText" required="">
                                                </div>

                                                <div class="row">
                                                    <div class="mb-2">
                                                        <label for="bannerImage" class="control-label">Pilih gambar banner<span style="color: red;">*</span></label>
                                                        <input type="file" id="bannerImage" name="bannerImage" accept="image/*" class="form-control" onchange="previewImage(event)">
                                                        <div class="mb-2">
                                                            <img id="preview-image-before-upload" alt="Preview Image" style="max-height: 100px; max-width: 350px">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                            <button type="submit" name="submitAddBannerDesktop" class="btn btn-primary" id="saveBtn">Tambah Banner</button>
                                                        <?php else : ?>
                                                            <a onclick="levelFunction()" class="btn btn-primary">Tambah Banner</a>
                                                        <?php endif; ?>
                                                    </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Content -->

                        <!-- Tabel daftar banner -->
                        <div class="table-responsive">
                            <table id="datatable" class="table table-centered table-bordered table-hover w-100 dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable_info">
                                <thead class="table-light">
                                    <tr role="row">
                                        <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19.2px;" aria-label="No">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 281px;" aria-label="Alt Text: activate to sort column ascending">Alt Text</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 165px;" aria-label="Gambar: activate to sort column ascending">Gambar</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 472.2px;" aria-label="Aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryBanners = "SELECT * FROM banners";
                                    $resultBanners = mysqli_query($conn, $queryBanners);
                                    $no = 1;
                                    while ($banner = mysqli_fetch_assoc($resultBannersDesktop)) :
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $banner['alt_text']; ?></td>
                                            <td><img src="<?php echo $banner['image_path']; ?>" alt="<?php echo $banner['alt_text']; ?>" width="50px"></td>
                                            <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                            <td><a href="index.php?deleteBanner=<?php echo $banner['id']; ?>" class="btn btn-outline-danger btn-xs deleteWebsite"><i class="mdi mdi-delete"></i></a></td>
                                            <?php else : ?>
                                                <td><a onclick="levelFunction()" class="btn btn-outline-danger btn-xs deleteWebsite"><i class="mdi mdi-delete"></i></a></td>
                                                <?php endif; ?>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Success Header Modal -->

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


                <script type="text/javascript">
                    $(document).ready(function() {

                        var table = $('#datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            retrieve: true,
                            paging: true,
                            destroy: true,
                            "scrollX": false,
                            ajax: {
                                url: "http://nyuscoding.great-site.net/website/table",
                                type: "POST",

                            },
                            columns: [{
                                    data: 'DT_RowIndex',
                                    name: 'DT_RowIndex',
                                    orderable: false,
                                    searchable: false
                                },
                                {
                                    data: 'nama_website',
                                    name: 'nama_website'
                                },
                                {
                                    data: 'icon',
                                    name: 'icon'
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: false,
                                    searchable: false
                                },
                            ]
                        });






                        $('body').on('click', '.deleteWebsite', function() {
                            var id_website = $(this).data("id_website");
                            myurl = "http://nyuscoding.great-site.net/website/delete" + '/' + id_website
                            msg = "Data Toko yang dihapus tidak dapat dikembalikan!";

                            swal({
                                    title: "Yakin hapus data ini?",
                                    text: msg,
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Ya, Hapus Data!",
                                    cancelButtonText: "Batal!",
                                    closeOnConfirm: true,
                                    closeOnCancel: true
                                },
                                function(isConfirm) {
                                    if (isConfirm) {
                                        $("#canvasloading").show();
                                        $("#loading").show();
                                        $.ajax({
                                            type: "get",
                                            url: myurl,
                                            success: function(data) {
                                                if (data.success == true) {
                                                    table.draw();
                                                    $("#canvasloading").hide();
                                                    $("#loading").hide();
                                                    $.NotificationApp.send("Berhasil", data.message,
                                                        "top-right", "",
                                                        "info")
                                                } else {
                                                    $("#canvasloading").hide();
                                                    $("#loading").hide();
                                                    Swal.fire({
                                                        title: 'Gagal!',
                                                        text: data.message,
                                                        icon: 'error',
                                                        confirmButtonText: 'OK'
                                                    })
                                                }
                                            },
                                            error: function(data) {
                                                console.log('Error:', data);
                                                $("#canvasloading").hide();
                                                $("#loading").hide();
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Terjadi Kesalahan',
                                                    icon: 'error',
                                                    confirmButtonText: 'OK'
                                                })
                                            }
                                        });

                                    }
                                });
                        });

                    });
                </script>

            </div> <!-- End Content -->



        </div>