<?php
session_start();

include '../config.php';




// Periksa apakah parameter ID pengguna yang akan diedit telah diberikan
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    exit;
}

$userId = $_GET['id'];
// Ambil informasi pengguna berdasarkan ID dari database
$queryUser = "SELECT * FROM users WHERE id=$userId";
$resultUser = mysqli_query($conn, $queryUser);

// Periksa apakah query berhasil dieksekusi
if ($resultUser) {
    $user = mysqli_fetch_assoc($resultUser);

    // Periksa apakah pengguna dengan ID yang diberikan ditemukan
    if (!$user) {
        header('Location: admin.php');
        exit;
    }
} else {
    // Query gagal dieksekusi, berikan penanganan kesalahan sesuai kebutuhan Anda
    echo "Terjadi kesalahan saat mengambil informasi pengguna.";
    exit;
}

// Update pengguna
if (isset($_POST['updateUser'])) {
    $username = $_POST['username'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $telp_no = $_POST['telp_no'];
    $bank_name = $_POST['bank_name'];
    $fullname = $_POST['fullname'];
    $acc_no = $_POST['acc_no'];
    $status = $_POST['status'];


    // Cek apakah admin berusaha mengubah status menjadi SuperAdmin
    if ($user['level'] == 'admin' && $level == 'superadmin') {
        echo "<script>alert('Hanya pengguna level SuperAdmin yang dapat mengubah ini.'); location.href='edit_user.php?id=" . $user['id'] . "';</script>";
        exit;
    }

    

    $queryUpdateUser = "UPDATE users SET username='$username', level='$level', email='$email', telp_no='$telp_no', bank_name='$bank_name', fullname='$fullname', acc_no='$acc_no', status='$status' WHERE id=$userId";
    $resultUpdate = mysqli_query($conn, $queryUpdateUser);

    if ($resultUpdate) {
        echo "<script>alert('Pengguna berhasil diperbarui!'); location.href='edit_user.php?id=" . $user['id'] . "';</script>";
    } else {
        // Query gagal dieksekusi, berikan penanganan kesalahan sesuai kebutuhan Anda
        echo "Terjadi kesalahan saat mengupdate pengguna: " . mysqli_error($conn);
        exit;
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <style>
        .gradient-button {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(to right, #4CAF50, #45a049);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .gradient-button:hover {
            background: linear-gradient(to right, #45a049, #4CAF50);
        }
    </style>



</head>

<body>
<div id="alertContainer"></div>

    <div class="container">
        <h1>Edit User</h1>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>" required>

            <label for="level">Level:</label>
            <select name="level" id="level">
                <option value="admin" <?php if ($user['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if ($user['level'] == 'user') echo 'selected'; ?>>User</option>
                <option value="superadmin" <?php if ($user['level'] == 'superadmin') echo 'selected'; ?>>SuperAdmin</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required>

            <label for="telp_no">Telephone Number:</label>
            <input type="tel" name="telp_no" id="telp_no" value="<?php echo $user['telp_no']; ?>" required>

            <label for="bank_name">Jenis BANK:</label>
            <input type="text" name="bank_name" id="bank_name" value="<?php echo $user['bank_name']; ?>" required>

            <label for="fullname">Nama Lengkap Rekening:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo $user['fullname']; ?>" required>

            <label for="acc_no">Nomor Rekening:</label>
            <input type="text" name="acc_no" id="acc_no" value="<?php echo $user['acc_no']; ?>" required>

            <label for="status">Status Akun:</label>
            <select name="status" id="status">
                <option value="Aktif" <?php if ($user['status'] == 'Aktif') echo 'selected'; ?>>Aktif</option>
                <option value="Banned" <?php if ($user['status'] == 'Banned') echo 'selected'; ?>>Banned</option>
            </select>

            <br>
            <br>
            <a href="index.php?PAY4D=user" class="gradient-button">
                <>Kembaili
            </a>
            <input type="submit" name="updateUser" value="Update Pengguna">

        </form>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Fungsi untuk memeriksa status pengguna
    function checkUserStatus() {
      $.ajax({
        url: 'check_user_status.php',
        dataType: 'json',
        success: function(response) {
          if (response.status === 'Banned') {
            // Tampilkan pesan alert jika pengguna di banned
            alert('Akun anda di banned!');
          }
        },
        error: function() {
          // Tangani kesalahan saat mengambil status pengguna
          console.log('Terjadi kesalahan saat memeriksa status pengguna.');
        }
      });
    }

    // Perbarui status pengguna setiap 5 detik
    setInterval(checkUserStatus, 1000);

    // Panggil fungsi checkUserStatus() setelah halaman selesai dimuat
    checkUserStatus();
  });
</script>



</body>

</html>