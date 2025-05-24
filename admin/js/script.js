'use strict';


  $(document).ready(function() {
  $('#table-data').DataTable();
});



  $("#search_box").keyup(function() {
    var filter = $(this).val(),
      count = 0;
    $('#data-produk div').each(function() {
      if($(this).text().search(new RegExp(filter, "i")) < 0) {
        $(this).addClass('d-none');
      } else {
        $(this).removeClass('d-none');
        count++;
      }
    }); 
  });



  $(document).on("click", "#invoice_cek_btn", function() {
    Swal.fire({
      title: 'Check Invoice',
      showCancelButton: true,
      cancelButtonText: 'Tutup',
      confirmButtonText: 'Check',
      html: `<div class="container-fluid">
      <p style="text-align:justify">Silahkan masukkan No. Invoice dan Kode Referensi pada form di bawah : <br> <br> 
      </p>
        <div class="row mb-2">
          <div class="col-12 mb-3 text-start">
            <label>No. Invoice</label>
            <input type="text" class="form-control" id="invoice_no_swal" placeholder="Invoice">
          </div>
          <div class="col-12 mb-3 text-start">
            <label>Kode Referensi</label>
            <input type="text" class="form-control" id="ref_no_swal" placeholder="Referensi">
          </div>
        </div>
      </div>
      <i>Klik tombol Check untuk memeriksa status invoice anda.</i>
      `
    }).then((result) => {
      var invoice = $("#invoice_no_swal").val();
      var referensi = $("#ref_no_swal").val();
      if (result.isConfirmed) { 
        $.ajax({
          url: "functions/actions.php?aksi=cek_invoice",
          method: "POST",
          data: {
            invoice: invoice,
            referensi: referensi
          },
          success: function(data) { 
            if (data == 'valid') {
              window.location.href = "?page=invoice&ref=" + referensi ;
            } else {
              Swal.fire(
                'Tidak Ditemukan!',
                'Data Invoice dan Kode Referensi tidak ditemukan.',
                'error'
              )
            }
          },
          error: function(error) {
            alert('Gagal Mengambil Data!'); 
          }
        })
        //window.location.href = "?page=konfirmasi_pembayaran&invoice="+invoice+"&ref="+referensi;
      }
    })

  });



  $("#form_daftar").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
      url: "functions/actions.php?aksi=daftar",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) { 
        if (data == "berhasil") { 
          $("#form_daftar").find("input, select").val("");
          $("#inlineCheckbox1").prop("checked", false);
          $("#modal_daftar").modal("hide");
          Swal.fire({
            title: 'Pendaftaran Berhasil!',
            text: "Anda telah terdaftar pada sistem.",
            icon: 'success',
            confirmButtonText: 'Tutup'
          }).then((result) => {
            if (result.isConfirmed) { 
              window.location.href = 'index.php';
            }
          })
        } else if (data == 'sandi') { 
          Swal.fire({
            title: 'Pendaftaran Gagal!',
            text: "Konfirmasi kata sandi tidak cocok.",
            icon: 'error',
            confirmButtonText: 'Tutup'
          })
        } else if (data == 'email'){ 
          Swal.fire({
            title: 'Pendaftaran Gagal!',
            text: "Email telah terdaftar.",
            icon: 'error',
            confirmButtonText: 'Tutup'
          })
        } else if (data == 'kontak'){ 
          Swal.fire({
            title: 'Pendaftaran Gagal!',
            text: "Nomor handphone telah terdaftar.",
            icon: 'error',
            confirmButtonText: 'Tutup'
          })
        } else if (data == 'username'){ 
          Swal.fire({
            title: 'Pendaftaran Gagal!',
            text: "Username telah terdaftar.",
            icon: 'error',
            confirmButtonText: 'Tutup'
          })
        }
      }
    })
  }));

  $("#form_login").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
      url: "functions/actions.php?aksi=login",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) { 
        if (data == "berhasil") {
          const Toast = Swal.mixin({
            toast: true,
            position: "bottom",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer)
              toast.addEventListener("mouseleave", Swal.resumeTimer)
            }
          })
          Toast.fire({
            icon: "success",
            title: "Login berhasil."
          }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
              //console.log("Login berhasil"); 
              window.location.href = 'index.php';
            }
          })
        } else {
          //console.log("gagal");
          Swal.fire({
            title: "Login Gagal!",
            text: "Email atau username tidak terdaftar!",
            icon: "error",
            confirmButtonText: "Tutup"
          })
        }
      }
    })
  }));

  $(document).on("click", "#ubah_sandi_btn", function() {
    var nama_alamat = $(this).closest("#table_data").find("#nama_alamat_td").text();
    var nama_penerima = $(this).closest("#table_data").find("#nama_penerima_td").text();
    var kontak_alamat = $(this).closest("#table_data").find("#kontak_alamat_td").text();
    //console.log(nama_alamat, nama_penerima, kontak_alamat);
    Swal.fire({
      title: 'Ubah Kata Sandi',
      showCancelButton: true,
      cancelButtonText: 'Tutup',
      confirmButtonText: 'Simpan',
      html: `<div class="container-fluid"> 
        <div class="row mb-2">
          <div class="col-12 mb-3 text-start">
            <label>Kata Sandi Lama</label>
            <input type="password" class="form-control" id="old_sandi_swal" placeholder="Kata sandi lama">
          </div> 
          <div class="col-12 mb-3 text-start">
            <label>Kata Sandi Baru</label>
            <input type="password" class="form-control" id="new_sandi1_swal" placeholder="Kata sandi baru">
          </div> 
          <div class="col-12 mb-3 text-start">
            <label>Konfirmasi Kata Sandi Baru</label>
            <input type="password" class="form-control" id="new_sandi2_swal" placeholder="Konfirmasi kata sandi baru">
          </div> 
        </div>
      </div> 
      `
    }).then((result) => {
      var old = $("#old_sandi_swal").val();
      var new1 = $("#new_sandi1_swal").val();
      var new2 = $("#new_sandi2_swal").val();
      console.log(old, new1, new2);
      if (result.isConfirmed) { 
        const Toast = Swal.mixin({
          toast: true,
          position: "bottom",
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer)
            toast.addEventListener("mouseleave", Swal.resumeTimer)
          }
        })
        $.ajax({
          url: "functions/actions.php?aksi=update_sandi",
          method: "POST",
          data: {
            old: old,
            new1: new1,
            new2: new2
          },
          success: function(data) { 
            if (data == 'success') {
              Toast.fire({
                icon: "success",
                title: "Kata sandi berhasil diperbarui."
              })
            } else if (data == 'false') {
              Swal.fire(
                'Gagal!',
                'Sandi lama tidak cocok.',
                'error'
              )
            } else {
              Swal.fire(
                'Gagal!',
                'Konfirmasi sandi baru tidak cocok.',
                'error'
              )
            }
          },
          error: function(error) {
            alert('Gagal Mengambil Data!'); 
          }
        })
      }
    })
  });
  
  $(document).on("click", "#cara_bayar_btn", function() {
    var total = $("#total_td").val();
    var bank = $("#bank_info").val();
    var penerima = $("#penerima_info").val();
    var rekening = $("#rek_info").val();
    var invoice = $("#invoice_info").val();
    var referensi = $("#invoice_info").attr("ref");
    Swal.fire({
      title: 'Informasi Pembayaran',
      showCancelButton: true,
      cancelButtonText: 'Tutup',
      confirmButtonText: 'Konfirmasi',
      html: `<p style="text-align:justify">Silahkan selesaikan pembayaran dan juga konfirmasi pembayaran dalam waktu 24 jam sejak pemesanan. <br> <br> 
      </p>
      <table class="table">
        <tr>
          <td class="text-start">No. Invoice</td>
          <td class="text-end"><strong>#` + invoice + `</strong></td>
        </tr>
        <tr>
          <td class="text-start">Kode Ref.</td>
          <td class="text-end"><strong>` + referensi + `</strong></td>
        </tr>
        <tr>
          <td class="text-start">Total Bayar</td>
          <td class="text-end"><strong>` + total + `</strong></td>
        </tr>
      </table>
      <p style="text-align:justify">Lakukan pembayaran dengan melakukan transfer melalui rekening berikut :<br> <br> 
      </p>
      <table class="table">
        <tr>
          <td class="text-start">Nama Bank</td>
          <td class="text-end"><strong>` + bank + `</strong></td>
        </tr>
        <tr>
          <td class="text-start">Nomor</td>
          <td class="text-end"><strong>` + rekening + `</strong></td>
        </tr>
        <tr>
          <td class="text-start">A.n.</td>
          <td class="text-end"><strong>` + penerima + `</strong></td>
        </tr>
      </table>
      <i>Klik tombol konfirmasi untuk melakukan konfirmasi pembayaran.</i>
      `
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "?page=konfirmasi_pembayaran&invoice=" + invoice + "&ref=" + referensi;
      }
    })

  });

  $(document).on("click", ".bukti_lihat", function() {
    var total = $("#total_td").val();
    var bank = $("#bank_info").val();
    var penerima = $("#penerima_info").val();
    var rekening = $("#rek_info").val();
    var invoice = $("#invoice_info").val();
    var referensi = $("#invoice_info").attr("ref");
    var src = 'upload/bukti_tf/' + $(this).attr('data');
    Swal.fire({
      title: 'Bukti Transfer',
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonText: 'Tutup',
      html: `<p style="text-align:justify">Ini bukti transfer untuk detail pesanan berikut: <br> <br> 
      </p>
      <table class="table">
        <tr>
          <td class="text-start">No. Invoice</td>
          <td class="text-end"><strong>#` + invoice + `</strong></td>
        </tr>
        <tr>
          <td class="text-start">Kode Ref.</td>
          <td class="text-end"><strong>` + referensi + `</strong></td>
        </tr>
        <tr>
          <td class="text-start">Total Bayar</td>
          <td class="text-end"><strong>` + total + `</strong></td>
        </tr>
      </table> 
      <div class="col-12 mb-4 text-center"> 
        <img src="` + src + `" class="img-fluid rounded-3">
      </div>
    
      <i>Apabila data telah sesuai dengan mutasi pada akun rekening silahkan melakukan perubahan status pesanan.</i>
      `
    })
  });

  $(document).on("click", ".bukti_saldo", function() {
    var total = $("#total_td").val(); 
    var src = 'upload/bukti_tf/' + $(this).attr('data');
    Swal.fire({
      title: 'Bukti Transfer',
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonText: 'Tutup',
      html: `<p style="text-align:justify">Ini bukti transfer untuk detail TopUp : <br> <br> 
      </p>
      <table class="table"> 
        <tr>
          <td class="text-start">Total Bayar</td>
          <td class="text-end"><strong>` + total + `</strong></td>
        </tr>
      </table> 
      <div class="col-12 mb-4 text-center"> 
        <img src="` + src + `" class="img-fluid rounded-3">
      </div>
    
      <i>Apabila data telah sesuai dengan mutasi pada akun rekening silahkan melakukan perubahan status saldo pengguna.</i>
      `
    })
  });

  $(document).on("click", ".deleteBtn", function() {
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    var date = $(this).attr('data-date');
    $('#id_delete').val(id);
    $('#type_delete').val(type);
    $('#date_delete').val(date);
    $('#hapusModal').modal('show');
    console.log(id, date, type);
  });

  $(document).on("click", "#tambah_sub_produk_btn", function() {
    var id = $("#id_td").val(); 
    Swal.fire({
      title: 'Tambah Data Produk',
      showCancelButton: true,
      cancelButtonText: 'Tutup',
      confirmButtonText: 'Simpan',
      html: `
      <div class="container-fluid"> 
        <div class="row mb-2"> 
            <input type="hidden" class="form-control" id="id_swal"value="`+id+`" readonly> 
          <div class="col-12 mb-3 text-start">
            <label>Nama Sub Produk</label>
            <input type="text" class="form-control" id="nama_swal" placeholder="Nama sub produk">
          </div>  
          <div class="col-12 mb-3 text-start">
            <label>Harga Dasar</label>
            <input class="form-control" data-type="currency" id="harga_dasar_swal" placeholder="Harga dasar">
          </div>  
          <div class="col-12 mb-3 text-start">
            <label>Rate Category</label>
            <select class="form-select" id="cat_swal">
              <option value="">Pilih rate category</option>
              <option value="percent">Percent</option>
              <option value="fixed">Fixed</option>
            </select>
          </div> 
          <div class="col-12 mb-3 text-start">
            <label>Nilai Rate</label>
            <input type="number" class="form-control" id="rate_swal" placeholder="Nilai rate">
          </div> 


        </div>
      </div> 
      `
    }).then((result) => {
      var id = $('#id_swal').val();
      var nama = $('#nama_swal').val();
      var harga = $('#harga_dasar_swal').val();
      var code = $('#cat_swal').val();
      var val_mark = $('#rate_swal').val();
      if (result.isConfirmed) { 
        $.ajax({
          url: "functions/actions.php?aksi=tambah_sub_produk",
          method: "POST",
          data: {
            id: id,
            nama: nama,
            harga: harga,
            code: code,
            val_mark: val_mark,
          },
          success: function(data) { 
            location.reload();
          },
          error: function(error) {
            alert('Gagal Mengambil Data!'); 
          }
        })
      }
    })

  });

  $(document).on("click", "#top_up_btn", function() { 
    Swal.fire({
      title: 'TopUp Saldo Akun',
      showCancelButton: true,
      cancelButtonText: 'Tutup',
      confirmButtonText: 'Top Up',
      html: `
      <div class="container-fluid"> 
        <div class="row mb-2">  
          <div class="col-12 mb-3 text-start">
            <label>Nominal TopUp</label>
            <input type="text" class="form-control"  data-type="currency"  id="nominal_swal" placeholder="Nominal TopUp minimal Rp. 10,000">
          </div>  
        </div>
      </div> 
      `
    }).then((result) => {
      var nominal = $('#nominal_swal').val(); 
      if (result.isConfirmed) { 
        $.ajax({
          url: "functions/actions.php?aksi=top_up",
          method: "POST",
          data: {
            nominal : nominal,
          },
          success: function(data) { 
            window.location.href = '?page=konfirmasi_topup&id=' + data;
          },
          error: function(error) {
            alert('Gagal Mengambil Data!'); 
          }
        })
      }
    })

  });

  $(document).on("click", "#tarik_saldo_btn", function() { 
    Swal.fire({
      title: 'Tarik Saldo Akun',
      showCancelButton: true,
      cancelButtonText: 'Tutup',
      confirmButtonText: 'Tarik',
      html: `
      <div class="container-fluid"> 
        <div class="row mb-2">  
          <div class="col-12 mb-3 text-start">
            <label>Nominal Penarikan</label>
            <input type="text" class="form-control"  data-type="currency"  id="nominal_p_swal" placeholder="Nominal penarikan minimal Rp. 10,000">
          </div>  
          <div class="col-12 mb-3 text-start">
            <label>Bank/E-Wallet Tujuan</label>
            <input type="text" class="form-control" id="bank_swal" placeholder="Nama bank/e-wallet tujuan">
          </div>  
          <div class="col-12 mb-3 text-start">
            <label>No. Rekening</label>
            <input type="text" class="form-control" id="rekening_swal" placeholder="Nomor rekening/nomor e-wallet">
          </div>  
          <div class="col-12 mb-3 text-start">
            <label>Nama Pemilik Rekening/E-Wallet</label>
            <input type="text" class="form-control" id="nama_swal" placeholder="Nama pemilik rekening/nomor e-wallet">
          </div>  
        </div>
      </div> 
      `
    }).then((result) => {
      var nominal = $('#nominal_p_swal').val(); 
      var bank = $('#bank_swal').val(); 
      var rekening = $('#rekening_swal').val(); 
      var nama = $('#nama_swal').val(); 
      if (result.isConfirmed) { 
        $.ajax({
          url: "functions/actions.php?aksi=tarik_saldo",
          method: "POST",
          data: {
            nominal : nominal, bank : bank, rekening : rekening, nama : nama
          },
          success: function(data) { 
            if(data=='success'){
              window.location.href = '?page=saldo';
            }else{
              const Toast = Swal.mixin({
              toast: true,
              position: "bottom",
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer)
                toast.addEventListener("mouseleave", Swal.resumeTimer)
              }
            })
            Toast.fire({
              icon: "error",
              title: "Nominal penarikan melebih saldo akun."
              })
            }
          },
          error: function(error) {
            alert('Gagal Mengambil Data!'); 
          }
        })
      }
    })

  });

  $(document).on('keyup', 'input[data-type=currency]', function() {
    var nilai = $(this).val().replace(/,/g, "");
    var x = nilai.toString().length;
    var a = nilai.toString();

    if (x < 4) {
      $(this).val(a);
    } else if (x > 3 && x < 5) {
      $(this).val(a.substr(0, 1) + ',' + a.substr(1, 3));
    } else if (x > 4 && x < 6) {
      $(this).val(a.substr(0, 2) + ',' + a.substr(2, 3));
    } else if (x > 5 && x < 7) {
      $(this).val(a.substr(0, 3) + ',' + a.substr(3, 3));
    } else if (x > 6 && x < 8) {
      $(this).val(a.substr(0, 1) + ',' + a.substr(1, 3) + ',' + a.substr(4, 3));
    } else if (x > 7 && x < 9) {
      $(this).val(a.substr(0, 2) + ',' + a.substr(2, 3) + ',' + a.substr(5, 3));
    } else if (x > 8 && x < 10) {
      $(this).val(a.substr(0, 3) + ',' + a.substr(3, 3) + ',' + a.substr(6, 3));
    } else if (x > 9 && x < 11) {
      $(this).val(a.substr(0, 1) + ',' + a.substr(1, 3) + ',' + a.substr(4, 3) + ',' + a.substr(7, 3));
    } else {
      $(this).val('Error Limit');
    }
  });

  var dev = `This web store built by Webkuy.com.`;
  var dev_name = `Best regards - Abdul Rachmat (@rachmatsumo).`;
  var dev_wa = `6281342487857`;
  console.log(dev, dev_name, dev_wa);