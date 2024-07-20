<!-- call footer assets -->
@( footer_assets() )
@( dashboard_footer_assets() )

<footer class="footer">
    <div class="container-fluid">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    © @( date('Y') ), Vylboard
                </div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <div class="logo">
                        <a href="https://nsyframework.com"><img src="@( base_url('public/assets/img/logo.png') )" alt="JustBoil.me"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
