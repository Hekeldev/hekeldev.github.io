<?php

// update_accordion.php

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $accordionId = $_POST['accordionId'];
  $title = $_POST['title'];
  $altText = $_POST['alt_text'];
  $description = $_POST['description'];

  // Lakukan pembaruan data accordion ke dalam database
  $query = "UPDATE accordions SET title='$title', alt_text='$altText', description='$description' WHERE id='$accordionId'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo 'success';
  } else {
    echo 'error';
  }
} else {
  echo 'Invalid request';
}
?>