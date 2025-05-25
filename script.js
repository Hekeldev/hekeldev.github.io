$(document).ready(function() {
    // Fungsi untuk menampilkan alert custom
    function showAlert(message, cssClass) {
        var alertBox = $('<div>').addClass('alert alert-sm ' + cssClass).text(message);
        $('#msgbox').text('').append(alertBox).fadeIn('slow');
        if (message === '') {
            $('#msgbox').stop(true, true).fadeIn('slow');
        } else {
            var duration = 3000; // Durasi awal 3 detik
            if (cssClass === 'alert alert-sm alert-success' || cssClass === 'alert alert-sm alert-warning') {
                duration = 2000; // Durasi validasi menjadi 2 detik
            }
            setTimeout(function() {
                if ($('#msgbox').find('.alert').length === 0) {
                    $('#msgbox').fadeOut('slow');
                }
            }, duration);
        }
    }

    

    // Mengirim data login melalui AJAX
    $("#loginForm").submit(function(event) {
        event.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();

        if (username === '' || password === '') {
            showAlert("Validating", "alert alert-sm alert-success");
            setTimeout(function() {
                showAlert("Silakan diisi", "alert alert-sm alert-danger");
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
            success: function(response) {
                if (response === "Banned") {
                    showAlert("User di banned", "alert alert-sm alert-warning");
                    // Hentikan proses login jika akun dibanned
                } else {
                    // Jika akun tidak dibanned, lanjutkan dengan proses login
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: {
                            username: username,
                            password: password
                        },
                        beforeSend: function() {
                            showAlert("Validating", "alert alert-sm alert-success");
                        },
                        success: function(response) {
                            setTimeout(function() {
                                if (response === "Logging in") {
                                    showAlert(response, "alert alert-sm alert-success");
                                    setTimeout(function() {
                                        window.location.href = "m/userarea-firstlogin.php?page=login&head=home";
                                    }, 2000);
                                } else {
                                    showAlert(response, "alert alert-sm alert-warning");
                                }
                            }, 2000);
                        }
                    });
                }
            },
        });
    });
});
