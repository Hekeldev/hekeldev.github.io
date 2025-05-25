// INI REGISTRASI.JS
$(document).ready(function () {
  // Fungsi untuk menampilkan alert custom
  function showAlert(message, cssClass) {
    var alertBox = $("<div>")
      .addClass("alert alert-sm " + cssClass)
      .text(message);
    $("#statusRegister").text("").append(alertBox).fadeIn("slow");
    if (message === "") {
      $("#statusRegister").fadeOut("slow");
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

  $("#registerForm").submit(function (event) {
    event.preventDefault();

    var regUsername = $("#regUsername").val();
    var regPassword = $("#regPassword").val();
    var regConfirmPassword = $("#regConfirmPassword").val();
    var email = $("#email").val();
    var regTelp = $("#regTelp").val();
    var regAcc = $("#regAcc").val();
    var regBank = $("#regBank").val();
    var regName = $("#regName").val();

    var statusRegister = $("#statusRegister");

    if (regUsername === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Username wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    } else if (!/^[A-Za-z0-9]{6,16}$/.test(regUsername)) {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert(
          "Username 6-16 karakter standar (A~Z, a~z, 0~9) dan tanpa spasi!",
          "alert alert-sm alert-warning"
        );
      }, 2000);

      return;
    }

    if (regPassword === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Password wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regPassword !== regConfirmPassword) {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert(
          "Konfirmasi password tidak cocok",
          "alert alert-sm alert-warning"
        );
      }, 2000);

      return;
    }

    if (email === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Email wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regTelp === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("No Telepon wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regAcc === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("No rekening wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regBank === "") {
      showAlert("Validating", "alert alert-sm alert-success");

      setTimeout(function () {
        showAlert("Bank wajib di isi", "alert alert-sm alert-warning");
      }, 2000);

      return;
    }

    if (regName === "") {
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
        username: regUsername,
        password: regPassword,
        confirmPassword: regConfirmPassword,
        email: email,
        telp_no: regTelp,
        acc_no: regAcc,
        bank_name: regBank,
        fullname: regName,
      },
      beforeSend: function () {
        var validatingBox = $("<div>")
          .addClass("alert alert-sm alert-success")
          .text("Validating");
        statusRegister.html(validatingBox).fadeIn("slow");
      },
      success: function (response) {
        setTimeout(function () {
          if (response === "Username sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegister.text("").append(alertBox).fadeIn("slow");
            if (!statusRegister.is(":visible")) {
              statusRegister.fadeOut("slow", function () {
                statusRegister.text("");
              });
            }
          } else if (response === "Email sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegister.text("").append(alertBox).fadeIn("slow");
            if (!statusRegister.is(":visible")) {
              statusRegister.fadeOut("slow", function () {
                statusRegister.text("");
              });
            }
          } else if (response === "Nomor telepon sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegister.text("").append(alertBox).fadeIn("slow");
            if (!statusRegister.is(":visible")) {
              statusRegister.fadeOut("slow", function () {
                statusRegister.text("");
              });
            }
          } else if (response === "Nomor akun sudah terdaftar!") {
            var alertBox = $("<div>")
              .addClass("alert alert-sm alert-warning")
              .text(response);
            statusRegister.text("").append(alertBox).fadeIn("slow");
            if (!statusRegister.is(":visible")) {
              statusRegister.fadeOut("slow", function () {
                statusRegister.text("");
              });
            }
          } else if (response === "Registrasi gagal!") {
            var successBox = $("<div>")
              .addClass("alert alert-sm alert-success")
              .text(response);
            statusRegister.text("").append(successBox).fadeIn("slow");

            setTimeout(function () {
              statusRegister.fadeOut("slow", function () {
                statusRegister.text("");
              });
            }, 3000);
          } else {
            var errorBox = $("<div>")
              .addClass("alert alert-sm alert-success")
              .text(response);
            statusRegister.text("").append(errorBox).fadeIn("slow");

            // Mengisi otomatis username dan password di form login
            $("#username").val(regUsername);
            $("#password").val(regPassword);

            // Mengosongkan semua input setelah registrasi berhasil
            $("#regUsername").val("");
            $("#regPassword").val("");
            $("#regConfirmPassword").val("");
            $("#email").val("");
            $("#regTelp").val("");
            $("#regAcc").val("");
            $("#regBank").val("");
            $("#regName").val("");

            // Mengosongkan semua select option (jika ada)
            $("#input-bank select").prop("selectedIndex", 0);

            setTimeout(function () {
              statusRegister.fadeOut("slow", function () {
                statusRegister.text("");
              });
            }, 3000);
          }
        }, 2000);
      },
    });
  });
});
