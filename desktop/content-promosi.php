


        <div class="contentdata">
            <div id="content-primary" class="p-0">


                <div class="content-body" style="position: relative">
                    <div class="content-area">
                        <div id="content" class="content-box">

                            <div class="panel panelbg">
                                <div class="panel-heading">
                                    <h3><span class="glyphicon glyphicon-tags"></span>Promosi</h3>
                                </div>
                                <div class="panel-body" style="font-size: 1rem">



                                <div class="accordion" id="accordionExample">
  <?php
  // Ambil data accordion dari database dengan statuspromosi "Aktif"
  $queryAccordions = "SELECT * FROM accordions WHERE statuspromosi = 'Aktif'";
  $resultAccordions = mysqli_query($conn, $queryAccordions);
  $index = 0;
  while ($accordion = mysqli_fetch_assoc($resultAccordions)) {
    echo '<div class="accordion-item">
            <h2 class="accordion-header" id="heading' . $index . '">
            <h3 class="accordion-title">' . $accordion['title'] . '</h3>
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $index . '" aria-expanded="true" aria-controls="collapse' . $index . '">
                <img src="' . $accordion['image_path'] . '" alt="' . $accordion['alt_text'] . '">
              </button>
            </h2>
            <div id="collapse' . $index . '" class="accordion-collapse collapse" aria-labelledby="heading' . $index . '" data-bs-parent="#accordionExample">
              <div class="accordion-body">
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
                    </div>
                </div>


            </div>
        </div>


        <!-- Togel -->

        <style>
            .togel-desktop {
                background: var(--togel-background);
                grid-area: togel-desktop;
                position: relative;
            }

            .togel-mobile {
                display: none;
            }

            .show-more {
                position: absolute;

                z-index: 999;
                bottom: 0px;
                width: 100%;

                /* background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0) 60%, rgba(0,0,0,0)); */
            }

            .show-more-content {
                background: var(--secondary-background);
                opacity: .7;
                display: grid;
                place-items: center;
                height: 32px
            }

            .togel-content {
                position: relative;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                /*display: grid;*/
                /*grid-template-columns: repeat(10, 1fr);*/
                gap: 8px 4px;
                padding: 16px 0;
            }

            .see-more {
                padding: 16px 0 48px 0;
                max-height: 162px;
                transition: max-height .75s ease-out;
                transition-delay: .1s;
                overflow: hidden;
            }

            .togel-content:hover {
                max-height: 1000px;
                transition: max-height 0.25s ease-in;
            }

            .result {
                height: 110px;
                width: 96px;
                border-radius: 10px;
                background: var(--result-background);
                border: var(--result-border);

                display: grid;
                grid-template-rows: 0px 20px 1fr 28px;
                grid-template-areas:
                    "badge"
                    "pasaran"
                    "keluaran"
                    "tanggal"
                ;

                /* display: flex;
            flex-direction: column;
            justify-content: space-between; */

                overflow: hidden;
            }

            .badge {
                grid-area: badge;
                display: grid;
                place-items: center;
            }

            .result>.pasaran {

                grid-area: pasaran;

                padding-top: 8px;
                white-space: nowrap;
                font-size: .7rem;
                line-height: .7rem;

                color: var(--result-pasaran-color);
                display: grid;
                place-items: center;
            }

            .result>.keluaran {

                grid-area: keluaran;
                padding-bottom: 8px;
                font-family: 'Oswald', sans-serif;
                line-height: 40px;
                font-size: 40px;
                color: var(--result-keluaran-color);
                display: grid;
                place-items: center;
            }

            .result>.tanggal {

                grid-area: tanggal;

                width: 100%;
                height: 100%;
                /* background: rgb(40,0,0);
            background: linear-gradient(0deg, rgba(80,0,0,1) 0%, rgb(164, 2, 2) 100%); */
                background: var(--result-tanggal-background);
                white-space: nowarp;
                font-size: .79rem;
                display: grid;
                place-items: center;
                font-family: 'Abel', sans-serif;
                color: var(--result-tanggal-color);
            }

            @media only screen and (max-width: 1000px) {

                .togel-desktop {
                    display: none;
                }

                .togel-mobile {

                    background: var(--secondary-background);
                    grid-area: togel-mobile;
                    padding: 24px;
                    padding-bottom: 12px;
                    box-shadow: rgba(0, 0, 0, 1) 0px 0px 10px 0px;
                }

                .togel-title {
                    padding: 0px;
                    padding-bottom: 20px;
                    font-size: 1.4rem;
                    font-weight: bold;
                    color: var(--primary-text-color);
                }

                .togel-content {
                    max-height: fit-content;
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 0;
                    border-radius: 8px;
                }



                .provider-group {
                    padding: var(--mobile-padding-horizontal);
                }

                .badge {
                    display: none;
                }

                .result {
                    height: auto;
                    width: 100%;
                    display: grid;
                    grid-template-rows: 1fr;
                    grid-template-columns: 1fr 1fr 80px;
                    grid-template-areas: "pasaran tanggal keluaran";
                    border-radius: 0;
                    border: none;
                    background: transparent;
                    padding: 4px 12px;
                    color: var(--primary-text-color);
                    font-family: 'Abel', sans-serif;

                }


                .result-data:nth-child(odd) {
                    background: linear-gradient(0deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.3) 100%), var(--secondary-background);
                }


                .accordion-item {
                    background-color: transparent;
                    border: 0px;
                }

                .accordion-button:not(.collapsed) {
                    color: inherit;
                    background-color: transparent;
                    box-shadow: none;
                }

                .accordion-button::after {
                    height: 0px;
                }

                .result>* {
                    padding: 0px !important;
                    margin: 0px !important;
                    font-size: 1.4rem !important;
                    line-height: auto !important;
                    font-weight: normal !important;
                }

                .result>.pasaran {
                    display: flex;
                    justify-content: start;
                    color: var(--primary-text-color) !important;
                    opacity: .7;
                }

                .result>.tanggal {
                    display: flex;
                    justify-content: center;
                    background: transparent;
                    color: var(--primary-text-color) !important;
                    opacity: .7;
                }

                .result>.keluaran {
                    display: flex;
                    justify-content: end;
                    /*color: var(--primary-text-color)!important;*/
                    font-family: 'Abel', sans-serif;
                    color: var(--highlight-text-color);
                }

            }
        </style>



        