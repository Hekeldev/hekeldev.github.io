<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Konfigurasi Bank Deposit</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content">
                            <div class="tab-pane show active" id="state-saving-preview">
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row">

                                    </div>


                                    <?php
                                    // Inisialisasi variabel $no dengan nilai default
                                    $no = isset($_GET['no']) ? $_GET['no'] : 1;
                                    ?>



                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <form method="post" action="">
                                                    <table id="datatable" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                        <!-- Isi tabel -->
                                                        <thead class="table-light">
                                                            <tr role="row">
                                                                <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="No">No</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Nama Bank/Ewallet: activate to sort column ascending">Nama Bank/Ewallet</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 157.8px;" aria-label="Nomor Rekening: activate to sort column ascending">Nomor Rekening</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Nama Rekening: activate to sort column ascending">Nama Rekening</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Catatan Tambahan: activate to sort column ascending">Catatan Tambahan</th>
                                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 110px;" aria-label="Aksi">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $start = ($no - 1) * 10 + 1; ?>
                                                            <?php foreach ($bankOptionsData as $index => $bankOption) : ?>
                                                                <tr>
                                                                    <td><?php echo $index + 1; ?></td>
                                                                    <td><input type="text" maxlength="10" name="bank_options[<?php echo $bankOption['id']; ?>][value]" value="<?php echo $bankOption['value']; ?>"></td>
                                                                    <td><input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="18" name="bank_options[<?php echo $bankOption['id']; ?>][att]" value="<?php echo $bankOption['att']; ?>"></td>
                                                                    <td><input type="text" maxlength="30" name="bank_options[<?php echo $bankOption['id']; ?>][rek]" value="<?php echo $bankOption['rek']; ?>"></td>
                                                                    <td><input type="text" name="bank_options[<?php echo $bankOption['id']; ?>][label]" value="<?php echo $bankOption['label']; ?>"></td>
                                                                    <td>
                                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                        <a href="?deleteBankOption=<?php echo $bankOption['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                                        <?php else : ?>
                                                                            <a href="#" onclick="levelFunction()">Hapus</a>
                                                                            <?php endif; ?> 
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            <tr>
                                                                <td><?php echo count($bankOptionsData) + 1; ?></td>
                                                                <td><input type="text" name="bank_options[new][value]" required maxlength="10"></td>
                                                                <td><input type="number" name="bank_options[new][att]" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="18"></td>
                                                                <td><input type="text" name="bank_options[new][rek]" required maxlength="30"></td>
                                                                <td><input type="text" name="bank_options[new][label]"></td>
                                                                <td>
                                                                    <!-- Tidak perlu tombol "Simpan Edit" untuk data baru, cukup berikan tombol "Simpan" -->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                    <button type="submit" class="btn btn-primary mb-2" name="saveBankOptions">
                                                        <span class="mdi mdi-plus-circle me-2"></span>Tambah
                                                    </button>
                                                    <?php else : ?>
                                                        <a onclick="levelFunction()" class="btn btn-primary mb-2">
                                                        <span class="mdi mdi-plus-circle me-2"></span>Tambah
                                                    </a>
                                                    <?php endif; ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                    <div id="datatable_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-7">
                                    <?php
                                    $itemsPerPage = 10;
                                    $startRange = ($no - 1) * $itemsPerPage + 1;
                                    $endRange = min($no * $itemsPerPage, count($bankOptionsData));
                                    $totalEntries = count($bankOptionsData);
                                    $totalPages = ceil($totalEntries / $itemsPerPage);
                                    ?>
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                        Showing <?php echo $startRange; ?> to <?php echo $endRange; ?> of <?php echo $totalEntries; ?> entries
                                    </div>
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php if ($no > 1) : ?>
                                                <li class="paginate_button page-item previous"><a href="?PAY4D=rekening_deposit&no=<?php echo ($no - 1); ?>" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <?php endif; ?>
                                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                                <li class="paginate_button page-item <?php echo ($i == $no) ? 'active' : ''; ?>"><a href="?PAY4D=rekening_deposit&no=<?php echo $i; ?>" aria-controls="datatable" data-dt-idx="<?php echo $i; ?>" tabindex="0" class="page-link"><?php echo $i; ?></a></li>
                                            <?php endfor; ?>
                                            <?php if ($no < $totalPages) : ?>
                                                <li class="paginate_button page-item next"><a href="?PAY4D=rekening_deposit&no=<?php echo ($no + 1); ?>" aria-controls="datatable" data-dt-idx="<?php echo $totalPages + 1; ?>" tabindex="0" class="page-link">Next</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>










                        </div>





                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>