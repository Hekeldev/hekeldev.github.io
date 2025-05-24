<?php
include_once("functions/database.php");
$mysqli = new databases();
?>
<!-- Slideshow -->
<div class="mt-12">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="upload/slide/1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="upload/slide/2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="upload/slide/3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<!-- Search Box -->
<div class="row content py-0">
  <div class="col-12 d-flex justify-content-end">
      <div class="input-group search">
          <input class="form-control" type="search" placeholder="Cari sesuatu" aria-label="Search" id="search_box">
          <button class="btn btn-primary"><i class="bi bi-search"></i></button>
      </div>
  </div>
</div>

