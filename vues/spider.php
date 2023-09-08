<?php
$title = 'accueil';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$url = $_SERVER["REQUEST_URI"];
$query = parse_url($url, PHP_URL_QUERY);
if ($query == "lang=en") {
    $_SESSION["lang"] = "en";
    include_once "./lang/en.php";
} else {
    if ($query == NULL) {
        $lanuage = $_SESSION['lang'] ?? 'fr';
        if ($lanuage == 'en') {
            include_once "./lang/en.php";
        }
        if ($lanuage == 'fr') {
            include_once "./lang/fr.php";
        }
    } else {
        $_SESSION["lang"] = "fr";
        include_once "./lang/fr.php";
    }
}
ob_start();
?>

    <!---------------- Main section ------------------------>

    <main class="main" style="margin-top: 2px!important;">
      <!--  Main start -->

      <div class="pictures">
        <figcaption>
          <h2>RACCOURCIS</h2>
        </figcaption>

        <svg
          version="1.0"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 517 515"
          preserveAspectRatio="xMidYMid meet"
        >
          <g
            transform="translate(0.000000,515.000000) scale(0.100000,-0.100000)"
          >
            <path
              d="M2510 4354 c-128 -25 -256 -74 -320 -124 -19 -14 -64 -41 -100 -59
            -113 -58 -180 -104 -256 -175 -60 -56 -83 -87 -124 -167 -28 -54 -55 -117 -60
            -141 -5 -24 -13 -61 -19 -83 -5 -22 -15 -95 -21 -162 -11 -108 -9 -143 11
            -321 12 -110 19 -207 16 -217 -4 -9 -22 -22 -40 -30 -37 -15 -48 -34 -73 -135
            -28 -106 -23 -200 15 -305 18 -49 38 -112 45 -140 25 -98 51 -130 128 -154 41
            -13 42 -16 58 -142 14 -115 34 -187 80 -294 38 -87 40 -95 50 -253 11 -178 4
            -242 -28 -242 -9 0 -54 -4 -99 -10 -72 -8 -99 -17 -200 -69 -65 -33 -141 -69
            -170 -80 -28 -11 -118 -53 -200 -94 -81 -40 -196 -93 -256 -117 -59 -24 -107
            -47 -107 -51 0 -3 33 -37 73 -75 631 -598 1536 -822 2382 -589 350 96 667 266
            955 511 93 79 166 151 159 158 -2 2 -55 25 -117 50 -62 26 -179 80 -260 120
            -81 40 -174 84 -207 97 -33 13 -99 45 -147 71 -99 54 -132 64 -240 73 l-78 7
            -10 38 c-7 27 -7 89 1 205 10 155 13 170 44 239 48 107 72 189 85 302 13 110
            26 138 67 148 64 16 96 56 119 151 7 28 24 81 38 120 54 146 55 228 5 383 -18
            54 -26 64 -55 77 -19 8 -37 22 -41 31 -3 9 4 106 16 214 21 178 22 209 11 321
            -6 68 -16 142 -21 164 -6 22 -14 59 -19 82 -5 23 -20 64 -33 90 -13 26 -30 66
            -37 88 -15 46 -123 156 -207 211 -28 19 -54 38 -57 42 -3 5 -32 19 -66 33 -33
            13 -60 27 -60 31 0 5 -6 8 -14 8 -7 0 -31 14 -52 31 -99 79 -258 129 -424 134
            -63 2 -126 1 -140 -1z"
            />
          </g>
        </svg>

        <div class="icons">
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
          <span><a href="#">img</a></span>
        </div>
      </div>

      <button type="button" class="func">Accueil</button>
      <button type="button" class="func">Communication personnelle</button>
      <button type="button" class="func">Messagerie</button>
      <button type="button" class="func" data-courrier>
        Courrier&nbsp;E/S
      </button>
      <button type="button" class="func" data-hotel>Réception/Accueil</button>
      <button type="button" class="func">Paramètres</button>
      <button type="button" class="func">Médiathèque</button>
      <button type="button" class="func">GED</button>
      <button type="button" class="func">GRH</button>
      <button type="button" class="func">Gestion Administrative</button>
    </main>
    <!--  main end -->



<?php
$content = ob_get_clean();
include 'layout.php'
?>