<div id="loading" style="display: none;">
  <img src="m/loading.gif" width="56px" alt="Loading...">
</div>

<div id="content" style="display: none;">
  <!-- Isi konten di sini -->


  <div style="font-size: 1.2rem; font-weight: bold">PROMOSI</div>
  <div class="devider"></div>

  <div class="panel panelbg" style="max-width: 900px; margin-bottom: 80px">
    <div class="panel-body">


    <div class="accordion" id="accordionExample">
  <?php
  // Ambil data accordion dari database dengan statuspromosi "Aktif"
  $queryAccordions = "SELECT * FROM accordions WHERE statuspromosi = 'Aktif'";
  $resultAccordions = mysqli_query($conn, $queryAccordions);
  $index = 0;
  while ($accordion = mysqli_fetch_assoc($resultAccordions)) {
    echo '<div class="accordion-item">
            <h2 class="accordion-header" id="heading' . $index . '">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $index . '" aria-expanded="true" aria-controls="collapse' . $index . '">
                <h3 class="accordion-title">' . $accordion['title'] . '</h3>
              </button>
            </h2>
            <div id="collapse' . $index . '" class="shadow collapse" style="width: 100%; margin-top:10px; border:solid 1px #333; border-radius: 10px 10px 10px 10px; background: var(--primary-theme-color)" aria-labelledby="heading' . $index . '" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <img src="' . $accordion['image_path'] . '" alt="' . $accordion['alt_text'] . '" style="width: 100%;border-radius: 10px 10px 0px 0px">
                ' . $accordion['description'] . '
              </div>
            </div>
          </div>';
    $index++;
  }
  ?>
</div>



    </div>

  </div>

</div>

<script>
  // Menampilkan animasi loading GIF
  document.getElementById("loading").style.display = "block";

  // Menunggu selama 2 detik sebelum menampilkan konten
  setTimeout(function() {
    // Sembunyikan animasi loading GIF
    document.getElementById("loading").style.display = "none";

    // Tampilkan konten
    document.getElementById("content").style.display = "block";
  }, 2000);
</script>