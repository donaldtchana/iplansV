    <!---------------- Header ------------------------>
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/assets/css/accueil.css">
   <!--  header end --><header class="header">
        <div class="logo">
            <img src="<?=SITE_URL?>/assets/img/iplans logo.png" alt="" width="80px" />
        </div>
        <div class="logo2" style="   ">
            <p style="text-align: right">
                <img style=" height: 105px!important; margin-top: 0px;
    margin-left: 655px!important;text-align: right" src="<?= SITE_URL ?>/assets/img/logo_minesec2.png" alt="logo du MINESEC CAMEROUN">
            </p>
        </div>
        <div class="nomE">
            <h1>PACK EDUCATION</h1>
        </div>
        <div class="language" >
            <form method="get">
                <select name="lang" id="lang" style="    margin-right: 92px;"  onChange="window.location.href=this.value">
                    <option value="?lang=fr" >Français</option>
                    <option value="?lang=en">English</option>
                    <option value="<?=SITE_URL?> ? lang=fr"> Francais</option>
                    <option value="<?=SITE_URL?> ? lang=en">English</option>
                </select>
            </form>
        </div>

    </header>