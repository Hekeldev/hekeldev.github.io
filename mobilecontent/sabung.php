<div class="menu-content mobile-only">
    <div id="main-content" style="background: var(--content-box-background)">
        <div id="mobile-content" style="padding: 24px; box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;">
            <div class="panel panelbg">
                <div class="desktop-only">
                    <h3 class="pb-4">Sabung</h3>
                </div>
                <div class="panel-body d-flex gap-4">

                    <style>
                        .slotarea {
                            height: 800px;
                            overflow: auto;
                            width: 100%;
                            display: grid;
                            grid-template-columns: repeat(5, 1fr);
                            gap-y: 25px;
                            margin-bottom: 40px;
                        }

                        .casinoarea {
                            overflow: auto;
                            width: 100%;
                            display: grid;
                            grid-template-columns: repeat(4, 1fr);
                            gap-y: 25px;
                            margin-bottom: 24px;
                        }

                        .five {
                            grid-template-columns: repeat(5, 1fr);
                        }

                        .gameitem {
                            padding: 20px;
                            padding-top: 0px;
                        }

                        .gameitem>img {
                            width: 100%;
                            max-width: 100%;
                            object-fit: contain;
                        }

                        .gameitem>figcaption {
                            overflow-wrap: break-word;
                        }

                        .casinoimg {
                            border-radius: 10px;
                            border: 1px solid #000;
                            box-shadow: rgba(0, 0, 0, .1) 0px 2px 5px 5px;
                        }

                        @media only screen and (max-width: 768px) {

                            .slotarea,
                            .casinoarea {
                                height: 100%;
                                grid-template-columns: repeat(3, 1fr) !important;
                            }

                            .gameitem {
                                padding: 6px;
                            }


                        }
                    </style>


                    <figure style="text-align: center"><img src="https://img.pay4d.info/wslogo.png" alt="WS168">
                        <figcaption>WS168</figcaption>
                    </figure>



                </div>
            </div>
        </div>


        <script>
            function loadGame(type, provider) {

                var file = `/new-webpages.php?content=${type}&provider=${provider}`;

                $('#mobile-content').load(file);
            }
        </script>
    </div>
</div>