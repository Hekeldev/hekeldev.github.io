<?php

$maintenanceMode = isMaintenanceMode();
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    form {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    buttonSimpan{
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<!-- Form untuk mengatur status maintenance -->
<form method="post">
    <label for="maintenance">Maintenance Mode:</label>
    <input type="checkbox" id="maintenance" name="maintenance" <?php echo ($maintenanceMode ? 'checked' : ''); ?>>
    <?php if ($_SESSION['level'] === 'superadmin') : ?>
        <input type="submit" name="saveMaintenance" value="Simpan">
    <?php else : ?>
        <a class="button" onclick="levelFunction()">Simpan</a>
    <?php endif; ?>
    <br>
    <br>
    <p class="font-13 text-red-50">NOTE : Jika maintenance mode di ceklis maka semua halaman tidak akan bisa di akses , kecuali halaman admin.</p>
</form>