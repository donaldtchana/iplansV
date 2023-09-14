<?php
function __add__(string $url, string $findPage, string $insert): void
{
    $path = parse_url($url, PHP_URL_PATH);
    $path = str_replace("/Iplans/", "", $path);
    if ($path == $findPage) {
        echo $insert;
    }
}
