<div class="menu-content mobile-only">
    <div id="main-content" style="background: var(--content-box-background)">
        <div id="mobile-content" style="padding: 24px; box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;">
            <div class="mobile-provider-group">
                <div class="provider-item" onclick="openDaftar()"><img src="https://img.pay4d.info/tsport-sb.png"></div>
                <div class="provider-item" onclick="openDaftar()"><img src="https://img.pay4d.info/tsport-sbo.png"></div>
                <div class="provider-item" onclick="openDaftar()"><img src="https://img.pay4d.info/tsport-tf.png"></div>
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