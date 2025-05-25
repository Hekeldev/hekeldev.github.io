<div class="desktop-only">
                    <div id="mobile-slider" class="carousel slide" data-bs-ride="carousel" style="height: 100%">
                        <!-- BANNER DESKTOP -->
                        <div id="bannerCarouselDesktop" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                // Ambil daftar banner dari database
                                $queryBanners = "SELECT * FROM bannersdesktop";
                                $resultBannersDesktop = mysqli_query($conn, $queryBanners);

                                // Tampilkan indikator carousel secara dinamis
                                $active = 'active';
                                $index = 0;
                                while ($banner = mysqli_fetch_assoc($resultBannersDesktop)) {
                                    echo '<li data-bs-target="#bannerCarousel" data-bs-slide-to="' . $index . '" class="' . $active . '"></li>';
                                    $active = '';
                                    $index++;
                                }
                                ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                // Tampilkan banner secara dinamis
                                $active = 'active';
                                mysqli_data_seek($resultBannersDesktop, 0); // Kembalikan kursor ke awal
                                while ($banner = mysqli_fetch_assoc($resultBannersDesktop)) {
                                    echo '<div class="carousel-item ' . $active . '">
              <img src="bannerdesktop/' . $banner['image_path'] . '" alt="' . $banner['alt_text'] . '" class="d-block w-100">
            </div>';
                                    $active = '';
                                }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#bannerCarouselDesktop" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#bannerCarouselDesktop" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>

                    </div>
                </div>