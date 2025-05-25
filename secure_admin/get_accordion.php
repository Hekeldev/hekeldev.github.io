<?php
// get_accordion.php

include '../config.php';

if (isset($_GET['id'])) {
  $accordionId = $_GET['id'];

  // Ambil data accordion dari database
  $query = "SELECT * FROM accordions WHERE id='$accordionId'";
  $result = mysqli_query($conn, $query);
  $accordion = mysqli_fetch_assoc($result);

  // Mengembalikan data accordion dalam format JSON
  echo json_encode($accordion);
} else {
  echo 'Invalid request';
}
?>