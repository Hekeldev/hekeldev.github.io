<div class="content-page">
    <div class="content">


        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Pengguna</h4>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">



            <a href="?PAY4D=tambah_promosi" id="createNewPengguna" class="btn btn-primary mb-2"><i class="mdi mdi-plus-circle me-2"></i>Tambah</a>
            <div class="tab-content">
                <div class="tab-pane show active" id="state-saving-preview">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">


                        <div class="col-sm-12">
                            <div class="table-responsive">

                                <table id="datatable" class="table table-centered table-bordered table-hover w-100 dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable_info">
                                    <!-- Isi tabel -->
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 0px;" aria-label="No">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 15.8px;" aria-label="Judul: activate to sort column ascending">Judul</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 55.8px;" aria-label="Gambar: activate to sort column ascending">Gambar</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 25.8px;" aria-label="ALT TEXT: activate to sort column ascending">ALT TEXT</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 355.8px;" aria-label="Deskripsi Promo: activate to sort column ascending">Deskripsi Promo</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 0px;" aria-label="Status: activate to sort column ascending">Status</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 110px;" aria-label="Aksi">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Mengambil data accordions
                                        $queryAccordions = "SELECT * FROM accordions";
                                        $resultAccordions = mysqli_query($conn, $queryAccordions);
                                        $no = 1;
                                        while ($accordion = mysqli_fetch_assoc($resultAccordions)) :
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $accordion['title']; ?></td>
                                                <td><img src="../<?php echo $accordion['image_path']; ?>" alt="<?php echo $accordion['alt_text']; ?>" width="100"></td>
                                                <td><?php echo $accordion['alt_text']; ?></td>
                                                <td>
                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                        <form method="post" action="update_promosi.php">
                                                        <?php else : ?>
                                                        <?php endif; ?>
                                                        <textarea id="editor<?php echo $accordion['id']; ?>" name="description"><?php echo $accordion['description']; ?></textarea>

                                                        <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                            <input type="hidden" name="accordionId" value="<?php echo $accordion['id']; ?>">
                                                            <input type="submit" class="btn btn-primary mb-2" name="updateAccordion" value="Simpan">
                                                        </form>
                                                    <?php else : ?>
                                                        <a class="btn btn-primary mb-2" href="#" onclick="levelFunction()">Simpan</a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $accordion['statuspromosi']; ?></td>
                                                <td>

                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                        <a href="index.php?deleteAccordion=<?php echo $accordion['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus promosi ini?')" class="btn btn-outline-danger btn-sm deletePengguna"><i class="mdi mdi-delete"></i></a>
                                                        <?php if ($accordion['statuspromosi'] == 'Aktif') : ?>
                                                            <a href="index.php?changeStatusPromosi=<?php echo $accordion['id']; ?>&statuspromosi=Tidak%20Aktif" class="btn btn-outline-warning btn-sm"><i class="mdi mdi-toggle-switch"></i> Nonaktifkan</a>
                                                        <?php else : ?>
                                                            <a href="index.php?changeStatusPromosi=<?php echo $accordion['id']; ?>&statuspromosi=Aktif" class="btn btn-outline-success btn-sm"><i class="mdi mdi-toggle-switch"></i> Aktifkan</a>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <a href="#" onclick="levelFunction()" class="btn btn-outline-danger btn-sm deletePengguna"><i class="mdi mdi-delete"></i></a>
                                                        <?php if ($accordion['statuspromosi'] == 'Aktif') : ?>
                                                            <a onclick="levelFunction()" href="#<?php echo $accordion['id']; ?>&statuspromosi=Tidak%20Aktif" class="btn btn-outline-warning btn-sm"><i class="mdi mdi-toggle-switch"></i> Nonaktifkan</a>
                                                        <?php else : ?>
                                                            <a  onclick="levelFunction()" href="#<?php echo $accordion['id']; ?>&statuspromosi=Aktif" class="btn btn-outline-success btn-sm"><i class="mdi mdi-toggle-switch"></i> Aktifkan</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>


                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <!-- Modal Edit -->
                        <script>
                            <?php
                            // Mengambil data accordions
                            $resultAccordions = mysqli_query($conn, $queryAccordions);
                            while ($accordion = mysqli_fetch_assoc($resultAccordions)) :
                            ?>
                                CKEDITOR.replace('editor<?php echo $accordion['id']; ?>');
                            <?php endwhile; ?>
                        </script>













                        <div id="datatable_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to <?php echo $no - 1; ?> of <?php echo $no - 1; ?> entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item next disabled" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>





            </div>
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div>
</div>








<script type="text/javascript">
    $(document).ready(function(e) {


        $('#file').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });

    $(document).ready(function() {
        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // datatable
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            retrieve: true,
            paging: true,
            destroy: true,
            "scrollX": false,
            ajax: {
                url: "Table",
                type: "POST",

            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'foto',
                    name: 'foto',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'website_id',
                    name: 'website_id'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#createNewPengguna').click(function() {
            $('#saveBtn').html("Simpan");
            $('#id_pengguna').val('');
            $('#penggunaForm').trigger("reset");
            $('#modelHeading').html("Tambah Pengguna ");
            $('#ajaxModel').modal('show');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            var form = $('#penggunaForm')[0];
            var formData = new FormData(form);
            $.ajax({
                data: formData,
                url: "/simpan",
                type: "POST",
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.success == true) {
                        $('#penggunaForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        $('#saveBtn').html('Simpan');
                        $.NotificationApp.send("Berhasil", data.message, "top-right", "",
                            "success")
                    } else {
                        $('#saveBtn').html('Simpan');
                        swal("Pesan", data.message, "error");
                    }
                },
                error: function(xhr) {
                    var res = xhr.responseJSON;
                    if ($.isEmptyObject(res) == false) {
                        err = '';
                        $.each(res.errors, function(key, value) {
                            // err += value + ', ';
                            err = value;
                        });
                        $('#saveBtn').html('Simpan');
                        $("#canvasloading").hide();
                        $("#loading").hide();
                        swal("Pesan", err, "error");
                    }
                }
            });
        });

        $('body').on('click', '.editPengguna', function() {

            var id_pengguna = $(this).data('id_pengguna');
            $.get("" + '/' + id_pengguna + '/edit', function(data) {
                $('#modelHeading').html("Ubah Pengguna ");
                $('#saveBtn').html('Perbaharui');
                $('#ajaxModel').modal('show');
                $('#id_pengguna').val(data.data.id);
                $('#nama_lengkap').val(data.data.name);
                $('#email').val(data.data.email);
                $('#username').val(data.data.username);
                $('#level').val(data.data.level);
                $('select[name="website"]').val(data.data.website_id);
                $("#roles").val(data.userRole);

            })

        });

        $('body').on('click', '.deletePengguna', function() {

            var id_pengguna = $(this).data("id_pengguna");
            swal({
                    title: "Yakin hapus data ini?",
                    text: "Data yang sudah dihapus tidak dapat dikembalikan!",
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
                        $.ajax({
                            type: "DELETE",
                            url: "" + '/' + id_pengguna,
                            success: function(data) {
                                if (data.success == true) {
                                    table.draw();
                                    $.NotificationApp.send("Berhasil", data.message, "top-right", "",
                                        "success")
                                } else {
                                    swal("Gagal!", data.message, "error");
                                }
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                swal("Pesan", data.message, "error");
                            }
                        });

                    } else {
                        swal("Pesan", "Hapus data dibatalkan...! :)", "error");
                    }
                });
        });

    });
</script>




</div> <!-- End Content -->



</div>