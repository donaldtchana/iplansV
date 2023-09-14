<?php

/**
 * Code sniffer
 *
 * @category Pass
 * @package  Pass
 * @author   Pass <username@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.gnu.org/copyleft/gpl.html
 *
 */


require_once __DIR__ . '/include/config.php';
require_once __DIR__ . '/controllers/home_controller.php';
// gestion des routes
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace("/IplansV2", "", $uri);
$uri = str_replace(".php", "", $uri);
$uri = str_replace("//", "/", $uri);
if ('/accueil' == $uri || empty($uri) || $uri == "/") {
    see_dashboard();
}
if ('/courrier' == $uri) {
    courrier();
}
if ('/login' == $uri) {
    loginlogin();
}
if ('/spider' == $uri) {
    spider();
}