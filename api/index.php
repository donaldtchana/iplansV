<?php

declare(strict_types=1);

// Auto load classes
spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

// Handle errors and exceptions
set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$part = explode("/", $request);

if ($part[1] != 'courrier')
    return http_response_code(404);

$id = null; 
$path = null; 
if (array_key_exists(2, $part)) {
    if (is_numeric($part[2])) {
        $id = $part[2];
    } else {
        if (is_string($part[2])) {
            $path = $part[2];
        }
    }
}

ini_set("date.timezone", "Africa/Douala");

$database = new Database("localhost", "administrator", "system", "demo",'5785');

$courrier = new Courrier($database);

$controller = new Controller($courrier);

$controller->processRequest($method, $id, $path);
