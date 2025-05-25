$(document).ready(function() {
    // Fungsi untuk menampilkan alert custom
    function showAlert(message, cssClass) {
        var alertBox = $('<div>').addClass('alert alert-sm ' + cssClass).text(message);
        $('#msgboxAdmin').text('').append(alertBox).fadeIn('slow');
        if (message === '') {
            $('#msgboxAdmin').stop(true, true).fadeIn('slow');
        } else {
            var duration = 3000; // Durasi awal 3 detik
            if (cssClass === 'alert alert-sm alert-success' || cssClass === 'alert alert-sm alert-warning') {
                duration = 2000; // Durasi validasi menjadi 2 detik
            }
            setTimeout(function() {
                alertBox.fadeOut('slow', function() {
                    if ($('#msgboxAdmin').find('.alert').length === 0) {
                        $('#msgboxAdmin').fadeOut('slow');
                    }
                });
            }, duration);
        }
    }

    // Mengirim data login melalui AJAX
    $("#loginFormAdmin").submit(function(event) {
        event.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();
        var loginTime = $("#loginTime").val();

        if (username === '' || password === '') {
            showAlert("Validating...", "alert alert-sm alert-success");
            setTimeout(function() {
                showAlert("Silakan diisi", "alert alert-sm alert-warning");
            }, 1000);
            return;
        }

        $.ajax({
            type: "POST",
            url: "adminlogin.php",
            data: {
                username: username,
                password: password,
                loginTime: loginTime
            },
            beforeSend: function() {
                showAlert("Validating", "alert alert-sm alert-success");
            },
            success: function(response) {
                setTimeout(function() {
                    if (response === "Logging in") {
                        showAlert(response, "alert alert-sm alert-success");
                        setTimeout(function() {
                            window.location.href = "index.php?PAY4D=dashboard";
                        }, 2000);
                    } else {
                        showAlert(response, "alert alert-sm alert-danger");
                    }
                }, 2000);
            }
        });
    });
});
