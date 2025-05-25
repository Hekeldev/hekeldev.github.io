// ini adalah

$(document).ready(function () {
  function showAlert(message, cssClass) {
    var alertBox = $("<div>")
      .addClass("alert alert-sm " + cssClass)
      .text(message);
    $("#statusRegisterDesktop").text("").append(alertBox).fadeIn("slow");
    if (message === "") {
      $("#statusRegisterDesktop").fadeOut("slow");
    } else {
      var duration = 3000;
      if (
        cssClass === "alert alert-sm alert-success" ||
        cssClass === "alert alert-sm alert-warning"
      ) {
        duration = 2000;
      }
      setTimeout(function () {
        alertBox;
      }, duration);
    }
  }

  $("#registerFormDesktop").submit(function (event) {
    event.preventDefault();

    var regUsernameDesktop = $("#regUsernameDesktop").val();
    var regPasswordDesktop = $("#regPasswordDesktop").val();
    var regConfirmPasswordDesktop = $("#regConfirmPasswordDesktop").val();
    var regEmailDesktop = $("#regEmailDesktop").val();
    var regTelpDesktop = $("#regTelpDesktop").val();
    var regAccDesktop = $("#regAccDesktop").val();
    var regBankDesktop = $("#regBankDesktop").val();
    var regNameDesktop = $("#regNameDesktop").val();

    var statusRegisterDesktop = $("#statusRegisterDesktop");

    if (regUsernameDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Username wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    } else if (!/^[A-Za-z0-9]{6,16}$/.test(regUsernameDesktop)) {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert(
          "Username 6-16 karakter standar (A~Z, a~z, 0~9) dan tanpa spasi!",
          "alert alert-sm alert-warning"
        );
      }, 2000);

      return;
    }

    if (regPasswordDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Password wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regPasswordDesktop !== regConfirmPasswordDesktop) {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert(
          "Konfirmasi password tidak cocok",
          "alert alert-sm alert-warning"
        );
      }, 2000);

      return;
    }

    if (regEmailDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Email wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regTelpDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("No Telepon wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regAccDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("No rekening wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regBankDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Bank wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regNameDesktop === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Nama rekening wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    $.ajax({
      type: "POST",
      url: "register.php",
      data: {
        username: regUsernameDesktop,
        password: regPasswordDesktop,
        confirmPassword: regConfirmPasswordDesktop,
        email: regEmailDesktop,
        telp_no: regTelpDesktop,
        acc_no: regAccDesktop,
        bank_name: regBankDesktop,
        fullname: regNameDesktop,
      },
      beforeSend: function () {
        var validatingBox = $("<div>")
          .addClass("alert alert-sm alert-success")
          .text("Validating");
        statusRegisterDesktop.html(validatingBox).fadeIn("slow"); // Menampilkan pesan "Validating" dengan class 'alert alert-sm alert-success' pada div dengan id "statusRegisterDesktop"
      },
      success: function (response) {
        setTimeout(function () {
          if (response === "Username sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegisterDesktop.text("").append(alertBox).fadeIn("slow"); // Menampilkan pesan response pada div dengan id "statusRegisterDesktop"
            if (!statusRegisterDesktop.is(":visible")) {
              statusRegisterDesktop.fadeOut("slow", function () {
                statusRegisterDesktop.text(""); // Mengosongkan konten pada div dengan id "statusRegisterDesktop"
              });
            }
          } else if (response === "Email sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegisterDesktop.text("").append(alertBox).fadeIn("slow"); // Menampilkan pesan response pada div dengan id "statusRegisterDesktop"
            if (!statusRegisterDesktop.is(":visible")) {
              statusRegisterDesktop.fadeOut("slow", function () {
                statusRegisterDesktop.text(""); // Mengosongkan konten pada div dengan id "statusRegisterDesktop"
              });
            }
          } else if (response === "Nomor telepon sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegisterDesktop.text("").append(alertBox).fadeIn("slow"); // Menampilkan pesan response pada div dengan id "statusRegisterDesktop"
            if (!statusRegisterDesktop.is(":visible")) {
              statusRegisterDesktop.fadeOut("slow", function () {
                statusRegisterDesktop.text(""); // Mengosongkan konten pada div dengan id "statusRegisterDesktop"
              });
            }
          } else if (response === "Nomor akun sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegisterDesktop.text("").append(alertBox).fadeIn("slow"); // Menampilkan pesan response pada div dengan id "statusRegisterDesktop"
            if (!statusRegisterDesktop.is(":visible")) {
              statusRegisterDesktop.fadeOut("slow", function () {
                statusRegisterDesktop.text(""); // Mengosongkan konten pada div dengan id "statusRegisterDesktop"
              });
            }
          } else if (
            response ===
            "Registrasi Sukses!, Selamat Bergabung, silakan isi data login Anda di form Login"
          ) {
            var successBox = $("<div>")
              .addClass("alert alert-sm alert-success")
              .text(response);
            statusRegisterDesktop.text("").append(successBox).fadeIn("slow"); // Menampilkan pesan success dengan class 'alert alert-sm alert-success' pada div dengan id "statusRegisterDesktop"
            // Mengisi otomatis username dan password di form login
            $("#regUSER").val(regUsernameDesktop);
            $("#regPW").val(regPasswordDesktop);

            // Mengosongkan semua input setelah registrasi berhasil
            $("#regUsernameDesktop").val("");
            $("#regPasswordDesktop").val("");
            $("#regConfirmPasswordDesktop").val("");
            $("#emailDesktop").val("");
            $("#regTelpDesktop").val("");
            $("#regAccDesktop").val("");
            $("#regBankDesktop").val("");
            $("#regNameDesktop").val("");

            // Mengosongkan semua select option (jika ada)
            $("#input-bank select").prop("selectedIndex", 0);

            setTimeout(function () {
              statusRegisterDesktop.fadeOut("slow", function () {
                statusRegisterDesktop.text(""); // Mengosongkan konten pada div dengan id "statusRegisterDesktop"
              });
            }, 60000);
          } else {
            var errorBox = $("<div>")
              .addClass("alert alert-sm alert-danger")
              .text(response);
            statusRegisterDesktop.text("").append(errorBox).fadeIn("slow"); // Menampilkan pesan error dengan class 'alert alert-sm alert-danger' pada div dengan id "statusRegisterDesktop"
            setTimeout(function () {
              statusRegisterDesktop.fadeOut("slow", function () {
                statusRegisterDesktop.text(""); // Mengosongkan konten pada div dengan id "statusRegisterDesktop"
              });
            }, 3000);
          }
        }, 2000);
      },
    });
  });
});
