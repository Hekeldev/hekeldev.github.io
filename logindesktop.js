$(document).ready(function() {
    // Fungsi untuk menampilkan alert custom
    function showAlert(message, cssClass) {
        var alertBox = $('<div>').addClass(' ' + cssClass).text(message);
        $('#msgboxDesktop').text('').append(alertBox).fadeIn('slow');
        if (message === '') {
          $('#msgboxDesktop').stop(true, true).fadeIn('slow');
        } else {
            var duration = 3000; // Durasi awal 3 detik
            if (cssClass === 'alert-success' || cssClass === 'alert-warning') {
                duration = 2000; // Durasi validasi menjadi 2 detik
            }
            setTimeout(function() {
                alertBox.fadeOut('slow', function() {
                    if ($('#msgboxDesktop').find('.alert').length === 0) {
                        $('#msgboxDesktop').fadeOut('slow');
                    }
                });
            }, duration);
        }
    }

    // Mengirim data login melalui AJAX
  $("#loginFormDesktop").submit(function (event) {
    event.preventDefault();

    var username = $("#regUSER").val();
    var password = $("#regPW").val();

    if (username === "" || password === "") {
      showAlert("Validating", "alert-success");
      setTimeout(function () {
        showAlert("Silakan diisi", "alert-warning");
      }, 1000);
      return;
    }

    // Mengecek status banned sebelum login
    $.ajax({
      type: "POST",
      url: "check_banned_status.php", // Ganti dengan file PHP yang digunakan untuk memeriksa status banned
      data: {
        username: username,
      },
      success: function (response) {
        if (response === "Banned") {
          showAlert("User di banned", "alert-warning");
          return; // Hentikan proses login jika akun dibanned
        }

        // Jika akun tidak dibanned, lanjutkan dengan proses login
        $.ajax({
          type: "POST",
          url: "login.php",
          data: {
            username: username,
            password: password,
          },
          beforeSend: function () {
            showAlert("Validating", "alert-success");
          },
          success: function (response) {
            setTimeout(function () {
              if (response === "Logging in") {
                showAlert(response, "alert-success");
                setTimeout(function () {
                  window.location.href = "userarea.php";
                }, 2000);
              } else {
                showAlert(response, "");
              }
            }, 2000);
          },
        });
      },
    });
  });
});
