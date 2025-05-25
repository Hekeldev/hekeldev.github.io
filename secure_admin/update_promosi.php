<!-- ini halaman UPDATE_PROMOSI.PHP -->

<?php
session_start();
include '../config.php';

// Update keterangan accordion
if (isset($_POST['updateAccordion'])) {
  $accordionId = $_POST['accordionId'];
  $description = $_POST['description'];

  $queryUpdateAccordion = "UPDATE accordions SET description='$description' WHERE id=$accordionId";
  mysqli_query($conn, $queryUpdateAccordion);

  echo '<script>alert("Keterangan accordion berhasil diperbarui!"); window.location.href = "index.php?PAY4D=daftar_promosi";</script>';
}
?>