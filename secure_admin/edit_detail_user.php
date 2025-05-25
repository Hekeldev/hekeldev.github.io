<?php

$userId = $_GET['id'];


// Periksa apakah parameter ID pengguna yang akan diedit telah diberikan
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    
    exit;
}

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
        echo '<script>alert("Hanya pengguna level SuperAdmin yang dapat mengubah ini.");</script>';
        exit;
    }

    $queryUpdateUser = "UPDATE users SET username='$username', level='$level', email='$email', telp_no='$telp_no', bank_name='$bank_name', fullname='$fullname', acc_no='$acc_no', status='$status' WHERE id=$userId";
    $resultUpdate = mysqli_query($conn, $queryUpdateUser);

    if ($resultUpdate) {
        echo "Pengguna berhasil diperbarui!";
    } else {
        // Query gagal dieksekusi, berikan penanganan kesalahan sesuai kebutuhan Anda
        echo "Terjadi kesalahan saat mengupdate pengguna: " . mysqli_error($conn);
        exit;
    }
}
?>


<div class="content-page">
                <div class="content">

                    <div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Akun Saya</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <title>Edit User</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
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

            <input type="submit" name="updateUser" value="Update Pengguna">
        </form>
    </div>

    <script>
        <?php
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
                echo 'swal("Peringatan", "Hanya pengguna level SuperAdmin yang dapat mengubah ini.", "warning");';
                echo 'event.preventDefault();';
            }
        }
        ?>
        
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function() {
                swal("Berhasil", "Pengguna berhasil diperbarui!", "success");
            });
        });
    </script>




                 
<form method="POST" action="/update-profil" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="OwTIZJJ8R3fLZq6bktWdRfCqi4bgFXTGkKdH2f0m">                    <div class="modal-body">
                        <div class="" style="text-align: center; padding: 30px 20px">
                            <a href="javascript: void(0);">
                                <img src="http://nyuscoding.great-site.net/userFoto/1688263760.png" alt="user-image" height="150" class="rounded-circle shadow-sm">
                            </a>
                        </div>
                        <input type="hidden" required="" name="id_pengguna" id="id_pengguna" value="eyJpdiI6IklveXJzTHJKU0R6ZG9pWlhIOWJWeXc9PSIsInZhbHVlIjoid2dMN3Urak9LMWIwdmFKK29maWE5dz09IiwibWFjIjoiMjQzNzcxMWFkOTczZWExZTI1OTk5YWM0M2M4ZDA4ZDlmOTRlMGQxMGUyYjU4ZWI2ZThiMzNhYjhiYjg1MDIxZiIsInRhZyI6IiJ9">
    
                        <div class="mb-2">
                            <label for="nama_lengkap" class="control-label">Nama Lengkap <span style="color: red;">*</span></label>
    
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="Super Admin" required="">
    
                        </div>
                       
                        <div class="mb-2">
                            <label for="email" class="control-label">Alamat Email <span style="color: red;">*</span></label>
    
                            <input type="email" class="form-control" id="email" name="email" value="superadmin@mail.com" placeholder="youremail@mail.com" required="">
    
                        </div> 
                        <div class="mb-2">
                            <label for="username" class="control-label">Username</label>
    
                            <input type="text" class="form-control" id="username" name="username" value="superadminn">
    
                        </div>
                        <div class="mb-2">
                            <label for="level" class="control-label">Level Pengguna </label>
                            <input type="text" value="SUPERADMIN" readonly="" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="file" class="control-label">Upload Foto Profil </label>
                            <input type="file" id="file" name="file" class="form-control">
                            <div class="mb-2">
                                <img id="preview-image-before-upload" alt="Preview Image" style="max-height: 100px; max-width:350px" src="/userFoto/1688263760.png">
                            </div>
                        </div>
                        <br>
                        <div>
                            <p>Kosongkan jika tidak ingin merubah Password</p>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="control-label">Password</label>
    
                            <input type="password" autocomplete="off" value="" name="password" id="password" class="form-control">
    
                        </div>
                        <div class="mb-2">
                            <label for="repassword" class="control-label">Ulangi Password</label>
    
                            <input type="password" autocomplete="off" value="" name="repassword" id="repassword" class="form-control">
    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {

        $('#preview-image-before-upload').attr('src', '/userFoto/1688263760.png');
$('#file').change(function() {

    let reader = new FileReader();

    reader.onload = (e) => {

        $('#preview-image-before-upload').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]);

});

});
</script>

                </div> <!-- End Content -->

                

            </div>
               