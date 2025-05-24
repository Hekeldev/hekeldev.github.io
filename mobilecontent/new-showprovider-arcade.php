<div class="menu-content mobile-only">
    <div id="main-content" style="background: var(--content-box-background)">
        <div id="mobile-content" style="padding: 24px; box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;">
            <div class="mobile-provider-group">
                <div class="provider-item" onclick="spadegaming(&quot;fish&quot;, &quot;sg&quot;)"><img src="https://img.pay4d.info/tfish-sg.png"></div>
                <div class="provider-item" onclick="jili(&quot;fish&quot;, &quot;jl&quot;)"><img src="https://img.pay4d.info/tfish-jl.png"></div>
                <div class="provider-item" onclick="fastspin(&quot;fish&quot;, &quot;fs&quot;)"><img src="https://img.pay4d.info/tfish-fs.png"></div>
                <div class="provider-item" onclick="playstar(&quot;fish&quot;, &quot;ps&quot;)"><img src="https://img.pay4d.info/tfish-ps.png"></div>
            </div>
        </div>


        <script>
            function spadegaming(type, provider) {

                var file = `mobilecontent/arcadespadegaming.php?content=${type}&provider=${provider}`;

                $('#mobile-content').load(file);
            }

            function jili(type, provider) {

                var file = `mobilecontent/arcadejili.php?content=${type}&provider=${provider}`;

                $('#mobile-content').load(file);
            }

            function fastspin(type, provider) {

                var file = `mobilecontent/arcadefastspin.php?content=${type}&provider=${provider}`;

                $('#mobile-content').load(file);
            }

            function playstar(type, provider) {

                var file = `mobilecontent/arcadeplaystar.php?content=${type}&provider=${provider}`;

                $('#mobile-content').load(file);
            }
        </script>
    </div>
</div>