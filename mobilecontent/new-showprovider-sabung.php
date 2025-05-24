<div class="menu-content mobile-only">
    <div id="main-content" style="background: var(--content-box-background)">
        <div id="mobile-content" style="padding: 24px; box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;">
            <div class="mobile-provider-group">
                <div class="provider-item" onclick="sabung(&quot;sabung&quot;, &quot;ws&quot;)"><img src="https://img.pay4d.info/tsabung-ws.png"></div>
            </div>
        </div>


        <script>
            function sabung(type, provider) {

                var file = `mobilecontent/sabung.php?content=${type}&provider=${provider}`;

                $('#mobile-content').load(file);
            }
        </script>
    </div>
</div>